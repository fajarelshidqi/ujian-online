<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang_mahasiswa extends CI_Controller {


	public function __construct() {
		parent::__construct();

		//cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') !='mahasiswa_login') {
			redirect(base_url().'auth?alert=belum_login');
		}
		
	}

	public function index()
	{
		$this->load->view('mahasiswa/v_home');
	}


}

