<?php

class s_request_m extends CI_Model{

    var $table = 'fuel_request';
    var $column = array('supplier_name','fuel_type','volume','total_price');
    var $order = array('req_id' => 'desc');
   /* var $column = array('supplier_name','fuel_type','unit_price','volume','total_price');
    var $order = array('request_id' => 'desc');
*/
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';
    }

    
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

   public function confirmedStatus($id){

    $res=$this->db->query('UPDATE `fuel_request` SET status="confirmed" WHERE request_id='.$id.'');

    return $res->result();

   }

   public function rejectStatus($id){

    $res=$this->db->query('UPDATE `fuel_request` SET status="rejected" WHERE request_id='.$id.'');

    return $res->result();

   }


   public function getRequestConfirmed(){
    $res=$this->db->query('SELECT * FROM `fuel_request` WHERE status="confirmed"');
    // if($_POST['length'] != -1)
    //     $this->db->limit($_POST['length'], $_POST['start']);
    return $res->result();

   }
    public function getRequest($name){

        
        $res=$this->db->query('SELECT * FROM `fuel_request` WHERE supplier_name = "'.$name.'" AND status="pending"');
        // if($_POST['length'] != -1)
        //     $this->db->limit($_POST['length'], $_POST['start']);
        return $res->result();
    }




    
    
}

?>