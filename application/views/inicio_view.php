<html>
<head>
<title>SSSistema de Difusión de los Censos Nacionales</title>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/alertas/js/jquery.alerts.js" ></script>
    <link href="<?php echo base_url();?>js/alertas/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />  
<script type="text/javascript" src="<?php echo base_url();?>js/jquery/login.js"></script>

</head>
<body bgcolor="#EFF2F5" topmargin=0 leftmargin=0 oncontextmenu="return false" style=font-family:arial onload="padre()">
<form name="login" id="login" method="post" accept-charset="utf-8"  action="<?php echo base_url();?>">
<center>
<table width=1024 cellpadding=0 cellspacing=0 border=0>
	<tr>
		<td width=169 valign=bottom>
			<img src=<?php echo base_url();?>images/logo02.jpg width=169 height=58 border=0>
		</td>
		<td width=686 valign=bottom><center>
			<TABLE width=260 cellSpacing=0 cellPadding=0 border=0>
				<tr><TD NOWRAP width=50><CENTER><IMG height=54 src="<?php echo base_url();?>images/escudo.jpg" width=48 border=0>
					</td>
					<td valign=middle><TABLE valign=middle height=40 cellSpacing=0 cellPadding=0 border=0>
						<td width=50 bgcolor=#ED1921 valign=middle align=center><font style=font-size:17px;font-family:arial;color:white>PER&Uacute;</td>
						<td width=1 ><img src=<?php echo base_url();?>images/space.gif width=1 height=1 border=0></td>
						<td width=3 bgcolor=#5A5A5B ></td>
						<td width=120 valign=bottom bgcolor=#5A5A5B>
							<table cellpadding=0 cellspacing=0 border=0 style="font-size:10px;font-family:arial;color:white">
								<tr><td>Ministerio de</td></tr>
								<tr><td>Trabajo</td></tr>
								<tr><td>y Promoci&oacute;n de Empleo</td></tr>
							</table>
							
						<td width=1 ><img src=<?php echo base_url();?>images/space.gif width=1 height=1 border=0></td>
						
						</TR>
					</TABLE>
					</td>
		</tr>
		</table>
		</td>
		

		<td width=169 valign=bottom align=right>
			<img src=<?php echo base_url();?>images/logo03.jpg width=126 height=78 border=0>
		</td>
	</tr>
	<!--<tr bgcolor="#1C4B72" height=22>
		<td colspan=3>
		<center>
			<font color=#B5CCDF style=font-size:13px face=arial>
			Sistema de Informaci&oacute;n Geogr&aacute;fico para Negocios y Autoempleo
			</font>

		</center>
		</td>
	</tr>-->
</table>



<table cellpadding=0 cellspacing=0 valign=top border=0 width=1024 height=471 background=<?php echo base_url();?>images/fondo.jpg>
	<tr height=50>
		<td width=50 valign=top></td>
	</tr>
	<tr>
		<td width=50 valign=top rowspan=2><img src=<?php echo base_url();?>images/space.gif width=50 height=1 border=0></td>
		<td width=140 valign=bottom><img src=<?php echo base_url();?>images/logo.jpg onmouseover="this.src='<?php echo base_url();?>images/logoOver.jpg'" onmouseout="this.src='<?php echo base_url();?>images/logo.jpg'"></td>
		<td width=10 valign=top></td><td width=112 valign=top><img src=<?php echo base_url();?>images/space.gif height=50 width=1><img src=<?php echo base_url();?>images/emprendedor.jpg></td>
		<td width=355 valign=top><img src=<?php echo base_url();?>images/space.gif height=1 width=355></td>
		<td width=90% rowspan=2>
			<table width=386 height=379 background=<?php echo base_url();?>images/cuadro.jpg cellpadding=0 cellspacing=0 border=0 style=font-family:arial;font-size:11px>
				<tr>
					<td rowspan=20><img src=<?php echo base_url();?>images/space.gif height=1 width=20></td>
					<td colspan=2><p align=justify style=font-family:arial;font-size:12px;color:#454545><br><br><br>
					En Abril de 2011 se suscribi&oacute; la Carta Acuerdo entre la OIT y el INEI para poner en marcha el sistema de Informaci&oacute;n Geogr&aacute;fica
					de Negocios y Autoempleo con el prop&oacute;sito de obtener informaci&oacute;n relativa a la ubicaci&oacute;n de negocios por rubro en un &aacute;rea geogr&aacute;fica determinada.
					Esta informaci&oacute;n facilitar&aacute; a los j&oacute;venes emprendedores a identificar zonas d&oacute;nde implementar sus negocios.
					<br><br>Esta colaboraci&oacute;n externa se enmarca dentro de las actividades del Programa Conjunto "Juventud, empleo y Migraci&oacute;n".
					El objetivo central del Programa Conjunto (PC) es aumentar y mejorar las oportunidades de inserci&oacute;n laboral de los j&oacute;venes  para que puedan encontrar un empleo decente en el Per&uacute;, mediante la promoci&oacute;n del empleo y emprendimiento juvenil, y gestionando lamigraci&oacute;n laboral internacional juvenil, con &eacute;nfasis en las mujeres j&oacute;venes.
					</td>
					<td rowspan=20><img src=<?php echo base_url();?>images/space.gif height=1 width=20></td>
				</tr>
				<input type="hidden" name="txtUsuario" /><input type="hidden"  name="txtPassword"  />
				
				<tr>
					<td colspan=2><center><input type="submit" style=font-size:11px value="Entrar"  /></center><br>&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr height=311>
		<td colspan=4 valign=top>
			<font color=#B5CCDF style=font-size:11px face=arial>
			Sistema de Informaci&oacute;n Geogr&aacute;fico para Negocios y Autoempleo
			</font>
			<font color=#f1f1f1 style=font-size:30px face=arial><br><br>
			<br>Sistema de<br>Informaci&oacute;n<br>Geogr&aacute;fico para<br>Negocios y<br>Autoempleo
			</font>
		</center>
		</td>
	</tr>
</table>
</form>
</body>
</html>