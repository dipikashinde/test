<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('User_Model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->helper('url');
        }
	
	public function index()
	{
		$this->load->view('contact');
	}
        
        public function submit(){ 
                
                $this->form_validation->set_rules('name', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('contact', 'Contact No', 'required|integer|exact_length[10]');
		$this->form_validation->set_rules('ex_year', 'Experience year', 'required|integer');
                $this->form_validation->set_rules('ex_month', 'Experience Month', 'required|integer');
		$this->form_validation->set_rules('location', 'Location', 'required');
                //$this->form_validation->set_rules('userfile', 'Resume', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('contact');
		}
		else
		{
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'doc|pdf|docx';
                    $config['max_size']	= '1000';
                    $config['file_name'] = 'resume_'.uniqid();

                    $this->load->library('upload', $config);

                    if ( ! $this->upload->do_upload())
                    {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('contact', $error);
                    }
                    else
                    {
                        $data = array('upload_data' => $this->upload->data()); 
                        $file_name= uniqid().'_'.$data['upload_data']['orig_name'];  
                        $data = [
                                'name' => $this->input->post('name'),
                                'email_id' => $this->input->post('email'),
                                'contact_no' => $this->input->post('contact'),
                                'exp_yr' => $this->input->post('ex_year'),
                                'exp_mnth' => $this->input->post('ex_month'),
                                'location' => $this->input->post('location'),
                                'comment' => $this->input->post('comment'),
                                'file_name' => $config['file_name'].$data['upload_data']['file_ext']//$file_name 
                            ];                          
			$this->data['result'] = $this->User_Model->insert('test',$data); 
                        $this->load->view('contact', $this->data);
                    }
                }
        }
        
         public function admin()
	{   
            echo 'sdf';die;
           $this->data['success'] = 'success login';
           if(!empty($_POST['code'])){
           if($_POST['uname']=='admin' && $_POST['psw']=='Ali@123'){
                   
                    $this->load->view('admin/list');
                   
                    
                }
                else
                {  
                     $this->data['error'] = 'Invalid Login';
                } 
        } 
        
        $this->load->view('admin/login',$this->data);
   }
}
