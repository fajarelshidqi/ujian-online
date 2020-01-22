<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_peserta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'admin_login') {
			redirect(base_url('auth'));
		}
		$this->load->model('m_peserta');
		$this->load->model('m_cetak_kartu_peserta');
		$this->load->library('mypdf');
	}

	public function index()
	{
		if (isset($_GET['idkls']) and isset($_GET['idmhs'])) {
			$idkls = $this->input->get('idkls');
			$idmhs = $this->input->get('idmhs');
			$data['peserta'] = $this->m_peserta->get_peserta($idkls, $idmhs)->result();
			$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
			$data['mhs'] = $this->m_data->get_data('tb_mahasiswa')->result();
		} else if (isset($_GET['idkls'])) {
			$idkls = $this->input->get('idkls');
			$data['peserta'] = $this->m_peserta->get_peserta2($idkls)->result();
			$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
			$data['mhs'] = $this->m_data->get_data('tb_mahasiswa')->result();
		} else if (isset($_GET['idmhs'])) {
			$idmhs = $this->input->get('idmhs');
			$data['peserta'] = $this->m_peserta->get_peserta3($idmhs)->result();
			$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
			$data['mhs'] = $this->m_data->get_data('tb_mahasiswa')->result();
		} else {
			$data['peserta'] = $this->m_peserta->get_peserta4()->result();
			$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
			$data['mhs'] = $this->m_data->get_data('tb_mahasiswa')->result();
		}
		$this->load->view('admin/v_daftar_peserta', $data);
	}

	public function hapus($id)
	{
		$where = array(
			'id_peserta' => $id
		);
		$this->m_data->delete_data($where, 'tb_peserta');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data Peserta Ujian berhasil di hapus !</h4></div>');
		redirect(base_url('daftar_peserta'));
	}


	public function edit($id)
	{
		$data['peserta'] = $this->m_peserta->get_joinpeserta($id);
		$data['mk'] = $this->m_data->get_data('tb_matakuliah')->result();
		$data['mhs'] = $this->m_data->get_data('tb_mahasiswa')->result();
		$data['jenis_ujian'] = $this->m_data->get_data('tb_jenis_ujian')->result();
		$this->load->view('admin/v_daftar_peserta_edit', $data);
	}

	public function update()
	{
		$peserta 		= $this->input->post('peserta');
		$mk 			= $this->input->post('mk');
		$tanggal		= $this->input->post('tanggal');
		$jam			= $this->input->post('jam');
		$durasi_pg		= $this->input->post('durasi_pg');
		$durasi_essay	= $this->input->post('durasi_essay');
		$jenis			= $this->input->post('jenis');

		$timer_pg 		= $durasi_pg*60;
		$timer_essay	= $durasi_essay*60;
		$where  = array('id_peserta' => $this->input->post('id'));

		if ($peserta == '' || $mk == '' || $tanggal == '' || $jam == '' || $durasi_pg == '' || $durasi_essay == '' || $jenis == '') {
			
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> semua field harus diisi semua !</h4></div>');
			redirect(base_url('daftar_peserta'));
		} else {
			$data = array(
				'id_mahasiswa'		=> $peserta,
				'id_matakuliah'		=> $mk,
				'id_jenis_ujian'	=> $jenis,
				'tanggal_ujian'		=> $tanggal,
				'jam_ujian'			=> $jam,
				'durasi_pg'			=> $durasi_pg,
				'durasi_essay'		=> $durasi_essay,
				'timer_pg'			=> $timer_pg,
				'timer_essay'		=> $timer_essay,
				'status_pg'			=> 1,
				'status_essay'		=> 1
			);

			$this->m_data->update_data($where, $data, 'tb_peserta');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data berhasil di Update.</h4></div>');
			redirect(base_url('daftar_peserta'));
		}
	}

	public function cetak_kartu_peserta()
	{
		if (isset($_GET['idkls']) and isset($_GET['idmhs'])) {
			$idkls = $this->input->get('idkls');
			$idmhs = $this->input->get('idmhs');
			$data['peserta'] = $this->m_cetak_kartu_peserta->cetak_kartu_peserta2($idkls, $idmhs)->result();
			$data['mk'] = $this->m_cetak_kartu_peserta->cetak_kartu_peserta5()->result();
		} else if (isset($_GET['idkls'])) {
			$idkls = $this->input->get('idkls');
			$data['peserta'] = $this->m_cetak_kartu_peserta->cetak_kartu_peserta3($idkls)->result();
			$data['mk'] = $this->m_cetak_kartu_peserta->cetak_kartu_peserta5()->result();
		} else if (isset($_GET['idmhs'])) {
			$idmhs = $this->input->get('idmhs');
			$data['peserta'] = $this->m_cetak_kartu_peserta->cetak_kartu_peserta4($idmhs)->result();
			$data['mk'] = $this->m_cetak_kartu_peserta->cetak_kartu_peserta5()->result();
		} else {
			$data['peserta'] = $this->m_cetak_kartu_peserta->cetak_kartu_peserta()->result();
			$data['mk'] = $this->m_cetak_kartu_peserta->cetak_kartu_peserta5()->result();
		}
		$this->mypdf->generate('admin/v_cetak_kartu_peserta', $data, 'Kartu-Peserta', 'A4', 'portrait');
	}
}
