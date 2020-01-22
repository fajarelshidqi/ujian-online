<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_cetak_kartu_peserta extends CI_Model
{
    public function cetak_kartu_peserta()
    {
        $this->db->select('id_mahasiswa, nama_mahasiswa, nim, tb_kelas.id_kelas, tb_kelas.nama_kelas');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_mahasiswa.id_kelas');
        $query = $this->db->get();
        return $query;
    }

    public function cetak_kartu_peserta2($idkls, $idmhs)
    {
        $array = array('tb_kelas.id_kelas' => $idkls, 'id_mahasiswa' => $idmhs);
        $this->db->select('id_mahasiswa, nama_mahasiswa, nim, tb_kelas.id_kelas, tb_kelas.nama_kelas ');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_mahasiswa.id_kelas');
        $this->db->where($array);
        $query = $this->db->get();
        return $query;
    }

    public function cetak_kartu_peserta3($idkls)
    {
        $this->db->select('id_mahasiswa, nama_mahasiswa, nim, tb_kelas.id_kelas, tb_kelas.nama_kelas');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_mahasiswa.id_kelas');
        $this->db->where('tb_kelas.id_kelas', $idkls);
        $query = $this->db->get();
        return $query;
    }

    public function cetak_kartu_peserta4($idmhs)
    {
        $this->db->select('id_mahasiswa, nama_mahasiswa, nim, tb_kelas.id_kelas, tb_kelas.nama_kelas');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_mahasiswa.id_kelas');
        $this->db->where('id_mahasiswa', $idmhs);
        $query = $this->db->get();
        return $query;
    }

    public function cetak_kartu_peserta5()
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_matakuliah.id_matakuliah=tb_peserta.id_matakuliah');
        $this->db->join('tb_mahasiswa', 'tb_mahasiswa.id_mahasiswa=tb_peserta.id_mahasiswa');
        $this->db->join('tb_jenis_ujian', 'tb_jenis_ujian.id_jenis_ujian=tb_peserta.id_jenis_ujian');
        $query = $this->db->get();
        return $query;
    }
}
