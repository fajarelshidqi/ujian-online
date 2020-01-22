<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_data extends CI_Model
{


	//fungsi untuk mengambil data dari database
	public function get_data($table)
	{
		return $this->db->get($table);
	}

	//fungsi untuk insert data ke database
	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	//fungsi untuk mengambil data untuk di edit
	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	//fungsi untuk mengupdate data di database
	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//fungsi untuk menghapus data
	public function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}

	// Fungsi untuk melakukan proses upload file import
	public function insertimport($data)
	{
		$this->db->insert_batch('tb_mahasiswa', $data);
	}

	public function insertbatch($data)
	{
		$this->db->insert_batch($table, $data);
	}

	// Fungsi untuk insert lebih dari 1 data
	public function insert_multiple()
	{
		$durasi_pg		= $this->input->post('durasi_pg');
		$durasi_essay	= $this->input->post('durasi_essay');
				
		$timer_pg 		= $durasi_pg*60;
		$timer_essay	= $durasi_essay*60;

		$entri = array();
		$count = $this->input->post('id');
		foreach ($count as $i => $value) {
			$entri[] = array(
				'id_mahasiswa' 	=> $this->input->post('id')[$i],
				'id_matakuliah' => $this->input->post('mk'),
				'id_jenis_ujian'=> $this->input->post('jenis_ujian'),
				'tanggal_ujian' => $this->input->post('tanggal'),
				'jam_ujian' 	=> $this->input->post('jam'),
				'durasi_pg' 	=> $durasi_pg,
				'durasi_essay' 	=> $durasi_essay,
				'timer_pg' 		=> $timer_pg,
				'timer_essay' 	=> $timer_essay,
				'status_pg' 	=> 1,
				'status_essay' 	=> 1
			);
		}
		//return $entri;
		// echo "<pre>"; print_r($timer_pg);die;
		$this->db->insert_batch('tb_peserta', $entri);
		return true;
	}

	public function get_joinmhs($id)
	{
		$query = 'SELECT * FROM tb_mahasiswa join tb_kelas ON tb_mahasiswa.id_kelas=tb_kelas.id_kelas WHERE tb_mahasiswa.id_mahasiswa="' . $id . '"';
		return $this->db->query($query);
	}

	public function soal($where, $table)
	{

		$this->db->order_by("RAND ()");
		return $this->db->get_where($table, $where);
	}

	public function insert_jawaban()
	{

		$this->db->insert_batch('tb_jawaban', $entri);
		return true;
	}

	public function UpdateNilai($id_jawaban, $data)
	{
		$this->db->where('id_jawaban', $id_jawaban);
		$this->db->update('tb_jawaban', $data);
	}

	public function UpdateNilai2($id_peserta, $data)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->update('tb_peserta', $data);
	}

	public function get_peserta($id_mhs)
	{
		$this->db->select('*');
		$this->db->from('tb_peserta');
		$this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
		$this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
		$this->db->where('tb_mahasiswa.id_mahasiswa', $id_mhs);
		$query = $this->db->get();
		return $query->result();
	}

	public function importDosen($data = array())
	{
		$jumlah = count($data);

		if ($jumlah > 0) {
			$this->db->insert_batch('tb_dosen', $data);
		}
	}
}
