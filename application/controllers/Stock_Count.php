<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_Count extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Stock_count_model','person');
    }

/*    public function index()
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

    public function Stock_list()
    {
        $list = $this->person->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $person->fuel_type;
            $row[] = $person->height;
            $row[] = $person->volume;
            $row[] = $person->date;
            $row[] = $person->time;

            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->stock_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
            <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_person('."'".$person->stock_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-default" href="javascript:void(0)" title="View" onclick="view_person('."'".$person->stock_id."'".')"><i class="glyphicon glyphicon-file"></i> View</a>';

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

    public function Stock_edit($stock_id)
    {
        $data = $this->person->get_by_id($stock_id);
        echo json_encode($data);
    }

    public function Stock_add()
    {
        $data = array(
            'fuel_type' => $this->input->post('fuel_type'),
            'height' => $this->input->post('height'),
            'volume' => $this->input->post('volume'),
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
        );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    public function Stock_update()
    {
        $data = array(
            'fuel_type' => $this->input->post('fuel_type'),
            'height' => $this->input->post('height'),
            'volume' => $this->input->post('volume'),
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
        );
        $this->person->update(array('stock_id' => $this->input->post('stock_id')), $data);
        echo json_encode(array("status" => TRUE));
    }

    public function Stock_delete($stock_id)
    {
        $this->person->delete_by_id($stock_id);
        echo json_encode(array("status" => TRUE));
    }

    public function list_by_id($stock_id){

        $data['output'] = $this->person->get_by_id_view($stock_id);
        $this->load->view('BManager/View_Stock', $data);
    }
}