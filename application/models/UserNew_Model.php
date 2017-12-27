<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 
class UserNew_Model extends CI_Model {

    public function __construct() {
		
		parent::__construct();		
		$this->table_name = 'user_deatils';
	}
	public function login_valid($post){
           
        
        $this->db->where('email',$post['email']);
        $this->db->where('password',$post['password']);
        $q = $this->db->get(user_deatils);
        $result->User=false;
        $result->User = $q->row();
              if ($q->num_rows() > 0) {
        return $result;
      } else {
         return $result;
      }
}
	public function viewAllEmployee(){
    
                $query = $this->db->select('*')
                                  ->order_by('id',"")
                                  ->get($this->table_name);
               return $query->result();

 }
   public function addEmployee($data)
	{
		$this->db->insert($this->table_name, $data);
		return $this->db->insert_id();
	}
	
	public function deleteEmployee($id){

            return $this->db->delete($this->table_name,['id' => $id]);

    }
    public function edit_employee($id)
         {

            $q = $this->db->select(['id','first_name','last_name','username' ,'image','email','password','gender','dob','phoneno',
                                    'created_at'])
                                    
                        ->where('id',$id)
                        ->get($this->table_name);
             return $q->row();
         }
   public function update_employee($data){
            
            return $this->db
                        ->where('id',$data['post']['id'])
                        ->update($this->table_name,$data['post']);
                        

         }
}


 
 