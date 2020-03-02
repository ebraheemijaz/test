<?php

class Data extends CI_Model{
    function scrubbing($data){
        if(!empty($data)){
            foreach($data as $k=>$v){
                $data[$k]=htmlspecialchars($v);
            }
        }
        return $data;
    }
    function insert($table,$data){
        $this->db->insert($table,$data);
    }
    function update($w,$table,$data){
        if(!empty($w)){
            foreach($w as $k => $val){
                $this->db->where($k, $val);
            }
        }
        //var_dump($data);
        $this->db->update($table,$data);
    }
    function fetch($table,$where=null,$limit=null){
        $this->db->select('*')->from($table);
        if(is_array($where) && $where != null){
        foreach($where as $key => $value){
            $this->db->where($key, $value);
        }
        }
        if($limit != null)
        $this->db->limit($limit);
        if($table == 'testimonies' || $table == 'p_request'){
            $this->db->order_by('date', 'desc');
        }
        return   $this->db->get()->result_array();
    }
    
    public function select_sum($sum,$table,$where){
        foreach($where as $key=>$val)
        {
            $this->db->where($key, $val);
        }
        $this->db->select($sum)->from($table);
        return   $this->db->get()->result_array();
    }
    public function join($col= '*' , $from , $join ,$to_join, $type){
        $this->db->select($col);
        $this->db->from($from);
        $this->db->join($join, $to_join,$type);
        return   $this->db->get()->result_array();
    }
    
    public function delete($w,$table){
        foreach($w as $key=>$val)
        {
            $this->db->where($key, $val);
        }
        $this->db->delete($table);
    }
    public function myquery($q){
        $x = $this->db->query($q);
        return (method_exists($x,"result_array")) ? $x->result_array() : "";
    }
}