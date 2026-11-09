<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormPortal extends CI_Controller {

 public function index($company_slug, $form_slug) {
      $data = array();
     $data['active'] = "custom_404";
     $data['title'] = "404"; 
        
        $result = $this->main_model->get_form_details($company_slug, $form_slug);

        if (!$result) {
             redirect('error_404'); 
            return;
        }

        $data['company'] = $result['company'];
        $data['form']    = $result['form'];
      $data['grouped_fields'] = $this->main_model->get_public_fields_with_categories($result['form']->id);
        $data['content'] = $this->load->view("frontend/home/form", $data, TRUE);
        $this->load->view('frontend/layouts/master', $data);
    }

public function submit() {
    $institution_id = $this->input->post('institution_id');
    $form_group_id  = $this->input->post('form_group_id');
    $custom_fields  = $this->input->post('custom_fields'); 
    
   
    $this->db->select('fm.id, fm.field_key, fm.field_label_bn, ifs.is_required');
    $this->db->from('institution_field_settings ifs');
    $this->db->join('fields_master fm', 'fm.id = ifs.field_id', 'inner');
    $this->db->where('ifs.group_id', $form_group_id);
    $this->db->where('ifs.is_required', 1);
    $required_fields = $this->db->get()->result();

    $errors = [];
    foreach ($required_fields as $rf) {
        $field_key = $rf->field_key;
        
        $is_text_empty = (!isset($custom_fields[$field_key]) || trim($custom_fields[$field_key]) === '');
      
        $is_file_empty = (!isset($_FILES['custom_fields']['name'][$field_key]) || empty($_FILES['custom_fields']['name'][$field_key]));

        if ($is_text_empty && $is_file_empty) {
            $errors[] = "অনুগ্রহ করে বাধ্যতামূলক ক্ষেত্রটি পূরণ করুন: <b>" . $rf->field_label_bn . "</b>";
        }
    }

    if (!empty($errors)) {
        $this->session->set_flashdata('old_input', $custom_fields);
        $this->session->set_flashdata('error_message', implode('<br>', $errors));
        
        redirect($_SERVER['HTTP_REFERER']);
        return;
    }

    $this->db->trans_start();
   
    $application_id = 'SUB-' . strtoupper(uniqid());

   
    $upload_path = './uploads/submissions/';
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0777, TRUE);
    }
    $data = array(
        'institution_id'    => $institution_id,
        'application_id'    => $application_id,
        'field_groups_id'   => $form_group_id,
        'status'            => 1,
    );
    $this->common_model->save_data("entity_field", $data);
    $entity_field_id = $this->common_model->Id;

    if (!empty($custom_fields)) {
        foreach ($custom_fields as $field_key => $value) {
            $field_info = $this->db->where('field_key', $field_key)->get('fields_master')->row();
            
            if ($field_info) {
                if ($field_info->field_type != 'file' && $field_info->field_type != 'image') {
                    $insert_data = [
                        'entity_field_id' => $entity_field_id,
                        'field_id'        => $field_info->id,
                        'field_value'     => is_array($value) ? json_encode($value) : $value
                    ];
                    $this->db->insert('entity_field_values', $insert_data);
                }
            }
        }
    }

    if (!empty($_FILES['custom_fields']['name'])) {
        foreach ($_FILES['custom_fields']['name'] as $field_key => $file_name) {
            if (!empty($file_name)) {
                
                $field_info = $this->db->where('field_key', $field_key)->get('fields_master')->row();
                
                if ($field_info && ($field_info->field_type == 'file' || $field_info->field_type == 'image')) {
                    
                    $_FILES['userfile']['name']     = $_FILES['custom_fields']['name'][$field_key];
                    $_FILES['userfile']['type']     = $_FILES['custom_fields']['type'][$field_key];
                    $_FILES['userfile']['tmp_name'] = $_FILES['custom_fields']['tmp_name'][$field_key];
                    $_FILES['userfile']['error']    = $_FILES['custom_fields']['error'][$field_key];
                    $_FILES['userfile']['size']     = $_FILES['custom_fields']['size'][$field_key];

                    $config['upload_path']   = $upload_path;
                    $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
                    $config['max_size']      = 12048; 
                    $config['file_name']     = 'file_' . time() . '_' . mt_rand(1000, 9999);

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('userfile')) {
                        $upload_data = $this->upload->data();
                        $file_path = 'uploads/submissions/' . $upload_data['file_name'];

                        $insert_data = [
                            'entity_field_id' => $entity_field_id,
                            'field_id'        => $field_info->id,
                            'field_value'     => $file_path
                        ];
                        $this->db->insert('entity_field_values', $insert_data);
                    } else {
                        // $upload_error = $this->upload->display_errors('', '');
                        // $this->session->set_flashdata('error_message', 'ফাইল আপলোড ব্যর্থ হয়েছে: ' . $upload_error);
                        // $this->db->trans_rollback();
                        // redirect($_SERVER['HTTP_REFERER']);
                        // return;
                    }
                }
            }
        }
    }

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback(); 
        
        $this->session->set_flashdata('error_message', 'দুঃখিত, সার্ভারে কোনো প্রযুক্তিগত সমস্যার কারণে তথ্য সংরক্ষণ করা সম্ভব হয়নি। অনুগ্রহ করে আবার চেষ্টা করুন।');
        redirect($_SERVER['HTTP_REFERER']);
        return;
    }

    $this->session->set_flashdata('success', 'আপনার তথ্য সফলভাবে জমা হয়েছে! আপনার আবেদন আইডি: ' . $application_id);
    redirect('FormPortal/success/' . $application_id);
}

public function success($application_id = '') {
    $data = array();
    
    $data['application_id'] = $application_id;
    
    $data['content'] = $this->load->view("frontend/home/success", $data, TRUE);
    $this->load->view('frontend/layouts/master', $data);
}
}
