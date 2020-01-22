<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_mhs extends CI_Controller {


	public function __construct() {
		parent::__construct();
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

		//cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') !='admin_login') {
			redirect(base_url().'auth?alert=belum_login');
		}
		
	}

	public function index()
	{
		$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
		$this->load->view('admin/v_import_mhs', $data);
	}

	public function import_mahasiswa_aksi() 
	{
		$kelas 		= $this->input->post('kelas'); 
		$fileName 	= $this->input->post('file', TRUE);

		$config['upload_path'] 		= './format/';
		$config['file_name'] 		= $fileName;
		$config['allowed_types'] 	= 'xls|xlsx|csv|ods|ots';
		$config['max_size'] 		= 10000;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {

			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('msg','Ada Kesalahan dalam Import Data');
			redirect(base_url('admin/import_mhs'));

		} else {

			$media 			= $this->upload->data();
			$inputFileName 	= 'format/'.$media['file_name'];

			try {

				$inputFileType 	= IOFactory::identify($inputFileName);
				$objReader 		= IOFactory::createReader($inputFileType);
				$objPHPExcel	= $objReader->load($inputFileName);

			} catch(Eception $e) {

				die('Erorr loading file"'.pathinfo($inputFileName, PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			$sheet 			= $objPHPExcel->getSheet(0);
			$highestRow		= $sheet->getHighestRow();
			$highestColumn	= $sheet->getHighestColumn();

			for ($row=2; $row <= $highestRow; $row++) { 
				
				$rowData	= $sheet->rangeToArray(
					'A'.$row.':'.$highestColumn.$row,
					NULL,
					TRUE,
					FALSE
				);

				$data 		= array(
					''		=> $rowData[0][0],
					'Tahun'		=> $rowData[0][1],
					'Penulis'	=> $rowData[0][2],
					'Status'	=> $rowData[0][3]
				);

				$this->db->insert('buku',$data);
				unlink($media['full_path']);
			}

			$this->session->set_flashdata('msg','Import Data Berhasil ...!!');
			redirect(base_url('import_mhs'));
	}


}
}