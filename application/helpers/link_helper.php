<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_short_qr_link')) {
             
    function get_short_qr_link($slug, $long_url, $type = 'Institution') {
        $CI =& get_instance(); 
        
        $existing_link = $CI->db->get_where('short_links', ['long_url' => $long_url])->row();

        if ($existing_link) {
            $short_code = $existing_link->short_code;
        } else {
            $short_code = substr(md5(uniqid(mt_rand(), true)), 0, 8);
            $CI->db->insert('short_links', [
                'long_url'   => $long_url,
                'short_code' => $short_code,
                'link_type'  => $type,
                'slug'       => $slug 
            ]);
        }

        return base_url() . "s/" . $short_code;
    }
}