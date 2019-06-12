<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BManager_dashboard extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('bmanager_m','person');
    }

	/*public function Profile()
	{
		$this->load->view('BManager/Profile');
	}*/

	public function Stock_Count()
	{
		$this->load->view('pages/BManager/Stock_Count');
    }
    
    public function Add_tanks()
	{
		$this->load->view('pages/BManager/Add_tanks');
	}

	public function Price_List()
	{
		$this->load->view('pages/BManager/Price_List');
	}

	/*public function Request_Fuel()
	{
		$this->load->view('pages/BManager/Request_Fuel');
	}*/

    public function Request_Fuel(){
        $email = $this->session->userdata('email');
        $this->load->model('bmanager_m');
        $data = $this->bmanager_m->get_dataNew($email);
        $data['groups'] = $this->bmanager_m->getAllGroups();
        $data['sup'] = $this->bmanager_m->getAllSup();
        $this->load->view('Pages/Bmanager/Fuel_Request',$data);
    }

    public function Notification()
	{
        $this->load->model('s_request_m');
		$data['list'] = $this->s_request_m->getRequestConfirmed();
		
		$this->load->view('pages/BManager/Supplier_Notification',$data);
	}

	public function Report()
	{       
		$this->load->view('pages/fuel');
	}

	public function Add_Employee()
	{
		$this->load->view('pages/BManager/Add_Employee');
	}

	/*public function View_Employee()
	{
		$this->load->view('BManager/View_Employee');
	}

	public function Block_Employee()
	{
		$this->load->view('BManager/Block_Employee');
	}*/

	/*public function Emp_list()
    {
        $list = $this->person->get_datatables();
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
        $data = array(
            'name' => $this->input->post('name'),
            'nic' => $this->input->post('nic'),
            'tel' => $this->input->post('tel'),
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function Emp_update()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'nic' => $this->input->post('nic'),
            'tel' => $this->input->post('tel'),
        );
        $this->person->update(array('emp_id' => $this->input->post('emp_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function Emp_delete($emp_id)
    {
        $this->person->delete_by_id($emp_id);
        echo json_encode(array("status" => TRUE));
    }

    public function Emp_list_by_id($emp_id){

        $data['output'] = $this->person->get_by_id_view($emp_id);
        $this->load->view('BManager/View_add_employee', $data);
    }*/
}