<?php
if ( ! defined('BASEPATH')) exit('No se permite el acceso directo a las p&aacute;ginas de este sitio.');

class Correo_control extends CI_Controller{ 
    function __construct(){
        parent::__construct();
        $this->load->model('correo_model');
    }
    
    function index(){
        $this->load->view('correo');
    }


    
    function enviar_correo(){
        $nombres        = strtoupper($this->input->post('txtNom'));
        $apePat         = strtoupper($this->input->post('txtApePat'));
        $apeMat         = strtoupper($this->input->post('txtApeMat'));
        $email          = $this->input->post('txtEmail');
        
        
        $profundidad=8; // aqui defines el numero maximo de caracteres generados ...
        $password = substr(preg_replace("[^A-Z0-9]", "", md5(time())) .
        preg_replace("[^A-Z0-9]", "", md5(time())).
        preg_replace("[^A-Z0-9]", "", md5(time())),0, $profundidad);
        
        
        $data = array();
        $data = array( 
            'nombres'        => str_replace("'","''",$this->input->post('txtNom')),
            'apePat'         => str_replace("'","''",$this->input->post('txtApePat')),
            'apeMat'         => str_replace("'","''",$this->input->post('txtApeMat')),
            'tel'            => $this->input->post('txtTelefono'),
            'profesion'      => ($this->input->post('cboProfesion')=='00'?'null':$this->input->post('cboProfesion')),
            'especifique'    => str_replace("'","''",$this->input->post('txtEspecifique')),
            'email'          => $this->input->post('txtEmail'),
            'pais'           => $this->input->post('cboPais'),
            'dpto'           => $this->input->post('cboDpto'),
            'prov'           => substr($this->input->post('cboProv'),-2),
            'dist'           => substr($this->input->post('cboDist'),-2),
            'entidad'        => str_replace("'","''",$this->input->post('txtNomEntidad')),
            'emailentidad'   => $this->input->post('txtEmailEntidad'),
            'pwd'            => $password
        );

        $inserto = $this->correo_model->grabar_login($data);
        
        $val='';
        
        foreach( $inserto as $row  ){				
				 $val=$row->correo_login_insertar;
        }
        

        
        if ($val!='0'){
            //$correo = $email; //'carlos.navarro@inei.gob.pe';
            //$asunto = 'Sistema SIGE; Suscripcion de usuario';
            //$headers = "MIME-Version: 1.0\r\n";; 
            //$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
            //$headers .= "From: Sistema SIGE <infoinei@inei.gob.pe>\r\n";
            //
            //$cuerpo = '<html>';
            //$cuerpo .= '<p>Estimado Sr(a): '. $nombres . ' ' . $apePat . ' ' . $apeMat . '</p>'; // JUNIOR CORMAN MEDINA
            //$cuerpo .= '<p>INEI</p>';
            //$cuerpo .= '<p>Usted ha enviado una solicitud de suscripci&oacute;n al Sistema de Informaci&oacute;n Geogr&aacute;fica para Emprendedores del INEI.</p>';
            //$cuerpo .= 'Usuario: '. $email .'<br />';
            //$cuerpo .= 'Contrase&ntildea: '.$password.'<br />';
            //$cuerpo .= '<p>Para confirmar tu usuario haz click en el siguiente link: <br />';
            //$cuerpo .= '<a href="http://sige.inei.gob.pe/SIG-NEGOCIOS/index.php/correo_control/confirmar_usuario/'. $val .'/'. $password.'">confirmar usuario</a></p>';
            //$cuerpo .= 'Atentamente,<br />';
            //$cuerpo .= 'Instituto Nacional de Estad&iacute;stica e Inform&aacute;tica<br />';
            //$cuerpo .= 'Lima-Per&uacute;';
            //$cuerpo .= '</html>';
            //
            //mail($correo, $asunto, $cuerpo, $headers);

            $param ="?";
            $param .= "nombres=".urlencode($nombres);
            $param .= "&apePat=".urlencode($apePat);
            $param .= "&apeMat=".urlencode($apeMat);
            $param .= "&email=".urlencode($email);
            $param .= "&password=".urlencode($password);
            $param .= "&val=".urlencode($val);

            $url ="http://iinei.inei.gob.pe/iinei/EnviaSigeCorreo.asp".$param;
            //echo $url;
            
            $STR = file_get_contents($url);
            //echo $STR;

            
        }
        
        
        $data['cod'] = '101';
        $data['logeo'] = $email;
        //$data['confirma'] = $cuerpo;
        $this->load->view('confirmar_login',$data);
        
    }


    function consultar_profesion() 
    {   
        
        $rsciudad 	 = $this->correo_model->profesion_consultar();
        $response='{"00":"Seleccione",';
        
        $i=0;
        foreach( $rsciudad as $row  ){				
            $response .= '"'. $row->profesion_id.'":"'. utf8_encode($row->nombre_profesion) .'",' ;
        }                        
        echo substr($response,0,strlen($response)-1) . "}";

    }
    
    
    
