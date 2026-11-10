<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shortlink extends CI_Controller {

 public function index($code = NULL) {
    if (!$code) {
        show_404();
    }

 
    $result = $this->db->get_where('short_links', ['short_code' => $code])->row();

    if ($result) {
     
        redirect($result->long_url);
    } else {
  
         $this->session->set_flashdata('error', 'লিঙ্কটি খুঁজে পাওয়া যায়নি বা মেয়াদ শেষ হয়ে গেছে।');
         redirect(base_url());
        show_404();
    }
}
}