<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang_ujian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'mahasiswa_login') {
			redirect(base_url() . 'auth?alert=belum_login');
		}
	}

	public function soal()
	{
		$id_peserta = $this->uri->segment(3);		
		$id = $this->db->query('SELECT * FROM tb_peserta WHERE id_peserta="' . $id_peserta . '"  ')->row_array();
		$soal_pg = $this->db->query('SELECT * FROM tb_soal_ujian WHERE id_matakuliah="'.$id['id_matakuliah'].'" ORDER BY RAND()');
		$where = array('id_peserta' => $id_peserta);
		$data2 = array('status_ujian_pg' => 1);
		$this->m_data->update_data($where,$data2,'tb_peserta');
		$time = $id['timer_pg'];
		$data = array(
			"soal" => $soal_pg->result(),
			"total_soal" => $soal_pg->num_rows(),
			"max_time" => $time,
			"id" => $id
		);
		$this->load->view('ujian/v_soalpg', $data);
	}

	public function jawab_aksi()
	{
		$id_peserta = $this->input->post('id_peserta');
		$jumlah 	= $_POST['jumlah_soal'];
		$id_soal 	= $_POST['soal'];
		$jawaban 	= $_POST['jawaban'];
		for ($i = 0; $i < $jumlah; $i++) {
			$nomor = $id_soal[$i];
			$jawaban[$nomor];
			$data[] = array(
				'id_peserta' => $id_peserta,
				'id_soal_ujian' => $nomor,
				'jawaban' => $jawaban[$nomor]
			);
		}
		$this->db->insert_batch('tb_jawaban', $data);
		$cek = $this->db->query('SELECT id_jawaban, jawaban, tb_soal_ujian.kunci_jawaban FROM tb_jawaban join tb_soal_ujian ON tb_jawaban.id_soal_ujian=tb_soal_ujian.id_soal_ujian WHERE id_peserta="' . $id_peserta . '"');
		$jumlah = $cek->num_rows();
		foreach ($cek->result_array() as $d) {
			$where = $d['id_jawaban'];
			if ($d['jawaban'] == $d['kunci_jawaban']) {
				$data = array(
					'skor' => 1,
				);
				$this->m_data->UpdateNilai($where, $data, 'tb_jawaban');
			} else {
				$data = array(
					'skor' => 0,
				);
				$this->m_data->UpdateNilai($where, $data, 'tb_jawaban');
			}
		}

		$benar = 0;
		$salah = 0;
		$total_nilai = 0;
		$cek2 = $this->db->query('SELECT id_jawaban, jawaban, skor, tb_soal_ujian.kunci_jawaban FROM tb_jawaban join tb_soal_ujian ON tb_jawaban.id_soal_ujian=tb_soal_ujian.id_soal_ujian WHERE id_peserta="' . $id_peserta . '"');
		$jumlah = $cek2->num_rows();
		$where = $id_peserta;
		foreach ($cek2->result_array() as $c) {
			if ($c['jawaban'] == $c['kunci_jawaban']) {
				$benar++;
			} else {
				$salah++;
			}
			$total_nilai += $c['skor'] / $jumlah * 100;
		}
		$data = array(
			'benar' => $benar,
			'salah' => $salah,
			'status_pg' => 2,
			'status_ujian_pg' => 2,
			'nilai' => $total_nilai
		);
		$this->m_data->UpdateNilai2($where, $data, 'tb_peserta');
		redirect(base_url('jadwal'));
	}

	public function soalessay()
	{
		$id_peserta = $this->uri->segment(3);
		$id = $this->db->query('SELECT * FROM tb_peserta WHERE id_peserta="' . $id_peserta . '"  ')->row_array();
		$essay = $this->db->query('SELECT * FROM tb_essay WHERE id_matakuliah="'.$id['id_matakuliah'].'" ORDER BY RAND()');
		$where = array('id_peserta' => $id_peserta);
		$data2 = array('status_ujian_essay' => 1);
		$this->m_data->update_data($where,$data2,'tb_peserta');
		$time = $id['timer_essay'];
		$data = array(
			"essay" 		=> $essay->result(),
			"total_soal" 	=> $essay->num_rows(),
			"id" 			=> $id,
			"tgl_ujian"		=> strtotime($id['tanggal_ujian'] . " " . $id['jam_ujian']),
			"durasi"		=> $id['durasi_essay'],
			"max_time" 		=> $time,
			"id_matakuliah" => $id['id_matakuliah']
		);
		$this->load->view('ujian/v_soalessay', $data);
	}

	public function jawab_essay()
	{
		$id_peserta 	= $this->input->post('id_peserta');
		$id_mk 			= $this->input->post('id_mk');
		$jumlah 		= $_POST['jumlah_soal'];
		$id_soal_essay 	= $this->input->post('soal');
		$jawaban 		= $this->input->post('jawaban');
		$where = $id_peserta;
		for ($i = 0; $i < $jumlah; $i++) {
			$nomor = $id_soal_essay[$i];
			$jawaban[$nomor];
			$data[] = array(
				'id_peserta' => $id_peserta,
				'id_soal_essay' => $nomor,
				'jawaban_essay' => $jawaban[$nomor]
			);
		}
			$status_essay = array(
				'status_essay' => 2,
				'status_ujian_essay' => 2,
				'bobot_essay' => 0
			);
		$this->m_data->UpdateNilai2($where, $status_essay, 'tb_peserta');
		$this->db->insert_batch('tb_jawaban_essay', $data);
		redirect(base_url('jadwal'));
	}
}
