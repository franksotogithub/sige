<?php 
class Correo_model extends CI_Model { 
    
    public function __construct(){
        parent::__construct();
    }



    function profesion_consultar(){    
        $result=array();
        //$this->db->select('ccpais, pais_nombre');
        $query = $this->db->get('profesion_consultar()');
        if($query->num_rows>0){
            $result = $query->result();
        }
        $query->free_result();
        return $result;
        
    }

        
    function pais_consultar(){    
        $result=array();
        //$this->db->select('ccpais, pais_nombre');
        $query = $this->db->get('pais_consultar()');
        if($query->num_rows>0){
            $result = $query->result();
        }
        $query->free_result();
        return $result;
        
    }
    
    function dpto_consultar(){    
        $result=array();
        //$this->db->select('ccdd, dpto_nombre');
        $query = $this->db->get('dpto_consultar()');
        if($query->num_rows>0){
            $result = $query->result();
        }
        $query->free_result();
        return $result;
        
    }
    
    function prov_find($ccdd){
        $result=array();
        $query = $this->db->get("prov_find('".$ccdd."')");
        if($query->num_rows>0){
            $result = $query->result();
        }
        $query->free_result();
        return $result;
    
    }
    
    function dist_find($ccpp){
        $result=array();
        $query = $this->db->get("dist_find('".$ccpp."')");
        if($query->num_rows>0){
            $result = $query->result();
        }
        $query->free_result();
        return $result;
    }
    
    


    function grabar_login($data){

        $result=array();
        $query = $this->db->query("select correo_login_insertar(
                                    '".$data['email']."',
                                    '".$data['pwd']."',
                                    '".$data['nombres']."',
                                    '".$data['apePat']."',
                                    '".$data['apeMat']."',
                                    '".$data['tel']."',
                                    ".$data['profesion'].",
                                    '".$data['especifique']."',
                                    '".$data['email']."',
                                    '".$data['pais']."',
                                    '".$data['dpto']."',
                                    '".$data['prov']."',
                                    '".$data['dist']."',
                                    '".$data['entidad']."',
                                    '".$data['emailentidad']."')
                                    ");
        if($query->num_rows>0){
            $result = $query->result();
        }
        $query->free_result();
        return $result;
        
        
        //echo "select correo_login_insertar(
        //                            '".$data['email']."',
        //                            '".$data['pwd']."',
        //                            '".$data['nombres']."',
        //                            '".$data['apePat']."',
        //                            '".$data['apeMat']."',
        //                            '".$data['tel']."',
        //                            ".$data['profesion'].",
        //                            '".$data['especifique']."',
        //                            '".$data['email']."',
        //                            '".$data['pais']."',
        //                            '".$data['dpto']."',
        //                            '".$data['prov']."',
        //                            '".$data['dist']."',
        //                            '".$data['entidad']."',
        //                            '".$data['emailentidad']."')";
    } 

    function confirmar_login($data){
        $result=array();
        $query = $this->db->query("select correo_confirmar_login(
                                    '".$data['id_usu']."',
                                    '".$data['pwd']."')
                                    ");
        
        if($query->num_rows>0){
            $result = $query->result();
        }
        
        $query->free_result();
        return $result;
        
    }
    
    
    function getLogin($data){

        $email = $data['email'];
        $this-> db-> select("id_usuario");
        $this-> db->where("login", $email);
        
        $Q = $this-> db-> get('usuario_sistema');
        
        if ($Q-> num_rows() > 0){
            $result = '1';
            
        }else{
            $result = '0';
        }
        $Q->free_result();
        return $result;
  
    }  
 
        
    function verificar_usuario($usuario)  
    {    

               
             $sql="select * from usuario_sistema_verificar('".$usuario."') ";	
            $query = $this->db->query ( $sql );  
    
              return $query->result(); 

     } 
    
    
     
     
     
    function guardar_clave($id_usuario,$clave){

        $result=array();
        $query = $this->db->query("select  usuario_sistema_guardar_clave(".$id_usuario.",'".$clave."')");
          
        
        
        if($query->num_rows>0){
            $result = $query->result();
        }
        $query->free_result();
        return $result;
        

        
        
    }
     
     
     
    
 
} 
 ?>