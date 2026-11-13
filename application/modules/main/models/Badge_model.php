<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Badge_model extends CI_Model
{
    public function get_groups($institution_id)
    {
        return $this->db->where('institution_id', $institution_id)
            ->where('status', 1)->order_by('id', 'DESC')
            ->get('institution_field_groups')->result();
    }

    // institution_id মেলানো আছে, অন্যের ফর্ম দেখা যাবে না
    public function get_group($group_id, $institution_id)
    {
        return $this->db->get_where('institution_field_groups',
            ['id' => $group_id, 'institution_id' => $institution_id])->row();
    }

    public function get_institution($id)
    {
        return $this->db->get_where('institutions', ['id' => $id])->row();
    }

    public function get_group_fields($group_id)
    {
        return $this->db->select('fm.*, s.is_required')
            ->from('institution_field_settings s')
            ->join('fields_master fm', 'fm.id = s.field_id')
            ->where('s.group_id', $group_id)
            ->order_by('s.sort_order')->order_by('s.id')
            ->get()->result();
    }

    public function get_templates($module_id)
    {
        return $this->db->where('is_active', 1)
            ->where_in('module_id', [0, (int) $module_id])
            ->order_by('sort_order')->get('id_card_templates')->result();
    }

    public function get_template($id)
    {
        return $this->db->get_where('id_card_templates', ['id' => $id, 'is_active' => 1])->row();
    }

    public function get_elements($template_id)
    {
        return $this->db->where('template_id', $template_id)
            ->order_by('side')->order_by('sort_order')
            ->get('id_card_template_elements')->result();
    }

    // আলাদা এলিমেন্টে বসে যাওয়া ফিল্ড, field_list এ আবার আসবে না
    public function shown_keys($elements)
    {
        $keys = [];
        foreach ($elements as $e) {
            if ($e->source_type == 'field' && $e->element_type != 'field_list') {
                $keys[] = $e->source_key;
            }
        }
        return $keys;
    }

   // $field_ids দিলে শুধু ওই ফিল্ড, ওই ক্রমে
public function build_demo_data($group_id, $institution_id, $field_ids = NULL, $lang = 'en')
{
    $fields = $this->get_group_fields($group_id);

    if (is_array($field_ids)) {
        $byId = [];
        foreach ($fields as $f) { $byId[$f->id] = $f; }
        $fields = [];
        foreach ($field_ids as $fid) {
            if (isset($byId[$fid])) { $fields[] = $byId[$fid]; }   // ফর্মের বাইরের ফিল্ড বাদ
        }
    }

    $data = [];
    foreach ($fields as $f) {
        $v = ($lang == 'bn' && $f->demo_value_bn) ? $f->demo_value_bn : $f->demo_value_en;

        if (!$v && $f->field_type == 'select') {
            $opt = $this->db->where_in('institution_id', [0, $institution_id])
                ->where('field_key', $f->field_key)
                ->order_by('sort_order')->limit(1)
                ->get('field_options')->row();
            $v = $opt ? $opt->option_label : '';
        }

        $data[$f->field_key] = [
            'label' => ($lang == 'bn') ? $f->field_label_bn : $f->field_label_en,
            'value' => $v ?: '—',
            'type'  => $f->field_type,
        ];
    }
    return $data;   // PHP array ক্রম ধরে রাখে
}

public function get_designs($institution_id)
{
    return $this->db->select('d.*, g.title AS group_title, t.name AS template_name')
        ->from('badge_designs d')
        ->join('institution_field_groups g', 'g.id = d.group_id')
        ->join('id_card_templates t', 't.id = d.template_id')
        ->where('d.institution_id', $institution_id)
        ->order_by('d.id', 'DESC')->get()->result();
}

public function get_design($id, $institution_id)
{
    return $this->db->get_where('badge_designs', ['id' => $id, 'institution_id' => $institution_id])->row();
}

public function get_design_field_ids($design_id)
{
    $rows = $this->db->select('field_id')->where('design_id', $design_id)
        ->order_by('sort_order')->get('badge_design_fields')->result();
    return array_map('intval', array_column($rows, 'field_id'));
}

public function save_design($inst_id, $user_id, $design_id, $group_id, $template_id, $title, $field_ids)
{
    // শুধু এই ফর্মের ফিল্ড গ্রহণ করা হবে
    $valid = array_column($this->get_group_fields($group_id), 'id');
    $field_ids = array_values(array_unique(array_intersect($field_ids, array_map('intval', $valid))));
    if (!$field_ids) { return 0; }

    $this->db->trans_start();
    if ($design_id && $this->get_design($design_id, $inst_id)) {
        $this->db->where('id', $design_id)->update('badge_designs', [
            'template_id' => $template_id, 'title' => $title, 'updated_at' => time()
        ]);
        $this->db->where('design_id', $design_id)->delete('badge_design_fields');
    } else {
        $this->db->insert('badge_designs', [
            'institution_id' => $inst_id, 'group_id' => $group_id, 'template_id' => $template_id,
            'title' => $title, 'created_by' => $user_id, 'created_at' => time(), 'updated_at' => time()
        ]);
        $design_id = $this->db->insert_id();
    }
    $rows = [];
    foreach ($field_ids as $i => $fid) {
        $rows[] = ['design_id' => $design_id, 'field_id' => $fid, 'sort_order' => $i];
    }
    $this->db->insert_batch('badge_design_fields', $rows);
    $this->db->trans_complete();

    return $this->db->trans_status() ? $design_id : 0;
}

public function delete_design($id, $institution_id)
{
    if ($this->get_design($id, $institution_id)) {
        $this->db->where('design_id', $id)->delete('badge_design_fields');
        $this->db->where('id', $id)->delete('badge_designs');
    }
}
}