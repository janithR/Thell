<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Supplier_m','person');
    }

	/*public function Profile()
	{
		$this->load->view('Supplier/Profile');
	}*/


	public function Price_List()
	{
		$email = $this->session->userdata('email');
        $this->load->model('Supplier_m');
        $data = $this->Supplier_m->get_dataNew($email);
		$this->load->view('pages/Supplier/Price_List',$data);
	}

	public function Request()
	{
		$name = $this->session->userdata('s_name');
		$this->load->model('s_request_m');
		$data['list'] = $this->s_request_m->getRequest($name);
		$this->load->view('pages/Supplier/Request', $data);
		// $this->load->view('pages/Supplier/Request');
	}

	public function Report()
	{
		$this->load->view('pages/Supplier/Report');
	}
}	