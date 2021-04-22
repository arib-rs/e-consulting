<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ubah_password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') != TRUE) {
            redirect(base_url());
        }
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('M_user');
    }

    public function index()
    {
        if ($this->session->userdata('user') != 'internal') {
            redirect(base_url());
        }
        $data['title'] = 'E-Consulting | Ubah Password';

        $this->load->view('templates/header', $data);
        $this->load->view('ubah_password', $data);
        $this->load->view('templates/footer', $data);
    }
    public function savepass()
    {
        if ($this->session->userdata('user') != 'internal') {
            redirect(base_url());
        }

        if (md5($_POST['oldpass']) == $this->session->userdata('password') && $_POST['newpass'] == $_POST['newpassconf']) {
            $data = array(
                'password'    => md5($_POST['newpass'])
            );


            $this->M_user->update_user($data, $this->session->userdata('id_user'));

            $data = array(
                'username',
                'password',
                'fullname',
                'id_user',
                'grup'
            );
            $this->session->unset_userdata($data);
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Password berhasil  diubah. Silahkan login kembali.</div>');
            redirect(base_url());
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Password gagal diubah. Silahkan periksa kembali data yang anda masukkan.</div>');
            redirect('Ubah_password');
        }
    }
}
