<?php 
class Login_model extends CI_Model { 
    
      function Login_model()   
{      
    
   
parent::__construct();

}    

  
    
    function login($usuario,$password,$ip)  
    {    

       
        
             $sql="select *  from login_sige('".$usuario."','".$password."','".$ip."')";	
            $query = $this->db->query ( $sql );  
    
              return $query->result(); 

     } 
       
    
    
}




?>