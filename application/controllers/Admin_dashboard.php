<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Admin_m','person');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('Pages/Admin/dashboard');
    }

    function employers(){
        $this->load->view('Pages/Admin/employers');
    }

    function interns(){
        $this->load->view('Pages/Admin/interns');
    }

    function jobapplicants(){
        $this->load->view('Pages/Admin/jobapplicants');
    }

    function selection_interns(){
        $this->load->view('Pages/Admin/internSelections');
    }

    function selection_jobapplicants(){
        $this->load->view('Pages/Admin/jobSelections');
    }

    function notifications(){
        $this->load->view('Pages/Admin/notifications');
    }

    function navigation_bar(){
        $this->load->view('Pages/Admin/navigation_bar');
    }

    function addAdmin(){
        $this->load->view('Pages/Admin/addAdmin');
    }

    function addBranch(){
        $this->load->view('Pages/Admin/addBranch');
    }

    function addBmanager(){
        $this->load->view('Pages/Admin/addBmanager');
    }

    function addSupplier(){
        $this->load->view('Pages/Admin/addSupplier');
    }

    function jobs(){
        $this->load->view('Pages/Admin/jobapplicants');
    }

    public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->username;
            $row[] = $person->email;
            $row[] = $person->password;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->admin_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->admin_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->admin_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

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

    public function ajax_edit($admin_id)
    {
        $data = $this->person->get_by_id($admin_id);
        echo json_encode($data);
    }

    public function ajax_add()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );
        $this->person->update(array('admin_id' => $this->input->post('admin_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($admin_id)
    {
        $this->person->delete_by_id($admin_id);
        echo json_encode(array("status" => TRUE));
    }

    public function list_by_id($admin_id){

        $data['output'] = $this->person->get_by_id_view($admin_id);
        $this->load->view('Pages/Admin/view_addAdmin', $data);
    }
}