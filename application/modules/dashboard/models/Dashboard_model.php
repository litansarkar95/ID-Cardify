<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    protected $org_id;
    protected $branch_id;

    public function __construct() {
        parent::__construct();
        $this->org_id    = org_id();
        $this->branch_id = active_branch_id();
    }

    public function count_students() {
        $this->db->where('organization_id', $this->org_id);
        $this->db->where('branch_id', $this->branch_id);
        $this->db->where('is_active', 1); 
        return $this->db->count_all_results('students');
    }

    public function count_teachers() {
        $this->db->where('organization_id', $this->org_id);
        $this->db->where('branch_id', $this->branch_id);
        $this->db->where('is_active', 1);
        $this->db->where('roles_id', 4); 
        return $this->db->count_all_results('staff');
    }

    public function count_subjects() {
        $this->db->where('organization_id', $this->org_id);
        $this->db->where('branch_id', $this->branch_id);
        $this->db->where('is_active', 1);
        return $this->db->count_all_results('subjects');
    }

    public function count_guardians() {
        $this->db->distinct();
        $this->db->select('guardian_id');
        $this->db->where('organization_id', $this->org_id);
        $this->db->where('branch_id', $this->branch_id);
        return $this->db->from('students')->count_all_results();
    }
}