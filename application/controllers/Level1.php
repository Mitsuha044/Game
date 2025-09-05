<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level1 extends CI_Controller
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

        $this->load->view('Level1/index');
    }

    public function selesai()
    {

        $nama = $this->session->userdata('nama');
        $kelas = $this->session->userdata('kelas');
        $nilai = $this->input->post('nilai');
        $benar = $this->input->post('benar');
        $salah = $this->input->post('salah');

        $this->Pemain_model->updateNilai($nama, $kelas, [
            'nilai_level1' => $nilai,
            'benar_level1' => $benar,
            'salah_level1' => $salah,
            'level_progress' => 1  // Update ke database juga!
        ]);

        // Update level progress jika lebih tinggi
        $current_progress = $this->session->userdata('level_progress') ?? 1;
        $new_progress = max($current_progress, 2); // Level 2 unlock setelah Level1
        $this->session->set_userdata('level_progress', $new_progress);

        redirect('menu');
    }
}
