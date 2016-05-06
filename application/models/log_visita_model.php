<?php
class Log_visita_model extends CI_Model{

	
	public function __construct(){
		parent::__construct();
		}
	
	public function index(){
		
		}

               
           
		
	public function insertar_log_visita($id_usuario,$tipo,$parametro,$ip){
            
     
        $rs = $this->db->query("select * from log_visita_insertar(".$id_usuario.",".$tipo.",'".$parametro."','".$ip."')");
        return $rs->result();
		}
                
 

                
                
	}
?>