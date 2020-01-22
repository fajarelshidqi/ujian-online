<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_essay extends CI_Model
{

	// public function get_joinessay($id)
	// {
	// 	$query = 'SELECT * FROM tb_essay join tb_matakuliah ON tb_essay.id_matakuliah=tb_matakuliah.id_matakuliah WHERE tb_essay.id_soal_essay="' . $id . '"';
	// 	return $this->db->query($query);
	// }

	public function get_joinessay($id)
	{
		$this->db->select('*');
		$this->db->from('tb_essay');
		$this->db->join('tb_matakuliah', 'tb_essay.id_matakuliah=tb_matakuliah.id_matakuliah');
		$this->db->where('id_soal_essay', $id);
		$query = $this->db->get();
		return $query;
	}
}
