<?php
header('Content-Type: image/jpeg');
header('Content-Length: 1234);
header('Content-Disposition: attachment;filename="fondo.jpg"');
$fp=fopen('/var/www/html/SIG-NEGOCIOS/images/fondo.jpg','r');
fpassthru($fp);
fclose($fp);
?>