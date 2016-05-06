<?php 
class Competencia_model extends CI_Model { 
    
      function Competencia_model()   
{      
    
   
parent::__construct();

}    

    function consultar_capa_negocio()  
    {    

     $query = $this->db->get('capa_consultar_negocio()');      
      return $query->result(); 

     } 

   // select * from  rango_variable_negocio()
    function consultar_rango_variable_negocio()
    {
     $query = $this->db->get('rango_variable_negocio()');      
     return $query->result(); 

    }
    
    
    
    
   
    
    
}




?>
