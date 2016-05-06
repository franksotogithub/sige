<?php

?>
<html>
<head><title>Formulario de suscripcion SIGE</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?php echo BASE_URL();?>js/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL();?>js/jquery/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL();?>js/jquery/localization/messages_es.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL();?>js/jquery.selectboxes.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#frminei").validate({
        rules: {
           txtTelefono: { number: true },
           txtEmail: {
                required: true,
                email: true,
                remote:"<?php echo BASE_URL();?>index.php/correo_control/comprobar_usu/" 
            },
           txtEmailEntidad: { required: false, email: true }
           //'deportes[]': { required: true, minlength: 1 }
        },
        messages: {
           txtTelefono: { number: 'Debe ingresar un número' },
           txtEmail: {
                required: 'Debe ingresar un correo electrónico',
                email: 'Debe ingresar el correo electrónico con el formato correcto. Por ejemplo: sunombre@ejemplo.com.',
                remote:"El usuario ya existe"
            },
         //  txtEmailEntidad: { required: 'Debe ingresar un correo electrónico',
         //  email: 'Debe ingresar el correo electrónico con el formato correcto. Por ejemplo: sunombre@ejemplo.com.' }
           //'deportes[]': 'Debe seleccionar mínimo un deporte'
         txtEmailEntidad: { email: 'Debe ingresar el correo electrónico con el formato correcto. Por ejemplo: sunombre@ejemplo.com.'}
       }
       
    });
    
    
    
    /****************************************
    Cargar profesion
    **************************************/

    $.ajax({
        type:'post',
        dataType: 'html',
        url:'<?php echo BASE_URL();?>index.php/correo_control/consultar_profesion',
        success: function(result){
      
            eval("$('#cboProfesion').addOption("+ result +",false)");
            $("#cboProfesion").append("<option value='61'>OTROS</option>");
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(xhr.status + ' ' + thrownError);
            //alert(thrownError);
        }
    });
    
    $('#cboProfesion').change(function(){
        if($(this).val()=='61'){
            $('#txtEspecifique').attr("disabled","");
            $('#txtEspecifique').focus();
            $('#txtEspecifique').addClass("required");
            
        }else{
            $('#txtEspecifique').attr("disabled","disabled");
        }
    });    
    
    /****************************************
    Cargar pais
    **************************************/

    $.ajax({
        type:'post',
        dataType: 'html',
        url:'<?php echo BASE_URL();?>index.php/correo_control/consultar_pais',
        success: function(result){
      
            eval("$('#cboPais').addOption("+ result +",false)");
            
            
            $("#cboPais option").each(function(){
				//alert($(this).text());
				if ($(this).val() == "4028"){
                    $(this).attr("selected","selected");
                }
			}); 
            
            
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(xhr.status + ' ' + thrownError);
            //alert(thrownError);
        }
    });

    $('#cboPais').change(function(){
        if($(this).val()=='4028'){
            $('#cboDpto').attr("disabled","");
            $('#cboProv').attr("disabled","");
            $('#cboDist').attr("disabled","");
        }else{
            $('#cboDpto').attr("disabled","disabled");
            $('#cboProv').attr("disabled","disabled");
            $('#cboDist').attr("disabled","disabled");
            $("#cboDpto").attr('selectedIndex', 0);
            $("#cboProv").attr('selectedIndex', 0);
            $("#cboDist").attr('selectedIndex', 0);
        }
    });
    
    
    /****************************************
    Cargar dpto
    **************************************/

    $.ajax({
        type:'post',
        dataType: 'html',
        url:'<?php echo BASE_URL();?>index.php/correo_control/consultar_dpto',
        success: function(result){
      
            eval("$('#cboDpto').addOption("+ result +",false)");
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(xhr.status + ' ' + thrownError);
            //alert(thrownError);
        }
    });
    
     /****************************************
    Cargar provincia
    **************************************/   
    $("#cboDpto").change(function(){
    
        $('#cboProv').children().remove();
        $('#cboDist').children().remove();
        $("#cboDist").append("<option value='00'>Seleccione</option>");
        
        

        var cadena =  $('#cboDpto').attr('value');
        
        
        $.ajax({
            type:'post',
            dataType: 'html',
            url:'<?php echo BASE_URL();?>index.php/correo_control/consultar_prov',
            data:'codDpto='+cadena,
            
            success: function(result){							
                eval("$('#cboProv').addOption("+ result +",false)");
            },  
            error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + ' ' + thrownError);
                //alert(thrownError);
            }  
        });	
    });
    
    /****************************************
    Cargar dist
    **************************************/   
    $("#cboProv").change(function(){
    
        $('#cboDist').children().remove();
        var cadena =  $('#cboProv').attr('value');
        
        //alert(cadena);
        $.ajax({
            type:'post',
            dataType: 'html',
            url:'<?php echo BASE_URL();?>index.php/correo_control/consultar_dist',
            data:'codDpto='+cadena,
            
            success: function(result){							
                eval("$('#cboDist').addOption("+ result +",false)");
            },  
            error:function (xhr, ajaxOptions, thrownError){
                alert(xhr.status + ' ' + thrownError);
                //alert(thrownError);
            }  
        });	
    });
    

    
})
</script>
<style type="text/css" media="all">
body #tblformulario{
    font-family:"Verdana,arial";
    font-size:11px;
}

.titulo{
    padding-top:50px
}

.caja{
    width:300px;
}
.combo{
    font-size:10px;
    width:250px;
    height:20px;
}

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
.obligatorio{
    color:#ff0000;
    font-size:11px;
    
}

