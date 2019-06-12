<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_Main');
	}

	public function index(){
		//$this->load->view('index');
		$this->getHeight();
	}

	public function viewPage($name){
		$data=null;

		if($name=='index.php'){			
			
		}else if($name=='propertyGrid.php'){
			
		}

		$this->load->view($name,$data);
	}	

	public function setHeight(){
		date_default_timezone_set('Asia/Colombo');
	    $d = date("Y-m-d");	    
	    $t = date("H:i:s"); //echo " Date:".$d."<BR>";

	 	if(!empty($_POST['id']) && !empty($_POST['height'])){
	        $id = $_POST['id'];	 		
	    	$height = $_POST['height'];

	    	$res=$this->Model_Main->getData($tablename='height',$columns_arr = array('record_date','record_time','height'),$where_arr = array('idTank'=>$id));	    	

	    	if($res[0]!=null){
	    		$data_array=array(    			
	    			'record_date'=>$d,
	    			'record_time'=>$t,
	    			'height'=>$height
	    		);

	    		$where_array=array(
	    			'idTank'=>$id
	    		);

	    		$this->Model_Main->updateData($tablename='height', $data_arr=$data_array, $where_arr=$where_array);	    		
	    	}else{
	    		$resTank=$this->Model_Main->getData($tablename='tank',$columns_arr = array('idTank'),$where_arr = array('idTank'=>$id));

	    		if($resTank[0]!=null){
		    		$data_array=array(    			
		    			'record_date'=>$d,
		    			'record_time'=>$t,
		    			'height'=>$height
		    		);

		    		$this->Model_Main->insertData($tablename='height', $data_arr=$data_array);
		    	}	    		
	    	}
		}
	}

	public function getHeight($b_id=1){		
		
		$res=$this->Model_Main->getData($tablename='tank',$columns_arr = array('idTank','tankName','b_id','fuel_id','maxHeight','maxVolume'),$where_arr = array('b_id'=>$b_id,'availability'=>true));

		$resFuel=$this->Model_Main->getData($tablename='fuel',$columns_arr = array('fuel_type','unit_price'),$where_arr = array('fuel_id'=>$res[0]->fuel_id));

		$resHeight=$this->Model_Main->getData($tablename='height',$columns_arr = array('idHeight','record_date','record_time','height'),$where_arr = array('idTank'=>$res[0]->idTank));

		$data=null;

		$data=array(
			'idTank'=>$res[0]->idTank,
			'name'=>$res[0]->tankName,			
			'maxHeight'=>$res[0]->maxHeight,
			'maxVolume'=>$res[0]->maxVolume,

			'fuel'=>$resFuel[0]->fuel_type,

			'idHeight'=>$resHeight[0]->idHeight,
			'record_time'=>$resHeight[0]->record_time,
			'record_date'=>$resHeight[0]->record_date,
			'height'=>$resHeight[0]->height
		);
		
		$this->load->view('pages/fuel',$data);	

		//$this->Model_Main->test();
		
	}

	public function recordHeight($idTank=0){
		
				
		$res=$this->Model_Main->getData($tablename='height',$columns_arr = array('record_date','record_time','height'),$where_arr = array('idTank'=>$idTank));	

		$resTank=$this->Model_Main->getData($tablename='tank',$columns_arr = array('b_id','maxHeight','maxVolume'),$where_arr = array('idTank'=>$idTank));	

		if($res[0]!=null){
    		$data_array=array(    			
    			'record_date'=>$res[0]->record_date,
    			'record_time'=>$res[0]->record_time,
    			'volume'=>( (($resTank[0]->maxHeight)-($res[0]->height)) / ($resTank[0]->maxHeight) ) * ($resTank[0]->maxVolume),
    			'idTank'=>$idTank
    		);

    		$this->Model_Main->insertData($tablename='recording', $data_arr=$data_array);	    		
    	}

		$this->getHeight($b_id=($resTank[0]->b_id));	
		
		//$this->Model_Main->test();
	}
}
