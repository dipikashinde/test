<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
   
    function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('url');
       }
       
       public function index(){
          $this->load->helper(array('form'));
          $this->load->view('login');
       }
       
      public function resumeList(){  
           $list = $this->User_Model->getdata();           //print_r($list);die;
            $this->data['list']= $list;
            if($list>0){ 
                $this->load->view('list', $this->data);
             }
        }
        
      public function download(){ 
          $this->load->helper('download');
          $this->load->helper('file');
          $string = read_file('./uploads/'.$_GET['resume']);   
          $name = $_GET['resume'];
          force_download($name, $string);
          
      }
      
    public function verifylogin(){ 
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('username', 'Username', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required');
 
   if($this->form_validation->run() == FALSE)
   {
     $this->load->view('login');
   }
   else
   {
    
      $username = $this->input->post('username');
       $pwd = $this->input->post('password');
       $res = $this->User_Model->verify($username,$pwd);     
      if( $res =='true'){
          $this->resumeList();
      }else{
          $this->data['error'] = "invalid login ingredients";
          $this->load->view('login',$this->data);
      }
   }
      }
      
}