<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Play extends CI_Controller
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
        $this->session->set_userdata('akses_dibuka', TRUE);
        $this->load->view('Play/index');
    }
    public function mulai()
    {
        $this->load->library('session');
        // Set session agar bisa lanjut ke input
        $this->session->set_userdata('akses_dari_play', true);
        // Flashdata untuk memicu musik
        $this->session->set_flashdata('mulai_game', true);
        redirect('opsi');
    }
}
