<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {


	public function __construct() {
		parent::__construct();

		if ($this->session->userdata('status') !='admin_login') {
			redirect(base_url('auth'));
		}
		
	}

	public function index()
	{
		$data['mk'] = $this->m_data->get_data('tb_matakuliah')->result();
		$this->load->view('admin/v_mk', $data);
	}

	public function mk_aksi()
	{
		$kode 		= $this->input->post('kode');
		$nama		= $this->input->post('nama');

		$data = array(
			'kode_matakuliah'=>$kode,
			'nama_matakuliah'=>$nama
		);
		$this->m_data->insert_data($data, 'tb_matakuliah');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !,<br></b> Anda telah berhasil menambahkan data Mata Kuliah</div>');
		redirect(base_url('matakuliah'));
	}

	public function hapus($id) 
	{
		$where = array(
					'id_matakuliah'=>$id
				);
		$this->m_data->delete_data($where,'tb_matakuliah');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-check"></i><b>Selamat !,<br></b> Anda telah berhasil menghapus data Mata Kuliah</div>');
		redirect(base_url('matakuliah'));
	}

	public function edit($id) 
	{
		$where	= array('id_matakuliah'=>$id);
		$data['mk']=$this->m_data->edit_data($where,'tb_matakuliah')->result();
		$this->load->view('admin/v_mk_edit',$data);
	}

	public function update()
	{
		$id 		= $this->input->post('id');
		$kode 		= $this->input->post('kode');
		$nama		= $this->input->post('nama');

		$where = array('id_matakuliah'=>$id);
		$data = array(
					'kode_matakuliah'=>$kode,
					'nama_matakuliah'=>$nama
					);
		$this->m_data->update_data($where,$data,'tb_matakuliah');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !,<br></b> Anda telah berhasil mengupdate data Mata Kuliah</div>');
		redirect(base_url('matakuliah'));
	}
}