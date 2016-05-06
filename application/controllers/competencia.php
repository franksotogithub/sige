<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Competencia extends CI_Controller
      { 
        function __construct()
        {
              parent::__construct();
			  $this->load->model('competencia_model');
                    
        }


    
    
                
        function index()
	{
		$this->load->view('login_view');
	}
    
  

        
        
              function consultar_capa_negocio() 
                {   

		    
                       		
					//$this->load->model('competencia_model');  
					$rscapa = $this->competencia_model->Consultar_capa_negocio();
					
					echo json_encode($rscapa);
                                        
                                     
                       
                } 
                
                
                
               
             function consultar_rango_variable_negocio()
                
                {
   
               
                    
                         		$rsRVN = $this->competencia_model->consultar_rango_variable_negocio();	
                                         $i=0;  
                            
                                         $variable2='';
                                         $variable='';
                                         $rango='';
                                         $max='';
                                         $min='';
                                         $id_rango='';
                                         $id_variable='';
                                         $campo='';
                                         $campo_var='';
                                         $response='[';
                                         $primero='0'; 
                                       
  
                       	foreach( $rsRVN as $row  ){	
                            
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
                                    $response .=  '{"attr":{"id":"'.$campo_var.'","rel":"padre","title":"'.$variable.'"},"data":"'.$variable.'","state":"close",' ;
                                    $response .=' "children":[{"attr":{"id":"'.$campo.'","rel":"hijo","max":"'.$max.'","min":"'.$min.'"},"data":"'.$rango.'","state":"close"}';
                                    $primero='1';
                                }else{
                                    
                                    $response .=',{"attr":{"id":"'.$campo.'","rel":"hijo","max":"'.$max.'","min":"'.$min.'"},"data":"'.$rango.'","state":"close"}'; 
                                    
                                }
                            
                            }                        
			
  
                        
			echo $response. "]}]";        
                        
                }
                
                
                
              
                
                
                
                
                
                
 
                
                
                              
                              
                               
                
                
      }