label.error {
    background:url("<?php echo BASE_URL();?>images/error.gif") no-repeat 0px 0px;
    padding-left: 15px;
    padding-bottom: 2px;   
    color: #EA5200;
}

</style>
    
</head>    
<body bgcolor="#EFF2F5" topmargin=0 leftmargin=0"  oncontextmenu="return false" style="font-family:arial" >

<form method="post" action="<?php echo base_url()?>index.php/correo_control/enviar_correo" id="frminei">
    
<table id="tblformulario" width="80%" border="0" cellspacing="2" cellpadding="0" align="center" >
  <!--CABECERA-->   
        <tr>
        <td colspan=2>
            <div class="login-heading"  >
            <div >
                <table width="100%" border="0">
                    <tr >
                        <td >
                            <img src="<?php echo base_url()?>images/cabecera/ministerio.png" height=40 style="padding-top:40px" />
                        </td>
                        <td>
                            <img src="<?php echo base_url()?>images/cabecera/inei.png" height=70 style="padding-top:10px" />
                        </td>
                        <td align="right" >
                            <img src="<?php echo base_url()?>images/cabecera/fiodm.png" height=40 style="padding-top:40px"  />&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </div>
            </div>
            
        </td>
    </tr>
    <!--FIN CABECERA-->
    <tr>
        <td colspan=2 align="center">
            <div class="bar" ></div>
            
            <h3><span style="text-decoration:underline">Formulario de Suscripci&oacute;n</span></h3>
        </td>
    </tr>    
    <tr>
        <td colspan=2>
            <!--<div class="bar" ></div>-->
            <h3>Datos personales</h3>
            <hr>
        </td>
    </tr>
    <tr>
        <td style="width:240px">Nombres:</td>
        <td><span class="obligatorio" >*</span>&nbsp;<input type="text" id="txtNom" name="txtNom" class='required caja'></td>
    </tr>
    <tr>
        <td>Apellido paterno:</td>
        <td><span class="obligatorio" >*</span>&nbsp;<input type="text" id="txtApePat" name="txtApePat" class='required caja'></td>
    </tr>
    <tr>
        <td>Apellido materno:</td>
        <td><span class="obligatorio" >*</span>&nbsp;<input type="text" id="txtApeMat" name="txtApeMat" class='required caja'></td>
    </tr>
    <tr>
        <td>N&uacute;mero de tel&eacute;fono:</td>
        <td>&nbsp;&nbsp;&nbsp;<input type="text" id="txtTelefono" name="txtTelefono" class='caja'></td>
    </tr>
    <tr>
        <td>Profesi&oacute;n u oficio:</td>
        <td>
            &nbsp;&nbsp;&nbsp;<select id="cboProfesion" name="cboProfesion" class='combo'>
                
            </select>
        </td>
    </tr>
    <tr>
        <td>Especifique:</td>
        <td>&nbsp;&nbsp;&nbsp;<input type="text" id="txtEspecifique" name="txtEspecifique" disabled="disabled" class='caja'></td>
    </tr>
    <tr>
        <td title="El email ser&aacute; su usuario para ingresar al sistema">Email:</br>(El email ser&aacute; su usuario para ingresar al sistema)</td>
        <td><span class="obligatorio" >*</span>&nbsp;<input type="text" id="txtEmail" name="txtEmail" class='required caja'></td>
    </tr>
    
    <tr>
        <td colspan=2 class="titulo">
            <h3>Residencia Actual</h3>
            <hr>
        </td>
    </tr>
    
    <tr>
        <td>Pais:</td>
        <td>&nbsp;&nbsp;&nbsp;
            <select id="cboPais" name="cboPais"  class='combo'>
                
            </select>
        </td>
    </tr>
    <tr>
        <td>Departamento:</td>
        <td>&nbsp;&nbsp;&nbsp;
            <select id="cboDpto" name="cboDpto" class='combo'>
                
            </select>
        </td>
    </tr>
    <tr>
        <td>Provincia:</td>
        <td>&nbsp;&nbsp;&nbsp;
            <select id="cboProv" name="cboProv" class='combo'>
                <option value="00">Seleccione</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Distrito:</td>
        <td>&nbsp;&nbsp;&nbsp;
            <select id="cboDist" name="cboDist" class='combo'>
                <option value="00">Seleccione</option>
            </select>
        </td>
    </tr>
    
    <tr>
        <td colspan=2 class="titulo">
            <h3>Datos de la Empresa o Instituci&oacute;n (Donde labora, estudia u otros)</h3>
            <hr>
        </td>
    </tr>
    
    <tr>
        <td>Nombre de la entidad:</td>
        <td>&nbsp;&nbsp;<input type="text" id="txtNomEntidad" name="txtNomEntidad" class='caja'></td>
    </tr>
    <tr>
        <td>Email contacto:</td>
        <td>&nbsp;&nbsp;<input type="text" id="txtEmailEntidad" name="txtEmailEntidad" class='caja' > </td>
    </tr>
    <tr>
        <td colspan="2" align="center" style="padding-top:15px;">
            <input type="submit" id="btnEnviar" value="Enviar" />
            <!--<input type="reset" id="btnEnviar" value="Borrar" />-->
        </td>
    </tr>

    <tr>
        <td colspan="2" align="center" style="padding-top:15px; padding-bottom:15px">
            (*) Campos obligatorios 
        </td>
    </tr>
    
    <tr>
        <td colspan=2 valign=top style="font-family:verdana; font-size:8px; background-color:#6BB4BD;text-align:center; color:#2B3D74; font-weight:bold; ">
    		<span >Copyright &#169; INEI 2011 - Todos los derechos reservados.</span>
    	</td>
    </tr>
    

    
</table>
</form>
</body>
</html>

