<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $password = md5($this->input->post('password'));

        $u = $this->db->where('username', $username)
            ->get('mst_user');

        // jika usernya ada
        if ($u->num_rows() == 1) {
            // cek password
            $p = $this->db->select('*')
                ->from('mst_user')
                ->where('username', $username)
                ->where('password', $password)
                ->get();
            $i = $p->result_array();

            if ($p->num_rows() == 1) {
                $data = array(

                    'username' => $username,
                    'password' => $password,
                    'fullname' => $i[0]['fullname'],
                    'id_user' => $i[0]['id_user'],
                    'grup' => $i[0]['user_group'],
                    'user' => 'internal',
                    'opd' => ($i[0]['user_group'] == 3) ? 1 : 0,
                    'notifubahpass' => 0,
                    'notifpanduan' => 0
                );
                $this->session->set_userdata($data);
                redirect('');
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Password salah !</div>');
                redirect('');
            }
        } else {
            // // API LOGIN SKP
            // $url = 'http://apikey.sidoarjokab.go.id/api/pegawai/sign-in';
            // $data = array('username' => $username, 'password' => $pass);

            // // use key 'http' even if you send the request to https://...
            // $options = array('http' => array(
            //     'method'  => 'POST',
            //     'header'  => 'Content-type: application/x-www-form-urlencoded',
            //     'content' => http_build_query($data)
            // ));
            // $context  = stream_context_create($options);
            // $result = @file_get_contents($url, false, $context);
            // $skplogin = json_decode($result);
            // // END OF API LOGIN SKP
            // if (!empty($skplogin)) {
            //     $data = array(

            //         'username' => $username,
            //         'password' => $pass,
            //         'fullname' => $skplogin->nama,
            //         'id_user' => $skplogin->nip,
            //         'grup' => 3,
            //         'user' => 'eksternal',
            //         'nama_skpd' => $skplogin->nama_skpd,
            //         'nama_unit' => $skplogin->nama_unit,
            //         'nama_jabatan' => $skplogin->nama_jabatan,
            //         'nama_golongan' => $skplogin->nama_golongan,
            //         'keterangan' => $skplogin->keterangan

            //     );
            //     $this->session->set_userdata($data);
            //     redirect('konsultasi/data');
            // } else {
            // API LOGIN OPD SKP
            $url = 'http://apikey.sidoarjokab.go.id/api/userskpd/sign-in';
            $data = array('username' => $username, 'password' => $pass);

            // use key 'http' even if you send the request to https://...
            $options = array('http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query($data)
            ));
            $context  = stream_context_create($options);
            $result = @file_get_contents($url, false, $context);
            $skplogin = json_decode($result);
            // END OF API LOGIN OPD SKP
            if (!empty($skplogin)) {
                $data = array(

                    'username' => $username,
                    'password' => $pass,
                    'fullname' => $skplogin->nama,
                    'id_user' => $skplogin->kode,
                    'grup' => 3,
                    'user' => 'eksternal',
                    'opd' => 1,
                    'notifpanduan' => 0

                );
                $this->session->set_userdata($data);
                redirect('');
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">User/password salah.</div>');
                redirect('');
            }
            // }
        }
        // echo $this->session->flashdata('flash');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}
