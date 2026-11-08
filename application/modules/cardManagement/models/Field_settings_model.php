<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Field_settings_model extends CI_Model {


public function count_groups() {
        $institution_id = $this->session->userdata('institution_id');
        $this->db->from('institution_field_groups');
        $this->db->where('institution_field_groups.institution_id', $institution_id);
        
        return $this->db->count_all_results();
    }

    public function get_groups( $limit, $start) {
        $institution_id = $this->session->userdata('institution_id');
        $this->db->select('*');
        $this->db->from('institution_field_groups');
        $this->db->where('institution_field_groups.institution_id', $institution_id);
        
      

        // if (!empty($search)) {
        //     $this->db->like('name', $search);
        // }

      
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result();
    }



    // সব মাস্টার ফিল্ড এবং বর্তমান গ্রুপের সেভ করা সেটিংস একসাথে আনা
    public function get_fields_with_settings($group_id) {
        $this->db->select('fm.*, ifs.is_required, ifs.sort_order, ifs.group_id as assigned_group');
        $this->db->from('fields_master fm');
        $this->db->join('institution_field_settings ifs', 'fm.id = ifs.field_id AND ifs.group_id = ' . $this->db->escape($group_id), 'left');
        return $this->db->get()->result_array();
    }

    // সেটিংস সেভ করা
    public function save_institution_settings($group_id, $selected_fields) {
        $batch_data = [];

        if (!empty($selected_fields)) {
            foreach ($selected_fields as $field_id => $data) {
                // যদি ফিল্ডটি সিলেক্ট করা থাকে (টগল অন থাকে)
                if (isset($data['selected']) && $data['selected'] == 1) {
                    $batch_data[] = [
                        'group_id'     => $group_id,
                        'field_id'     => $field_id,
                        'is_required'  => isset($data['is_required']) ? 1 : 0,
                        'sort_order'   => !empty($data['sort_order']) ? (int)$data['sort_order'] : 0,
                        'created_at'   => date('Y-m-d H:i:s')
                    ];
                }
            }
        }

        // **নতুন লজিক:** যদি একটি ফিল্ডও সিলেক্ট করা না থাকে, তবে সেভ না করে false রিটার্ন করবে
        if (empty($batch_data)) {
            return false; 
        }

        // প্রথমে এই গ্রুপের আগের সব সেটিংস ডিলিট করে দেব, যাতে নতুন সিলেকশন ফ্রেশভাবে সেভ হয়
        $this->db->where('group_id', $group_id)->delete('institution_field_settings');

        // ডেটা ইনসার্ট করা
        return $this->db->insert_batch('institution_field_settings', $batch_data);
    }
}