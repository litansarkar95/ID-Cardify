<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Badgemake extends CI_Controller
{
    private $institution_id;

    public function __construct()
    {
        parent::__construct();
        $this->institution_id = (int) $this->session->userdata('institution_id');
        if (!$this->institution_id) {
            redirect('login');
        }
        $this->load->model('Badge_model');
    }

    // সেভ করা ডিজাইনের তালিকা
    public function index()
    {
        $data['active']  = 'badge_make';
        $data['title']   = 'Badge Make';
        $data['designs'] = $this->Badge_model->get_designs($this->institution_id);
        $data['content'] = $this->load->view('badge_make/index', $data, TRUE);
        $this->load->view('layout/master', $data);
    }

    // create → ফর্ম সিলেক্ট | create/16 → নতুন | create/16/5 → সেভ করা ডিজাইন এডিট
    public function create($group_id = NULL, $design_id = NULL)
    {
        $data['active'] = 'badge_make';
        $data['title']  = 'Badge Make';

        if (!$group_id) {
            $data['groups']  = $this->Badge_model->get_groups($this->institution_id);
            $data['content'] = $this->load->view('badge_make/select_group', $data, TRUE);
            return $this->load->view('layout/master', $data);
        }

        $group = $this->Badge_model->get_group((int) $group_id, $this->institution_id);
        if (!$group) {
            show_404();
        }

        $design = NULL;
        $selected = [];
        if ($design_id) {
            $design = $this->Badge_model->get_design((int) $design_id, $this->institution_id);
            if (!$design || $design->group_id != $group->id) {
                show_404();
            }
            $selected = $this->Badge_model->get_design_field_ids($design->id);
        }

        // সিলেক্ট করা ফিল্ড আগে (ক্রমে), বাকিগুলো পরে
        $all = $this->Badge_model->get_group_fields($group->id);
        $byId = [];
        foreach ($all as $f) { $byId[$f->id] = $f; }
        $ordered = [];
        foreach ($selected as $fid) {
            if (isset($byId[$fid])) { $ordered[] = $byId[$fid]; unset($byId[$fid]); }
        }
        foreach ($byId as $f) { $ordered[] = $f; }

        $data['group']      = $group;
        $data['design']     = $design;
        $data['selected']   = $design ? $selected : array_map(function ($f) { return $f->id; }, $all);
        $data['fields']     = $ordered;
        $data['templates']  = $this->Badge_model->get_templates($group->module_id);
        $data['content']    = $this->load->view('badge_make/create', $data, TRUE);
        $this->load->view('layout/master', $data);
    }

    // AJAX: প্রিভিউ
    public function preview()
    {
        if (!$this->input->is_ajax_request()) { show_404(); }

        $group    = $this->Badge_model->get_group((int) $this->input->post('group_id'), $this->institution_id);
        $template = $this->Badge_model->get_template((int) $this->input->post('template_id'));
        if (!$group || !$template) {
            return $this->output->set_status_header(404)->set_output('Not found');
        }

        $field_ids = array_map('intval', (array) $this->input->post('field_ids'));

        $data['tpl']      = $template;
        $data['elements'] = $this->Badge_model->get_elements($template->id);
        $data['inst']     = $this->Badge_model->get_institution($this->institution_id);
        $data['data']     = $this->Badge_model->build_demo_data($group->id, $this->institution_id, $field_ids);
        $this->load->view('badge_make/card_render', $data);
    }

    // AJAX: ডিজাইন সেভ
    public function save()
    {
        if (!$this->input->is_ajax_request()) { show_404(); }

        $group_id    = (int) $this->input->post('group_id');
        $template_id = (int) $this->input->post('template_id');
        $design_id   = (int) $this->input->post('design_id');
        $title       = trim($this->input->post('title', TRUE));
        $field_ids   = array_map('intval', (array) $this->input->post('field_ids'));

        $ok = $this->Badge_model->get_group($group_id, $this->institution_id)
           && $this->Badge_model->get_template($template_id)
           && $title !== '' && count($field_ids) > 0;

        if (!$ok) {
            return $this->output->set_content_type('application/json')
                ->set_output(json_encode(['ok' => false, 'msg' => 'টাইটেল, টেমপ্লেট ও কমপক্ষে একটি ফিল্ড দিন']));
        }

        $id = $this->Badge_model->save_design(
            $this->institution_id, (int) $this->session->userdata('user_id'),
            $design_id, $group_id, $template_id, $title, $field_ids
        );

        $this->output->set_content_type('application/json')
            ->set_output(json_encode(['ok' => (bool) $id, 'id' => $id]));
    }

    public function delete($id)
    {
        $this->Badge_model->delete_design((int) $id, $this->institution_id);
        redirect('badgemake');
    }
}