<?php
class M_konsultasi extends CI_Model
{
    public function select_case_filter($filterk, $filtert)
    {
        if ($filterk == '') {
            $filterk = '1=1';
        }

        if ($filtert == '') {
            $filtert = '1=1';
        }

        $q = $this->db
            ->select('*')
            ->from('case as c')
            ->join('mst_casecat as cc', 'c.id_casecat = cc.id_casecat')
            ->join('case_mapping as cm', 'c.id_casecat = cm.id_casecat')
            ->join('mst_user as u', 'c.case_sender = u.id_user', 'left')
            ->where($filterk)
            ->where($filtert);

        $r = '';
        if ($this->session->userdata('grup') < 2) {
            $r = $q->order_by('c.case_created_at', 'DESC')
                ->get();
        } else {
            $r = $q->where('c.case_sender = "' . $this->session->userdata('id_user') . '" OR cm.case_solver = "' . $this->session->userdata('id_user') . '"')
                ->order_by('c.case_last_dis', 'DESC')
                ->get();
        }
        return $r->result_array();
    }
    public function select_case()
    {

        $q = $this->db
            ->select('*')
            ->from('case as c')
            ->join('mst_casecat as cc', 'c.id_casecat = cc.id_casecat')
            ->join('case_mapping as cm', 'c.id_casecat = cm.id_casecat')
            ->join('mst_user as u', 'c.case_sender = u.id_user', 'left');
        $r = '';
        if ($this->session->userdata('grup') < 2) {
            $r = $q->order_by('c.case_last_dis', 'DESC')
                ->get();
        } else {
            $r = $q->where('c.case_sender = "' . $this->session->userdata('id_user') . '" OR cm.case_solver = "' . $this->session->userdata('id_user') . '"')
                ->order_by('c.case_created_at', 'DESC')
                ->get();
        }
        return $r->result_array();
    }
    public function select_case_id($id)
    {

        $q = $this->db
            ->select('*')
            ->from('case as c')
            ->join('mst_casecat as cc', 'c.id_casecat = cc.id_casecat')
            ->join('case_mapping as cm', 'c.id_casecat = cm.id_casecat')
            ->join('mst_user as u', 'c.case_sender = u.id_user', 'left')
            ->where('c.id_case = "' . $id . '"')
            ->get();

        return $q->result_array();
    }
    public function select_dis_id($id)
    {

        $q = $this->db
            ->select('*')
            ->from('discussion as d')
            ->join('case as c', 'c.id_case = d.id_case')
            ->join('mst_casecat as cc', 'c.id_casecat = cc.id_casecat')
            ->join('case_mapping as cm', 'c.id_casecat = cm.id_casecat')
            ->join('mst_user as u', 'd.dis_sender = u.id_user', 'left')
            ->where('c.id_case = "' . $id . '"')
            ->where('d.dis_deleted', NULL);

        $r = '';
        if ($this->session->userdata('grup') > 2) {
            $r = $q->where('d.dis_approve !=', NULL)
                ->order_by('d.dis_date', 'ASC')
                ->get();
        } else {
            $r = $q->order_by('d.dis_date', 'ASC')
                ->get();
        }
        return $r->result_array();
    }
    public function is_replied($id)
    {
        $q = $this->db
            ->select('*')
            ->from('discussion as d')
            ->join('case as c', 'c.id_case = d.id_case')
            ->join('mst_user as u', 'd.dis_sender = u.id_user', 'left')
            ->where('d.id_case = "' . $id . '"')
            ->where('d.dis_deleted', NULL)
            ->where('d.dis_approve !=', NULL)
            ->order_by('d.dis_date', 'DESC')
            ->limit(1)
            ->get()
            ->result_array();

        if (count($q) > 0) {
            if ($q[0]['case_sender'] == $q[0]['dis_sender']) {
                return 2;
            } else {
                return 1;
            }
        } else {
            return 2;
        }
    }
    public function select_casecat()
    {

        $q = $this->db
            ->select('*')
            ->from('mst_casecat')
            ->order_by('id_casecat', 'ASC')
            ->get();

        return $q->result_array();
    }
    public function add_case($data)
    {
        $this->db->insert('case', $data);
    }
    public function add_dis($data)
    {
        $this->db->insert('discussion', $data);
    }

