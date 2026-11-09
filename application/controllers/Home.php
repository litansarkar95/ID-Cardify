<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   public function index() {
    $data = array();
    $data['active'] = "homa";
    $data['title'] = "Home Page"; 
    $data['content'] = $this->load->view("frontend/home/index", $data, TRUE);
    $this->load->view('frontend/layouts/master', $data);
}

 
}
