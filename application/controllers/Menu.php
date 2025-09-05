<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
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

        $level_progress = $this->session->userdata('level_progress') ?? 1;

        $data = [
            'level_progress' => $level_progress
        ];

        $this->load->view('menu/index', $data);
    }
}
