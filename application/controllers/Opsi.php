<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Cek apakah user sudah input nama
        if (!$this->session->userdata('nama') || !$this->session->userdata('kelas')) {
            redirect('input');
        }
    }

    public function index()
    {
        $this->load->view('opsi/index');
    }
}
