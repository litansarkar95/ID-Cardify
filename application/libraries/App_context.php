<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_context {

    protected $CI;
    private $org_id = null;
    private $branch_id = null;
    private $branch_data = null; 

    public function __construct() {
        $this->CI =& get_instance();
        $this->init_public_context();
    }

   
    private function init_public_context() {
        $current_domain = $_SERVER['HTTP_HOST'];
        
        $this->CI->db->select('id,name,short_description, organization_id, timezone, currency, language, is_active, subscription_status, email, mobile_no,address,office_time,map_link,website,picture,signature,facebook,youtube,instagram,linkedin');
        $this->CI->db->from('branch');
        $this->CI->db->where('domain', $current_domain);
        $this->CI->db->where('is_active', 1);
        $this->CI->db->where('subscription_status', 1); 
        $query = $this->CI->db->get();

        if ($query->num_rows() > 0) {
            $branch = $query->row();
            $this->branch_id   = $branch->id;
            $this->org_id      = $branch->organization_id;
            $this->branch_data = $branch;

           $timezone = !empty($branch->timezone) ? $branch->timezone : 'Asia/Dhaka';
           date_default_timezone_set($timezone);
        } else {
         
            $this->org_id    = 1; 
            $this->branch_id = 1;
             date_default_timezone_set($branch->timezone ?? 'Asia/Dhaka');
        }
    }

    public function get_org_id() {
        return $this->org_id;
    }

    public function get_branch_id() {
        return $this->branch_id;
    }
    
    public function get_branch_info() {
        return $this->branch_data;
    }
}