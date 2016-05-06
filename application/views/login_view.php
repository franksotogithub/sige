<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sistema de Información Geográfica para Emprendedores</title>
<link href="/sige/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta name="author" content="<?php echo $this->config->item('author');?>">    
   

<!--
<?php echo $this->config->item('var_sis');?>  
-->


<script type="text/javascript" src="js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="js/jquery/login.js"></script>
<link rel="stylesheet" type="text/css" href="css/estilos.css">

<style type="text/css" >
.login-heading {
	/*background-color:#006599;*/
	background: #ffffff url(<?php echo base_url();?>images/cabecera/fondo.png) repeat-x;
	color: #222222;
	/*height:100px  !important;*/
	width:100%;
}
.bar{
    background: #D8EEEC url(<?php echo base_url();?>images/cabecera/bar.png) repeat-x ;
    height:8px;
    line-height:8px;
    overflow: hidden;
    text-align:center;
    /*padding: 0px 0px 0px 0px;*/
    /*border:#333 1px solid;*/

}
</style>
</head>
<body topmargin="0" leftmargin="0"  oncontextmenu="return false" style="font-family:arial" >
    <div id="header">
        <div id="menuSecundario">
            <ul>
                <li><a href="#">Inicio</a></li>
            </ul>
        </div>
        <div id="headerContenido">
            <br><br><br><br><br><br><br>
            <div id="headerDerecha">
                <!-- <div id="busc"> 
                    <input type="text" id="buscador" class="buscadorCaja">
                    <input type="button" onclick="busc()" value="" class="buscadorBoton">
                </div>-->
            </div>
        </div>
    </div>
    <div id="cuerpo">
        <div id="cuerpoContenido">
            <div id="divcontenido" style="margin: 5px 0px 0px 0px; display:table; width: 980px;">
                <!-- MENU SUPERIOR -->
                <div id="MenuSuperior" style="display:table; margin:20px 0 0 0; width: 940px;">
                    <div style="float: right; width: 135px">
                        <input id="btnpres" type="button" onClick="Presentacion();" title="Presentaci&aoacute;n">
                    </div>
                </div>
                <!-- FIN DE MENU SUPERIOR -->
                <br>
                <div id="Presentacion" style="width: 980px; display: table; margin: 30px 0px 100px 0px;">
                    <div style="padding-left: 450px;">
                        <font style="color: #0090CC; font: 15.33px 'Lucida Sans', Arial, Helvetica, sans-serif; font-weight: bold;">
                            PRESENTACIÓN
                        </font>
                    </div>
                    <br><br>
                    <div style="width: 640px; padding-left: 190px;">
                        <p align="justify">
                            El Instituto Nacional de Estadí­stica e Informática (INEI), en el marco de sus actividades para la 
                            promoción y difusión de la información estadí­stica, pone a disposición de los usuarios el Sistema de 
                            Información Geográfica para Emprendedores.
                            <br><br>
                            Este sistema constituye una herramienta fundamental para un estudio de mercado, pues permite 
                            identificar a nivel de areas geográficas personalizadas las potencialidades del mismo, ya sea 
                            identificando las caracterí­sticas de las viviendas y de población distribuida por sexo, edad, nivel 
                            educativo e ingresos promedio, así­ como el grado de concentración de los principales giros de 
                            negocio, personal ocupado y el volumen anual de ventas de los establecimientos circundantes.
                            <br><br>
                            El SIGE toma como principales fuentes de información los Censos Nacionales de Población y 
                            Vivienda 2007 y el IV Censo Nacional Económico 2008, aplicados sobre espacios geográficos 
                            urbanos definidos que el usuario podrá definir, con la finalidad de facilitar la toma de decisiones de 
                            inversión de los jóvenes emprendedores de negocio.
                        </p>
                    </div>
                </div>
                <div style="width: 980px;">
                    <img src="images/barra-horizontal.jpg">
                </div>
                <div style="width: 980px; padding-top: 25px; padding-bottom: 20px;">
                    <center>
                        <p>Para ingresar al sistema  por favor haga click en Ingresar:</p>
                        <br>
                        <form name="login" id="login" method="post" accept-charset="utf-8"  action="<?php echo base_url();?>">
                        <input type="hidden" value="<?php echo ip();?>" id="ip" name="ip">
                        <input type="hidden" id="txtUsuario" name="txtUsuario"  value="invitado2" style=font-size:11px onkeyup="valida(this)" onchange="valida(this)" size="20" maxlength="100" style="width:100px" />
                        <input type="hidden" id="txtPassword" name="txtPassword"  value="invitado2011" style=font-size:11px onkeyup="valida(this)" onchange="valida(this)" size="20" maxlength="100" style="width:100px" />
                        <input type="button" id="btnIngresar" style=font-size:11px value=""  onclick="validar_Logueo();" />
                        </form>
                    </center>
                </div>
                <div style="width: 980px;">
                    <img src="images/barra-horizontal.jpg">
                </div>
                <div style="width: 980px; display: table; padding-left: 270px; padding-top: 70px;">
                    <div style="float: left;">
                        <img src="images/cabecera/ministerio.png">
                    </div>
                    <div style="float:left; padding-left: 40px;">
                        <img src="images/cabecera/fiodm.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- <form name="login" id="login" method="post" accept-charset="utf-8"  action="<?php echo base_url();?>"> -->
<!-- <center> -->

