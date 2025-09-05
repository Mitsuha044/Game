<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level4 extends CI_Controller
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

        // Cek apakah Level 3 sudah selesai
        if ($this->session->userdata('level_progress') < 4) {
            redirect('menu'); // belum unlock level 3
        }

        $this->load->view('Level4/index');
    }

    public function selesai()
    {
        if (!$this->session->userdata('nama') || !$this->session->userdata('kelas')) {
            redirect('Input');
        }

        $nama = $this->session->userdata('nama');
        $kelas = $this->session->userdata('kelas');
        $nilai = $this->input->post('nilai');
        $benar = $this->input->post('benar');
        $salah = $this->input->post('salah');

        // Simpan nilai ke database
        $this->Pemain_model->updateNilai($nama, $kelas, [
            'nilai_level4' => $nilai,
            'benar_level4' => $benar,
            'salah_level4' => $salah,
            'level_progress' => 4  // Update ke database juga!
        ]);

        $current_progress = $this->session->userdata('level_progress') ?? 1;
        $new_progress = max($current_progress, 5); // Level 5 unlock setelah Level4
        $this->session->set_userdata('level_progress', $new_progress);


        redirect('menu');
    }
}
