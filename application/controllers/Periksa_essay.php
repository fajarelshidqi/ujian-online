<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periksa_essay extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'admin_login') {
			if ($this->session->userdata('status') != 'dosen_login') {
				redirect('auth');
			}
		}
		$this->load->model('m_hasil');
	}

	public function index()
	{
		if (isset($_GET['id'])) {
			$id = $this->input->get('id');
			$data['periksa'] = $this->m_hasil->get_essay_id($id)->result();
			$data['kelas'] = $this->m_data->get_data('tb_matakuliah')->result();
		} else {
			$data['periksa'] = $this->m_hasil->get_essay()->result();
			$data['kelas'] = $this->m_data->get_data('tb_matakuliah')->result();
		}
		$this->load->view('admin/v_periksa_soal_essay', $data);
	}

	public function koreksi($id)
	{
		$data['essay'] = $this->m_hasil->get_periksa($id)->result();
		$this->load->view('admin/v_periksa_soal_essay_edit', $data);
	}

	public function update()
	{
		$id 	= $this->input->post('id', true);
		$skor 	= $this->input->post('skor', true);
		$dosen 	= $_SESSION['nama'];

		$where	= array('id_jawaban_essay' => $id);
		$data = array('skor_essay'	=> $skor, 'nama_dosen' => $dosen);
		$this->m_data->update_data($where, $data, 'tb_jawaban_essay');

		$bobot = 0;
		$id_peserta = $this->input->post('id_peserta');
		$nilai = $this->m_hasil->hitungNilaiEssay($id_peserta)->result_array();

		$where = $id_peserta;
		foreach ($nilai as $n) {
			$bobot += $n['skor_essay'];
		}
		$data2 = array('bobot_essay' => $bobot);
		$this->m_data->UpdateNilai2($where, $data2, 'tb_peserta');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Selamat, Anda telah berhasil memberikan nilai!</h4></div>');
		redirect(base_url('periksa_essay'));
	}
}
