<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama') || !$this->session->userdata('kelas')) {
            redirect('input');
        }
    }

    public function index()
    {
        $this->load->model('Pemain_model');

        $nama = $this->session->userdata('nama');
        $kelas = $this->session->userdata('kelas');

        if (!$nama || !$kelas) {
            redirect('Input');
        }

        $pemain = $this->Pemain_model->cariPemain($nama, $kelas);

        $data = [
            'nilai_level1' => $pemain->nilai_level1 ?? null,
            'benar_level1' => $pemain->benar_level1 ?? null,
            'salah_level1' => $pemain->salah_level1 ?? null,
            'nilai_level2' => $pemain->nilai_level2 ?? null,
            'benar_level2' => $pemain->benar_level2 ?? null,
            'salah_level2' => $pemain->salah_level2 ?? null,
            'nilai_level3' => $pemain->nilai_level3 ?? null,
            'benar_level3' => $pemain->benar_level3 ?? null,
            'salah_level3' => $pemain->salah_level3 ?? null,
            'nilai_level4' => $pemain->nilai_level4 ?? null,
            'benar_level4' => $pemain->benar_level4 ?? null,
            'salah_level4' => $pemain->salah_level4 ?? null,
            'nilai_level5' => $pemain->nilai_level5 ?? null,
            'benar_level5' => $pemain->benar_level5 ?? null,
            'salah_level5' => $pemain->salah_level5 ?? null
        ];

        $this->load->view('hasil/index', $data);
    }
}
