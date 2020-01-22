<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('status') != 'admin_login') {
			redirect(base_url('auth'));
		}
	}

	public function index()
	{
		$data['mahasiswa'] = $this->db->query('SELECT * FROM tb_mahasiswa join tb_kelas ON tb_mahasiswa.id_kelas=tb_kelas.id_kelas')->result();
		$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
		$this->load->view('admin/v_mahasiswa', $data);
	}

	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama harus di isi!']);
		$this->form_validation->set_rules('nim', 'Nim', 'required|trim|is_unique[tb_mahasiswa.nim]', ['required' => 'NIM harus di isi!']);
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', ['required' => 'Kelas harus di pilih!']);
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_mahasiswa.username]', ['required' => 'Username harus di isi!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password harus di isi!']);

		$nama 		= htmlspecialchars($this->input->post('nama', TRUE));
		$nim		= htmlspecialchars($this->input->post('nim', TRUE));
		$kelas 		= htmlspecialchars($this->input->post('kelas', TRUE));
		$username	= htmlspecialchars($this->input->post('username', TRUE));
		$password	= htmlspecialchars($this->input->post('password', TRUE));

		if ($this->form_validation->run() != false) {
			$data = array(
				'nama_mahasiswa' => $nama,
				'nim' => $nim,
				'id_kelas' => $kelas,
				'username' => $username,
				'password' => password_hash($password, PASSWORD_BCRYPT)
			);

			$this->m_data->insert_data($data, 'tb_mahasiswa');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !,<br></b> Anda telah berhasil menambahkan data Mahasiswa</div>');
			redirect(base_url('mahasiswa'));
		} else {
			$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
			$this->load->view('admin/v_mahasiswa_tambah', $data);
		}
	}

	public function edit($id)
	{
		$data['mahasiswa'] = $this->m_data->get_joinmhs($id)->result();
		$data['kelas'] = $this->m_data->get_data('tb_kelas')->result();
		$this->load->view('admin/v_mahasiswa_edit', $data);
	}
	
	public function update()
	{
		$id 		= $this->input->post('id');
		$nama 		= $this->input->post('nama');
		$nim		= $this->input->post('nim');
		$kelas		= $this->input->post('kelas');
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');

		$where = array('id_mahasiswa' => $id);

		if ($password == "") {
			$data = array(
				'nama_mahasiswa' => $nama,
				'nim' => $nim,
				'id_kelas' => $kelas,
				'username' => $username
			);
			$this->m_data->update_data($where, $data, 'tb_mahasiswa');
		} else { 
			$data = array(
				'nama_mahasiswa' => $nama,
				'nim' => $nim,
				'id_kelas' => $kelas,
				'username' => $username,
				'password' => password_hash($password, PASSWORD_BCRYPT)
			);
			$this->m_data->update_data($where, $data, 'tb_mahasiswa');
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-message"><i class="icon fa fa-check"></i><b>Selamat !,<br></b> Anda telah berhasil mengupdate data Mahasiswa</div>');
		redirect(base_url('mahasiswa'));
	}

	public function hapus($id)
	{
		$where = array(
			'id_mahasiswa' => $id
		);
		$this->m_data->delete_data($where, 'tb_mahasiswa');
		$this->session->set_flashdata('message', '<div class="alert alert-danger alert-message"><i class="icon fa fa-check"></i><b>Selamat !,<br></b> Anda telah berhasil menghapus data Mahasiswa</div>');
		redirect(base_url('mahasiswa'));
	}

	public function import()
	{
		$this->load->library('PHPExcel');
		
		$fileName 	= $this->input->post('file', TRUE);
		$kelas 		= $this->input->post('kelas', TRUE);

		$config['upload_path'] 		= './assets/excel/';
		$config['file_name'] 		= $fileName;
		$config['allowed_types'] 	= 'xls|xlsx|csv|ods|ots';
		$config['max_size'] 		= 50000;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {

			$error = array('error' => $this->upload->display_errors());
			echo "<pre>";print_r($error);die;	
			redirect(base_url('mahasiswa'));
		} else {

			$media 			= $this->upload->data();
			$inputFileName 	= 'assets/excel/' . $media['file_name'];

			try {

				$inputFileType 	= PHPExcel_IOFactory::identify($inputFileName);
				$objReader 		= PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel	= $objReader->load($inputFileName);
			} catch (Eception $e) {

				die('Erorr loading file"' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
			}

			foreach ($objPHPExcel->getWorksheetIterator() as $sheet) {
				$highestRow		= $sheet->getHighestRow();
				$highestColumn	= $sheet->getHighestColumn();

				for ($row = 2; $row <= $highestRow; $row++) {

					$nama 			= $sheet->getCellByColumnAndRow(0, $row)->getValue();
					$nim 			= $sheet->getCellByColumnAndRow(1, $row)->getValue();
					$username 		= $sheet->getCellByColumnAndRow(2, $row)->getValue();
					$password 		= $sheet->getCellByColumnAndRow(3, $row)->getValue();

					$data[] = array(

						'nama_mahasiswa'=> $nama,
						'nim'			=> $nim,
						'username'		=> $username,
						'password'		=> password_hash($password, PASSWORD_BCRYPT),
						'id_kelas'		=> $kelas
					);
				}
			}

			$this->m_data->insertimport($data);
			unlink('assets/excel/' . $media['full_path']);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-message alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>
                Import Data Peserta telah berhasil.
              </div>');
			redirect(base_url('mahasiswa'));
		}
	}
}
