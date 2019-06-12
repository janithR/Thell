<!--<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BManagerPagers extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Bmanager_model','person');
    }

	/*public function Profile()
	{
		$this->load->view('BManager/Profile');
	}*/

	public function Stock_Count()
	{
		$this->load->view('BManager/Stock_Count');
	}

	/*public function Price_List()
	{
		$this->load->view('BManager/Price_List');
	}*/

	public function Request_Fuel()
	{
        $data['groups'] = $this->price_list_model->getAllGroups();
        $this->load->view('BManager/Request_Fuel', $data);
	}

	/*public function Supplier_Notification()
	{
		$this->load->view('BManager/Supplier_Notification');
	}

	public function Report()
	{
		$this->load->view('BManager/Report');
	}*/

	public function Add_Employee()
	{
		$this->load->view('BManager/Add_Employee');
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