<!-- <table width=850  border=0 cellpadding=0 cellspacing=0  > -->
    <!--CABECERA-->
    <!-- <tr> 
        <td colspan=2>
            <div class="login-heading"  >
            <div >
                <table width="100%" border="0">
                    <tr >
                        <td >
                            <img src="images/cabecera/ministerio.png" height=40 style="padding-top:40px" />
                        </td>
                        <td>
                            <img src="images/cabecera/inei.png" height=70 style="padding-top:10px" border="0" />
                        </td>
                        <td align="right" >
                            <img src="images/cabecera/fiodm.png" height=40 style="padding-top:40px"  />&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </div>
            </div>
            
        </td>
    </tr>-->
    <!--FIN CABECERA-->
    
    <!--PANEL IZQ-->
    <!-- <tr> -->
        <!-- <td style="width:410px; background-color:#D8EEEC" valign="top"> -->
		<!--style="border:#333 1px solid; height:5px; background-color:#6BB4BD"-->
            <!-- <div class="bar" ></div> 
            
            <table width="100%" border=0 >
                <tr>
                    <td style="text-align:center; padding-top:50px">
                        <img src="images/cabecera/logo-sige-grande.png" />
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center; padding-top:50px; padding-bottom:10px">
                        <center>
                        <font color=#B5CCDF style=font-size:10px face=arial>
                        <div style="border:#6BB4BD 0px dashed; width:250px;"  >-->
                        <!--<form name="login" id="login" method="post" accept-charset="utf-8"  action="<?php echo base_url();?>">-->
                        <!-- <table width="100%" border=0   > -->
		          <!-- <tr> 
                                    <td colspan=2 style="border-bottom:#6BB4BD 1.5px dotted;" align="center">
                                        <span   style="font-family:Arial,Helvetica,sans-serif; font-size:14px; color:#0094D7; font-weight:bold">
					
					</span>
                                	<center>
					
					<br/>
                                
					</center>
				    </td>
                            </tr>-->
			    <!-- <tr> 
				    <td colspan=2>
					<span style="font-family:Arial,Helvetica,sans-serif; font-size:10px; color:#0094D7;">
						Para ingresar al sistema  por favor haga click en Ingresar:
					</span>
					<br/>
				    </td>
                                    
                            </tr>-->
                            <!-- <tr style="font-family:Arial,Helvetica,sans-serif; font-size:10px; color:#0094D7; font-weight:bold"> -->
                                 
                                    <!-- <td></td> -->
                            <!-- </tr> -->
                            <!-- <tr style="font-family:Arial,Helvetica,sans-serif; font-size:10px; color:#0094D7; font-weight:bold"> -->
                                   
                                    <!-- <td></td> -->
                            <!-- </tr> -->
                            <!-- <tr> 
                                    <td colspan=2 style="border-bottom:#6BB4BD 1.5px dotted;" align="center">
                                        <span id="spanIngresar" onclick="validar_Logueo();"  style="font-family:Arial,Helvetica,sans-serif; font-size:18px; color:#0094D7; font-weight:bold ; cursor:hand">
						Ingresar 
					</span>
                                	<center>-->
					<!--<input type="button" style=font-size:11px value="Ingresar"  onclick="validar_Logueo();" />-->
					<!-- <br/> 
                                
					</center>
				    </td>
                            </tr>-->
                            <!--
			    	<tr>
					<td colspan=2>
					<span style="font-family:Arial,Helvetica,sans-serif; font-size:10px; color:#0094D7;">
						Si no cuenta con un usuario solicite su registro a: 
						<a href="index.php/correo_control/">
							<img src="images/ima08_off.png" border="0" />
						</a>
                                                
                                          <a>
                                                    <img title="Olvido su clave?" style="cursor: hand" src="images/olvidar.gif" border="0" onclick="recuperar_clave()" />
						</a>
                                                
                                                
					</span>
					</td>
				</tr>
                               -->


				<!-- <tr> 
					<td colspan=2>
                                      
					<span style="font-family:Arial,Helvetica,sans-serif; font-size:10px; color:#0094D7;">
						<br />
						<br />
						<br />
						Browser recomendado <a href="http://www.mozilla.com/es-ES/firefox/" >Mozilla Firefox</a>
						
					</span>
					</td>
				</tr>-->


                            <!--Copyright &copy; INEI - Derechos Reservados -->
                        <!-- </table> -->
			<!--</form>-->
                        <!-- </div> 
                        </font>
                        </center>
                    </td>
                </tr>
	       -->
            <!-- </table> -->
        <!-- </td> -->
        <!--FIN PANEL IZQ-->
         
        <!--PANEL FLASH-->
        <!-- <td style="background-color:#D8EEEC" align="left" valign="top"> 
 
			<div class="bar" ></div>
			<table width="100%" height="100%" cellspacing="0" border="0" cellpadding="0">
				<tr>
					<td align="center" valign="center">
						<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="550" height="480" id="movie" align="">
						<param name="movie" value="images/cabecera/menu-signa2j.swf">
						<embed src="images/cabecera/menu-signa2j.swf" quality="high" bgcolor="#D8EEEC" width="550" height="480" name="movie" align="" type="application/x-shockwave-flash" plug inspage="http://www.macromedia.com/go/getflashplayer">
						</object>		
					</td>
				</tr>
			</table>
		

        </td>-->
        <!--FIN PANEL FLASH-->
    <!-- </tr> -->
    <!-- <tr> -->
	<!-- <td colspan=2 valign=top style="font-family:verdana; font-size:8px; background-color:#6BB4BD;text-align:center; color:#2B3D74; font-weight:bold; "> -->
		<!-- <span >Copyright &copy; INEI 2011 - Todos los derechos reservados.</span> -->
	<!-- </td> -->
    <!-- </tr> -->
<!-- </table> -->
<!-- </center> -->
<!-- </form> -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47702968-4', 'inei.gob.pe');
  ga('send', 'pageview');

</script>
</body>
</html>
