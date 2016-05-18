<?php

class Area_influencia extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('area_influencia_model');
        $this->load->helper('file');
    }

    function index() {
        $this->load->view('login_view');
    }

    function buscar_area_influencia_map() {

        if (!isset($_GET['txtPuntox']) || !isset($_GET['txtPuntoy'])) {
            $this->load->view('login_view');
        } else {

            $rsArea = $this->area_influencia_model->buscar_area_influencia_map($_GET['txtPuntox'], $_GET['txtPuntoy'], $_GET['txtRadio']);

            $primero = 0;

            $response = '[';
            $response2 = '';
            $response3 = '';
            $response4 = '';
            $response5 = '';
            $response6 = '';

            foreach ($rsArea as $row) {
				
                if ($primero <> 0) {
                    $response .=',';
                    $response2 .=',';
                    $response3 .=',';
                    $response4 .=',';
                    $response5 .=',';
                    $response6 .=',';
                }


                $response .= $row->cadena;
                $response2 .= $row->id;
                $response3 .= $row->ubi;
                $response4 .= $row->cod_ccpp;
                $response5 .= $row->nom_ccpp;
                $response6 .= $row->c_area;
                $primero = 1;
            }

            $response .=']';

            echo $response . '&&' . $response2 . '&&' . $response3 . '&&' . $response4 . '&&' . utf8_decode($response5) . '&&' . $response6;
        }
    }

    function buscar_area_influencia_viv() {

        if (!isset($_GET['txtPuntox']) || !isset($_GET['txtPuntoy'])) {
            $this->load->view('login_view');
        } else {

            $rsArea = $this->area_influencia_model->buscar_area_influencia_viv($_GET['txtPuntox'], $_GET['txtPuntoy'], $_GET['txtRadio']);

            $primero = 0;

            $response = '[';
            $response2 = '';
            $response3 = '';
            $response4 = '';
            $response5 = '';
            $response6 = '';
            $response7 = '';
            $response8 = '';
            $response9 = '';

            foreach ($rsArea as $row) {

                if ($primero <> 0) {
                    $response .=',';
                    $response2 .=',';
                    $response3 .=',';
                    $response4 .=',';
                    $response5 .=',';
                    $response6 .=',';
                    $response7 .=',';
                    $response8 .=',';
                    $response9 .=',';
                }


                $response .= $row->cadena;
                $response2 .= $row->id;
                $response3 .= $row->ubi;
                $response4 .= $row->cod_ccpp;
                $response5 .= $row->zn;
                $response6 .= $row->mzn;
                $response7 .= $row->frnte;
                $response8 .= $row->idreg;
                $response9 .= $row->ulocal;
                $primero = 1;
            }

            $response .=']';

            echo $response . '&&' . $response2 . '&&' . $response3 . '&&' . $response4 . '&&' . $response5 . '&&' . $response6 . '&&' . $response7 . '&&' . $response8 . '&&' . $response9;
        }
    }


    function buscar_area_influencia_dpto() {

        if (!isset($_GET['txtPuntox']) || !isset($_GET['txtPuntoy'])) {
            $this->load->view('login_view');
        } else {

            $rsArea = $this->area_influencia_model->buscar_area_influencia_dpto($_GET['txtPuntox'], $_GET['txtPuntoy']);

            $primero = 0;

            $response='';

            //$response = '[';
            
            foreach ($rsArea as $row) {

                if ($primero <> 0) {
                    $response .=',';
                    }


                $response .= $row->ubi;
                $primero = 1;
            }

            //$response .=']';

            echo $response;
        }
    }




    function buscar_area_influencia_prov() {

        if (!isset($_GET['txtPuntox']) || !isset($_GET['txtPuntoy'])) {
            $this->load->view('login_view');
        } else {

            $rsArea = $this->area_influencia_model->buscar_area_influencia_prov($_GET['txtPuntox'], $_GET['txtPuntoy']);

            $primero = 0;

            $response='';

            //$response = '[';
            
            foreach ($rsArea as $row) {

                if ($primero <> 0) {
                    $response .=',';
                    }


                $response .= $row->ubi;
                $primero = 1;
            }

            //$response .=']';

            echo $response;
        }
    }


    function buscar_area_influencia_dist() {

        if (!isset($_GET['txtPuntox']) || !isset($_GET['txtPuntoy'])) {
            $this->load->view('login_view');
        } else {

            $rsArea = $this->area_influencia_model->buscar_area_influencia_dist($_GET['txtPuntox'], $_GET['txtPuntoy']);

            $primero = 0;

            $response='';

            //$response = '[';
            
            foreach ($rsArea as $row) {

                if ($primero <> 0) {
                    $response .=',';
                    }


                $response .= $row->ubi;
                $primero = 1;
            }

            //$response .=']';

            echo $response;
        }
    }


    function consultar_reporte_zsc() {
        $ubigeo = $_GET['ubigeo']; //$_POST['txtManzanas'];
        $ccpp = $_GET['ccpp'];
        $rs = $this->area_influencia_model->consultar_area_influencia_datos_ccpp($ubigeo, $ccpp);

        //print_r($_GET['page']);
        $response = new stdClass();
        $response->page = 1;  // current page 
        $response->total = $this->area_influencia_model->total_pages;   // total pages 
        $response->records = $this->area_influencia_model->count_rows;   // total records 
        $i = 0;
        //var_dump($rs);
        //exit();
        foreach ($rs as $clave => $row) {


            foreach ($row as $k => $v) {
                //echo $k . ' ' .$v . '<br />';
                $response->rows[$i]['id'] = $i; //id 
                $cell = array(strtoupper($k), $v);
                $response->rows[$i]['cell'] = $cell;
                $i++;
            }
        }

        echo json_encode($response);
    }

    function info_bubble_zsc() {
        $ubigeo = $_GET['ubigeo']; //$_POST['txtManzanas'];
        $ccpp = str_pad($_GET['ccpp'], 4, '0', STR_PAD_LEFT);
        $rs = $this->area_influencia_model->consultar_area_influencia_datos_ccpp($ubigeo, $ccpp);

        //print_r($_GET['page']);
        $response = new stdClass();
        $response->page = 1;  // current page 
        $response->total = $this->area_influencia_model->total_pages;   // total pages 
        $response->records = $this->area_influencia_model->count_rows;   // total records 
//        $i = 0;
        //var_dump($rs);
        //exit();
        foreach ($rs as $clave => $row) {
            foreach ($row as $k => $v) {
                $response->rows[strtoupper(utf8_decode($k))] = $v;
//                $response->rows[$i]['id'] = $i; //id 
//                $response->rows[$i]['descripcion'] = strtoupper($k); //descripcion
//                $response->rows[$i]['vnac'] = $v; //valor
//                $i++;
            }
        }

//        $data['data'] = json_encode($response);
        $data['data'] = $response;
        $html = $this->load->view('infoBubble', $data, true);
        echo $html;
    }




    function consultar_reporte_viv() {
        $ubigeo = $_GET['ubigeo']; //$_POST['txtManzanas'];
        $ccpp = $_GET['ccpp'];
        $zona = $_GET['zona'];
        $manzana = $_GET['manzana'];
        $frente = $_GET['frente'];
        $idreg = $_GET['idreg'];
        $rs = $this->area_influencia_model->consultar_area_influencia_datos_viv($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg);
        //$rs2 = $this->area_influencia_model->consultar_area_influencia_datos_viv_img($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg);
        //print_r($_GET['page']);
        $response = new stdClass();
        $response->page = 1;  // current page 
        $response->total = $this->area_influencia_model->total_pages;   // total pages 
        $response->records = $this->area_influencia_model->count_rows;   // total records 
        $i = 0;
        //var_dump($rs);
        //exit();
        foreach ($rs as $clave => $row) {


            foreach ($row as $k => $v) {
                //echo $k . ' ' .$v . '<br />';
                $response->rows[$i]['id'] = $i; //id 
                $cell = array(strtoupper($k), $v);
                $response->rows[$i]['cell'] = $cell;
                $i++;
            }
        }

        echo json_encode($response);
    }

  function consultar_reporte_nacional() {
        
        $rs = $this->area_influencia_model->consultar_area_influencia_datos_nacional();
        
        $response = new stdClass();
        $response->page = 1;  // current page 
        $response->total = $this->area_influencia_model->total_pages;   // total pages 
        $response->records = $this->area_influencia_model->count_rows;   // total records 
        $i = 0;
        //var_dump($rs);
        //exit();
        foreach ($rs as $clave => $row) {

            foreach ($row as $k => $v) {
                //echo $k . ' ' .$v . '<br />';
                $response->rows[$i]['id'] = $i; //id 
                $cell = array(strtoupper($k));
                
                $porcentaje=0;

                if($i=='0' )
                {
                    $porcentaje=(round($v/25 *100,1 )).'%';
                    //$porcentaje=(bcdiv($v,'25' ,2 )*100).'%';

                   array_push($cell,'25',$v,''); 
                //array_push($cell,'25',$v,$porcentaje);
                }

                else if($i=='1' )
                {

                    $porcentaje=(round($v/196 *100,1 )).'%';
                    //$porcentaje=(bcdiv($v,'196' ,2 )*100).'%';
                    //array_push($cell,'196',$v,$porcentaje);
                    array_push($cell,'196',$v,''); 

                }
                else if($i=='2' )
                {
                    $porcentaje=(round($v/1866*100 ,1 )).'%';
                    //$porcentaje=(bcdiv($v,'1866' ,2 )*100).'%';
                    array_push($cell,'1866',$v,$porcentaje);
                }
                else 
                array_push($cell,'',$v,'');
                    
                $response->rows[$i]['cell'] = $cell;

                $i++;
            }
        }

        echo json_encode($response);
    }


  function consultar_reporte_dpto() {
        $ubigeo = $_GET['ubigeo']; //$_POST['txtManzanas'];
        
        $rs = $this->area_influencia_model->consultar_area_influencia_datos_dpto($ubigeo);
        //$rs2 = $this->area_influencia_model->consultar_area_influencia_datos_viv_img($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg);
        //print_r($_GET['page']);
        $response = new stdClass();
        $response->page = 1;  // current page 
        $response->total = $this->area_influencia_model->total_pages;   // total pages 
        $response->records = $this->area_influencia_model->count_rows;   // total records 
        $i = 0;
        //var_dump($rs);
        //exit();
        foreach ($rs as $clave => $row) {

            foreach ($row as $k => $v) {
                //echo $k . ' ' .$v . '<br />';
                $response->rows[$i]['id'] = $i; //id 
                $cell = array(strtoupper($k), $v);
                $response->rows[$i]['cell'] = $cell;
                $i++;
            }
        }

        echo json_encode($response);
    }


    function consultar_reporte_prov() {
        $ubigeo = $_GET['ubigeo']; //$_POST['txtManzanas'];
        
        $rs = $this->area_influencia_model->consultar_area_influencia_datos_prov($ubigeo);
        //$rs2 = $this->area_influencia_model->consultar_area_influencia_datos_viv_img($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg);
        //print_r($_GET['page']);
        $response = new stdClass();
        $response->page = 1;  // current page 
        $response->total = $this->area_influencia_model->total_pages;   // total pages 
        $response->records = $this->area_influencia_model->count_rows;   // total records 
        $i = 0;
        //var_dump($rs);
        //exit();
        foreach ($rs as $clave => $row) {

            foreach ($row as $k => $v) {
                //echo $k . ' ' .$v . '<br />';
                $response->rows[$i]['id'] = $i; //id 
                $cell = array(strtoupper($k), $v);
                $response->rows[$i]['cell'] = $cell;
                $i++;
            }
        }

        echo json_encode($response);
    }



    function consultar_reporte_dist() {
        $ubigeo = $_GET['ubigeo']; //$_POST['txtManzanas'];
        
        $rs = $this->area_influencia_model->consultar_area_influencia_datos_dist($ubigeo);
        //$rs2 = $this->area_influencia_model->consultar_area_influencia_datos_viv_img($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg);
        //print_r($_GET['page']);
        $response = new stdClass();
        $response->page = 1;  // current page 
        $response->total = $this->area_influencia_model->total_pages;   // total pages 
        $response->records = $this->area_influencia_model->count_rows;   // total records 
        $i = 0;
        //var_dump($rs);
        //exit();
        foreach ($rs as $clave => $row) {

            foreach ($row as $k => $v) {
                //echo $k . ' ' .$v . '<br />';
                $response->rows[$i]['id'] = $i; //id 
                $cell = array(strtoupper($k), $v);
                $response->rows[$i]['cell'] = $cell;
                $i++;
            }
        }

        echo json_encode($response);
    }


