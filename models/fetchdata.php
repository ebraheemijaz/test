<?php
class Fetchdata extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function record_count() {
        $this->db->from('member');
        $this->db->where('first_time', 'no');
        $this->db->where('status', 'active');
        return $this->db->count_all_results();
    }
    
    public function countVoiceNote() {
        $this->db->from('audioNote');
        return $this->db->count_all_results();
    }
    
    public function countLive() {
        $this->db->from('live');
        return $this->db->count_all_results();
    }
    
    public function countHOD() {
        $this->db->from('HOD');
        return $this->db->count_all_results();
    }
    
    public function countWord() {
        $this->db->from('words');
        return $this->db->count_all_results();
    }

    public function fetch_members($limit, $start) {
        $this->db->select('*')->from('member');
        $this->db->order_by("dOfJoining", "desc");
        $this->db->where('status', 'active');
        $this->db->where('first_time', 'no');
        if($limit != null)
        $this->db->limit($limit, $start);
        return   $this->db->get()->result_array();
   }
   
   public function fetch_voice_note($limit, $start) {
       $this->db->select('*')->from('audioNote');
       $this->db->order_by('dateOfEvent', 'DESC');
       if($limit != null)
        $this->db->limit($limit, $start);
       return $this->db->get()->result_array();
   }
   
   public function fetch_live($limit, $start) {
       $this->db->select('*')->from('live');
       $this->db->order_by('dateOfEvent', 'DESC');
       if($limit != null)
        $this->db->limit($limit, $start);
       return $this->db->get()->result_array();
   }
   
   public function fetch_word($limit, $start) {
       $this->db->select('*')->from('words');
       $this->db->order_by('date_preached', 'DESC');
       if($limit != null)
            $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
   }
   
   public function fetchHOD($limit, $start) {
       $this->db->select('*')->from('HOD');
       $this->db->order_by('departmentName', 'ASC');
       if($limit != null)
            $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
   }
   
   public function searchData($name) {
       if(preg_match('/\s/', $name)){
           $names = explode(" ",$name);
           $query = $this->db->query("SELECT * FROM member WHERE (fname = '".$names[0]."' and lname = '".$names[1]."') or (fname = '".$names[1]."' and lname = '".$names[0]."')");
       }else{
           $this->db->select('*')->from('member');
           $this->db->or_like(array('fname' => $name, 'lname' => $name));
           $query = $this->db->get();
       }
       if($query->num_rows() > 0){
           return $query->result_array();
       }else{
           return $query->result_array();
       }
   }
   
   public function searchVoiceNote($voiceNote) {
       $this->db->select('*')->from('audioNote');
       $this->db->or_like(array('title' => $voiceNote, 'minister' => $voiceNote));
       $query = $this->db->get();
       if($query->num_rows() > 0) {
           return $query->result_array();
       }else{
           return $query->result_array();
       }
   }
   
   public function searchLive($live) {
       $this->db->select('*')->from('live');
       $this->db->or_like(array('title' => $live, 'minister' => $live));
       $query = $this->db->get();
       if($query->num_rows() > 0) {
           return $query->result_array();
       }else{
           return $query->result_array();
       }
   }
   
   public function searchWordLog($word) {
       $this->db->select('*')->from('word');
       $this->db->or_like(array('preacher_name' => $word, 'topic' => $word, 'message' => $word));
       $query = $this->db->get();
       if($query->num_rows() > 0) {
           return $query->result_array();
       }else{
           return $query->result_array();
       }
   }
}