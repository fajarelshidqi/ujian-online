<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_monitoring extends CI_Model
{
    public function get_data($id)
    {
        $this->db->select('tb_matakuliah.nama_matakuliah, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.nim, tb_peserta.status_ujian_pg, tb_peserta.status_ujian_essay');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
        $this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
        $this->db->where('tb_peserta.id_matakuliah', $id);
        $this->db->order_by('id_peserta');
        $query = $this->db->get();
        return $query;
    }
}