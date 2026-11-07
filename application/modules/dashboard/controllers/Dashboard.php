<?php
class Dashboard extends CI_Controller
{
  public function __construct() {
        parent::__construct();
       // $this->load->model("dashboard_model");
    }
  
      

public function index()
{


    $data = array();
    $data['active'] = "dashboard";
    $data['title'] = "Dashboard"; 
   // $active_branch_id = active_branch_id();


    $data['content'] = $this->load->view("dashboard", $data, TRUE);
 
   $this->load->view('layout/master', $data);

}

}


