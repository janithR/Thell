<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fuel_Request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Fuel_request_model','person');
    }
    

    public function Req_add()
    {

        // $data['title'] = 'Fuel Request';
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
        // $this->form_validation->set_rules('branch_manager', 'Branch Manager', 'required');
        // $this->form_validation->set_rules('branch_location', 'Branch Location', 'required');
        // $this->form_validation->set_rules('tel', 'Contact Number', 'required|numeric');
        // $this->form_validation->set_rules('email', 'Contact E Mail', 'required|valid_email');
        // $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required');
        // $this->form_validation->set_rules('fuel_type', 'Request Fuel Type', 'required');
        // $this->form_validation->set_rules('unit_price', 'Unit Price', 'required|numeric'); 
        // $this->form_validation->set_rules('volume', 'Volume', 'required|numeric');
        // $this->form_validation->set_rules('total_price', 'Total Price', 'required|numeric'); 

        // if ($this->form_validation->run() == FALSE) {
        //     $this->load->view('pages/BManager/Fuel_Request');

        // }else{   

            $data = array(
                'status' => $this->input->post('status'),                                                
                'branch_id' => $this->input->post('branch_id'),                                
                'req_date' => $this->input->post('req_date'),                
                'branch_name' => $this->input->post('branch_name'),
                'branch_manager' => $this->input->post('branch_manager'),
                'branch_location' => $this->input->post('branch_location'),
                'supplier_name' => $this->input->post('supplier_name'),
                'tel' => $this->input->post('tel'),
                'email' => $this->input->post('email'),
                'fuel_type' => $this->input->post('fuel_type'),
                'unit_price' => $this->input->post('unit_price'),
                'volume' => $this->input->post('volume'),
                'total_price' => $this->input->post('total_price'),
            );
            $insert = $this->person->save($data);
            echo json_encode(array("status" => TRUE));
        
        }

        public function req_list_by_id($req_id){

            $data['output'] = $this->person->get_by_id_view($req_id);
            $this->load->view('pages/BManager/View_add_employee', $data);
        }

        public function Req_list()
        {
            $id = $this->session->userData('branch_id');
            $list = $this->person->getRequest($id);
            
            //$list = $this->person->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $person) {
                $no++;
                $row = array();
                $row[] = $person->req_date;                
                $row[] = $person->supplier_name;
                $row[] = $person->fuel_type;
                $row[] = $person->volume;
                $row[] = $person->total_price;
                

                //add html for action
                $row[] = '<a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->request_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

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
        
        function get_price(){
            // let type = $_REQUEST['type'];
            $type = $_REQUEST['type'];
            $list = $this->person->getPrice($type);
            
            

            echo json_encode($list);
        }

   

}