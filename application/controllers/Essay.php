<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Essay extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		if ($this->session->userdata('status') !='admin_login') {
			if ($this->session->userdata('status') !='dosen_login'){
				redirect('auth');
			}
		}		
	}

	public function index()
	{
		$data['soal']=$this->m_data->get_data('tb_matakuliah')->result();		
		$this->load->view('admin/v_soal_essay',$data);			
	}

	public function insert()
	{
		$nama_matakuliah 	= $this->input->post('nama_matakuliah');
		$essay 				= $this->input->post('essay');

		$data = array(
			'id_matakuliah' => $nama_matakuliah,
			'soal_essay'	=> $essay
		);
		if ($nama_matakuliah == '' || $essay == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Maaf, Input Soal Gagal!</h4> Soal Essay tidak boleh di kosongkan</div>');
			redirect(base_url('essay'));
		} else {
			$this->m_data->insert_data($data, 'tb_essay');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Selamat, Soal berhasil dibuat!</h4>untuk melihat soal tersebut bisa anda lihat di menu <b>Daftar Soal Essay</b>.</div>');
			redirect(base_url('essay'));
		}
	}
}