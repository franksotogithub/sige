<?php

if (!defined('BASEPATH'))
    exit('No se permite el acceso directo a las p&aacute;ginas de este sitio.');

class Ubicacion extends CI_Controller {

    function __construct() {
        parent::__construct();


        $this->load->model('ubicacion_model');
    }

    function index() {
        $this->load->view('login_view');
    }

    function consultar_ciudad() {

        $rsciudad = $this->ubicacion_model->consultar_ciudad();
        $response = '{"00":"Seleccione",';

        $i = 0;
        foreach ($rsciudad as $row) {
            $response .= '"' . $row->cadena . '":"' . $row->ciudad_nombre . '",';
        }
        echo substr($response, 0, strlen($response) - 1) . "}";
    }

    function consultar_departamento() {

        $rsciudad = $this->ubicacion_model->consultar_departamento();
        $response = '{"00":"Seleccione",';

        $i = 0;
        foreach ($rsciudad as $row) {
            $response .= '"' . $row->cadena . '":"' . $row->ciudad_nombre . '",';
        }
        echo substr($response, 0, strlen($response) - 1) . "}";
    }

    function consultar_provincia() {

        $rsciudad = $this->ubicacion_model->consultar_provincia($_POST['accdd']);
        $response = '{"00":"Seleccione",';

        $i = 0;
        foreach ($rsciudad as $row) {
            $response .= '"' . $row->cadena . '":"' . $row->ciudad_nombre . '",';
        }
        echo substr($response, 0, strlen($response) -  1) . "}";
    }

    function consultar_distrito() {

        $rsciudad = $this->ubicacion_model->consultar_distrito($_POST['accdd'], $_POST['accpp']);
        $response = '{"00":"Seleccione",';

        $i = 0;
        foreach ($rsciudad as $row) {
            $response .= '"' . $row->cadena . '":"' . utf8_decode($row->ciudad_nombre) . '",';
        }
        echo substr($response, 0, strlen($response) - 1) . "}";
    }

//http://sige.inei.gob.pe/cgi-bin/mapserv?
    function consultar_centropoblado() {
        $data = array();
        $rsciudad = $this->ubicacion_model->consultar_centropoblado($_POST['aubigeo'], $_POST['aterm']);

        foreach ($rsciudad as $row) {
            $row_array['id'] = $row->cadena;
            $row_array['value'] = $row->ciudad_nombre;
            $data[] = $row_array;
        }

        echo json_encode($data);
    }

    function leyenda_centropoblado() {
                $ubigeo = $_POST['aubigeo'];
        $centro = $_POST['aterm'];

        $rsleyenda = $this->ubicacion_model->consultar_leyenda_cp($ubigeo, $centro);

        $HTML = '<span id="titleyMercado" style="font-family:arial; font-size:11px; font-weight:bold; text-decoration:underline;  ">Leyenda del mapa</span>';
        $HTML .='<div id="leyMercado" style="height:200px;">';
        $HTML .='<table>';

        $HTML .='<tr><td align="center"><img src="images/capital.png"/></td><td style="font-size: 10.5px ">Capital de distrito</td></tr>';


        foreach ($rsleyenda as $row) {
            switch ($row->area) {
                case 1:
                    $img = "<img src='images/rrojo.png' style='width:14px; height:13px' />";
                    break;
                case 2:
                    $img = "<img src='images/rverde.png' style='width:14px; height:13px' />";
                    break;
                //case 3:
                //    $img = "<img src='images/rmorado.png' style='width:17px; height:16px' />";
                //    break;
            }
            $HTML .='<tr><td align="center">' . $img . '</td><td style="font-size: 10.5px">' . $row->tipo .' - ' . $row->cantidad . '</td></tr>';
        }
        //$HTML .='<tr><td><img src="images/rmorado.png" style="width:17px; height:16px" /></td><td style="font-size: 10.5px">CCPP Reubicado</td></tr>';
        //$HTML .='<tr><td colspan="2"><img src="images/leyvias.png" style="width:200px;height=250px" /></td></tr>';
	
	$HTML .='<tr><td><img src="images/lc_dpto.png" style="width:50px; " / ></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Límite censal de departamento y provincia</td></tr>';
        $HTML .='<tr><td><img src="images/lc_dist3.png"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Límite censal de distrito</td></tr>';
        $HTML .='<tr><td><img src="images/rios.png" style="width:50px;"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Ríos</td></tr>';
        $HTML .='<tr><td><img src="images/acequia.png" style="width:50px;"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Acequia</td></tr>';
        $HTML .='<tr><td><img src="images/carreterapana3.png"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Carre Panamericana</td></tr>';
        $HTML .='<tr><td><img src="images/carreteraasfal3.png"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Carretera Asfaltada</td></tr>';
        $HTML .='<tr><td><img src="images/carreteraafirmada3.png"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Carretera Afirmada</td></tr>';
        $HTML .='<tr><td><img src="images/carrozable3.png"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Camino Carrozable</td></tr>';
        $HTML .='<tr><td><img src="images/caminoHerradura3.png"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Camino de herradura</td></tr>';

        $HTML .='<tr></tr><tr><td colspan="2"><h3>Límite censal del mapa politico del Peru (referencial)</h3></td></tr>';
        $HTML .='</table>';
        $HTML .='</div>';

        echo $HTML;
    }

    function consultar_giro() {

        $data['result'] = $this->ubicacion_model->consultar_giro();
        $this->load->view('giro_view', $data);
    }

    function buscar_distrito() {


        $rsdistrito = $this->ubicacion_model->buscar_distrito($_POST['codciudad']);
        $response = '{"00":"Seleccione",';
        $i = 0;
        foreach ($rsdistrito as $row) {
            $response .= '"' . $row->cadena . '":"' . ($row->dist_nombre) . '",';
        }
        echo substr($response, 0, strlen($response) - 1) . "}";
    }

    function buscar_via() {
        $data = array();


        foreach ($this->ubicacion_model->buscar_via($_POST['ubigeo'], $_POST['term']) as $row) {
            $row_array['id'] = $row->cadena;
            $row_array['value'] = $row->nombre_via;
            $data[] = $row_array;
        }

        echo json_encode($data);
    }

    function Buscar_via_tramo() {


        $data['result'] = $this->ubicacion_model->Buscar_via_tramo($_POST['id_via']);
        $this->load->view('via_tramo_view', $data);
    }

    function Buscar_nucleo() {


        $rsnucleo = $this->ubicacion_model->Buscar_nucleo($_POST['ubigeo']);


        $response = '{"00":"Seleccione",';
        $i = 0;
        foreach ($rsnucleo as $row) {
            $response .= '"' . $row->codnnuu . '":"' . utf8_encode($row->nnuu_nombre) . '",';
        }
        echo substr($response, 0, strlen($response) - 1) . "}";
    }

    function Buscar_lugar_de_interes() {


        $rslugar_de_interes = $this->ubicacion_model->Buscar_lugar_de_interes($_POST['ubigeo']);


        $response = '{"00":"Seleccione",';
        $i = 0;
        foreach ($rslugar_de_interes as $row) {
            $response .= '"' . $row->id_lugarint . '":"' . utf8_encode($row->lugar_nombre) . '",';
        }
        echo substr($response, 0, strlen($response) - 1) . "}";
    }

}

?>
