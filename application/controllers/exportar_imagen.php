<?php

  
 class Exportar_imagen extends CI_Controller
{
       function __construct()
        {
              parent::__construct();
         
               
        }   
        
        function index()
        {
         $this->load->view('exportar_imagen_view');		   
            
        }
        
}
?>
