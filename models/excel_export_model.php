<?php
class Excel_export_model extends CI_Model
{
    function fetch_data()
    {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('status', 'active');
        $this->db->where('first_time', 'no');
        $this->db->order_by('lname', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
}