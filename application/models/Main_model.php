<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {


public function slug_exists($slug) {
        $this->db->where('slug', $slug);
        $query = $this->db->get('institutions');
        return $query->num_rows() > 0;
    }
}