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


public function count_entity_field($id, $search = null) {
        $institution_id = $this->session->userdata('institution_id');
        $this->db->from('entity_field');
        $this->db->where('entity_field.institution_id', $institution_id);
        $this->db->where('entity_field.field_groups_id', $id);
        if (!empty($search)) {
        $this->db->like('entity_field.application_id', $search);
    }
        return $this->db->count_all_results();
    }

public function get_entity_field($id, $limit, $start, $search = null) {
    $institution_id = $this->session->userdata('institution_id');
    
    $this->db->select('entity_field.*, institution_field_groups.title as group_title');
    $this->db->from('entity_field');
    $this->db->join('institution_field_groups', 'institution_field_groups.id = entity_field.field_groups_id', 'left');
    
    $this->db->where('entity_field.institution_id', $institution_id);
    $this->db->where('entity_field.field_groups_id', $id);
    // if (!empty($search)) {
    //     $this->db->like('entity_field.application_id', $search);
    // }
    $this->db->order_by('entity_field.id', 'DESC');
    $this->db->limit($limit, $start);

    $query = $this->db->get();
    return $query->result();
}

public function get_group_info($id) {
    return $this->db->get_where('institution_field_groups', array('id' => $id))->row();
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
public function get_entity_field_values($entity_field_id) {
    $this->db->select('entity_field_values.*, fields_master.field_label_en, fields_master.field_label_bn, fields_master.field_type, fields_master.field_key');
    $this->db->from('entity_field_values');
    $this->db->join('fields_master', 'fields_master.id = entity_field_values.field_id', 'left');
    $this->db->where('entity_field_values.entity_field_id', $entity_field_id);
    
    $query = $this->db->get();
    return $query->result();
}

public function update_entity_field_values($entity_field_id, $post_data) {
    if (!empty($post_data)) {
        foreach ($post_data as $value_id => $value) {
            $this->db->where('id', $value_id);
            $this->db->where('entity_field_id', $entity_field_id);
            $this->db->update('entity_field_values', array('field_value' => $value));
        }
        return TRUE;
    }
    return FALSE;
}

public function count_filtered_entity_field($institution_id, $search_app_id = null, $search_group_title = null) {
    $this->db->from('entity_field');
    $this->db->join('institution_field_groups', 'institution_field_groups.id = entity_field.field_groups_id', 'left');
    $this->db->where('entity_field.institution_id', $institution_id);
    
if (!empty($search_app_id)) {
    $this->db->like('entity_field.application_id', $search_app_id);
}
if (!empty($search_group_id)) {
    $this->db->where('entity_field.field_groups_id', $search_group_id);
}
    
    return $this->db->count_all_results();
}

public function get_filtered_entity_field($institution_id, $limit, $start, $search_app_id = null, $search_group_title = null) {
    $this->db->select('entity_field.*, institution_field_groups.title as group_title');
    $this->db->from('entity_field');
    $this->db->join('institution_field_groups', 'institution_field_groups.id = entity_field.field_groups_id', 'left');
    
    $this->db->where('entity_field.institution_id', $institution_id);
if (!empty($search_app_id)) {
    $this->db->like('entity_field.application_id', $search_app_id);
}
if (!empty($search_group_id)) {
    $this->db->where('entity_field.field_groups_id', $search_group_id);
}
    
    $this->db->order_by('entity_field.id', 'DESC');
    $this->db->limit($limit, $start);

    $query = $this->db->get();
    return $query->result();
}
public function get_institution_groups($institution_id) {
    $this->db->where('institution_id', $institution_id);
    $this->db->order_by('title', 'ASC');
    return $this->db->get('institution_field_groups')->result();
}

public function delete_entity_field($id) {
    $institution_id = $this->session->userdata('institution_id');

    $entity_field = $this->db->get_where('entity_field', array('id' => $id, 'institution_id' => $institution_id))->row();
    
    if (!$entity_field) {
        return FALSE;
    }

    $field_values = $this->db->get_where('entity_field_values', array('entity_field_id' => $id))->result();

    if (!empty($field_values)) {
        foreach ($field_values as $val) {
            if (!empty($val->field_value) && file_exists($val->field_value)) {
                @unlink($val->field_value); // সার্ভার থেকে ফাইল ডিলিট করা
            }
        }
        
        $this->db->where('entity_field_id', $id);
        $this->db->delete('entity_field_values');
    }

    $this->db->where('id', $id);
    $this->db->where('institution_id', $institution_id);
    $this->db->delete('entity_field');

    return TRUE;
}
}