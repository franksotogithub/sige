<?php

$ubigeo = $_GET['ubigeo']; 
$ccpp = $_GET['ccpp'];
$zona = $_GET['zona'];
$manzana = $_GET['manzana'];
$frente = $_GET['frente'];
$idreg = $_GET['idreg'];

$conn  = pg_connect("user=usSigneg password=Signeg2605 dbname=signeg_bd_nac host=192.168.201.76");

if (!empty($zona)){
    $sql = "SELECT foto FROM CPV2014_0301 WHERE ccdd = '" . substr($ubigeo, 0, 2) ."' and ccpp='".substr($ubigeo, 2, 2)."' and ccdi='".substr($ubigeo, 4, 2)."' and codccpp='" . $ccpp . "' and zona_id='".$zona."' and manzana_final_id='".$manzana."' and frente_id='".$frente."' and id_reg='".$idreg."' ";
}else{
    $sql = "SELECT foto FROM CPV2014_0301 WHERE ccdd = '" . substr($ubigeo, 0, 2) ."' and ccpp='".substr($ubigeo, 2, 2)."' and ccdi='".substr($ubigeo, 4, 2)."' and codccpp='" . $ccpp . "' and id_reg='".$idreg."' ";
}  

$query = pg_query($conn, $sql);
$row   = pg_fetch_row($query);
$image = pg_unescape_bytea($row[0]);


header("Content-type: image/jpeg");
echo base64_encode($image);

pg_close($conn);


?>