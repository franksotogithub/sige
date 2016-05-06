<html>
<head>
<title>Sistema de Información Geográfica para Emprendedores</title>
<link href="/sige/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/alertas/js/jquery.alerts.js" ></script>
    <link href="<?php echo base_url();?>js/alertas/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />  
<script type="text/javascript" src="<?php echo base_url();?>js/jquery/login.js"></script>


</head>
<body bgcolor="#EFF2F5" topmargin=0 leftmargin=0 oncontextmenu="return false" style=font-family:arial>
<form name="login" id="login" method="post" accept-charset="utf-8"  action="<?php echo base_url();?>">
<center>
<table width=1024 cellpadding=0 cellspacing=0 border=0>
	<tr>
		<td width=169 valign=bottom>
			<img src=/sige/images/logo02.jpg width=169 height=58 border=0>
		</td>
		<td width=686 valign=bottom><center>
			<TABLE width=260 cellSpacing=0 cellPadding=0 border=0>
				<tr><TD NOWRAP width=50><CENTER><IMG height=54 src="/sige/images/escudo.jpg" width=48 border=0>
					</td>
					<td valign=middle><TABLE valign=middle height=40 cellSpacing=0 cellPadding=0 border=0>
						<td width=50 bgcolor=#ED1921 valign=middle align=center><font style=font-size:17px;font-family:arial;color:white>PER&Uacute;</td>
						<td width=1 ><img src=/sige/images/space.gif width=1 height=1 border=0></td>
						<td width=3 bgcolor=#5A5A5B ></td>
						<td width=120 valign=bottom bgcolor=#5A5A5B>
							<table cellpadding=0 cellspacing=0 border=0 style="font-size:10px;font-family:arial;color:white">
								<tr><td>Ministerio de</td></tr>
								<tr><td>Trabajo</td></tr>
								<tr><td>y Promoci&oacute;n de Empleo</td></tr>
							</table>
							
						<td width=1 ><img src=/sige/images/space.gif width=1 height=1 border=0></td>
						
						</TR>
					</TABLE>
					</td>
		</tr>
		</table>
		</td>
		

		<td width=169 valign=bottom align=right>
			<img src=/sige/images/logo03.jpg width=126 height=78 border=0>
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



<table cellpadding=0 cellspacing=0 valign=top border=0 width=1024 height=471 background=/sige/images/fondo.jpg>
<tr height=50>
<td width=50 valign=top></td>
</tr>
<tr>
<td width=50 valign=top><img src=/sige/images/space.gif width=50 height=1 border=0></td><td width=140 valign=top>
<img src=/sige/images/logo.jpg>
</td>
<td width=10 valign=top></td><td width=112 valign=top>
<img src=/sige/images/space.gif height=50 width=1>
<img src=/sige/images/emprendedor.jpg>
</td>
<td width=355 valign=top>
<img src=/sige/images/space.gif height=1 width=355>
</td>
<td width=90%>

<table width=386 height=379 background=/sige/images/cuadro.jpg cellpadding=0 cellspacing=0 border=0 style=font-family:arial;font-size:12px>
	<tr>
		<td>Usuario:&nbsp;</td>
		<td><input type="text" id="txtUsuario" name="txtUsuario" onkeyup="valida(this)" onchange="valida(this)" size="13" maxlength="15" /></td>
	</tr>
	<tr height=3>
		<td></td>
	</tr>
	<tr>
		<td>Contrase&ntilde;a:&nbsp;</td>
		<td><input type="password" id="txtPassword" name="txtPassword" onkeyup="valida(this)" onchange="valida(this)"size="14" maxlength="15" /></td>
	</tr>
	<tr height=5>
		<td></td>
	</tr>
	<tr>
		<td colspan=2>
		<center><input type="button" value="Entrar"  onclick="validar_Logueo();" /></center>
		</td>
	</tr>
</table>

</form>
    
</body>
</html>