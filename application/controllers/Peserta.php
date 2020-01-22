<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'admin_login') {
			redirect(base_url() . 'auth?alert=belum_login');
		}
	}

	public function index()
	{
		$data['mk'] = $this->m_data->get_data('tb_matakuliah')->result();
		$data['mhs'] = $this->m_data->get_data('tb_mahasiswa')->result();
		$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
		$data['jenis_ujian'] = $this->m_data->get_data('tb_jenis_ujian')->result();
		$this->load->view('admin/v_peserta', $data);
	}

	public function insert_permhs()
	{
		$peserta 		= $this->input->post('peserta');
		$mk 			= $this->input->post('mk');
		$tanggal		= $this->input->post('tanggal');
		$jam			= $this->input->post('jam');
		$durasi_pg		= $this->input->post('durasi_pg');
		$durasi_essay	= $this->input->post('durasi_essay');
		$jenis			= $this->input->post('jenis_ujian');
		$timer_pg 		= $durasi_pg*60;
		$timer_essay	= $durasi_essay*60;

		if ($peserta == '' || $mk == '' || $tanggal == '' || $jam == '' || $durasi_pg == '' || $durasi_essay == '' || $jenis == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Semua kolom harus diisi semua !</h4></div>');
			redirect(base_url('peserta'));
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
			$this->m_data->insert_data($data, 'tb_peserta');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Data berhasil ditambahkan.</h4></div>');
			redirect(base_url('peserta'));
		}
	}
}
