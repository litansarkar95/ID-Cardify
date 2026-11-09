<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends CI_Controller {

   public function index() {
    $data = array();
    $data['active'] = "custom_404";
    $data['title'] = "404"; 
    $data['content'] = $this->load->view("frontend/custom_404", $data, TRUE);
    $this->load->view('frontend/layouts/master', $data);
}


}