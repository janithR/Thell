<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function Index(){
        $this->load->view('Includes/header');
        $this->load->view('Pages/Admin/Login');
    }

    function login_validation(){


    /*

    	$this->load->view('includes/Admin/header');
    	$this->load->view('pages/Admin/admin_profile');

    */

    	
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if($this->form_validation->run()){
            //true

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->model('Admin_m');
            if ($this->Admin_m->can_login($email, $password)){
                $session_data = array(
                    'email' => $email
                );
                $this->session->set_userdata($session_data);
                redirect(base_url().'Admin/enter');
            }else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Invalid email or password!</div>');
                redirect(base_url().'Admin');
            }

        }else{
            //false
            $this->Index();
        }
    }

    function enter(){
        if ($this->session->userdata('email') != ''){
            $email = $this->session->userdata('email');
            $this->load->model('Admin_m');
            $data = $this->Admin_m->get_data($email);
            $this->load->view('Pages/Admin/dashboard',$data);
        } else {
            redirect(base_url().'Admin');
        }
    }

    function logout(){
        $this->session->unset_userdata('email');
        redirect(base_url().'Admin');
    }
}    