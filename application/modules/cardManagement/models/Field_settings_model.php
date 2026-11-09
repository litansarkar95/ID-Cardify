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



   public function get_fields_with_settings($group_id) {
       
        $categories = $this->db->order_by('sort_order', 'ASC')->get('field_categories')->result();
        
        $result = [];
        foreach ($categories as $cat) {
            $this->db->select('fm.*, ifs.is_required, ifs.sort_order, ifs.group_id as assigned_group');
            $this->db->from('fields_master fm');
            $this->db->join('institution_field_settings ifs', 'fm.id = ifs.field_id AND ifs.group_id = ' . $this->db->escape($group_id), 'left');
            $this->db->where('fm.category_id', $cat->id);
            $this->db->order_by('fm.id', 'ASC');
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

    public function save_institution_settings($group_id, $selected_fields) {
        $batch_data = [];
        if (!empty($selected_fields)) {
            foreach ($selected_fields as $field_id => $data) {
                if (isset($data['selected']) && $data['selected'] == 1) {
                    $batch_data[] = [
                        'group_id'    => $group_id,
                        'field_id'    => $field_id,
                        'is_required' => isset($data['is_required']) ? 1 : 0,
                        'sort_order'  => !empty($data['sort_order']) ? (int)$data['sort_order'] : 0,
                        'created_at'  => date('Y-m-d H:i:s')
                    ];
                }
            }
        }

        if (empty($batch_data)) {
            return false;
        }

        $this->db->where('group_id', $group_id)->delete('institution_field_settings');
        return $this->db->insert_batch('institution_field_settings', $batch_data);
    }

}