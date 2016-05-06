<?php 
class Sitio_interes extends CI_Controller
      { 
        function __construct()
        {
              parent::__construct();
        }

        function index()
	{
		$this->load->view('login_view');
	}
    
 
                
                    
                              function consultar_tipo_lugar_interes() 
                {   
                    $this->load->model('sitio_interes_model');  
                    $rscapa 	 = $this->sitio_interes_model->consultar_tipo_lugar_interes();
                    echo json_encode($rscapa);
  
                } 
                
                
                
                
                
                
                
                
                
                
      }