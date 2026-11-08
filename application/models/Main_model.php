<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

public function create_unique_slug($title,$table) {

    $slug = url_title($title, 'dash', TRUE);
    $original_slug = $slug;
    $counter = 1;

    while ($this->slug_exists($slug,$table)) {
        $slug = $original_slug . '-' . $counter;
        $counter++;
    }

    return $slug;
}

public function slug_exists($slug,$table) {
        $this->db->where('slug', $slug);
        $query = $this->db->get($table);
        return $query->num_rows() > 0;
    }


    
}