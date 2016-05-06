<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller
      { 
        function __construct()
        {
              parent::__construct();
        }

        function index()
	{
		$this->load->view('login_view');
	}

      
        
     
        
        
        
        
        
                
                function consultar_capa_poblacion() 
                {   
                    $this->load->model('clientes_model');  
                    $rscapa 	 = $this->clientes_model->consultar_capa_poblacion();
                     echo json_encode($rscapa);
  
                } 
                
                
                
                  
                function consultar_rango_variable_poblacion()
                {
                    
                                        $this->load->model('clientes_model');  
                    
                         		$rsRVP = $this->clientes_model->consultar_rango_variable_poblacion();	
                                         $i=0;  
                            
                                         $variable2='';
                                         $variable='';
                                         $rango='';
                                         $max='';
                                         $min='';
                                         $response='[';
                                         $primero='0'; 
                                   $campo='';
                                   $campo_var='';
                             
			foreach( $rsRVP as $row  ){				
                               $variable2=$row->nombre_var;
                               $rango=$row->des_rango;
                               $campo=$row->campo;
                               $campo_var=$row->campo_var;
                               $max=$row->max;
                               $min=$row->min;
                               
                               
                               if ($variable<>$variable2)
                                {
                                     if($primero<>'0')
                                     {
                                      $response .=  ']},'; 
                                     }
                                   
                                    $variable=$row->nombre_var;
                                    $response .=  '{"attr":{"id":"'.$campo_var.'","rel":"padre","title":"'. $variable.'"},"data":"'.$variable.'","state":"close",' ;
                                    $response .=' "children":[{"attr":{"id":"'.$campo.'","rel":"hijo","max":"'. $max.'","min":"'. $min.'","title":"'. $rango.'"},"data":"'.$rango.'","state":"close"}';
                                    $primero='1';
                                }else{
                                    
                                    $response .=',{"attr":{"id":"'.$campo.'","rel":"hijo","max":"'. $max.'","min":"'. $min.'","title":"'. $rango.'"},"data":"'.$rango.'","state":"close"}'; 
                                    
                                }
                            
                            }                        
			//echo substr($response,0,strlen($response)-1) . "}";
  
                        
			echo $response. "]}]";
                                                                                                                                                  
                                            
                                
                }
                
                
                
                
                
                
                
      }