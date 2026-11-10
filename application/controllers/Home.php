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
 public function contact() {
    $data = array();
    $data['active'] = "contact";
    $data['title'] = "Contact Us"; 
    $data['content'] = $this->load->view("frontend/home/contact-us", $data, TRUE);
    $this->load->view('frontend/layouts/master', $data);
}
  public function about() {
    $data = array();
    $data['active'] = "about";
    $data['title'] = "About Us"; 
    $data['content'] = $this->load->view("frontend/home/about-us", $data, TRUE);
    $this->load->view('frontend/layouts/master', $data);
}
  public function faq() {
    $data = array();
    $data['active'] = "faq";
    $data['title'] = "faq"; 
    $data['content'] = $this->load->view("frontend/home/faq", $data, TRUE);
    $this->load->view('frontend/layouts/master', $data);
}
  public function terms() {
    $data = array();
    $data['active'] = "terms";
    $data['title'] = "Terms"; 
    $data['content'] = $this->load->view("frontend/home/terms", $data, TRUE);
    $this->load->view('frontend/layouts/master', $data);
}
  public function privacy() {
    $data = array();
    $data['active'] = "privacy";
    $data['title'] = "Privacy"; 
    $data['content'] = $this->load->view("frontend/home/privacy", $data, TRUE);
    $this->load->view('frontend/layouts/master', $data);
}
}