function consultar_reporte_viv_img_flag() {
        $ubigeo = $_GET['ubigeo']; //$_POST['txtManzanas'];
        $ccpp = $_GET['ccpp'];
        $zona = $_GET['zona'];
        $manzana = $_GET['manzana'];
        $frente = $_GET['frente'];
        $idreg = $_GET['idreg'];
        
        $rs = $this->area_influencia_model->consultar_area_influencia_datos_viv_img_2($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg);
        
        //$rs2 = $this->area_influencia_model->consultar_area_influencia_datos_viv_img($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg);
        //print_r($_GET['page']);
        //$response = new stdClass();
        //$response->page = 1;  // current page 
        //$response->total = $this->area_influencia_model->total_pages;   // total pages 
        //$response->records = $this->area_influencia_model->count_rows;   // total records 
        //$i = 0;
        //var_dump($rs);
        //exit();
        /*foreach ($rs as $clave => $row) {


            foreach ($row as $k => $v) {
                //echo $k . ' ' .$v . '<br />';
                $response->rows[$i]['id'] = $i; //id 
                $cell = array(strtoupper($k), $v);
                $response->rows[$i]['cell'] = $cell;
                $i++;
            }
        }

        echo json_encode($response);*/
        
      
        echo $rs;

    }



    function info_bubble_vivienda() {
        $ubigeo = $_GET['ubigeo']; //$_POST['txtManzanas'];
        $ccpp = str_pad($_GET['ccpp'], 4, '0', STR_PAD_LEFT);
        $zona = $_GET['zona'];
        $manzana = $_GET['manzana'];
        $frente = intval($_GET['frente']);
        $idreg = intval($_GET['idreg']);
        $rs = $this->area_influencia_model->consultar_area_influencia_datos_viv($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg);
        $image = $this->area_influencia_model->consultar_area_influencia_datos_viv_img($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg);

        //print_r($_GET['page']);
        $response = new stdClass();
        $response->page = 1;  // current page 
        $response->total = $this->area_influencia_model->total_pages;   // total pages 
        $response->records = $this->area_influencia_model->count_rows;   // total records 
//        $i = 0;
        //var_dump($rs);
        //exit();
        foreach ($rs as $clave => $row) {
            foreach ($row as $k => $v) {
                $response->rows[strtoupper(utf8_decode($k))] = $v;
//                $response->rows[$i]['id'] = $i; //id 
//                $response->rows[$i]['descripcion'] = $k; //descripcion
//                $response->rows[$i]['vnac'] = $v; //valor
//                $i++;
            }
        }

//        $data['data'] = json_encode($response);        
        $urlimage = NULL;
        if ($image) {
            $filename = '/var/www/html/test/atlas/images/img_' . $zona . $manzana . $frente . $idreg . '.png';
            $oimage = imagecreatefromstring($image);
            $resp = imagepng($oimage, $filename);
            if ($resp) {
                $urlimage = 'http://sige.inei.gob.pe/test/atlas/images/img_' . $zona . $manzana . $frente . $idreg . '.png';
            }
        }

        $data['data'] = $response;
        $data['image'] = $urlimage;
        $data['url'] = "http://sige.inei.gob.pe/test/atlas/index.php/area_influencia/info_bubble_vivienda?ubigeo=$ubigeo&ccpp=$ccpp&zona=$zona&manzana=$manzana&frente=$frente&idreg=$idreg";
        $html = $this->load->view('infoBubble', $data, true);
        echo $html;
    }

    function info_bubble_vivienda_img() {
        $ubigeo = $_GET['ubigeo'];
        $ccpp = str_pad($_GET['ccpp'], 4, '0', STR_PAD_LEFT);
        $zona = $_GET['zona'];
        $manzana = $_GET['manzana'];
        $frente = intval($_GET['frente']);
        $idreg = intval($_GET['idreg']);

        $image = $this->area_influencia_model->consultar_area_influencia_datos_viv_img($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg);
        header("Content-type: image/jpeg");
        echo $image;
    }





    function consultar_area_influencia_datos() {

        if (!isset($_POST['txtManzanas']) || !isset($_POST['v5_3'])) {
            $this->load->view('login_view');
        } else {

            $html = "";
            $html2 = "";
            $html3 = "";
            $html4 = "";
            $data1['result'] = $this->area_influencia_model->consultar_area_influencia_nombre_variable_N();
            $data2['result'] = $this->area_influencia_model->consultar_area_influencia_datos_N($_POST['txtManzanas'], $_POST['id_giro1'], $_POST['id_giro2'], $_POST['id_giro3'], $_POST['p1_1'], $_POST['p2_1'], $_POST['p3_1'], $_POST['p4_1'], $_POST['p5_1'], $_POST['v1_1'], $_POST['v2_1'], $_POST['v3_1'], $_POST['v4_1'], $_POST['v5_1'], $_POST['p1_2'], $_POST['p2_2'], $_POST['p3_2'], $_POST['p4_2'], $_POST['p5_2'], $_POST['v1_2'], $_POST['v2_2'], $_POST['v3_2'], $_POST['v4_2'], $_POST['v5_2'], $_POST['p1_3'], $_POST['p2_3'], $_POST['p3_3'], $_POST['p4_3'], $_POST['p5_3'], $_POST['v1_3'], $_POST['v2_3'], $_POST['v3_3'], $_POST['v4_3'], $_POST['v5_3']);


            $data3['result'] = $this->area_influencia_model->consultar_area_influencia_nombre_variable_P();

            $data4['result'] = $this->area_influencia_model->consultar_area_influencia_datos_P($_POST['txtManzanas'], $_POST['x1'], $_POST['x2'], $_POST['e1'], $_POST['e2'], $_POST['e3'], $_POST['e4'], $_POST['e5'], $_POST['e6'], $_POST['n1'], $_POST['n2'], $_POST['n3'], $_POST['pea1'], $_POST['pea2'], $_POST['pea3']
            );


            $this->load->view('funciones_color');


            $html1c = '<tr><td><h3>Informacion de Negocios</h3></td></tr>';

            $html1f = '<tr><td>Fuente: INEI CENEC 2008</td></tr>';
            $html1 = $this->load->view('ficha1_view', $data1, true);
            $html2 = $this->load->view('ficha2_view', $data2, true);

            $html3c = '<tr><td><h3>Informacion de Segmento de Mercado</h3></td></tr>';

            $html3f = '<tr><td>Fuente: INEI CPV 2007</td></tr>';
            $html3 = $this->load->view('ficha3_view', $data3, true);
            $html4 = $this->load->view('ficha4_view', $data4, true);


            echo $html1c . '<tr><td>' . $html1 . $html2 . '</td></tr>' . $html1f . $html3c . '<tr><td>' . $html3 . $html4 . '</td></tr>' . $html3f;
        }
    }




    function exportar_excel() {
        $ubigeox=$_POST['excelubigeo'];
        $ccppx=$_POST['excelccpp'];

        if(strlen($ccppx)==0)
        $data['result'] = $this->area_influencia_model->consultar_area_influencia_datos_ccpp($ubigeox, $ccppx);
        
        if(strlen($ubigeox)==2)

         $data['result'] = $this->area_influencia_model->consultar_area_influencia_datos_dpto($ubigeox);   

        if(strlen($ubigeox)==4)
        $data['result'] = $this->area_influencia_model->consultar_area_influencia_datos_prov($ubigeox);   

        if(strlen($ubigeox)==6)
        $data['result'] = $this->area_influencia_model->consultar_area_influencia_datos_dist($ubigeox);   

        //$data['result'] = $this->area_influencia_model->consultar_area_influencia_datos_ccpp($_POST['excelubigeo'], $_POST['excelccpp']);
        

        $this->load->view('excel_view', $data);

    }


 function exportar_excel_dpto() {

        $data['result'] = $this->area_influencia_model->consultar_area_influencia_datos_ccpp($_POST['excelubigeo']);
        $this->load->view('excel_view', $data);

    }




    function ficha_pdf() {

        if (!isset($_POST['id_giro1']) || !isset($_POST['cad_cliente_x'])) {
            $this->load->view('login_view');
        } else {


            $html = "";
            $html2 = "";
            $html3 = "";
            $html4 = "";
            $dg = "";
            $dgi = "";
            $dgib = "";

            $id_giro1 = "";

            $id_giro1 = $_POST['id_giro1'];
            $id_giro2 = $_POST['id_giro2'];
            $id_giro3 = $_POST['id_giro3'];

            $color1 = $_POST['pcolor1'];
            $color2 = $_POST['pcolor2'];
            $color3 = $_POST['pcolor3'];

            $giro1 = $_POST['giro1'];
            $giro2 = $_POST['giro2'];
            $giro3 = $_POST['giro3'];


            $cadena_p_1 = $_POST['cadena_p_1'];
            $cadena_v_1 = $_POST['cadena_v_1'];

            $cadena_p_2 = $_POST['cadena_p_2'];
            $cadena_v_2 = $_POST['cadena_v_2'];

            $cadena_p_3 = $_POST['cadena_p_3'];
            $cadena_v_3 = $_POST['cadena_v_3'];

            $nombre_variable1 = $_POST['nombre_variable1'];
            $nombre_variable2 = $_POST['nombre_variable2'];

            $nombre_cliente_n = $_POST['nombre_cliente_n'];
            $cad_cliente_n = $_POST['cad_cliente_n'];

            $nombre_cliente_pea = $_POST['nombre_cliente_pea'];
            $cad_cliente_pea = $_POST['cad_cliente_pea'];


            $nombre_cliente_e = $_POST['nombre_cliente_e'];
            $cad_cliente_e = $_POST['cad_cliente_e'];

            $nombre_cliente_x = $_POST['nombre_cliente_x'];
            $cad_cliente_x = $_POST['cad_cliente_x'];




            $radio = $_POST['radio'];
            $ciudad = $_POST['ciudad'];
            $distrito = $_POST['distrito'];
            $imagen = $_POST["imagen"];




            $this->load->helper('to_dompdf');

            $data1['result'] = $this->area_influencia_model->consultar_area_influencia_nombre_variable_N();
            $data2['result'] = $this->area_influencia_model->consultar_area_influencia_datos_N($_POST['txtManzanas'], $id_giro1, $id_giro2, $id_giro3, $_POST['p1_1'], $_POST['p2_1'], $_POST['p3_1'], $_POST['p4_1'], $_POST['p5_1'], $_POST['v1_1'], $_POST['v2_1'], $_POST['v3_1'], $_POST['v4_1'], $_POST['v5_1'], $_POST['p1_2'], $_POST['p2_2'], $_POST['p3_2'], $_POST['p4_2'], $_POST['p5_2'], $_POST['v1_2'], $_POST['v2_2'], $_POST['v3_2'], $_POST['v4_2'], $_POST['v5_2'], $_POST['p1_3'], $_POST['p2_3'], $_POST['p3_3'], $_POST['p4_3'], $_POST['p5_3'], $_POST['v1_3'], $_POST['v2_3'], $_POST['v3_3'], $_POST['v4_3'], $_POST['v5_3']);

            $data2['color1'] = $color1;
            $data2['color2'] = $color2;
            $data2['color3'] = $color3;
            $data2['id_giro1'] = $id_giro1;
            $data2['id_giro2'] = $id_giro2;
            $data2['id_giro3'] = $id_giro3;

            $data3['result'] = $this->area_influencia_model->consultar_area_influencia_nombre_variable_P();

            $data4['result'] = $this->area_influencia_model->consultar_area_influencia_datos_P($_POST['txtManzanas'], $_POST['x1'], $_POST['x2'], $_POST['e1'], $_POST['e2'], $_POST['e3'], $_POST['e4'], $_POST['e5'], $_POST['e6'], $_POST['n1'], $_POST['n2'], $_POST['n3'], $_POST['pea1'], $_POST['pea2'], $_POST['pea3']
            );

            $data5['result'] = $this->area_influencia_model->obtener_nombre_ciudad_distrito($_POST['puntox'], $_POST['puntoy']);


            $this->load->view('funciones_color');
            $html1a = '<tr><td><table><tr><td><strong>Informacion de Negocios</strong></td></tr></table></td></tr>';


            $html1 = $this->load->view('ficha1_view', $data1, true);
            $html2 = $this->load->view('ficha2_view', $data2, true);
            $html3a = '<tr><td><table ><tr><td><strong>Informacion de Segmento de Mercado</strong></td></tr></table></td></tr>';

            $html3 = $this->load->view('ficha3_view', $data3, true);
            $html4 = $this->load->view('ficha4_view', $data4, true);

            $ct = $this->load->view('cabecera_ficha_view', '', true);
            // $ct='<table border=1 cellpadding="0" cellspacing="0"  width=100% align=center style="font-family:arial;font-size:10pt;">';
            // $ct .='<tr><td valign="middle" align=center>Gobierno del Peru</td><td valign="middle" align=center><strong>INFO-EMPRENDEDOR</strong></td><td valign="middle" align=center >MINTRA <br/> INEI</td></tr>';
            // $ct .='</table>';


            $ca = $this->load->view('ciudad_distrito_view', $data5, true);


            // $ca='<table border=1 cellpadding="0" cellspacing="0"  width=100% align=center style="font-family:arial;font-size:10pt;">';
            // $ca .='<tr><td><strong>Ciudad:</strong>'.$ciudad.'</td><td><strong>Distrito:</strong>'.$distrito.'</td><td><strong>Fecha:'.$fecha.'</strong></td></tr>';
            // $ca .='</table>';


            $dgia = '<table border=1 cellpadding="0" cellspacing="0"  width=100% align=center>';
            $dgia .='<tr><td valign=top><strong>Giros seleccionados</strong></td><td valign=top><strong>' . $nombre_variable1 . '</strong></td><td>    </td><td valign=top><strong>' . $nombre_variable2 . '</strong></td></tr>';
            $dgia .='<tr><td>' . $giro3 . '</td><td>' . $cadena_p_3 . '</td><td>   </td><td>' . $cadena_v_3 . ' </td></tr>';
            $dgia .='<tr><td>' . $giro2 . '</td><td>' . $cadena_p_2 . '</td><td>   </td><td>' . $cadena_v_2 . ' </td></tr>';
            $dgia .='<tr><td>' . $giro1 . '</td><td>' . $cadena_p_1 . '</td><td>   </td><td>' . $cadena_v_1 . ' </td></tr>';
            $dgia .='</table>';

            $dgib .='<table border=1 cellpadding="0" cellspacing="0"  width=100% align=center>';
            $dgib .='<tr><td><strong>Area de influencia</strong></td><td>  </td>';
            $dgib .='<td valign=top><strong>' . $nombre_cliente_pea . '</strong></td><td></td><td valign=top ><strong>' . $nombre_cliente_n . '</strong></td><td> </td>';
            $dgib .='<td valign=top><strong>' . $nombre_cliente_e . '</strong></td><td></td><td valign=top><strong>' . $nombre_cliente_x . '</strong></td></tr><tr>';
            $dgib .='<td>' . $radio . ' radio en metros</td><td></td><td>' . $cad_cliente_pea . '</td><td></td>';
            $dgib .='<td>' . $cad_cliente_n . '</td><td></td><td>' . $cad_cliente_e . '</td><td></td><td>' . $cad_cliente_x . '</td>';
            $dgib .='</tr>';
            $dgib .='</table>';


            //<td>'.$radio.' radio en metros</td>


            $dgb = '<table border=1 cellpadding="0" cellspacing="0" bordercolor="#000000" width=100% align=center > ';
            $dgb .='<tr><td><strong>Datos Generales</strong></td></tr></table>';

            $dg .='<table width=100% border=0 align=center valign=top>';
            $dg .='<tr><td>' . $dgi . '</td></tr>';
            $dg .='</table>';

            $html = '<table cellpadding="0" cellspacing="0" border=0 width=100% align=center><tr><td>' . $ct . $ca . $dgb . $dgia . $dgib . '</td></tr></table>
          <table width=100%>' . $html1a . '<tr><td>' . $html1 . $html2 . '</td></tr><tr>
          <td><font size=2>Fuente: INEI CENEC 2008</font></td></tr>' . $html3a . '<tr><td>' . $html3 . $html4 . '<tr>
           <td><font size=2>Fuente: INEI CPV 2007</font></td></tr></td></tr></table>';

            $html = str_replace("<h5>", "<strong><font size=2>", $html);
            $html = str_replace("<h4>", "<strong><font size=2>", $html);
            $html = str_replace("</h5>", "</font></strong>", $html);
            $html = str_replace("</h4>", "</font></strong>", $html);

            //segunda hoja
            $pdf1 = '<div  style="height: 100%; width: 100%; background-color: #f3f3f3 ;font-family:arial;font-size:10pt;">' . utf8_decode($html) . '</div>';

            //segunda hoja

            $html_gir = $this->load->view('giros_view', $data2, true);
            $html_man = $this->load->view('manzanas_view', $data4, true);
            $html_mer = $this->load->view('mercado_view', $data4, true);




            $imagen1 = '<table cellpadding="0" cellspacing="0" border=0 width=100% align=center >
  <tr>
     <td>
            <table border=1>
               <tr>
                  <td>
                <img   src="' . $imagen . '">
                  </td>
               </tr>
             </table>
      </td>
      <td>
         <table   cellpadding="0" cellspacing="0"  width=100% align=center border=1 align=center style="border-collapse:collapse; font-family:arial;font-size:10pt;">
                <tr>
                    <td>
                        <table width=100% style="border-collapse:collapse;" >
                        <tr><td bgcolor="#ff9999"><strong>Resumen</strong></td></tr>
                        <tr><td>Area de Influencia:' . $radio . 'mts de Radio</td></tr>
                         </table>
                        
                         </td>
                  </tr>
                  <tr>
                  <td>
                  
 <table width="100%" border="2" cellpading=0 cellpacing=0><tr><td>' . $html_man . '</td></tr><tr><td>' . $html_gir . '</td></tr><tr><td>' . $html_mer . '</td></tr></table>

                  </td>
                  </tr>
                  <tr>
                    <td bgcolor="#ff9999"><strong>Leyenda</strong></td>
                  </tr>
                  <tr bgcolor=white>
                    <td align="center"><img width="210px" height="120px"  src="images/Leyenda_estratos.PNG"></td>
                  </tr>
                  <tr bgcolor=white>
                    <td align="center"><img  width="194px" height="160px"  src="images/Leyenda_juntos.png"></td>
                  </tr>    
                </table>
            </td>
       </tr>
 </table>';




            $html = '<table cellpadding="0" cellspacing="0" border=0 width=100% align=center ><tr><td>' . $ct . $ca . '</tr></td></table>';
            $html .= $imagen1;


            $pdf2 = '<div style="height: 100%; width: 100%; background-color: #f3f3f3" ;font-family:arial;font-size:10pt;>' . utf8_decode($html) . '</div>';

            //   $html='<table><tr><td><img src="'.base_url().'images/logo02.jpg"></td></tr></table>';
//echo $pdf1.$pdf2;
            generarPdf($pdf1 . $pdf2, 'Ficha Resumen', 'a4', 'landscape');
        }
    }

}