    function consultar_pais(){   
        
        $rspais	 = $this->correo_model->pais_consultar();
        $response='{';
        
        $i=0;
        foreach( $rspais as $row  ){				
            $response .= '"'. $row->ccpais.'":"'. utf8_encode($row->pais_nombre) .'",' ;
        }                        
        echo substr($response,0,strlen($response)-1) . "}";

    }
    
    function consultar_dpto(){   
        
        $rs	 = $this->correo_model->dpto_consultar();
        $response='{"00":"Seleccione",';
        
        $i=0;
        foreach( $rs as $row  ){				
            $response .= '"'. $row->ccdd.'":"'. utf8_encode($row->dpto_nombre) .'",' ;
        }                        
        echo substr($response,0,strlen($response)-1) . "}";

    }
    
    function consultar_prov(){   
        
        $rs = $this->correo_model->prov_find($_POST['codDpto']);  
        $response='{"00":"Seleccione",';
        
        $i=0;
        foreach( $rs as $row  ){				
            $response .= '"'. $row->ccpp.'":"'. $row->prov_nombre .'",' ;
        }                        
        echo substr($response,0,strlen($response)-1) . "}";

    }
    
    function consultar_dist(){   
        
        $rs = $this->correo_model->dist_find($_POST['codDpto']);  
        $response='{"00":"Seleccione",';
        
        $i=0;
        foreach( $rs as $row  ){				
            $response .= '"'. $row->ubigeo.'":"'. $row->dist_nombre .'",' ;
        }                        
        echo substr($response,0,strlen($response)-1) . "}";

    }
    
    
    function confirmar_usuario($id, $pwd) {   
        
        
        $data['cod'] = '0';
        $data['id_usu'] = $id;
        $data['pwd'] = $pwd;
        
        //$this->load->view('confirmar_login',$data);
        
        $rs = $this->correo_model->confirmar_login($data);
        
        foreach( $rs as $row  ){				
				 $val=$row->correo_confirmar_login;
        }
        
        if ($val == 1){
            $data['cod'] = '102';
            
        }else{
            $data['cod'] = '0';
            
        }
        $this->load->view('confirmar_login',$data);
        
        
    }
    
    function comprobar_usu(){

        $email = $this->input->get('txtEmail');
        $data['email'] = $email ;
        
        $rs = $this->correo_model->getLogin($data);  
        
        if($rs=='1'){
            echo "false";
        }else{
            echo "true";
        }

    }
    
    function pruebacorreo() {
        $this->load->view('pruebamail');
    }
    
    
    
    
    function enviar_clave()
    {
        
            $rs = $this->correo_model->verificar_usuario($_POST['txtusuario']); 
            $val="1";
               $clave="";
                  $correo="";
                    $apePat="";
                     $apeMat="";
                      $nombre="";
                     $id_usu=0;
                     
            foreach( $rs as $row  ){
                $val="2";
				 $clave=$row->clave;
                                  $correo=$row->correo;
                                  $apePat=$row->ap_paterno;
                                  $apeMat=$row->ap_materno;
                                  $nombre=$row->nombre;
                                  $id_usu=$row->id;
                               }
                        if ($val=="1")
                             {
                                 
                              echo "No existe usuario";   
                        		 
                                   
                             }else if ($correo=="")
                             {
                                 
                              echo "Usuario no cuenta con un correo";   
                        		 
                                   
                             }else if ($clave=="")
                             {
                             $profundidad=8; // aqui defines el numero maximo de caracteres generados ...
                             $password = substr(preg_replace("[^A-Z0-9]", "", md5(time())) .
                             preg_replace("[^A-Z0-9]", "", md5(time())).
                             preg_replace("[^A-Z0-9]", "", md5(time())),0, $profundidad); 
                             
                          
                               $clave=$password;
                               $rs = $this->correo_model->guardar_clave($id_usu,$clave); 
                                   
                             }
    
                             
                      
                            
                            
            if ( $clave!="" && $correo!="")                  
            {                 
            $param ="?";
            $param .= "nombres=".urlencode($nombre);
            $param .= "&apePat=".urlencode($apePat);
            $param .= "&apeMat=".urlencode($apeMat);
            $param .= "&email=".urlencode($correo);
            $param .= "&password=".urlencode($clave);
            $param .= "&val=".urlencode($id_usu);

            $url ="http://iinei.inei.gob.pe/iinei/EnviaSigeCorreo.asp".$param;
           
            
          $STR = file_get_contents ($url);
            
           echo "Se procedio a enviar su clave a correo";  
           }                 
    
    }
    
    
    

}
    
    
?>