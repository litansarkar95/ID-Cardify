<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

public function create_unique_slug($title, $table) {
    $base_slug = create_slug_from_bengali($title);
    $slug = $base_slug;
    $counter = 1;

    while ($this->slug_exists($slug, $table)) {
        $slug = $base_slug . '-' . $counter;
        $counter++;
    }

    return $slug;
}

public function slug_exists($slug, $table) {
    $this->db->where('slug', $slug);
    $query = $this->db->get($table);
    return $query->num_rows() > 0;
}

public function get_form_details($company_slug, $form_slug) {
 
    $company = $this->db->get_where('institutions', array('slug' => $company_slug))->row();
    
    if (!$company) {
        return null; 
    }

    // $this->db->join('modules', 'modules.id = institution_field_groups.module_id', 'left');
    
    $this->db->where('institution_id', $company->id);
    $this->db->where('slug', $form_slug);
    $form = $this->db->get('institution_field_groups')->row();

    if (!$form) {
        return null; 
    }

    return array(
        'company' => $company,
        'form'    => $form
    );
}
 public function get_public_fields_with_categories($group_id) {
        $categories = $this->db->order_by('sort_order', 'ASC')->get('field_categories')->result();
        
        $result = [];
        foreach ($categories as $cat) {
            // লক্ষ করুন: এখানে ifs.show_placeholder বাদ দেওয়া হয়েছে, কারণ এটি এখন ফর্ম গ্রুপ টেবিলে আছে
            $this->db->select('fm.*, ifs.is_required, ifs.sort_order');
            $this->db->from('institution_field_settings ifs');
            $this->db->join('fields_master fm', 'fm.id = ifs.field_id', 'inner');
            $this->db->where('ifs.group_id', $group_id);
            $this->db->where('fm.category_id', $cat->id);
            $this->db->order_by('ifs.sort_order', 'ASC');
            $fields = $this->db->get()->result_array();

            if (!empty($fields)) {
                $result[] = [
                    'category_info' => $cat,
                    'fields'        => $fields
                ];
            }
        }
        return $result;
    }

    // ২. ড্রপডাউন অপশনগুলো ডাইনামিক্যালি ফেচ করার মেথড (এটিতে কোনো পরিবর্তন লাগবে না)
    public function get_dropdown_options($institution_id, $field_key) {
        // প্রথমে প্রতিষ্ঠানের নিজস্ব অপশন চেক করা
        $this->db->where('institution_id', $institution_id);
        $this->db->where('field_key', $field_key);
        $this->db->order_by('sort_order', 'ASC');
        $query = $this->db->get('field_options');
        
        // না থাকলে গ্লোবাল (institution_id = 0) অপশন আনা
        if ($query->num_rows() == 0) {
            $this->db->where('institution_id', 0);
            $this->db->where('field_key', $field_key);
            $this->db->order_by('sort_order', 'ASC');
            $query = $this->db->get('field_options');
        }
        
        return $query->result();
    }
}