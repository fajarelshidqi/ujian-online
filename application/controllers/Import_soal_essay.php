<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_soal_essay extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();

		//cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') !='admin_login') {
			if ($this->session->userdata('status') !='dosen_login'){
				redirect('auth');
			}
		}
		
	}

	public function index()
	{
		$data['mk'] = $this->m_data->get_data('tb_matakuliah')->result();
		
		if ($this->session->userdata('status') =='admin_login'){
			$this->load->view('admin/v_import_soal_essay', $data);
		} else {
			$this->load->view('dosen/v_import_soal_essay', $data);
		}
	}
}