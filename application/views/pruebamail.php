<?php

$c  = 'MIME-Version: 1.0' . "\r\n";
$c .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$c .= 'To: <ezioquispe@gmail.com>' . "\r\n";
$c .= 'From: Ezio <ezio.quispe@inei.gob.pe>' . "\r\n";
 $headers = "MIME-Version: 1.0\r\n";; 
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
            $headers .= "From: Sistema SIGE <infoinei@inei.gob.pe>\r\n";


mail("ezio.quispe@inei.gob.pe","Prueba de correo desde SIGE","Esta es una prueba de correo",$c);
echo "Prueba de correo desde SIGE.";
?>

