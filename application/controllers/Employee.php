<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Employee_model','person');
    }

    /*public function index()
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

    function jobs(){
        $this->load->view('Pages/Admin/jobapplicants');
    }*/

    public function Emp_list()
    {
         $id = $this->session->userData('branch_id');


        $list = $this->person->getEmployee($id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->name;
            $row[] = $person->nic;
            $row[] = $person->tel;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->emp_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->emp_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->emp_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

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

    public function Emp_edit($emp_id)
    {
        $data = $this->person->get_by_id($emp_id);
        echo json_encode($data);
    }

    public function Emp_add()
    {

        $data['title'] = 'Add Employee';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|alpha');
        $this->form_validation->set_rules('nic', 'NIC', 'required|callback_check_nic_validation');
        $this->form_validation->set_rules('tel', 'Telephone', 'required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('branch_id', 'Branch ID', 'required|numeric'); 

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/BManager/Add_Employee');

        }else{   

        $data = array(
            'name' => $this->input->post('name'),
            'nic' => $this->input->post('nic'),
            'tel' => $this->input->post('tel'),
            'address' => $this->input->post('address'),
            'branch_id' => $this->input->post('branch_id'),
        );
        
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }
    }

    public function Emp_update()
    {

        $data['title'] = 'Add Employee';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|alpha');
        //$this->form_validation->set_rules('nic', 'NIC', 'required|is_unique[employee.nic]|callback_check_nic_validation');
        $this->form_validation->set_rules('nic', 'NIC', 'required|callback_check_nic_validation');
        $this->form_validation->set_rules('tel', 'Telephone', 'required|numeric');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('branch_id', 'Branch ID', 'required|numeric'); 

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/BManager/Add_Employee');

        }else{ 

        $data = array(
            'name' => $this->input->post('name'),
            'nic' => $this->input->post('nic'),
            'tel' => $this->input->post('tel'),
            'address' => $this->input->post('address'),
            'branch_id' => $this->input->post('branch_id'),
        );
        var_dump($data);
        $this->person->update(array('emp_id' => $this->input->post('emp_id')), $data);
        echo json_encode(array("status" => TRUE));
    }    
    }

    public function Emp_delete($emp_id)
    {
        $this->person->delete_by_id($emp_id);
        echo json_encode(array("status" => TRUE));
    }

    public function Emp_list_by_id($emp_id){

        $data['output'] = $this->person->get_by_id_view($emp_id);
        $this->load->view('pages/BManager/View_add_employee', $data);
    }

    public function check_nic_validation($nic){
        $this->form_validation->set_message('check_nic_validation', 'NIC length should be 10 or 12.Please recheck your NIC ');
        $len=strlen($nic);
        $new=substr($nic, 0, -1);
        if (($len==10)&&(is_numeric($new))){
            if(($nic[9]=="v")||($nic[9]=="V")) {
                return true;
            }
            else{
                return false;
            }
        }
        elseif(($len==12)&&(is_numeric($nic))){
            return true;
        }
        else{
            return false;
        }

    }
}