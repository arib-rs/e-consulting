<?php
class M_user extends CI_Model
{
    public function add_user($data)
    {
        $this->db->insert('mst_user', $data);
    }

    public function update_user($data, $id)
    {
        $this->db->where('id_user = "' . $id . '"');
        $this->db->update('mst_user', $data);
    }
}
