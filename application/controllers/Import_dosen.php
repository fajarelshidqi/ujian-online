<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//load Spout Library
// require_once APPPATH.'third_party/Spout/Autoloader/autoload.php';
set_include_path(APPPATH.'third_party/Spout/Autoloader/autoloader.php');

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
//use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Exception\IOException;

class Import_dosen extends CI_Controller {


	public function __construct() {
		parent::__construct();
		
		//cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') !='admin_login') {
			redirect(base_url().'auth?alert=belum_login');
		}
		
	}

	public function index()
	{
		
		$this->load->view('admin/v_import_dosen');
	}

	public function upload() 
	{   
          //ketika button submit diklik
        if ($this->input->post('submit', TRUE) == 'upload')
        {
            $config['upload_path']      = './format/'; //siapkan path untuk upload file
            $config['allowed_types']    = 'xlsx|xls'; //siapkan format file
            $config['file_name']        = 'doc'; //rename file yang diupload
       
            $this->load->library('upload', $config);
       
            if ($this->upload->do_upload('file'))
            {
                //fetch data upload
                $filePath   = $this->upload->data();
       
                //$reader = WriterEntityFactory::createXLSXWriter();
                $reader = ReaderFactory::create(Type::XLSX); //set Type file xlsx
                $reader->open('format/'.$filePath['file_name']); //open file xlsx
 
                //looping pembacaan row dalam sheet       
                foreach ($reader->getSheetIterator() as $sheet)
                {
                    $numRow = 1;
 
                    //siapkan variabel array kosong untuk menampung variabel array data
                    $data   = array();
 
                    //looping pembacaan row dalam sheet
                    foreach ($sheet->getRowIterator() as $row)
                    {
                        if ($numRow > 1)
                        {
                            $data[] = array(
                                'nik'            => $row->getCells(0),
                                'nama_dosen'     => $row->getCells(1),
                                'username'       => $row->getCells(2)
                            );
 
                            //tambahkan array $data ke $save
                            //array_push($save, $data);
                        }
                       
                        $numRow++;
                    }
                    
                    //simpan data ke database
                    $this->m_data->importDosen($save);
 
                    //tutup spout reader
                    $reader->close();
 
                    //hapus file yang sudah diupload
                    unlink('format/'.$file['file_name']);
 
                    redirect('admin/v_import_dosen/?=success');
                }
            }
            else
            {
                echo "Error :".$this->upload->display_errors(); //tampilkan pesan error jika file gagal diupload
            }
        }
        
        redirect(base_url('import_dosen'));
    }
	
}