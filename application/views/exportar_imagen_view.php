<?php
$path='map';  // Esta es la subcarpeta desde donde se descargarán archivo
chdir($path);
$files=glob('*.*');
$mime_types=array();
$mime_types['jpe']   ='image/jpeg';
$mime_types['jpeg']  ='image/jpeg';
$mime_types['jpg']   ='image/jpeg';
$mime_types['png']   ='image/png';


if(!$_GET['file']){
  $error='Especifique archivo a descargar';
}elseif(!in_array($_GET['file'],$files)){
   $error='Archivo especificado no existe';
}else{
   $file=$_GET['file'];
   $ext=strtolower(substr(strrchr($file,'.'),1));
}
if($ext && array_key_exists($ext,$mime_types)){
   $mime=$mime_types[$ext];
}else{
   $error=$error?$error:"Tipo no válido";
}
if(!$error){
   if(file_exists("$file")){
      if(is_readable("$file")){
         $size=filesize("$file");
         if($fp=@fopen("$file",'r')){
            header("Content-type: $mime");
            header("Content-Length: $size");
            header("Content-Disposition: attachment; filename=\"$file\"");
            fpassthru($fp);
            fclose($fp);
            exit;
         }
      }else{ 
         $error='Imposible leere el archivo';
      }
   }else{ 
      $error='File no ubicado';
   }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;
charset=iso-8859-1">
<title>Descargar Imagen</title>
</head>
<body>
<h1>Descarga con error</h1>
<?php
   if($error) print "<p>Error: $error</p>\n";
?>
</body>
</html>
