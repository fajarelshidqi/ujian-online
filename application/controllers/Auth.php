<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Username harus di isi!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password harus di isi!']);

		$username = htmlspecialchars($this->input->post('username', TRUE));
		$password = htmlspecialchars($this->input->post('password', TRUE));

		if ($this->form_validation->run() != false) {

			$where 		= array('username' => $username);
			$admin 		= $this->db->get_where('tb_admin', ['username' => $username])->row_array();
			$dosen 		= $this->db->get_where('tb_dosen', ['username' => $username])->row_array();
			$mhs 		= $this->db->get_where('tb_mahasiswa', ['username' => $username])->row_array();
			$pengawas 	= $this->db->get_where('tb_pengawas', ['username' => $username])->row_array();

			if (password_verify($password, $admin['password'])) {
				$data = $this->m_data->edit_data($where, 'tb_admin')->row();
				$data_session = array(
					'id'		=> $data->id,
					'nama'		=> $data->nama_user,
					'username'	=> $data->username,
					'status'	=> 'admin_login'
				);
				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-message text-center"><b>Login Berhasil !,<br></b> Halaman ini akan dialihkan ke Halaman Home</div>');
				redirect(base_url('home'));
			} else if (password_verify($password, $dosen['password'])) {
				$data = $this->m_data->edit_data($where, 'tb_dosen')->row();
				$data_session = array(
					'id'		=> $data->id,
					'nama'		=> $data->nama_dosen,
					'username'	=> $data->username,
					'status'	=> 'dosen_login'
				);
				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-message text-center"><b>Login Berhasil !,<br></b> Halaman ini akan dialihkan ke Halaman Home</div>');
				redirect(base_url('home'));
			} else if (password_verify($password, $mhs['password'])) {
				$data = $this->m_data->edit_data($where, 'tb_mahasiswa')->row();

				$data_session = array(
					'id'		=> $data->id_mahasiswa,
					'nim'		=> $data->nim,
					'nama'		=> $data->nama_mahasiswa,
					'username'	=> $data->username,
					'status'	=> 'mahasiswa_login'
				);
				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-message text-center"><b>Login Berhasil !,<br></b> Halaman ini akan dialihkan ke Halaman Home</div>');
				redirect(base_url('ruang_mahasiswa'));
			} else if (password_verify($password, $pengawas['password'])) {
				$data = $this->m_data->edit_data($where, 'tb_pengawas')->row();

				$data_session = array(
					'id'		=> $data->id,
					'nama'		=> $data->nama,
					'username'	=> $data->username,
					'status'	=> 'pengawas_login'
				);
				$this->session->set_userdata($data_session);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-message text-center"><b>Login Berhasil !<br></b> Halaman ini akan dialihkan ke Halaman Home</div>');
				redirect(base_url('home'));
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message text-center"><b>Login Gagal !,<br></b> Maaf, Username dan Password tidak ditemukan</div>');
				redirect(base_url('auth'));
			}
		} else {
			$this->load->view('v_login');
		}
	}
}
