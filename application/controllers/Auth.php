<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
    }

    public function login() {
         
        if ($this->session->userdata('is_logged_in')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('username', 'Username / Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            $credential = $this->Auth_model->get_credential($username, $password);

            if ($credential) {
                
                if ($credential->active == 0) {
                    $this->session->set_flashdata('error', 'আপনার অ্যাকাউন্টটি বর্তমানে নিষ্ক্রিয় (Deactivated) আছে!');
                    redirect('auth/login');
                }

                $user_profile = $this->Auth_model->getUserDetailsByRoleID($credential->role_id, $credential->user_id);

                if ($user_profile) {
                    $session_data = [
                        'login_id'       => $credential->id,
                        'user_id'        => $credential->user_id,
                        'reseller_id'    => $credential->reseller_id,     //
                        'institution_id' => $credential->institution_id,  // 
                        'role_id'        => $credential->role_id,
                        'name'           => $user_profile['name'] ?? '',
                        'email'          => $user_profile['email'] ?? '',
                        'mobile_no'      => $user_profile['mobile_no'] ?? '',
                        'picture'        => $user_profile['picture'] ?? '',
                        'user_type'      => $user_profile['user_type'] ?? '',
                        'is_logged_in'   => TRUE
                    ];

                    $this->session->set_userdata($session_data);

                    $this->db->where('id', $credential->id)->update('login_credential', [
                        'last_login'    => date('Y-m-d H:i:s'),
                        'last_login_ip' => $this->input->ip_address()
                    ]);

                    redirect('dashboard');

                } else {
                    $this->session->set_flashdata('error', 'ইউজারের মূল প্রোফাইল ডাটা পাওয়া যায়নি!');
                    redirect('auth/login');
                }

            } else {
                $this->session->set_flashdata('error', 'ভুল ইউজারনেম অথবা পাসওয়ার্ড!');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}