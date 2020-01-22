<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_soal extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		if ($this->session->userdata('status') !='admin_login') {
			if ($this->session->userdata('status') !='dosen_login'){
				redirect('auth');
			}
		}
		$this->load->model('m_soal');
	}

	public function index()
	{	
		if (isset($_GET['id'])) {
			$id = $this->input->get('id');
			$data['daftar_soal'] = $this->db->query('SELECT * from tb_soal_ujian join tb_matakuliah where tb_soal_ujian.id_matakuliah=tb_matakuliah.id_matakuliah and tb_matakuliah.id_matakuliah="'.$id.'" order by id_soal_ujian desc')->result();
			$data['kelas']=$this->m_data->get_data('tb_matakuliah')->result();
		} else {
			$data['daftar_soal'] = $this->db->query('SELECT * FROM tb_soal_ujian join tb_matakuliah ON tb_soal_ujian.id_matakuliah=tb_matakuliah.id_matakuliah order by id_soal_ujian desc')->result();
			$data['kelas']=$this->m_data->get_data('tb_matakuliah')->result();
		}					
		$this->load->view('admin/v_daftar_soal', $data);
	}

	public function edit($id)
	{
		$data['soal']=$this->m_soal->get_joinsoal($id)->result();
		$data['kelas']=$this->m_data->get_data('tb_matakuliah')->result();		
		$this->load->view('admin/v_daftar_soal_edit', $data);		
	}

	public function update()
	{
		$id 				= $this->input->post('id');
		$nama_matakuliah 	= $this->input->post('nama_matakuliah');
		$soal				= $this->input->post('soal');
		$a 					= $this->input->post('a');
		$b					= $this->input->post('b');
		$c					= $this->input->post('c');
		$d					= $this->input->post('d');
		$e					= $this->input->post('e');
		$kunci				= $this->input->post('kunci');

		$where = array('id_soal_ujian'=>$id);
		$data = array(
			'id_matakuliah'=>$nama_matakuliah,
			'pertanyaan'=>$soal,
			'a'=>$a,
			'b'=>$b,
			'c'=>$c,
			'd'=>$d,
			'e'=>$e,
			'kunci_jawaban'=>$kunci
		);
		$this->m_data->update_data($where, $data, 'tb_soal_ujian');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Selamat, Soal telah berhasil diupdate!</h4></div>');
		redirect(base_url('daftar_soal'));
	}	

	public function hapus($id) 
	{
		$where = array(
					'id_soal_ujian'=>$id
				);
		$this->m_data->delete_data($where,'tb_soal_ujian');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Perhatian, Data telah berhasil dihapus!</h4></div>');
		redirect(base_url('daftar_soal'));
	}
}