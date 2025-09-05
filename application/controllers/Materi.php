<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
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
        $this->load->view('Materi/index');
    }
}
