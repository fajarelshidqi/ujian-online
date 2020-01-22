<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('status') !='admin_login') {
			redirect(base_url('auth'));
		}
	}

	public function index()
	{
		$data['dosen'] = $this->m_data->get_data('tb_dosen')->result();
		$this->load->view('admin/v_dosen', $data);
	}

	public function dosen_aksi()
	{
		$nik		= $this->input->post('nik');
		$nama 		= $this->input->post('nama');		
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');

		$data = array(
			'id_dosen'=>$nik,
			'nama_dosen'=>$nama,
			'username'=>$username,
			'password'=>password_hash($password, PASSWORD_BCRYPT)
		);

		$this->m_data->insert_data($data, 'tb_dosen');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !,<br></b> Anda telah berhasil menambahkan data Dosen</div>');
		redirect(base_url('dosen'));
	}

	public function hapus($id) 
	{
		$where = array(
					'id_dosen'=>$id
				);

		$this->m_data->delete_data($where,'tb_dosen');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-check"></i><b>Selamat !,<br></b> Anda telah berhasil menghapus data Dosen</div>');
		redirect(base_url('dosen'));
	}

	public function edit($id) 
	{
		$where	= array('id_dosen'=>$id);
		$data['dosen']=$this->m_data->edit_data($where,'tb_dosen')->result();
		$this->load->view('admin/v_dosen_edit',$data);
	}
	
	public function update()
	{
		$id 		= $this->input->post('nik');
		$nama 		= $this->input->post('nama');
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');

		$where = array('id_dosen'=>$id);		
		$data = array(
						'nama_dosen'=>$nama,
						'username'=> $username,
						'password'=>password_hash($password, PASSWORD_BCRYPT)
					);
		$this->m_data->update_data($where,$data,'tb_dosen');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !,<br></b> Anda telah berhasil mengupdate data Dosen</div>');
		redirect(base_url('dosen'));
	}
}
