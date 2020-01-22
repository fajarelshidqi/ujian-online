<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_jadwal extends CI_Model
{
    public function jadwal()
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
        $this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
        $this->db->where('tb_peserta.id_peserta', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
