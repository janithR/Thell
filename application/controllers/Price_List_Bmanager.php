<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Price_List_Bmanager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Price_list_bmanager_model','person');
    }


    public function Price_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->s_name;
            $row[] = $person->fuel_type;
            $row[] = $person->unit_price;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->fuel_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->fuel_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->fuel_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

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

    /*public function Price_edit($fuel_id)
    {
        $data = $this->person->get_by_id($fuel_id);
        echo json_encode($data);
    }

    public function Price_add()
    {

        $data['title'] = 'Add Fuel';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fuel_type', 'Fuel Type', 'required');
        $this->form_validation->set_rules('unit_price', 'Unit Price', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/BManager/Price_List');

        }else{   

        $data = array(
            'fuel_type' => $this->input->post('fuel_type'),
            'unit_price' => $this->input->post('unit_price'),
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }
    }

    public function Price_update()
    {

        $data['title'] = 'Add Fuel';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fuel_type', 'Fuel Type', 'required');
        $this->form_validation->set_rules('unit_price', 'Unit Price', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/BManager/Price_List');

        }else{   

        $data = array(
            'fuel_type' => $this->input->post('fuel_type'),
            'unit_price' => $this->input->post('unit_price'),
        );
        $this->person->update(array('fuel_id' => $this->input->post('fuel_id')), $data);
        echo json_encode(array("status" => TRUE));
    } 

    }

    public function Price_delete($fuel_id)
    {
        $this->person->delete_by_id($fuel_id);
        echo json_encode(array("status" => TRUE));
    }

    public function Price_list_by_id($fuel_id){

        $data['output'] = $this->person->get_by_id_view($fuel_id);
        $this->load->view('pages/Supplier/View_Price_List', $data);
    }*/

    
}