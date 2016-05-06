 <?php
//$session_id = $this->session->userdata('session_id');

if ($this->session->userdata('logged_in')===TRUE)
{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta name="author" content="<?php echo $this->config->item('author');?>">
<link href="/sige/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<title>Sistema de Consulta de Centros Poblados</title>
<!--
<?php echo $this->config->item('var_sis');?>
-->

<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="css/layout2.css" />
<link rel="stylesheet" type="text/css" href="css/panes.css" />
<link rel="stylesheet" type="text/css" href="css/header.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/estilos.css">

<link rel="stylesheet" type="text/css" href="css/ui.jqgrid.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-custom.css" />

<link rel="stylesheet" type="text/css" href="css/principal.css" />

<script type="text/javascript" src="js/jquery.global.js"></script>

<!--<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>-->
<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
<!--<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>-->
<script type="text/javascript" src="js/jquery/jquery-ui-1.8.2.custom.min.js"></script>
<!--<script type="text/javascript" src="js/jquery.elevatezoom.js"></script>-->
<!--<script type="text/javascript" src="js/jquery.zoom.js"></script>-->

<script src="http://maps.google.com/maps/api/js?v=3.3&sensor=false"></script>
<script type="text/javascript" src="js/OpenLayers.js"></script>

<script type="text/javascript" src="js/jquery.ctrl_zoom.js" ></script>
<script type="text/javascript" src="js/jquery/jquery.layout.js"></script>
<script type="text/javascript" src="js/jquery.validar.js"></script>
<script type="text/javascript" src="js/jquery.history.js"></script>
<script type="text/javascript" src="js/jquery.mapwidget.js"></script>
<script type="text/javascript" src="js/jquery.mapas.js" ></script>
<script type="text/javascript" src="js/gismap.js"></script>
<script type="text/javascript" src="js/tree/jquery.jstree.js"></script>
<script type="text/javascript" src="js/jlink/jlinq.js"></script>
<script type="text/javascript" src="js/jlink/jquery.jlink.js"></script>
<script type="text/javascript" src="js/jquery.funciones.js" ></script>
<script type="text/javascript" src="js/begin.js"  ></script>
<script type="text/javascript" src="js/jquery.selectboxes.js" ></script>
<script type="text/javascript" src="js/jquery.ubicacion.js" ></script>
<script type="text/javascript" src="js/jquery.area_influencia.js" ></script>
<script type="text/javascript" src="js/jquery.lugar_interes.js" ></script>
<script type="text/javascript" src="jqgrid/js/jquery.jqGrid.src.js" ></script>
<script type="text/javascript" src="js/jquery.clientes.js"></script>
<script type="text/javascript" src="js/default.js" defer="defer" ></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47702968-11', 'auto');
  ga('send', 'pageview');

	function abrirpag(){
        window.open("http://series.inei.gob.pe/cenagro-espacial/centros_poblados/");
    }
</script>

</head>
<body topmargin="0" leftmargin="0" oncontextmenu="return false" >
    <!-- <div id="cargando"   style="background-color:white;  position:absolute; z-index:30; top:0;  width: 100%; height: 100%; text-align: center">  -->
        <!-- <div style=" position: absolute; left: 50%;top: 50%;height: 219px;margin-top: -110px;width: 344px;margin-left: -172px; " > -->
            <!-- <img src="images/carga_pagina.gif"> -->
        <!-- </div>                -->
    <!-- </div> -->
	<div class="ui-layout-north gis-heading"  >
	    <div id="header">
	        <div id="menuSecundario">
	            <ul>
	                <li><a href="http://sige.inei.gob.pe/test/atlas/">Inicio</a></li>
	            </ul>
	        </div>
	        <div id="headerContenido">
				<div style="text-align: right; padding-top: 70px; font-size: 12px">
                    <ul>
                        <li>
                            <!--<a style="color: #00008A" 
                               
                               onMouseOver="this.style.cssText='color: #00008A; text-decoration: underline'" 
                               onMouseOut="this.style.cssText='color: #00008A'" 
                               href="#"
                               onclick="abrirpag()"
                               >
                                <b>Descarga de Centros Poblados reconstruidos al año 2015</b>
                            </a>
							-->&nbsp;
                        </li>
                    </ul>
                </div>
	            <br><br><br><br><br><br><br>
	            <div id="headerDerecha">
	                <!-- <div id="busc">
	                    <input type="text" id="buscador" class="buscadorCaja">
	                    <input type="button" onclick="busc()" value="" class="buscadorBoton">
	                </div>-->
	            </div>
	        </div>
    	</div>
    	<!-- <div id="cuerpo">
	        <div id="cuerpoContenido">
	            <div id="divcontenido" style="margin: 5px 0px 0px 0px; display:table; width: 980px;">
	                <div id="MenuSuperior" style="display:table; margin:20px 0 0 0; width: 940px;">
	                    <div style="float: right; width: 135px">
	                        <input id="btnpres" type="button" onClick="" title="Presentación">
	                    </div>
	                </div>
	            </div>
	        </div>
    	</div>-->
	</div>
<!--Panel Izquierdo-->
<div class="ui-layout-west"><span id="west-closer"></span>
 <div class="header">&Aacute;rea de selecci&oacute;n</div>
    <div class="ui-layout-content"> <!--class="ui-layout-content layercatalogue"-->

	<!--BEGIN ACORDION-->
  <div  id="accordion" >
	    <h3><a href="#">Ubicaci&oacute;n</a></h3>
	    <div align="center"  style="height: 300px">

		  <table border=0>
		    <tr>
			<td>Departamento:</td>
			<td>
			    <select id="cboDepartamento" name="" style="width:160px" >
			    </select>
			</td>
		    </tr>
		    <tr>
			<td>Provincias:</td>
			<td>
			    <select id="cboProvincia"  style="width:160px;" >
			    </select>
			</td>
		    </tr>
                    <tr>
			<td>Distritos:</td>
			<td>
			    <select id="cboDistrito"  style="width:160px;" >
			    </select>
			</td>
		    </tr>
                    <tr>
			<td>Centro Poblado:</td>
			<td>
			    <input type="text" id="txtCentroPoblado_id"  name="txtCentroPoblado" style="width:160px; height:15px;" />
			</td>
		    </tr>
                    <tr><td> <button id="btnBuscarCentroPoblado">Buscar</button> </td></tr>
		</table>

	   


      <div align="center"  style="width: 100%; height: 200px; overflow-y: scroll;">
      <h3> Resultados</h3>
      <table id="tblResultados" border="1" style="width: 100%">
      <tbody>

      </tbody>
      </table>

      </div>


     </div>
 <!-- <br />-->
      


	 
   </div>
   <!--END ACORDION-->



     
              
    
    
    <br/>

		<div style="padding-left:20px" id="leyenda">
			<!--<span id="titleyMercado" style="display:none; font-family:arial; font-size:11px; font-weight:bold; text-decoration:underline;  ">Leyenda del mapa</span>-->

    </div>
</div>

    </div>
    <div class="footer">&nbsp;</div>
    </div>

<div class="ui-layout-center" style="max-width: 1200px;">
    <div class="layerfloat">
    <div  align="center">

	   <!--<img id="create-mapa_img" src="images/boton-imagen.png" alt="Crear Imagen" title="Crear Imagen" class="toolbarmapa" /> -->
       <img id="create-ayuda" src="images/ayuda.png" alt="Obtener Ayuda" title="Obtener Ayuda" class="toolbarmapa" />
       <img id="create-mapa_inicio" src="images/mapa.png" alt="Mapa Inicial" title="Mapa Inicial" class="toolbarmapa" />
       <!--<img id="create-cerrar_session" src="images/salir.png" alt="Cerrar Session" title="Cerrar Session" class="toolbarmapa" />-->


    </div>
    </div>


    <div class="ui-layout-content" id="mainmap" ></div>
    <div class="footer mapfooter">
	Longitud:<label id="longitude"> 0</label> Latitud: <label id="latitude"> 0</label>
	escala: <div id="scale-info" style="position: relative; display: inline;"></div>
	<div id="output" style="display: inline;">de Distancia</div>
    </div>
</div> <!-- layout center -->

<div class="mapdialog"></div>

<div id="dialog-form" title="Giros de Negocio">
    <table id="tblGirosNegocio">
	<tbody></tbody>
    </table>
</div>

<div id="dialog-clientes" title="Filtro de Poblacion ">
    <div id="treePobacion" class="demo"></div>
</div>


   <div id="dialog-form_area" title="Area de Influencia">
		    <table id="tblArea_interes">
			<tbody>
                            <tr>
                                <td>Puntos</td>
                                <td>    <input type="text" disabled  id="txtPuntox"></td>
                                 <td>   <input type="text" disabled id="txtPuntoy"></td>
                                </td>

                            </tr>

                                  <tr>
                                <td>Radio</td>
                                <td colspan="2">  <input type="text"  maxlength="3" onkeyup="valida_numeros(this)"  id="txtRadio">mts</input></td>

                            </tr>
                        </tbody>
		    </table>
       </div>

   <div id="dialog-form_area_informacion" title="Informacion de Area de Influencia" >
       <table id="tblArea_informacion" >
	<tbody>

        </tbody>
    </table>
	<br />
	
	<div id="divfoto">
		<span onclick="abrirfoto()" style="color: #0000ff; cursor: pointer; font-size: 12px;">Ver Foto</span>
	</div>
   </div>

<div id="dialog-foto" title="Foto">
	<div id="imgviv" style="border: #fff 1px solid"  >&nbsp;

      <!--<img id="id_zoom"    width="670" height="480"  />-->
  </div>


</div>

   <div id="dialog-form_imagen" title="Exportacion de Mapa a JPG">
       <table id="tblArea_mapa" >
	<tbody>

        </tbody>
    </table>
   </div>
<form action="index.php/area_influencia/exportar_excel" method="post"  target="_blank" id="FormularioExportacion">

<input type="hidden" id="datos_a_enviar_excel" name="datos_a_enviar_excel"/>
<input type="hidden" id="excelubigeo" name="excelubigeo"/>
<input type="hidden" id="excelccpp" name="excelccpp"/>
</form>
<form action="index.php/area_influencia/ficha_pdf" method="POST"  id="FormularioExportacionPdf">
<input type="hidden" id="datos_a_enviar_pdf" name="datos_a_enviar_pdf" />
<input type="hidden" id="txtManzanas"  name="txtManzanas"/>
<input type="hidden" id="id_giro1" name="id_giro1" />
 <input type="hidden" id="id_giro2"  name="id_giro2"/>
 <input type="hidden" id="id_giro3" name="id_giro3" />
<input type="hidden" id="p1_1"  name="p1_1"/>
 <input type="hidden" id="p2_1"  name="p2_1"/>
 <input type="hidden" id="p3_1"  name="p3_1"/>
 <input type="hidden" id="p4_1"  name="p4_1"/>
 <input type="hidden" id="p5_1"  name="p5_1"/>
 <input type="hidden" id="v1_1" name ="v1_1" />
 <input type="hidden" id="v2_1" name="v2_1"/>
 <input type="hidden" id="v3_1" name="v3_1"/>
 <input type="hidden" id="v4_1" name="v4_1"/>
 <input type="hidden" id="v5_1" name="v5_1"/>
<input type="hidden" id="p1_2" name="p1_2" />
 <input type="hidden" id="p2_2" name="p2_2"/>
 <input type="hidden" id="p3_2" name="p3_2"/>
 <input type="hidden" id="p4_2" name="p4_2"/>
 <input type="hidden" id="p5_2" name="p5_2"/>
<input type="hidden" id="v1_2" name="v1_2"/>
 <input type="hidden" id="v2_2" name="v2_2"/>
 <input type="hidden" id="v3_2" name="v3_2"/>
 <input type="hidden" id="v4_2" name="v4_2" />
 <input type="hidden" id="v5_2" name="v5_2"/>
<input type="hidden" id="p1_3" name="p1_3"/>
 <input type="hidden" id="p2_3" name="p2_3"/>
 <input type="hidden" id="p3_3" name="p3_3"/>
 <input type="hidden" id="p4_3" name="p4_3"/>
 <input type="hidden" id="p5_3" name="p5_3"/>
<input type="hidden" id="v1_3" name="v1_3"/>
 <input type="hidden" id="v2_3" name="v2_3"/>
 <input type="hidden" id="v3_3" name="v3_3"/>
 <input type="hidden" id="v4_3" name="v4_3"/>
 <input type="hidden" id="v5_3" name="v5_3"/>
<input type="hidden" id="x1" name="x1"/>
 <input type="hidden" id="x2" name="x2"/>
<input type="hidden" id="e1" name="e1"/>
 <input type="hidden" id="e2" name="e2"/>
 <input type="hidden" id="e3" name="e3"/>
 <input type="hidden" id="e4" name="e4"/>
 <input type="hidden" id="e5" name="e5"/>
 <input type="hidden" id="e6" name="e6"/>
<input type="hidden" id="n1" name="n1"/>
  <input type="hidden" id="n2" name="n2"/>
  <input type="hidden" id="n3" name="n3"/>
<input type="hidden" id="pea1" name="pea1"/>
  <input type="hidden" id="pea2" name="pea2"/>
  <input type="hidden" id="pea3" name="pea3"/>
<input type="hidden" id="radio" name="radio"/>
   <input type="hidden" id="giro1" name="giro1"/>
   <input type="hidden" id="giro2" name="giro2"/>
   <input type="hidden" id="giro3" name="giro3"/>
<input type="hidden" id="ciudad" name="ciudad"/>
<input type="hidden" id="distrito" name="distrito"/>
 <input type="hidden" id="cadena_p_1" name="cadena_p_1"/>
    <input type="hidden" id="cadena_v_1" name="cadena_v_1"/>
    <input type="hidden" id="cadena_p_2" name="cadena_p_2"/>
    <input type="hidden" id="cadena_v_2" name="cadena_v_2" />
    <input type="hidden" id="cadena_p_3" name="cadena_p_3"/>
    <input type="hidden" id="cadena_v_3" name="cadena_v_3"/>
   <input type="hidden" id="nombre_variable1" name="nombre_variable1"/>
   <input type="hidden" id="nombre_variable2" name="nombre_variable2"/>
   <input type="hidden" id="nombre_cliente_e" name="nombre_cliente_e" />
   <input type="hidden" id="cad_cliente_e" name="cad_cliente_e"/>
    <input type="hidden" id="nombre_cliente_x" name="nombre_cliente_x"/>
   <input type="hidden" id="cad_cliente_x" name="cad_cliente_x"/>
   <input type="hidden" id="nombre_cliente_n" name="nombre_cliente_n"/>
   <input type="hidden" id="cad_cliente_n" name="cad_cliente_n"/>
   <input type="hidden" id="nombre_cliente_pea" name="nombre_cliente_pea"/>
   <input type="hidden" id="cad_cliente_pea" name="cad_cliente_pea"/>
   <input type="hidden" id="pcolor1" name="pcolor1"/>
   <input type="hidden" id="pcolor2" name="pcolor2"/>
   <input type="hidden" id="pcolor3" name="pcolor3"/>
   <input type="hidden" id="puntox" name="puntox"/>
   <input type="hidden" id="puntoy" name="puntoy"/>

   <input type="hidden" id="imagen" name="imagen"/>

</form>
<form action="index.php/exportar_imagen" method="GET"  id="FormularioExportacionImagen">
    <input type="hidden" id="file" name="file">
</form>

<link rel="stylesheet" href="js/prettyLoader/css/prettyLoader.css" type="text/css"/>
<script src="js/prettyLoader/js/jquery.prettyLoader.js" type="text/javascript" ></script>

   <link href="js/alertas/css/jquery.alerts.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/alertas/js/jquery.alerts.js" ></script>




 <script type="text/javascript" charset="utf-8">

id_session=<?php echo $this->session->userdata('id_session')?>;
ip="<?php echo $ip;?>";
       $(document).ready(function(){
		$.prettyLoader();
	});


      if(navigator.appName=="Microsoft Internet Explorer"){

           setTimeout("activar_capas(0)",2700);


        }else
           {
               setTimeout("activar_capas(0)",2700);



          }




</script>




</body>
</html>

<?php
}
?>
