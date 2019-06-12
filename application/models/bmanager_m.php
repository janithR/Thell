<?php

class bmanager_m extends CI_Model{

    var $table = 'bmanager';
    var $column = array('bm_id','bm_name','nic','address','email','password','branch_id','username','tel');
    var $order = array('bm_id' => 'desc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->search = '';

    }

    function can_login($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('bmanager');
                if ($query -> num_rows() > 0){
            return true;
        }else {
            return false;
        }
    }

    function get_data($email)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('bmanager');
        $result = $query->result();


        /*$data = array('username'=> ($result->username), 'email'=>($result->email), 'password'=>($result->password), 'bm_name'=>($result->bm_name));*/

        return $result;
    }

     function get_dataNew($email)
    {

        $res = $this->db->query("SELECT * FROM bmanager INNER JOIN branch ON bmanager.branch_id = branch.b_id && bmanager.email = '$email'");
        $result = $res->row();


        $data = array('username'=> ($result->username),'location'=>($result->location), 'email'=>($result->email), 'password'=>($result->password), 'bm_name'=>($result->bm_name),'b_name'=>($result->b_name), 'tel'=> ($result->tel));

        return $data;
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

    public function get_by_id($bm_id)
    {
        $this->db->from($this->table);
        $this->db->where('bm_id',$bm_id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($bm_id)
    {
        $this->db->where('bm_id', $bm_id);
        $this->db->delete($this->table);
    }

    public function get_by_id_view($bm_id)
    {
        $this->db->from($this->table);
        $this->db->where('bm_id',$bm_id);
        $query = $this->db->get();
        if($query->num_rows() > 0) {
            $results = $query->result();
        }
        return $results;
    }

    public function getAllGroups()


        {
            /*
            $query = $this->db->get('location');

            foreach ($query->result() as $row)
            {
                echo $row->description;
            }*/

            $query = $this->db->query("SELECT fuel_type FROM fuel");

            return $query->result();
            //echo 'Total Results: ' . $query->num_rows();
        }

        public function getAllSup()


        {
            /*
            $query = $this->db->get('location');

            foreach ($query->result() as $row)
            {
                echo $row->description;
            }*/

            $query = $this->db->query("SELECT s_name FROM supplier");

            return $query->result();
            //echo 'Total Results: ' . $query->num_rows();
        }    

}

?>