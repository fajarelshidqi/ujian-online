<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_peserta extends CI_Model
{
    public function get_joinpeserta($id)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
        $this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->where('tb_peserta.id_peserta', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_peserta($idkls, $idmhs)
    {
        $array = array('tb_kelas.id_kelas' => $idkls, 'tb_mahasiswa.id_mahasiswa' => $idmhs);
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
        $this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_mahasiswa.id_kelas', 'left');
        $this->db->where($array);
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_peserta2($idkls)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
        $this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_mahasiswa.id_kelas', 'left');
        $this->db->where('tb_kelas.id_kelas', $idkls);
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_peserta3($idmhs)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
        $this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_mahasiswa.id_kelas', 'left');
        $this->db->where('tb_mahasiswa.id_mahasiswa', $idmhs);
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }

    public function get_peserta4()
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
        $this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_mahasiswa.id_kelas', 'left');
        $this->db->order_by('id_peserta', 'DESC');
        $query = $this->db->get();
        return $query;
    }
}
