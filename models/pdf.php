<?php 
/**
 * Description of Pdf Model
 *
 * @author Web Preparations Team
 *
 * @email  webpreparations@gmail.com
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pdf extends CI_Model {
    // get mobiles list
    public function memberList() {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('status', 'active');
        $this->db->where('first_time', 'no');
        $this->db->order_by('lname', 'ASC');
        //print_r($this->db->last_query());
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function keepersNetworkList(){
        $this->db->select('*');
        $this->db->from('keepersNetwork');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>