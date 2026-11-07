<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/*

* $autoload['helper'] =  array('lang');

* display a language
* echo display('helloworld'); 

* display language list
* $lang = languageList(); 
* ------------------------------------------
*
*/


if (!function_exists('display')) {

    function display($text = null)
    {
        $ci =& get_instance();
        $ci->load->database();
        $ci->load->library('session');

        $table = 'language';
        $phrase = 'phrase';
        $default_lang = 'english';
        $language = $default_lang;

        // 1️⃣ যদি session এ language থাকে
        if ($ci->session->userdata('site_lang')) {

            $language = $ci->session->userdata('site_lang');

        } else {

            // 2️⃣ যদি user logged in থাকে এবং branch আছে
            if ($ci->session->userdata('loggedin') == true 
                && $ci->session->userdata('loggedin_branch_id')) {

                $branch_id = $ci->session->userdata('loggedin_branch_id');

                $branch = $ci->db->select('language')
                                 ->from('branch')
                                 ->where('id', $branch_id)
                                 ->get()
                                 ->row();

                if (!empty($branch->language)) {
                    $language = $branch->language;
                }
            }

            // session এ language set করে দিচ্ছি
            $ci->session->set_userdata('site_lang', $language);
        }

        // 3️⃣ Translation return
        if (!empty($text)) {

            if ($ci->db->table_exists($table)
                && $ci->db->field_exists($phrase, $table)
                && $ci->db->field_exists($language, $table)) {

                $row = $ci->db->select($language)
                              ->from($table)
                              ->where($phrase, $text)
                              ->get()
                              ->row();

                if (!empty($row->$language)) {
                    return html_escape($row->$language);
                }
            }
        }

        return $text; // fallback
    }
}

    
 


