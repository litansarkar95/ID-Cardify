<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

   public function index() {
    $data = array();
    $data['active'] = "register";
    $data['title'] = "Register Page"; 
    $data['content'] = $this->load->view("frontend/register/index", $data, TRUE);
    $this->load->view('frontend/layouts/master', $data);
}
public function store() {
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('org_en', 'Institutional Name English', 'required|trim');
    $this->form_validation->set_rules('org_bn', 'Institutions Name Bangla', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required|trim');
    
    if ($this->form_validation->run() == FALSE) {
        $this->index(); 
    } else {

        $name = $this->input->post('org_en', TRUE);
        
        $slug = $this->create_unique_slug($name);

        //picture
        $picture_name = NULL;
        if (!empty($_FILES['photo']['name'])) {
            $config['upload_path']   = './uploads/institutions/'; 
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 5120; // 5vKB-
            $config['encrypt_name']  = FALSE; 

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {
                $upload_data  = $this->upload->data();
                $picture_name = $upload_data['file_name']; 
            }
        }

        $data = array(
            'reseller_id'       => $this->input->post('reseller_id') ? $this->input->post('reseller_id') : NULL,
            'name'              => $name,
            'name_bn'           => $this->input->post('org_bn', TRUE),
            'type'              => $this->input->post('type', TRUE),
            'slug'              => $slug,
            'mobile_no'         => $this->input->post('mobile_no', TRUE),
            'email'             => $this->input->post('email', TRUE),
            'website'           => $this->input->post('website', TRUE),
            'address'           => $this->input->post('address', TRUE),
            'signature_name'    => $this->input->post('signature_name', TRUE),
            'picture'           => $picture_name,
            'package_type'      => $this->input->post('package_type') ? $this->input->post('package_type') : 'free',
            'wallet_balance'    => 0.00,
            'is_active'         => 1,
            'create_date'       => time() 
        );


        $insert_id =  $this->common_model->save_data("institutions", $data);

        if ($insert_id) {
            $this->session->set_flashdata('success', 'প্রতিষ্ঠান সফলভাবে যুক্ত করা হয়েছে!');
            redirect('register');
        } else {
            $this->session->set_flashdata('error', 'কিছু সমস্যা হয়েছে, আবার চেষ্টা করুন।');
            redirect('register');
        }
    }
}

private function create_unique_slug($name) {

    $slug = url_title($name, 'dash', TRUE);
    $original_slug = $slug;
    $counter = 1;

    while ($this->main_model->slug_exists($slug)) {
        $slug = $original_slug . '-' . $counter;
        $counter++;
    }

    return $slug;
}
}
