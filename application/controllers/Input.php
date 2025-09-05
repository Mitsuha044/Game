<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
        $this->load->model('Pemain_model');
    }

    public function index()
    {
        // Cek: jika sudah login, langsung ke play

        // Jika ada POST (submit form input nama dan kelas)
        if ($this->input->post()) {
            $nama  = $this->input->post('nama');
            $kelas = $this->input->post('kelas');

            if (!$nama || !$kelas) {
                $this->session->set_flashdata('error', 'Nama dan Kelas wajib diisi!');
                redirect('input');
            }

            // Cari pemain di DB
            $pemain = $this->Pemain_model->cariPemain($nama, $kelas);

            if (!$pemain) {
                // Belum ada → simpan baru
                $data = [
                    'nama' => $nama,
                    'kelas' => $kelas,
                    'nilai_level1' => null,
                    'nilai_level2' => null,
                    'nilai_level3' => null,
                    'level_progress' => 1
                ];
                $this->Pemain_model->simpan($data);
                $progress = 1;
            } else {
                $progress = $pemain->level_progress ?? 1;
            }

            // Set session data
            $this->session->set_userdata('nama', $nama);
            $this->session->set_userdata('kelas', $kelas);
            $this->session->set_userdata('level_progress', $progress);

            // Redirect ke halaman Play
            redirect('play');
        }

        // Tampilkan form input
        $this->load->view('Input/index');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('input');
    }
}
