<?php
class Applications extends CI_Controller
{
  public function __construct() {
        parent::__construct();
        $this->load->model('field_settings_model');
    }
  

public function index()
{


$institution_id = $this->session->userdata('institution_id');
    $data = array();
    $data['active'] = "applications";
    $data['title'] = "Applications List"; 

    $data['groups'] = $this->field_settings_model->get_institution_groups($institution_id);

    if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $search_app_id = $this->input->post('search_app_id', TRUE);
        $search_group_id = $this->input->post('search_group_id', TRUE);
        
        $this->session->set_userdata('search_app_id', $search_app_id);
        $this->session->set_userdata('search_group_id', $search_group_id);
    }
    $search_app_id = $this->session->userdata('search_app_id');
    $search_group_id = $this->session->userdata('search_group_id');

    $total_rows = $this->field_settings_model->count_filtered_entity_field($institution_id, $search_app_id, $search_group_id);

    $this->pagination->initialize([
        "total_rows" => $total_rows,
        "per_page"   => 10,
        "action"     => base_url("cardManagement/fieldSettings/list"),
        "page_field" => "page",
        "label"      => "entries",
    ]);
    $pagination = $this->pagination->get_data();

    $data["allPdt"] = $this->field_settings_model->get_filtered_entity_field(
        $institution_id,
        $pagination["per_page"], 
        $pagination["offset"],
        $search_app_id,
        $search_group_id
    );
    
    $data = array_merge($data, $pagination);
    $data['search_app_id'] = $search_app_id;
    $data['search_group_id'] = $search_group_id;
    $data['content'] = $this->load->view("applications/index", $data, TRUE);
    $this->load->view('layout/master', $data);

}

public function view($id)
{
if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $post_values = $this->input->post('field_values');
        
     
        if (!empty($post_values)) {
            foreach ($post_values as $value_id => $value) {
                $this->db->where('id', $value_id);
                $this->db->where('entity_field_id', $id);
                $this->db->update('entity_field_values', array('field_value' => $value));
            }
        }

        if (!empty($_FILES['file_values']['name'])) {
            foreach ($_FILES['file_values']['name'] as $value_id => $file_name) {
                if (!empty($file_name)) {
                    $_FILES['userfile']['name']     = $_FILES['file_values']['name'][$value_id];
                    $_FILES['userfile']['type']     = $_FILES['file_values']['type'][$value_id];
                    $_FILES['userfile']['tmp_name'] = $_FILES['file_values']['tmp_name'][$value_id];
                    $_FILES['userfile']['error']    = $_FILES['file_values']['error'][$value_id];
                    $_FILES['userfile']['size']     = $_FILES['file_values']['size'][$value_id];

                    $upload_path = './uploads/submissions/';
                    if (!is_dir($upload_path)) {
                        mkdir($upload_path, 0777, TRUE);
                    }

                    $config['upload_path']   = $upload_path;
                    $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
                    $config['max_size']      = 12048;
                    $config['file_name']     = 'file_' . time() . '_' . mt_rand(1000, 9999);

                    $this->load->library('upload', NULL, 'custom_upload'); 
                    $this->custom_upload->initialize($config);

                    if ($this->custom_upload->do_upload('userfile')) {
                        $upload_data = $this->custom_upload->data();
                        $file_path = 'uploads/submissions/' . $upload_data['file_name'];

                        $old_file = $this->db->get_where('entity_field_values', array('id' => $value_id))->row();
                        if ($old_file && !empty($old_file->field_value) && file_exists($old_file->field_value)) {
                            @unlink($old_file->field_value);
                        }

                        $this->db->where('id', $value_id);
                        $this->db->where('entity_field_id', $id);
                        $this->db->update('entity_field_values', array('field_value' => $file_path));
                    }
                }
            }
        }
        
        $this->session->set_flashdata('success', 'Data updated successfully!');
        redirect('cardManagement/applications/view/' . $id);
    }
if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $post_values = $this->input->post('field_values');
        
        $this->field_settings_model->update_entity_field_values($id, $post_values);
        
        $this->session->set_flashdata('success', 'Data updated successfully!');
        redirect('cardManagement/applications/view/' . $id);
    }
    $data = array();
    $data['title'] = "Edit Field Values";
     $data['active'] = "applications";
    $data['field_values'] = $this->field_settings_model->get_entity_field_values($id);
    $data['entity_field'] = $this->db->get_where('entity_field', array('id' => $id))->row();

    $data['content'] = $this->load->view("applications/view", $data, TRUE);
    $this->load->view('layout/master', $data);

}
public function reset_search() {
    $this->session->unset_userdata('search_app_id');
    $this->session->unset_userdata('search_group_id');
    redirect('cardManagement/applications');
}


public function delete($id)
{
    $result = $this->field_settings_model->delete_entity_field($id);

    if ($result) {
        $this->session->set_flashdata('success', 'Record and associated files deleted successfully!');
    } else {
        $this->session->set_flashdata('error_message', 'Failed to delete record or unauthorized access!');
    }

    redirect('cardManagement/applications');
}
}