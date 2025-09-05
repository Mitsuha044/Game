<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Pemain_model');
        if (!$this->session->userdata('nama') || !$this->session->userdata('kelas')) {
            redirect('input');
        }
    }

    public function index()
    {

        if ($this->session->userdata('level_progress') < 2) {
            // Jika level 1 belum selesai, redirect kembali
            redirect('menu');
        }

        $this->load->view('Level2/index');
    }

    public function selesai()
    {

        $nama = $this->session->userdata('nama');
        $kelas = $this->session->userdata('kelas');
        $nilai = $this->input->post('nilai');
        $benar = $this->input->post('benar');
        $salah = $this->input->post('salah');

        // Simpan nilai level 2 ke database
        $this->Pemain_model->updateNilai($nama, $kelas, [
            'nilai_level2' => $nilai,
            'benar_level2' => $benar,
            'salah_level2' => $salah,
            'level_progress' => 2  // Update ke database juga!
        ]);

        $current_progress = $this->session->userdata('level_progress') ?? 1;
        $new_progress = max($current_progress, 3); // Level 3 unlock setelah Level2
        $this->session->set_userdata('level_progress', $new_progress);

        redirect('menu');
    }
}
