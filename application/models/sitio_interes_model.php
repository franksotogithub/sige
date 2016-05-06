<?php 
class Sitio_interes_model extends CI_Model { 
    
      function Sitio_interes_model()   
{      
      
parent::__construct();

}    


    

    
    function consultar_tipo_lugar_interes()
    {
     $query = $this->db->get('tipo_lugar_interes_consultar()');      
     return $query->result();     
    }
   
    
    
    
}




?>
