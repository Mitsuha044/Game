<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level3 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Pemain_model');

        // Pastikan pemain sudah input nama & kelas
        if (!$this->session->userdata('nama') || !$this->session->userdata('kelas')) {
            redirect('input');
        }
    }

    public function index()
    {
        // Cek apakah Level 2 sudah selesai (baru bisa buka Level 3)
        if ($this->session->userdata('level_progress') < 3) {
            redirect('menu');
        }

        $this->load->view('Level3/index');
    }

    public function selesai()
    {
        // Validasi session
        if (!$this->session->userdata('nama') || !$this->session->userdata('kelas')) {
            redirect('input');
        }

        $nama  = $this->session->userdata('nama');
        $kelas = $this->session->userdata('kelas');
        $nilai = $this->input->post('nilai');
        $benar = $this->input->post('benar');
        $salah = $this->input->post('salah');

        // Update nilai Level 3 ke database
        $this->Pemain_model->updateNilai($nama, $kelas, [
            'nilai_level3'   => $nilai,
            'benar_level3'   => $benar,
            'salah_level3'   => $salah,
            'level_progress' => 3 // langsung update ke 4 agar Level 4 kebuka
        ]);

        $current_progress = $this->session->userdata('level_progress') ?? 1;
        $new_progress = max($current_progress, 4); // Level 4 unlock setelah Level3
        $this->session->set_userdata('level_progress', $new_progress);

        // Kembali ke menu
        redirect('menu');
    }
}
