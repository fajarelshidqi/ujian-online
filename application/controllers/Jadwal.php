<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'mahasiswa_login') {
			redirect(base_url() . 'auth?alert=belum_login');
		}
	}

	public function index()
	{
		$data['peserta'] = $this->db->query('SELECT tb_peserta.id_peserta, tb_matakuliah.kode_matakuliah, tb_matakuliah.nama_matakuliah, tb_matakuliah.id_matakuliah, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.nim, tanggal_ujian, jam_ujian, durasi_pg, durasi_essay, tb_jenis_ujian.jenis_ujian, status_pg, status_essay  FROM tb_peserta, tb_matakuliah, tb_mahasiswa, tb_jenis_ujian WHERE tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian and tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah and tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa and tb_mahasiswa.nama_mahasiswa="' . $this->session->userdata('nama') . '" ')->result();
		$this->load->view('mahasiswa/v_jadwal', $data);
	}
}
