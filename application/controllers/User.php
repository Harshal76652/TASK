<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  

    public function __construct() {
    
    parent::__construct();
   $this->load->model('UserNew_Model');


  }
	public function index()
	{
		            
                        $this->load->view("login");
               
		         
	}
  public function logincheck()

  {              $email = $this->input->post('email');
                 $password = $this->input->post('password');
               
                 $post   =  array('email' => $email,'password' => $password);

                $this->session->set_userdata('name',$post);
              
                $this->response  = $this->UserNew_Model->login_valid($post);
               
               print_r( $this->response);
               
                if($this->response){
                  redirect('User/viewUser');
                }
                else{
                  echo "id password not match";

                $this->load->view("login");
                }
  }
  public function logout(){
   
   $this->session->unset_userdata('name'); 
   $this->load->view("login");
}
	public function viewUser()
	{           
	   if($this->session->userdata('name') == null ){  
          redirect("User");
     }else{
		             $viewEmployee =$this->UserNew_Model->viewAllEmployee();
                  $this->load->view('viewDetails',['viewEmployee' =>$viewEmployee]);
           }       
	}
	public function addEmployee()
	{                 
				     $data = array(

           'first_name' => $this->input->post('first_name'),
           'last_name' => $this->input->post('last_name'),
           'username' => $this->input->post('username'),
           'email' => $this->input->post('email'),
           'password' => $this->input->post('password'),
           'gender' => $this->input->post('gender'),
           'dob' => $this->input->post('dob'),
           'phoneno' => $this->input->post('phoneno'),
           'created_at' =>  date('Y-m-d H:i:s')

            );

		     printf($this->input->post('created_at'));
      if(isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name']))
       {
           $five_digit_random_number = mt_rand(10000, 99999);
           $data['image']= $five_digit_random_number.str_replace(' ', '_', $_FILES['userfile']['name']);
       }  
          
                       $this->do_uploadAdd($data);
                       $this->load->model("UserNew_Model");
                    if($this->UserNew_Model->addEmployee($data)){
                                         
                           $this->session->set_flashdata('feedback','Employee  added successfully');
                           return redirect("User/viewUser");
                     }else

                      $this->session->set_flashdata('feedback','Employee  not added successfully');
                        return redirect("Admin/pageEmployee");
	}
 

public function deleteEmployee($id){

             $this->load->model('UserNew_Model');
            if($this->UserNew_Model->deleteEmployee($id)){
                
                        $this->session->set_flashdata('feedback','Employee deleted successfully');
                       
                }else{
                    
                    $this->session->set_flashdata('feedback','Employee not deleted successfully,please try again');
                }
                 return redirect('User/viewUser');

}

public function editUser()
  {                 
       $data ['id'] = $_POST['id'];
                      $data['edit'] = $this->UserNew_Model->edit_employee( $data ['id']);
                      echo json_encode((array)$data);exit;
                 
                    
  }

	public function update_Employee()
	{                 
		           
         
         //   print_r($password);die;
         $data['post'] = array(
            'id'=>$this->input->post('id'),
           'first_name' => $this->input->post('first_name'),
           'last_name' => $this->input->post('last_name'),
           'username' => $this->input->post('username'),
           'email' => $this->input->post('email'),
           'password' => $this->input->post('password'),
           'gender' => $this->input->post('gender'),
           'dob' => $this->input->post('dob'),
           'phoneno' => $this->input->post('phoneno'),
           'created_at' =>  date('Y-m-d H:i:s')
            

        );
         
        if(isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name']))
       {
           $five_digit_random_number = mt_rand(10000, 99999);
           $data['post']['image']= $five_digit_random_number.str_replace(' ', '_', $_FILES['userfile']['name']);
       }  
                $this->do_uploadAdd($data);
              
        if($this->UserNew_Model->update_employee($data)){
                       $this->session->set_flashdata('feedback','Employee updated successfully');
                       
                }else{
                       $this->session->set_flashdata('feedback','Employee  not  updated successfully,please try again');
                      
                }
                return redirect('Admin/viewEmployee');
}           
	public function do_uploadAdd($dataImage){
    
    
                $config = array(
                'upload_path' => "assets/uploads",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "768",
                'max_width' => "1024",
                'file_name' => $dataImage['image']
                 );
                
                $this->load->library('upload', $config);
                $this->upload->do_upload();

        
}

	
}
 
