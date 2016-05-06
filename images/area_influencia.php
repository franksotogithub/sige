<?php 
class Area_influencia extends CI_Controller
      { 
        function __construct()
        {
              parent::__construct();
                     $this->load->model('area_influencia_model');  
                     $this->load->helper('file'); 
        }

        function index()
	{
		$this->load->view('begin');
	}

         
                             function buscar_area_influencia_map()
                
                {
                                        
                          
                    
                         $rsArea = $this->area_influencia_model->buscar_area_influencia_map($_POST['txtPuntox'],$_POST['txtPuntoy'],$_POST['txtRadio']);	
           
                                        $primero=0;
                                        
                                        $response ='[';  
                                        $response2 ='';  
                                        
                                        foreach($rsArea as $row)
                                        {
                                            
                                                if ($primero<>0)
                                                {
                                                 $response .=',';   
                                                 $response2 .=',';  
                                                }
                               
                                            
                                            $response .=  $row->cadena ;
                                            $response2 .=  $row->id ;
                                            $primero=1;

                                         }
                                        
                                         $response .=']';
                                      
                                         
                                 
                        
		                                                                                                                         
                         echo $response.'&&'.$response2;                   
                                
                }
                


          
          
          
                   function consultar_area_influencia_datos2()
          { 
         $html="";
         $html2="";
         $html3="";
         $html4=""; 
	   $data1['result'] = $this->area_influencia_model->consultar_area_influencia_nombre_variable_N();
           $data2['result'] = $this->area_influencia_model->consultar_area_influencia_datos_N2($_POST['txtManzanas'],$_POST['id_giro1'],$_POST['id_giro2'],$_POST['id_giro3'],
           $_POST['p1_1'], $_POST['p2_1'], $_POST['p3_1'], $_POST['p4_1'], $_POST['p5_1'],
           $_POST['v1_1'], $_POST['v2_1'], $_POST['v3_1'], $_POST['v4_1'], $_POST['v5_1'],
           $_POST['p1_2'], $_POST['p2_2'], $_POST['p3_2'], $_POST['p4_2'], $_POST['p5_2'],
           $_POST['v1_2'], $_POST['v2_2'], $_POST['v3_2'], $_POST['v4_2'], $_POST['v5_2'],
           $_POST['p1_3'], $_POST['p2_3'], $_POST['p3_3'], $_POST['p4_3'], $_POST['p5_3'],
           $_POST['v1_3'], $_POST['v2_3'], $_POST['v3_3'], $_POST['v4_3'], $_POST['v5_3']  ); 

        
           $data3['result'] = $this->area_influencia_model->consultar_area_influencia_nombre_variable_P();
         
           $data4['result'] = $this->area_influencia_model->consultar_area_influencia_datos_P3($_POST['txtManzanas'],$_POST['x1'],$_POST['x2'],
           $_POST['e1'],$_POST['e2'],$_POST['e3'],$_POST['e4'],$_POST['e5'],$_POST['e6'],$_POST['n1'],$_POST['n2'],$_POST['n3'],
           $_POST['pea1'],$_POST['pea2'],$_POST['pea3']        
                   );  
            
            
          $this->load->view('funciones_color');
 
          
        $html1c = '<tr><td><h3>Informacion de Competencia</h3></td></tr>' ;
      
        $html1f = '<tr><td>Fuente:CENEC 2008</td></tr>' ;
        $html1 = $this->load->view('ficha1_view',$data1,true);  
        $html2=  $this->load->view('ficha2_view',$data2,true);
        
        $html3c = '<tr><td><h3>Informacion de Mercado</h3></td></tr>' ;
        
        $html3f = '<tr><td>Fuente:CPV 2007</td></tr>' ;
        $html3 =  $this->load->view('ficha3_view',$data3,true); 
        $html4 =  $this->load->view('ficha4_view',$data4,true); 
   

     echo $html1c.'<tr><td>'.$html1.$html2.'</td></tr>'.$html1f.$html3c.'<tr><td>'.$html3.$html4.'</td></tr>'.$html3f;
            
          }
          
       
                   function exportar_excel()
          { 
             
	 
           $this->load->view('excel_view');
            
          }
          
          
          
    function ficha_pdf() {
    $html="";
    $html2="";
    $html3="";
    $html4="";
    $dg="";
    $dgi="";
    $dgib="";
    
    $id_giro1 = $_GET['id_giro1'];  
    $id_giro2 = $_GET['id_giro2'];
    $id_giro3 = $_GET['id_giro3'];
        
    $color1=$_GET['color1'];
    $color2=$_GET['color2'];
    $color3=$_GET['color3'];
           
    $giro1=$_GET['giro1'];
    $giro2=$_GET['giro2'];
    $giro3=$_GET['giro3'];
    
   
    $cadena_p_1=$_GET['cadena_p_1'];
    $cadena_v_1=$_GET['cadena_v_1'];
    
    $cadena_p_2=$_GET['cadena_p_2'];
    $cadena_v_2=$_GET['cadena_v_2'];
    
    $cadena_p_3=$_GET['cadena_p_3'];
    $cadena_v_3=$_GET['cadena_v_3'];
    
    $nombre_variable1=$_GET['nombre_variable1'];
    $nombre_variable2=$_GET['nombre_variable2'];
    
    $nombre_cliente_n=$_GET['nombre_cliente_n'];
    $cad_cliente_n=$_GET['cad_cliente_n'];
    
    $nombre_cliente_pea=$_GET['nombre_cliente_pea'];
    $cad_cliente_pea=$_GET['cad_cliente_pea'];
    
    
    $nombre_cliente_e=$_GET['nombre_cliente_e'];
    $cad_cliente_e=$_GET['cad_cliente_e'];
    
    $nombre_cliente_x=$_GET['nombre_cliente_x'];
    $cad_cliente_x=$_GET['cad_cliente_x'];
   
  
    
    
    $radio=$_GET['radio'];
    $ciudad=$_GET['ciudad'];
    $distrito=$_GET['distrito'];
    $imagen=$_GET["imagen"];
    
    date_default_timezone_set('UTC'); 
    $fecha=ucfirst(strftime("%m/%d/%Y"));

    
        $this->load->helper('to_dompdf');
        
           $data1['result'] = $this->area_influencia_model->consultar_area_influencia_nombre_variable_N();
           $data2['result'] = $this->area_influencia_model->consultar_area_influencia_datos_N2($_GET['txtManzanas'],$id_giro1,$id_giro2,$id_giro3,
           $_GET['p1_1'], $_GET['p2_1'], $_GET['p3_1'], $_GET['p4_1'], $_GET['p5_1'],
           $_GET['v1_1'], $_GET['v2_1'], $_GET['v3_1'], $_GET['v4_1'], $_GET['v5_1'],
           $_GET['p1_2'], $_GET['p2_2'], $_GET['p3_2'], $_GET['p4_2'], $_GET['p5_2'],
           $_GET['v1_2'], $_GET['v2_2'], $_GET['v3_2'], $_GET['v4_2'], $_GET['v5_2'],
           $_GET['p1_3'], $_GET['p2_3'], $_GET['p3_3'], $_GET['p4_3'], $_GET['p5_3'],
           $_GET['v1_3'], $_GET['v2_3'], $_GET['v3_3'], $_GET['v4_3'], $_GET['v5_3']  ); 

            $data2['color1'] = $color1;   
            $data2['color2'] = $color2;
            $data2['color3'] = $color3; 
            $data2['id_giro1'] = $id_giro1;  
            $data2['id_giro2'] = $id_giro2;
            $data2['id_giro3'] = $id_giro3;
  
           $data3['result'] = $this->area_influencia_model->consultar_area_influencia_nombre_variable_P();
         
           $data4['result'] = $this->area_influencia_model->consultar_area_influencia_datos_P3($_GET['txtManzanas'],$_GET['x1'],$_GET['x2'],
           $_GET['e1'],$_GET['e2'],$_GET['e3'],$_GET['e4'],$_GET['e5'],$_GET['e6'],$_GET['n1'],$_GET['n2'],$_GET['n3'],
           $_GET['pea1'],$_GET['pea2'],$_GET['pea3']        
                   );  
 
        
        $this->load->view('funciones_color');
        $html1a = '<tr><td><table><tr><td><strong>Informacion de Competencia</strong></td></tr></table></td></tr>' ;
        
        
        $html1 = $this->load->view('ficha1_view',$data1,true);  
        $html2=  $this->load->view('ficha2_view',$data2,true);
        $html3a = '<tr><td><table ><tr><td><strong>Informacion de Mercado</strong></td></tr></table></td></tr>' ;
        
        $html3 =  $this->load->view('ficha3_view',$data3,true); 
        $html4 =  $this->load->view('ficha4_view',$data4,true); 
       
       
        $ct='<table border=1 cellpadding="0" cellspacing="0"  width=100% align=center style="font-family:arial;font-size:10pt;">';
        $ct .='<tr><td valign="middle" align=center>Gobierno del Peru</td><td valign="middle" align=center><strong>INFO-EMPRENDEDOR</strong></td><td valign="middle" align=center >MINTRA <br/> INEI</td></tr>';
        $ct .='</table>';
        
        $ca='<table border=1 cellpadding="0" cellspacing="0"  width=100% align=center style="font-family:arial;font-size:10pt;">';
        $ca .='<tr><td><strong>Ciudad:</strong>'.$ciudad.'</td><td><strong>Distrito:</strong>'.$distrito.'</td><td><strong>Fecha:'.$fecha.'</strong></td></tr>';
        $ca .='</table>';
        
        
        $dgia='<table border=1 cellpadding="0" cellspacing="0"  width=100% align=center>';
        $dgia .='<tr><td valign=top><strong>Giros seleccionados</strong></td><td valign=top><strong>'.$nombre_variable1.'</strong></td><td>    </td><td valign=top><strong>'.$nombre_variable2.'</strong></td></tr>';
        $dgia .='<tr><td>'.$giro3.'</td><td>'.$cadena_p_3.'</td><td>   </td><td>'.$cadena_v_3.' </td></tr>';
        $dgia .='<tr><td>'.$giro2.'</td><td>'.$cadena_p_2.'</td><td>   </td><td>'.$cadena_v_2.' </td></tr>';
        $dgia .='<tr><td>'.$giro1.'</td><td>'.$cadena_p_1.'</td><td>   </td><td>'.$cadena_v_1.' </td></tr>';
        $dgia .='</table>';
        
        $dgib .='<table border=1 cellpadding="0" cellspacing="0"  width=100% align=center>';
        $dgib .='<tr><td><strong>Area de influencia</strong></td><td>  </td>';
        $dgib .='<td valign=top><strong>'.$nombre_cliente_pea.'</strong></td><td></td><td valign=top ><strong>'.$nombre_cliente_n.'</strong></td><td> </td>';
        $dgib .='<td valign=top><strong>'.$nombre_cliente_e.'</strong></td><td></td><td valign=top><strong>'.$nombre_cliente_x.'</strong></td></tr><tr>';  
        $dgib .='<td>'.$radio.' radio en metros</td><td></td><td>'.$cad_cliente_pea.'</td><td></td>';  
        $dgib .='<td>'.$cad_cliente_n.'</td><td></td><td>'.$cad_cliente_e.'</td><td></td><td>'.$cad_cliente_x.'</td>';  
        $dgib .='</tr>';
        $dgib .='</table>';
        

        //<td>'.$radio.' radio en metros</td>
        
        
        $dgb='<table border=1 cellpadding="0" cellspacing="0" bordercolor="#000000" width=100% align=center > ';
        $dgb .='<tr><td><strong>Datos Generales</strong></td></tr></table>';
        
        $dg .='<table width=100% border=0 align=center valign=top>';
        $dg .='<tr><td>'.$dgi.'</td></tr>';
        $dg .='</table>';
        
      $html='<table cellpadding="0" cellspacing="0" border=0 width=100% align=center><tr><td>'.$ct.$ca.$dgb.$dgia.$dgib.'</td></tr></table>
          <table width=100%>'.$html1a.'<tr><td>'.$html1.$html2.'</td></tr><tr>
          <td><font size=2>Fuente:CENEC 2008</font></td></tr>'.$html3a.'<tr><td>'.$html3.$html4.'<tr>
           <td><font size=2>Fuente:CPV 2007</font></td></tr></td></tr></table>';
       
     $html= str_replace("<h5>","<strong><font size=2>",$html);
     $html= str_replace("<h4>","<strong><font size=2>",$html);
     $html= str_replace("</h5>","</font></strong>",$html);
     $html= str_replace("</h4>","</font></strong>",$html);
    
     //segunda hoja
     $pdf1='<div  style="height: 100%; width: 100%; background-color: #f3f3f3 ;font-family:arial;font-size:10pt;">'.utf8_decode($html).'</div>';
     
     //segunda hoja
     
         $html_gir=  $this->load->view('giros_view',$data2,true);
         $html_man=  $this->load->view('manzanas_view',$data4,true);
         $html_mer=  $this->load->view('mercado_view',$data4,true);
     


           
 $imagen1='<table cellpadding="0" cellspacing="0" border=0 width=100% align=center >
  <tr>
     <td>
            <table border=1>
               <tr>
                  <td>
                <img   src="'.base_url().$imagen.'">
                  </td>
             </table>
      </td>
      <td>
         <table   cellpadding="0" cellspacing="0"  width=100% align=center border=1 align=center style="border-collapse:collapse; font-family:arial;font-size:10pt;">
                <tr>
                    <td colspan=2>
                        <table width=100% style="border-collapse:collapse;" >
                        <tr><td bgcolor="#ff9999"><strong>Resumen</strong></td></tr>
                        <tr><td>Area de Influencia:'.$radio.'mts de Radio</td></tr>
                         </table>
                     <table width="100%" border="1" cellpading=0 cellpacing=0>'.$html_man.$html_gir.$html_mer.'</table>
                         </td>
                  </tr>
                  <tr colspan=2>
                    <td bgcolor="#ff9999"><strong>Leyenda</strong></td>
                  </tr>
                  <tr>
                    <td colspan=2><img height="100px" src="'.base_url().'images/Leyenda_estratos.PNG"></td>
                  </tr>
                  <tr>
                    <td><img height="150px" src="'.base_url().'images/Leyenda_giros2.png"></td>
                    <td><img height="150px" src="'.base_url().'images/Leyenda_sitios_interes.PNG"></td>
                  </tr>    
                </table>
            </td>
       </tr>
 </table>';

  
     
     
     $html='<table cellpadding="0" cellspacing="0" border=0 width=100% align=center ><tr><td>'.$ct.$ca.'</tr></td></table>';
     $html .= $imagen1;
     
     
     $pdf2='<div style="height: 100%; width: 100%; background-color: #f3f3f3" ;font-family:arial;font-size:10pt;>'.utf8_decode($html).'</div>';
     
 //   $html='<table><tr><td><img src="'.base_url().'images/logo02.jpg"></td></tr></table>';
    
//echo $pdf1.$pdf2;
   generarPdf($pdf1.$pdf2,'Ficha Resumen','a4','landscape');
 
     }
          
    
                
      }