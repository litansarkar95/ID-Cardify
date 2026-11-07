<?php
class FieldSettings extends CI_Controller
{
  public function __construct() {
        parent::__construct();
       // $this->load->model("dashboard_model");
    }
  
      

public function index()
{


    $data = array();
    $data['active'] = "field_groups_settings";
    $data['title'] = "Field Groups Settings"; 
   // $active_branch_id = active_branch_id();

  $data['allMou'] = $this->common_model->view_data("module_types", "", "id", "asc");
  $data['content'] = $this->load->view("field_groups/index", $data, TRUE);
   $this->load->view('layout/master', $data);

}

}


