<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'E-Consulting';

        $this->load->view('templates/header', $data);
        $this->load->view('beranda', $data);
        $this->load->view('templates/footer', $data);
    }
}
