<?php 
defined('BASEPATH') OR exit('no direct script access allowed');

Class M_soal extends CI_Model {

	public function get_joinsoal($id)
	{
		$query = 'SELECT * FROM tb_soal_ujian join tb_matakuliah ON tb_soal_ujian.id_matakuliah=tb_matakuliah.id_matakuliah WHERE tb_soal_ujian.id_soal_ujian="'.$id.'"';
		return $this->db->query($query);
	}

}
?>