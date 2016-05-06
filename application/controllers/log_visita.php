<?php
if ( ! defined('BASEPATH')) exit('No se permite el acceso directo a las p&aacute;ginas de este sitio.');
class Log_visita extends CI_Controller{

						  
	public function __construct(){
		parent::__construct();
                          
                               $this->load->model('log_visita_model');
		}
		
	public function index(){
   //    $rs = $this->log_visita_model->insertar_log_visita($this->session->userdata('id_session'),$_POST['tipo'],$_POST['parametro']);	
          $rs = $this->log_visita_model->insertar_log_visita($_POST['id_session'],$_POST['tipo'],$_POST['parametro'],$_POST['ip']);	
		}
	
	
		
	}
?>
