<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller {

    public function __construct(){

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('branch_m','person');
    }

    public function Index(){
        $this->load->view('Includes/header');
        $this->load->view('Branch/Login');
    }


     public function ajax_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->b_id;
            $row[] = $person->b_name;
            $row[] = $person->address;
            $row[] = $person->incharge;
            $row[] = $person->petrol_92;
            $row[] = $person->petrol_95;
            $row[] = $person->auto_diesel;
            $row[] = $person->super_diesel;
            $row[] = $person->tel;
            $row[] = $person->service;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->b_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->b_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->b_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

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

    public function ajax_edit($b_id)
    {
        $data = $this->person->get_by_id($b_id); 
        echo json_encode($data);
    }

    public function ajax_add()
    {

        $config['upload_path'] = './assets/images';
        $config['allowed_types'] = '*';


        $this->load->library('upload',$config);


        $this->upload->do_upload('file_name');

        $file_name = $this->upload->data();


        $data = array(
            'b_name' => $this->input->post('b_name'),
            'address' => $this->input->post('address'),
            'location' => $this->input->post('location'),
            'incharge' => $this->input->post('incharge'),
            'petrol_92' => $this->input->post('petrol_92'),
            'petrol_95' => $this->input->post('petrol_95'),
            'auto_diesel' => $this->input->post('auto_diesel'),
            'super_diesel' => $this->input->post('super_diesel'),
            'kerosene' => $this->input->post('kerosene'),
            'industrial_kerosene' => $this->input->post('industrial_kerosene'),
            'furance_800' => $this->input->post('furance_800'),
            'furance_1500' => $this->input->post('furance_1500'),
            'furance_3500' => $this->input->post('furance_3500'),
            'tel' => $this->input->post('tel'),
            'service' => $this->input->post('service'),
            'image' => $file_name['file_name']
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_update()
    {


         $config['upload_path'] = './assets/images/img';
        $config['allowed_types'] = '*';


        $this->load->library('upload',$config);


        $this->upload->do_upload('file_name');

        $file_name = $this->upload->data();

        $data = array(
            'b_name' => $this->input->post('b_name'),
            'address' => $this->input->post('address'),
            'location' => $this->input->post('location'),
            'incharge' => $this->input->post('incharge'),
            'petrol_92' => $this->input->post('petrol_92'),
            'petrol_95' => $this->input->post('petrol_95'),
            'auto_diesel' => $this->input->post('auto_diesel'),
            'super_diesel' => $this->input->post('super_diesel'),
            'kerosene' => $this->input->post('kerosene'),
            'industrial_kerosene' => $this->input->post('industrial_kerosene'),
            'furance_800' => $this->input->post('furance_800'),
            'furance_1500' => $this->input->post('furance_1500'),
            'furance_3500' => $this->input->post('furance_3500'),
            'tel' => $this->input->post('tel'),
            'service' => $this->input->post('service'),  
            'image' => $file_name['file_name']  
        );
        $this->person->update(array('b_id' => $this->input->post('b_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_delete($b_id)
    {
        $this->person->delete_by_id($b_id);
        echo json_encode(array("status" => TRUE));
    }

    public function list_by_id($b_id){

        $data['output'] = $this->person->get_by_id_view($b_id);
        $this->load->view('Pages/Admin/view_addBranch', $data);
    }


}