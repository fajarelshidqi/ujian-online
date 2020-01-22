<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_hasil extends CI_Model
{
    public function get_peserta2($id)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
        $this->db->where('tb_peserta.id_matakuliah', $id);
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_peserta3()
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function cetak($id)
    {
        $this->db->select('*');
        $this->db->from('tb_peserta');
        $this->db->join('tb_matakuliah', 'tb_peserta.id_matakuliah=tb_matakuliah.id_matakuliah');
        $this->db->join('tb_jenis_ujian', 'tb_peserta.id_jenis_ujian=tb_jenis_ujian.id_jenis_ujian');
        $this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
        $this->db->where('tb_peserta.id_peserta', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_essay()
    {
        $this->db->select('tb_jawaban_essay.*, tb_matakuliah.nama_matakuliah, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.nim, jawaban_essay, skor_essay, tb_essay.soal_essay');
        $this->db->from('tb_jawaban_essay');
        $this->db->join('tb_essay', 'tb_essay.id_soal_essay = tb_jawaban_essay.id_soal_essay');
        $this->db->join('tb_peserta', 'tb_peserta.id_peserta = tb_jawaban_essay.id_peserta');
        $this->db->join('tb_matakuliah', 'tb_matakuliah.id_matakuliah = tb_essay.id_matakuliah', 'left');
        $this->db->join('tb_mahasiswa', 'tb_mahasiswa.id_mahasiswa = tb_peserta.id_mahasiswa', 'left');
        $this->db->order_by('id_jawaban_essay', 'DESC');
        $query = $this->db->get();
        // echo "<pre>";print_r($query);die;
        return $query;
    }

    public function get_essay_id($id)
    {
        $this->db->select('tb_jawaban_essay.*, tb_matakuliah.nama_matakuliah, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.nim, jawaban_essay, skor_essay, tb_essay.soal_essay');
        $this->db->from('tb_jawaban_essay');
        $this->db->join('tb_essay', 'tb_essay.id_soal_essay = tb_jawaban_essay.id_soal_essay');
        $this->db->join('tb_peserta', 'tb_peserta.id_peserta = tb_jawaban_essay.id_peserta');
        $this->db->join('tb_matakuliah', 'tb_matakuliah.id_matakuliah = tb_essay.id_matakuliah', 'left');
        $this->db->join('tb_mahasiswa', 'tb_mahasiswa.id_mahasiswa = tb_peserta.id_mahasiswa', 'left');
        $this->db->where('tb_matakuliah.id_matakuliah', $id);
        $this->db->order_by('id_jawaban_essay', 'DESC');
        $query = $this->db->get();
        // echo "<pre>";print_r($query);die;
        return $query;
    }

    public function get_periksa($id)
    {
        $this->db->select('tb_jawaban_essay.*, tb_matakuliah.nama_matakuliah, tb_mahasiswa.nama_mahasiswa, tb_mahasiswa.nim, jawaban_essay, skor_essay, tb_essay.soal_essay');
        $this->db->from('tb_jawaban_essay');
        $this->db->join('tb_essay', 'tb_essay.id_soal_essay = tb_jawaban_essay.id_soal_essay');
        $this->db->join('tb_peserta', 'tb_peserta.id_peserta = tb_jawaban_essay.id_peserta');
        // $this->db->join('tb_dosen', 'tb_dosen.id_dosen = tb_jawaban_essay.id_dosen');
        $this->db->join('tb_matakuliah', 'tb_matakuliah.id_matakuliah = tb_essay.id_matakuliah', 'left');
        $this->db->join('tb_mahasiswa', 'tb_mahasiswa.id_mahasiswa = tb_peserta.id_mahasiswa', 'left');
        $this->db->where('tb_jawaban_essay.id_jawaban_essay', $id);
        $query = $this->db->get();
        return $query;
    }

    public function hitungNilaiEssay($id_peserta)
    {
        $this->db->select('tb_jawaban_essay.*', 'tb_jawaban_essay.skor_essay');
        $this->db->from('tb_jawaban_essay');
        $this->db->where('tb_jawaban_essay.id_peserta', $id_peserta);
        $query = $this->db->get();
        // echo "<pre>";print_r($query);die;
        return $query;
    }
}
// SELECT tb_jawaban_essay.*, tb_matakuliah.nama_matakuliah, tb_matakuliah.id_matakuliah, mhs.nama_mahasiswa, jawaban_essay, skor_essay, tb_essay.soal_essay FROM tb_jawaban_essay JOIN tb_essay on tb_essay.id_soal_essay = tb_jawaban_essay.id_soal_essay LEFT JOIN tb_matakuliah on tb_matakuliah.id_matakuliah = tb_essay.id_matakuliah LEFT JOIN tb_mahasiswa as mhs on mhs.id_mahasiswa = tb_jawaban_essay.id_peserta where tb_jawaban_essay.id_jawaban_essay = 3

