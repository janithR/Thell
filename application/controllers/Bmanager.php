<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bmanager extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('bmanager_m','person');
    }

    public function Index(){
        $this->load->view('Includes/header');
        $this->load->view('pages/BManager/login');
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

            $this->load->model('bmanager_m');
            if ($this->bmanager_m->can_login($email, $password)){

                $res = $this->bmanager_m->get_data($email);

                $email = $res[0]->email;
                $branch_id =$res[0]->branch_id;
              
                $session_data = array(
                    'email' => $email,
                    'branch_id' => $branch_id
                    
                );
                $this->session->set_userdata($session_data);
                redirect(base_url().'Bmanager/enter');
            }else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">Invalid email or password!</div>');
                redirect(base_url().'Bmanager');
            }

        }else{
            //false
            $this->Index();
        }
    }

    function enter(){
        if ($this->session->userdata('email') != ''){
            $email = $this->session->userdata('email');
            $this->load->model('bmanager_m');
            $data = $this->bmanager_m->get_data($email);
            $this->load->view('pages/Bmanager/BManager_dashboard',$data);
        } else {
            redirect(base_url().'Bmanager');
        }
    }

    function logout(){
        $this->session->unset_userdata('email');
        redirect(base_url().'');
    }


     public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->bm_name;
            $row[] = $person->nic;
            $row[] = $person->address;
            $row[] = $person->email;
            $row[] = $person->password;
            $row[] = $person->branch_id;
            $row[] = $person->username;
            $row[] = $person->tel;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->bm_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->bm_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->bm_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->person->count_all(),
            "recordsFiltered" => $this->person->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($bm_id)
    {
        $data = $this->person->get_by_id($bm_id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'bm_name' => $this->input->post('bm_name'),
            'nic' => $this->input->post('nic'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'branch_id' => $this->input->post('branch_id'),
            'username' => $this->input->post('username'),
            'tel' => $this->input->post('tel'),
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $data = array(
            'bm_name' => $this->input->post('bm_name'),
            'nic' => $this->input->post('nic'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'branch_id' => $this->input->post('branch_id'),
            'username' => $this->input->post('username'),
            'tel' => $this->input->post('tel'),
        );
        $this->person->update(array('bm_id' => $this->input->post('bm_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($bm_id)
    {
        $this->person->delete_by_id($bm_id);
        echo json_encode(array("status" => TRUE));
    }

    public function list_by_id($bm_id){

        $data['output'] = $this->person->get_by_id_view($bm_id);
        $this->load->view('Pages/Admin/view_addBmanager', $data);
    }


}    