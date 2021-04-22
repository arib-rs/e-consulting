<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
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
        if ($this->session->userdata('grup') < 3) {
            redirect(base_url('konsultasi/data'));
        }
        $data['title'] = 'Konsultasi | E-Consulting';
        $data['casecat'] = $this->M_konsultasi->select_casecat();

        $this->load->view('templates/header', $data);
        $this->load->view('form_konsultasi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Konsultasi | E-Consulting';
        $data['casecat'] = $this->M_konsultasi->select_casecat();
        $data['case'] = $this->M_konsultasi->select_case_id($id);
        $data['hari'] = $this->hari;
        $data['diskusi'] = $this->M_konsultasi->select_dis_id($id);

        if ($this->session->userdata('grup') > 1) {
            $read = array(
                'dis_read' => date("Y-m-d H:i:s")
            );
            $this->M_konsultasi->update_dis_read($read, $id);
        }

        // if ($this->session->userdata('grup') <= 2) {
        //     $stat = array(
        //         'case_status' => 2
        //     );
        //     $this->M_konsultasi->update_case($stat, $id);
        // }

        $this->load->view('templates/header', $data);
        $this->load->view('detail', $data);
        $this->load->view('templates/footer', $data);
    }
    public function data()
    {
        $data['title'] = 'Data Konsultasi | E-Consulting';
        $data['casecat'] = $this->M_konsultasi->select_casecat();
        $data['hari'] = $this->hari;
        $data['filterreply'] = (isset($_GET['s']) ? $_GET['s'] : NULL);
        $data['kategori'] = array();
        $data['case'] = '';
        $data['from'] = '';
        $data['to'] = '';
        $filterk = '';
        $filtert = '';

        if (isset($_GET['k'])) {
            $data['kategori'] = $_GET['k'];
            $filterk = ' c.id_casecat IN (' . implode(',', $_GET['k']) . ') ';
        }
        if (!empty($_GET['f']) && !empty($_GET['t'])) {

            $f = "'" . date('Y-m-d', strtotime($_GET['f'])) . "'";
            $t = "'" . date('Y-m-d', strtotime($_GET['t'])) . "'";
            $filtert = " c.case_created_at BETWEEN " . $f . " AND " . $t;

            $data['from'] = $_GET['f'];
            $data['to'] = $_GET['t'];
        }


        if ($filterk == '' && $filtert == '') {
            $data['case'] = $this->M_konsultasi->select_case();
        } else {
            $data['case'] = $this->M_konsultasi->select_case_filter($filterk, $filtert);
        }
        $data['casecat'] = $this->M_konsultasi->select_casecat();


        $this->load->view('templates/header', $data);
        $this->load->view('data_konsultasi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function add_case()
    {
        if (empty($_POST['kategori'])) {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Kategori konsultasi belum dipilih. </div>');
            redirect('Konsultasi');
        }
        $now = date("Y-m-d H:i:s");
        $now2 = date("YmdHis");
        $lampiran = $_FILES['lampiran']['name'];
        $lampiran2 = $_FILES['lampiran2']['name'];
        $lampiran3 = $_FILES['lampiran3']['name'];
        $namafile = str_replace(array(' ', ',', '/', '-'), array('', '', '', ''), substr($_POST['judul'], 0, 10));

        if (!empty($lampiran)) {


            // define('MB', 1048576);
            // if ($_FILES['lampiran']['size'] > 10 * MB) {
            //     $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">File lampiran melebihi ukuran maksimal.</div>');
            //     redirect('Konsultasi');
            // }

            // // $AllowedFormat = array("png", "jpg", "pdf", "doc", "docx");
            // $AllowedFormat = array("pdf", "PDF");
            // if (!in_array(pathinfo($lampiran, PATHINFO_EXTENSION), $AllowedFormat)) {
            //     $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">File lampiran tidak sesuai format.</div>');
            //     redirect('Konsultasi');
            // }

            $errorUpload = $this->M_konsultasi->_upload('lampiran', '1_' . $now2 . $namafile);
            if ($errorUpload != NULL) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Upload Error : ' . str_replace(array('<p>', '</p>'), array('', ''), $errorUpload) . '</div>');
                redirect('Konsultasi');
            }
        }

        if (!empty($lampiran2)) {

            $errorUpload2 = $this->M_konsultasi->_upload('lampiran2',  '2_' . $now2 . $namafile);
            if ($errorUpload2 != NULL) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Uplod Error : ' . str_replace(array('<p>', '</p>'), array('', ''), $errorUpload2) . '</div>');
                redirect('Konsultasi');
            }
        }

        if (!empty($lampiran3)) {

            $errorUpload3 = $this->M_konsultasi->_upload('lampiran3',  '3_' . $now2 . $namafile);
            if ($errorUpload3 != NULL) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Upload Error : ' . str_replace(array('<p>', '</p>'), array('', ''), $errorUpload3) . '</div>');
                redirect('Konsultasi');
            }
        }



        $data = array(
            'id_case' => $now2 . $this->session->userdata['id_user'],
            'case_title'    => $_POST['judul'],
            'case'    => $_POST['isi'],
            'case_sender'    => $this->session->userdata['id_user'],
            'id_casecat'    => $_POST['kategori'],
            'case_created_at'    => $now,
            'case_last_dis'    => $now,
            'case_status' => 1,
            'case_att' => (!empty($lampiran)) ? 'lampiran_1_' . $now2 . $namafile . '.' . pathinfo($lampiran, PATHINFO_EXTENSION) : NULL,
            'case_att_filename' => (!empty($lampiran)) ? $lampiran : NULL,
            'case_att_2' => (!empty($lampiran2)) ? 'lampiran_2_' . $now2 .  $namafile . '.' . pathinfo($lampiran2, PATHINFO_EXTENSION) : NULL,
            'case_att_filename_2' => (!empty($lampiran2)) ? $lampiran2 : NULL,
            'case_att_3' => (!empty($lampiran3)) ? 'lampiran_3_' . $now2 .  $namafile . '.' . pathinfo($lampiran3, PATHINFO_EXTENSION) : NULL,
            'case_att_filename_3' => (!empty($lampiran3)) ? $lampiran3 : NULL
        );
        $this->M_konsultasi->add_case($data);

        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Konsultasi terkirim.</div>');
        redirect('Konsultasi');
    }
    public function add_dis()
    {

        $now = date("Y-m-d H:i:s");
        $now2 = date("YmdHis");

        $lampiran = $_FILES['lampiran']['name'];
        $lampiran2 = $_FILES['lampiran2']['name'];
        $lampiran3 = $_FILES['lampiran3']['name'];
        $namafile = str_replace(array(' ', ',', '/', '-'), array('', '', '', ''), substr($_POST['isi'], 0, 10));


        if (!empty($lampiran)) {
            // define('MB', 1048576);
            // if ($_FILES['lampiran']['size'] > 10 * MB) {
            //     $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">File lampiran melebihi ukuran maksimal.</div>');
            //     redirect('Konsultasi/detail/' . $_POST['id_case']);
            // }
            // $AllowedFormat = array("pdf", "PDF");
            // if (!in_array(pathinfo($lampiran, PATHINFO_EXTENSION), $AllowedFormat)) {
            //     $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">File lampiran tidak sesuai format.</div>');
            //     redirect('Konsultasi/detail/' . $_POST['id_case']);
            // }

            $errorUpload = $this->M_konsultasi->_upload('lampiran', '1_' . $now2 . $namafile);
            if ($errorUpload != NULL) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Uplod Error : ' . str_replace(array('<p>', '</p>'), array('', ''), $errorUpload) . '</div>');
                redirect('Konsultasi/detail/' . $_POST['id_case']);
            }
        }

        if (!empty($lampiran2)) {
            $errorUpload2 = $this->M_konsultasi->_upload('lampiran2', '2_' . $now2 . $namafile);
            if ($errorUpload2 != NULL) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Uplod Error : ' . str_replace(array('<p>', '</p>'), array('', ''), $errorUpload2) . '</div>');
                redirect('Konsultasi/detail/' . $_POST['id_case']);
            }
        }

        if (!empty($lampiran3)) {
            $errorUpload3 = $this->M_konsultasi->_upload('lampiran3', '3_' . $now2 . $namafile);
            if ($errorUpload3 != NULL) {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Uplod Error : ' . str_replace(array('<p>', '</p>'), array('', ''), $errorUpload3) . '</div>');
                redirect('Konsultasi/detail/' . $_POST['id_case']);
            }
        }
        $approve_date = ($_POST['case_sender'] == $this->session->userdata['id_user']) ? $now : NULL;
        $data = array(
            'id_case' => $_POST['id_case'],
            'dis_reply'    => $_POST['isi'],
            'dis_sender'    => $this->session->userdata['id_user'],
            'dis_receiver'    => $_POST['receiver'],
            'dis_date'    => $now,
            'dis_approve' => $approve_date,
            'dis_att' => (!empty($lampiran)) ? 'lampiran_1_' . $now2 . $namafile . '.' . pathinfo($lampiran, PATHINFO_EXTENSION) : NULL,
            'dis_att_filename' => (!empty($lampiran)) ? $lampiran : NULL,
            'dis_att_2' => (!empty($lampiran2)) ? 'lampiran_2_' . $now2 . $namafile . '.' . pathinfo($lampiran2, PATHINFO_EXTENSION) : NULL,
            'dis_att_filename_2' => (!empty($lampiran2)) ? $lampiran2 : NULL,
            'dis_att_3' => (!empty($lampiran3)) ? 'lampiran_3_' . $now2 . $namafile . '.' . pathinfo($lampiran3, PATHINFO_EXTENSION) : NULL,
            'dis_att_filename_3' => (!empty($lampiran3)) ? $lampiran3 : NULL,
        );
        $this->M_konsultasi->add_dis($data);

        if ($_POST['case_sender'] == $this->session->userdata['id_user']) {
            $data = array(
                'case_last_dis' => $now
            );
            $this->M_konsultasi->update_case($data, $_POST['id_case']);
        }
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Pesan terkirim.</div>');
        redirect('Konsultasi/detail/' . $_POST['id_case']);
    }
    public function update_casecat()
    {
        $data = array(
            'id_casecat' => $_POST['kategori']
        );
        $this->M_konsultasi->update_case($data, $_POST['id_case']);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Kategori konsultasi telah diubah.</div>');
        redirect('Konsultasi/data');
    }
    public function tolak()
    {
        $data = array(
            'dis_rejected' => date("Y-m-d H:i:s"),
            'dis_rejected_note' => $_POST['rejectnote']
        );
        $this->M_konsultasi->update_dis($data, $_POST['id']);

        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Pesan telah ditolak.</div>');
        redirect('Konsultasi/detail/' . $_POST['id_case']);
    }
    public function approve()
    {
        $now = date("Y-m-d H:i:s");
        $data = array(
            'dis_approve' => $now
        );
        $this->M_konsultasi->update_dis($data, $_POST['id']);

        $data = array(
            'case_last_dis' => $now,
            'case_status' => 2
        );
        $this->M_konsultasi->update_case($data, $_POST['id_case']);

        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Jawaban telah disetujui.</div>');
        redirect('Konsultasi/detail/' . $_POST['id_case']);
    }
    public function markdone($id)
    {
        $data = array(
            'case_status' => 9
        );
        $this->M_konsultasi->update_case($data, $id);

        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Konsultasi telah selesai.</div>');
        redirect('Konsultasi/detail/' . $id);
    }
    public function del_dis()
    {
        $data = array(
            'dis_deleted' => date("Y-m-d H:i:s")
        );
        $this->M_konsultasi->update_dis($data, $_POST['id']);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Pesan telah dihapus.</div>');
        redirect('Konsultasi/detail/' . $_POST['id_case']);
    }
}
