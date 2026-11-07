<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

    public $Id;

    public function save_data($table, $data) {
        if ($this->db->insert($table, $data)) {
            
            $this->Id = $this->db->insert_id();
           
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_data($table, $data, $where,$id=NULL) {



        if ($where) {
            $this->db->where($where);
        }
        if ($this->db->update($table, $data)) {
                //LOGS
                $user_id = $this->session->userdata('loggedin_id');
                logs("Record deleted On $table id $id", $id, $user_id,"Update");
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function view_data($table, $where, $order1, $order2) {
        if ($where) {
            $this->db->where($where);
        }
        $this->db->select("*");
        $this->db->from($table);
        $this->db->order_by($order1, $order2);
        return $this->db->get()->result();
    }

    public function delete_data($table, $data,$id=NULL) {
       
        if ($this->db->delete($table, $data)) {
      
        //LOGS
        $user_id = $this->session->userdata('loggedin_id');
        logs("Record deleted On $table id $id", $id, $user_id,"Delete");
            return TRUE;
        } else {
            return FALSE;
        }
    }




   

}