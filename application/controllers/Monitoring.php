<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'admin_login') {
			if ($this->session->userdata('status') != 'pengawas_login') {
				redirect('auth');
			}			
		}
		$this->load->model('m_monitoring');
	}

	public function index()
	{
		if (isset($_GET['id'])) {
			$id = $this->input->get('id');
			$data['pengawas'] = $this->m_monitoring->get_data($id)->result();
			$this->load->view('admin/v_monitoring', $data);
		} else {
			$data['kelas']=$this->m_data->get_data('tb_matakuliah')->result();
			$this->load->view('admin/v_monitoring_filter', $data);
		}
	}
}