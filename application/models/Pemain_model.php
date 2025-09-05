<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemain_model extends CI_Model
{
    // Simpan data jika belum ada
    public function simpan($data)
    {
        // Cek apakah pemain sudah ada
        $existing = $this->cariPemain($data['nama'], $data['kelas']);
        if (!$existing) {
            return $this->db->insert('hasill_quiz', $data);
        }
        return false; // Jangan insert ulang jika sudah ada
    }

    // Cari pemain berdasarkan nama dan kelas
    public function cariPemain($nama, $kelas)
    {
        return $this->db->get_where('hasill_quiz', [
            'nama' => $nama,
            'kelas' => $kelas
        ])->row();
    }

    // Update nilai dan hasil kuis
    public function updateNilai($nama, $kelas, $data)
    {
        $this->db->where('nama', $nama);
        $this->db->where('kelas', $kelas);
        return $this->db->update('hasill_quiz', $data);
    }

    // Ambil hasil kuis lengkap berdasarkan nama dan kelas
    public function getHasil($nama, $kelas)
    {
        return $this->db->get_where('hasill_quiz', [
            'nama' => $nama,
            'kelas' => $kelas
        ])->row();
    }
}
