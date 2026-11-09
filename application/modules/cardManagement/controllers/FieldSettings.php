<?php
class FieldSettings extends CI_Controller
{
  public function __construct() {
        parent::__construct();
       $this->load->model('field_settings_model');
    }
  
      

public function index($group_id = 1) {
        $this->create($group_id);
    }

    public function create($group_id = 1) {
        $data = array();
        $data['active'] = "field_settings";
        $data['title'] = "Field Settings";
        $data['group_id'] = $group_id;
        
        // মডেল থেকে ক্যাটাগরি ওয়াইজ ফিল্ড ফেচ করা
        $data['grouped_fields'] = $this->field_settings_model->get_fields_with_settings($group_id);
      
        $data['content'] = $this->load->view("field_settings/create", $data, TRUE);
        $this->load->view('layout/master', $data);
    }

    public function insert() {
        $group_id = $this->input->post('group_id');
        $selected_fields = $this->input->post('fields');

        if (!empty($group_id) && $this->field_settings_model->save_institution_settings($group_id, $selected_fields)) {
            $this->session->set_flashdata('success', 'Field settings saved successfully!');
        } else {
            $this->session->set_flashdata('error', 'Please select at least one field or group ID missing.');
        }
        
        redirect('cardManagement/fieldSettings/create/' . $group_id);
    }

}


