<?php

$ubigeo = $_POST['ubigeo']; 
$ccpp = $_POST['ccpp'];
$zona = $_POST['zona'];
$manzana = $_POST['manzana'];
$frente = $_POST['frente'];
$idreg = $_POST['idreg'];

//echo "hola";

/*
$serverName = "192.168.203.102,1433"; //serverName\instanceName
$connectionInfo = array( "Database"=>"DIVIES2015_CAPTURA", "UID"=>"us_divies2015_monitor", "PWD"=>"d1v13s2015*M0n1t0r");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$sql="select top 1 foto from T_05_DIG_CPV0301_DET
where FOTO is not null";
$query=sqlsrv_query($conn,$sql);
$row=sqlsrv_fetch_array($query);
$image=$row[0];
echo base64_encode($image);
*/


$conn  = pg_connect("user=usSigneg password=Signeg2605 dbname=signeg_bd_nac host=192.168.201.76");

if (!empty($zona)){
    $sql = "SELECT foto FROM CPV2014_0301 WHERE ccdd = '" . substr($ubigeo, 0, 2) ."' and ccpp='".substr($ubigeo, 2, 2)."' and ccdi='".substr($ubigeo, 4, 2)."' and codccpp='" . $ccpp . "' and zona_id='".$zona."' and manzana_final_id='".$manzana."' and frente_id='".$frente."' and id_reg='".$idreg."' ";
}else{
    $sql = "SELECT foto FROM CPV2014_0301 WHERE ccdd = '" . substr($ubigeo, 0, 2) ."' and ccpp='".substr($ubigeo, 2, 2)."' and ccdi='".substr($ubigeo, 4, 2)."' and codccpp='" . $ccpp . "' and id_reg='".$idreg."' ";
} 




$query = pg_query($conn, $sql);
$row   = pg_fetch_row($query);
$image = pg_unescape_bytea($row[0]);






/*pg_close($conn);
//header("Content-type: image/png");
//echo $image;
echo base64_encode($image);
*/



/*

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
*/



//echo $ubigeo;

//$image=pg_unescape_bytea($row[0]);

header("Content-type: image/png");
echo base64_encode($image);


?>
