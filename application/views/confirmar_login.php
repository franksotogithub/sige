<?php

?>

<html>
<head><title>Formulario de suscripcion SIGE</title>
<style type="text/css" media="all">
body #tblformulario{
    font-family:"verdana,arial";
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
</style>
    
</head>    
<body bgcolor="#EFF2F5" topmargin=0 leftmargin=0"  oncontextmenu="return false" style="font-family:arial" >
    
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
    <tr>
        <td colspan=2>
            <div class="bar" ></div>
        </td>
    </tr>
  <!--FIN CABECERA-->
  
<?php if($cod=='101'){?>
    <tr>
        <td style="font-family:Verdana; font-size:12px; text-align:center; padding-top:50px;">
            Revise su correo <?php echo $logeo ?> para confirmar suscripci&oacute;n.<br />
            <?php //echo $confirma ?>
        </td>
    </tr>

<?php }elseif($cod=='102'){?>
    <tr>
        <td style="font-family:Verdana; font-size:12px; text-align:center; padding-top:50px;">
            <p>La suscripci&oacute;n confirmada correctamente.</p>
            Ingrese al sistema <a href="http://sige.inei.gob.pe/sige/">SIGE</a>.
        </td>
        
    </tr>

<?php }elseif($cod=='0'){?>
    <tr>
        <td style="font-family:Verdana; font-size:12px; text-align:center; padding-top:50px;">
            <p>La suscripci&oacute;n <b>NO</b> se confirmo correctamente.</p>
            
        </td>
        
    </tr>
        
<?php } ?>
  

</table>

</body>
</html>