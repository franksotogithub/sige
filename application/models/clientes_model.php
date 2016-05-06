<?php 
class Clientes_model extends CI_Model { 
    
      function Clientes_model()   
{      
    
   
parent::__construct();

}    

  
    
    function consultar_capa_poblacion()  
    {    

     $query = $this->db->get('capa_consultar_poblacion()');      
      return $query->result(); 

     } 
    
     
        function consultar_rango_variable_poblacion()
    {
     $query = $this->db->get('rango_variable_poblacion()');      
     return $query->result(); 

    }
    


   
    
    
    
}




?>
