<?php
class User_Model extends ci_model {

    private $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        
    }
    
    public function getdata(){ 
        $query = $this->db->select('*')
                ->from('test')
                ->get();
           
        $res = $query->result_array(); 
        if((count($res))>0){ 
            return $res;
        }else{ return 'false';}
      }
      
      public function verify($username,$pwd){
          $where= "username = '$username' and password = '$pwd' ";
           $query = $this->db->select('*')
                ->from('login')
                ->where($where)
                ->get();
           
        $res = $query->result_array(); 
        if((count($res))>0){ 
            return 'true';
        }else{ return 'false';}
      }

      public function insert($tbl,$data)
     {
        $retVal = array('status' => 'ok', 'message' => 'success');
        $this->db->insert($tbl,$data);
        $dberror = $this->db->error();
        if ($dberror['message']) {
            $retVal['status'] = 'error';
            $retVal['message'] = $dberror['message'];
        }
        return $retVal;
     }
      
}