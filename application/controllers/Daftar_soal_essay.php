<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_soal_essay extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'admin_login') {
			if ($this->session->userdata('status') != 'dosen_login') {
				redirect('auth');
			}
		}
		$this->load->model('m_essay');
	}

	public function index()
	{
		if (isset($_GET['id'])) {
			$id = $this->input->get('id');
			$data['daftar_soal_essay'] = $this->db->query('SELECT * from tb_essay join tb_matakuliah where tb_essay.id_matakuliah=tb_matakuliah.id_matakuliah and tb_matakuliah.id_matakuliah="' . $id . '" order by id_soal_essay desc')->result();
			$data['kelas'] = $this->m_data->get_data('tb_matakuliah')->result();
		} else {
			$data['daftar_soal_essay'] = $this->db->query('SELECT * FROM tb_essay join tb_matakuliah ON tb_essay.id_matakuliah=tb_matakuliah.id_matakuliah order by id_soal_essay desc')->result();
			$data['kelas'] = $this->m_data->get_data('tb_matakuliah')->result();
		}
		$this->load->view('admin/v_daftar_soal_essay', $data);
	}

	public function edit($id)
	{
		$data['soal'] = $this->m_essay->get_joinessay($id)->result();
		$data['kelas'] = $this->m_data->get_data('tb_matakuliah')->result();
		$this->load->view('admin/v_daftar_soal_essay_edit', $data);		
	}

	public function update()
	{
		$id 				= $this->input->post('id');
		$nama_matakuliah 	= $this->input->post('nama_matakuliah');
		$essay 				= $this->input->post('essay');

		$where	= array('id_soal_essay' => $id);
		$data = array(
			'id_matakuliah' => $nama_matakuliah,
			'soal_essay'	=> $essay
		);
		$this->m_data->update_data($where, $data, 'tb_essay');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Update Data Sukses</h4> Anda berhasil mengupdate data soal essay.</div>');
		redirect(base_url('daftar_soal_essay'));
	}

	public function hapus($id)
	{
		$where = array(
			'id_soal_essay' => $id
		);
		$this->m_data->delete_data($where, 'tb_essay');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Hapus Data Sukses</h4> Anda berhasil menghapus data soal essay.</div>');
		redirect(base_url('daftar_soal_essay'));
	}
}