    public function update_case($data, $id)
    {
        $this->db->where('id_case = "' . $id . '"');
        $this->db->update('case', $data);
    }
    public function update_dis($data, $id)
    {
        $this->db->where('id_dis', $id);
        $this->db->update('discussion', $data);
    }
    public function update_dis_read($data, $id)
    {
        $this->db->where('dis_receiver = "' . $this->session->userdata('id_user') . '"');
        $this->db->where('dis_approve !=', NULL);
        $this->db->where('dis_read', NULL);
        $this->db->where('id_case = "' . $id . '"');
        $this->db->update('discussion', $data);
    }
    public function del_case($id)
    {
        $this->db->delete('case', array('id_case' => '"' . $id . '"'));
    }
    public function _upload($file, $no)
    {
        $config['upload_path']          = 'upload/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = 'lampiran_' . $no;
        $config['overwrite']            = true;
        $config['max_size']             = 10240; // 10MB
        // $config['max_size']             = 1048576; // 10MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload($file)) {
            // return $this->upload->data("file_name");
            return NULL;
        } else {
            return $this->upload->display_errors();
        }
    }
    public function select_case_solver()
    {
        $this->db->select('*')
            ->from('mst_user as u')
            ->join('case_mapping as cm', 'cm.case_solver = u.id_user')
            ->join('mst_casecat as cc', 'cc.id_casecat = cm.id_casecat')
            ->where('u.user_group', '2')
            ->order_by('u.fullname', 'ASC');
        return $this->db->get()->result_array();
    }
    public function get_JumlahByBulan($bulan, $tahun)
    {
        date_default_timezone_set('Asia/Jakarta');
        $q = $this->db
            ->select('*')
            ->from('case as c')
            // ->join('mst_casecat as cc', 'c.id_casecat = cc.id_casecat')
            // ->join('case_mapping as cm', 'c.id_casecat = cm.id_casecat')
            // ->join('mst_user as u', 'c.case_sender = u.id_user')
            ->where("MONTH(c.case_created_at)=" . $bulan)
            ->where("YEAR(c.case_created_at)=" . $tahun)
            ->get();
        return $q->num_rows();
    }
    public function get_JumlahCasePerTahun($tahun)
    {
        date_default_timezone_set('Asia/Jakarta');
        $q = $this->db
            ->select('*')
            ->from('case as c')
            ->where("YEAR(c.case_created_at)=" . $tahun)
            ->get();
        return $q->num_rows();
    }
    public function get_JumlahCasePerHari()
    {
        date_default_timezone_set('Asia/Jakarta');
        $q = $this->db
            ->select('*')
            ->from('case as c')
            ->where("DATE(c.case_created_at)='" . date("Y-m-d") . "'")
            ->get();
        return $q->num_rows();
    }
    public function get_JumlahCase()
    {
        date_default_timezone_set('Asia/Jakarta');
        $q = $this->db
            ->select('*')
            ->from('case as c')
            ->get();
        return $q->num_rows();
    }
    public function get_JumlahCaseBlmDitindaklanjuti()
    {
        date_default_timezone_set('Asia/Jakarta');
        $q = $this->db
            ->select('*')
            ->from('case as c')
            ->where('c.case_status', '1')
            ->get();
        return $q->num_rows();
    }
    public function get_JumlahCaseSdhDitindaklanjuti()
    {
        date_default_timezone_set('Asia/Jakarta');
        $q = $this->db
            ->select('*')
            ->from('case as c')
            ->where('c.case_status !=', '1')
            ->where("DATE(c.case_created_at)='" . date("Y-m-d") . "'")

            ->get();
        return $q->num_rows();
    }
    public function get_CasePerSolver($id, $tahun)
    {
        date_default_timezone_set('Asia/Jakarta');
        $q = $this->db
            ->select('*')
            ->from('case as c')
            ->join('mst_casecat as cc', 'c.id_casecat = cc.id_casecat')
            ->join('case_mapping as cm', 'c.id_casecat = cm.id_casecat')
            ->join('mst_user as u', 'cm.case_solver = u.id_user')
            ->where('cm.case_solver', $id)
            ->where("YEAR(c.case_created_at)=" . $tahun)
            ->get();
        return $q->num_rows();
    }
    public function select_CasePerSolverPerBulan($bln, $id, $tahun)
    {
        date_default_timezone_set('Asia/Jakarta');
        $q = $this->db
            ->select('*')
            ->from('case as c')
            ->join('mst_casecat as cc', 'c.id_casecat = cc.id_casecat')
            ->join('case_mapping as cm', 'c.id_casecat = cm.id_casecat')
            ->join('mst_user as u', 'cm.case_solver = u.id_user')
            ->where('cm.case_solver', $id)
            ->where("MONTH(c.case_created_at)=" . $bln)
            ->where("YEAR(c.case_created_at)=" . $tahun)
            ->get();
        return $q->result_array();
    }
    function select_tahun()
    {

        $q = $this->db
            ->distinct()
            ->select('YEAR(case_created_at) as tahun')
            ->from('case')
            ->get();
        return $q->result_array();
    }
}
