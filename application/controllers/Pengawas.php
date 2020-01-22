<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengawas extends CI_Controller
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
		$data['pengawas'] = $this->m_data->get_data('tb_pengawas')->result();
		$this->load->view('admin/v_pengawas', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama harus di isi!']);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_pengawas.username]', ['required' => 'Username harus di isi!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password harus di isi!']);

		$nama 		= htmlspecialchars($this->input->post('nama', TRUE));
		$username	= htmlspecialchars($this->input->post('username', TRUE));
		$password	= htmlspecialchars($this->input->post('password', TRUE));

		if ($this->form_validation->run() != false) {
			$data = array(
				'nama' => $nama,
				'username' => $username,
				'password' => password_hash($password, PASSWORD_BCRYPT)
			);
			$this->m_data->insert_data($data, 'tb_pengawas');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !<br></b> Anda telah berhasil menambahkan data Pengawas</div>');
			redirect(base_url('pengawas'));
		} else {
			$this->load->view('admin/v_pengawas_tambah');
		}
	}

	public function edit($id)
	{
		$where = array(
			'id'=>$id
		);
		$data['pengawas'] = $this->m_data->edit_data($where,'tb_pengawas')->result();
		$this->load->view('admin/v_pengawas_edit', $data);
	}

	public function update()
	{
		$id 		= $this->input->post('id');
		$nama 		= htmlspecialchars($this->input->post('nama', TRUE));
		$username	= htmlspecialchars($this->input->post('username', TRUE));
		$password	= htmlspecialchars($this->input->post('password', TRUE));

		$where = array('id' => $id);

		if ($password == "") {
			$data = array(
				'nama' => $nama,
				'username' => $username
			);
			$this->m_data->update_data($where, $data, 'tb_pengawas');
		} else { 
			$data = array(
				'nama' => $nama,
				'username' => $username,
				'password' => password_hash($password, PASSWORD_BCRYPT)
			);
			$this->m_data->update_data($where, $data, 'tb_pengawas');
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !<br></b> Anda telah berhasil mengupdate data Pengawas</div>');
		redirect(base_url('pengawas'));
	}

	public function hapus($id)
	{
		$where = array(
			'id' => $id
		);
		$this->m_data->delete_data($where, 'tb_pengawas');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-check"></i><b>Selamat !,<br></b> Anda telah berhasil menghapus data pengawas</div>');
		redirect(base_url('pengawas'));
	}
}
