<?php
class Fieldgroups extends CI_Controller
{
  public function __construct() {
        parent::__construct();
        $this->load->model('field_settings_model');
    }
  

public function index()
{


    $data = array();
    $data['active'] = "field_groups";
    $data['title'] = "Field Groups"; 
    $total_rows = $this->field_settings_model->count_groups();

        $this->pagination->initialize([
            "total_rows" => $total_rows,
            "per_page"   => 10,
            "action"     => base_url("main/notice"),
            "page_field" => "page",
            "label"      => "entries",
        ]);
        $pagination = $this->pagination->get_data();

        $data["allPdt"] = $this->field_settings_model->get_groups(
            
            $pagination["per_page"], 
            $pagination["offset"]
        );
        
    $data = array_merge($data, $pagination);
    $data['content'] = $this->load->view("field_groups/index", $data, TRUE);
    $this->load->view('layout/master', $data);

}

public function create()
{

    $data = array();
    $data['active'] = "field_groups";
    $data['title'] = "Field Groups"; 
    $data['allMou'] = $this->common_model->view_data("module_types", "", "id", "asc");
   $data['content'] = $this->load->view("field_groups/create", $data, TRUE);
   $this->load->view('layout/master', $data);

}
public function insert() {
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('module_id', 'Module', 'required|trim');
    
    if ($this->form_validation->run() == FALSE) {
        $this->create(); 
    } else {

        $title = $this->input->post('title', TRUE);
        
        $slug = $this->main_model->create_unique_slug($title,"institution_field_groups");

       
          //short link
           $institution_id = $this->session->userdata('institution_id');
            $inst = $this->main_model->get_institutions_slug_by_id($institution_id);
             $long_url = base_url() . 'form/' . $inst."/".$slug;

            $short_link = get_short_qr_link($slug, $long_url, 'institution_field_groups');

            //

        $data = array(
            'institution_id'       => $this->session->userdata('institution_id'), 
            'module_id'            => $this->input->post('module_id', TRUE),
            'title'                => $this->input->post('title', TRUE),
            'slug'                 => $slug,
            'description'          => $this->input->post('description', TRUE),
            'status'               => $this->input->post('status', TRUE),
            'form_language'        => $this->input->post('form_language', TRUE),
            'short_url'            => $short_link,
            'issue_date'           => strtotime($this->input->post('issue_date', TRUE)),
            'created_by'           => $this->session->userdata('login_id'), 
            
        );



        if ($this->common_model->save_data("institution_field_groups", $data)) {
            $id  = $this->common_model->Id;
            


            $this->session->set_flashdata('success', 'প্রতিষ্ঠান সফলভাবে যুক্ত করা হয়েছে!');
            redirect('cardManagement/fieldgroups/create');
        } else {
            $this->session->set_flashdata('error', 'কিছু সমস্যা হয়েছে, আবার চেষ্টা করুন।');
            redirect('cardManagement/fieldgroups/create');
        }
    }
}


}


