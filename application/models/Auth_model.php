<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

public function get_credential($username, $password) {
        $this->db->where('username', $username);
        // $this->db->or_where('email', $username);
        
        $query = $this->db->get('login_credential');

        if ($query->num_rows() == 1) {
            $row = $query->row();
            if (password_verify($password, $row->password)) {
                return $row; 
            }
        }

        return FALSE; 
    }

    public function getUserDetailsByRoleID($roleID, $userID) {
        
        if ($roleID == 2) { 
            //  resellers table 
            $sql = "SELECT name, email, mobile_no, picture, 'reseller' AS user_type FROM resellers WHERE id = " . $this->db->escape($userID);
            return $this->db->query($sql)->row_array();

        } elseif ($roleID == 3) { 
            // institutions table
            $sql = "SELECT name, email, mobile_no, picture, 'institution' AS user_type FROM institutions WHERE id = " . $this->db->escape($userID);
            return $this->db->query($sql)->row_array();

        } else { 
            // staff table
            // $sql = "SELECT CONCAT_WS(' ', staff.first_name, staff.last_name) AS name, email, mobile_no, picture, 'staff' AS user_type FROM staff WHERE id = " . $this->db->escape($userID);
            // return $this->db->query($sql)->row_array();
        }
    }
}