<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analitik extends CI_Controller
{
    private $hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu');
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') != TRUE) {
            redirect(base_url());
        }
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_konsultasi');
    }


    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('grup') > 1) {
            redirect(base_url());
        }

        $data['tahun'] = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
        $data['title'] = 'Data Analitik | E-Consulting';
        $data['casecat'] = $this->M_konsultasi->select_casecat();
        $data['caseperbulan'] = array();
        for ($i = 1; $i <= 12; $i++) {
            $data['caseperbulan'][$i] = $this->M_konsultasi->get_JumlahByBulan($i, $data['tahun']);
        }
        $data['jumlahcasesdhditindaklanjuti'] = $this->M_konsultasi->get_JumlahCaseSdhDitindaklanjuti();
        $data['jumlahcaseblmditindaklanjuti'] = $this->M_konsultasi->get_JumlahCaseBlmDitindaklanjuti();
        $data['jumlahcasepertahun'] = $this->M_konsultasi->get_JumlahCasePerTahun($data['tahun']);
        $data['jumlahcaseperhari'] = $this->M_konsultasi->get_JumlahCasePerHari();
        $data['jumlahcase'] = $this->M_konsultasi->get_JumlahCase();
        $data['case_solver'] = $this->M_konsultasi->select_case_solver();
        $data['casepersolver'] = array();
        $data['list_tahun'] = $this->M_konsultasi->select_tahun();
        foreach ($data['case_solver'] as $d) {
            $data['casepersolver'][$d['id_user']] = $this->M_konsultasi->get_CasePerSolver($d['id_user'], $data['tahun']);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('analitik', $data);
        $this->load->view('templates/footer', $data);
    }
}
