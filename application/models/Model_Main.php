<?php

class Model_Main extends CI_Model{

	//authentication of user
    public function authenticate($nic,$password,$tableName){
		$this->db->where('nic',$nic);
		$this->db->where('password',$password);		
		$rs=$this->db->get($tableName);

		if($rs->num_rows()==1){
			return $rs->result();			
		}else{
			return false;
		}
	}

    public function insertData($tablename, $data_arr) {
        try {
            $this->db->insert($tablename, $data_arr);
            $ret = $this->db->insert_id() + 0;
            return $ret;
        } catch (Exception $err) {
            return $err->getMessage();
        }
    }

    public function updateData($tablename, $data_arr, $where_arr) {
        try{        
            return $this->db->update($tablename, $data_arr, $where_arr);
        }catch(Exception $err){
            return $err->getMessage();
        }
    }

    public function deleteData($tableName,$where_arr){
        try{
            return $this->db->delete($tableName,$where_arr);
        }catch(Exception $err){
            return $err->getMessage();
        }
    }

    //................................................................................................

    public function get_count($tableName){
        $q=$this->db->query('select * from '.$tableName.'');
        return $q->num_rows();
    }

    public function get_max($tableName,$columnName){
        $q=$this->db->query('select max('.$columnName.') as maximum from '.$tableName.'')->row();
        $maxid= $q->maximum;
        return $maxid;        
    }

    //................................................................................................

    public function getItemSet($table,$itemsPerPage,$offset){
        $rs=$this->db->query('select * from '.$table.' LIMIT '.$itemsPerPage.' OFFSET '.$offset.'');
        return $rs->result();        
    }

    //................................................................................................
    
    public function test(){
       echo 'abcde';       
    }

	//................................................................................................


    public function getData($tablename = '', $columns_arr = array(), $where_arr = array(), $limit = 0, $offset = 0, $orderby = array()) {


		$limit = ($limit == 0) ? Null : $limit;

        if (!empty($columns_arr)) {
            $this->db->select(implode(',', $columns_arr), FALSE);
        }

        if ($tablename == '') {
            return array();
        } else {
            $this->db->from($tablename);

            if (!empty($where_arr)) {
                $this->db->where($where_arr);
            }

            if ($limit > 0 AND $offset > 0) {
                $this->db->limit($limit, $offset);
            } elseif ($limit > 0 AND $offset == 0) {
                $this->db->limit($limit);
            }

            if (count($orderby) > 0) {
                $orderbyString = '';
                var_dump($orderby);
                foreach ($orderby as $orderclause) {

                    $orderbyString .= $orderclause["field"] . ' ' . $orderclause["order"] . ', ';
                }
                if (strlen($orderbyString) > 2) {
                    $orderbyString = substr($orderbyString, 0, strlen($orderbyString) - 2);
					var_dump($orderbyString);
                }
                $this->db->order_by($orderbyString);
            }

            $query = $this->db->get();
            return $query->result();
        }
    }
}
