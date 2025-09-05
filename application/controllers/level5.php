<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level5 extends CI_Controller
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

        // Cek apakah Level 4 sudah selesai
        if ($this->session->userdata('level_progress') < 5) {
            redirect('menu'); // belum unlock level 3
        }

        $this->load->view('Level5/index');
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
            'nilai_level5' => $nilai,
            'benar_level5' => $benar,
            'salah_level5' => $salah,
            'level_progress' => 5  // Update ke database juga!
        ]);

        // Update session progress tanpa menurunkan level sebelumnya
        $current_progress = $this->session->userdata('level_progress') ?? 1;
        $this->session->set_userdata('level_progress', max($current_progress, 5));

        redirect('hasil');
    }
}
