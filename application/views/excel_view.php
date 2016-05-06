
<?php
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=Informacion_Geografica_ccpp.xls");
header("Pragma: no-cache");
header("Expires: 0");


?>
<html lang="es">
<head>
 <meta charset="utf-8">
 <title> Excel</title>
 <style>
     
     table thead th{
         background-color: #DFEFFC; 
         color: #336EA6;
         font-weight: bold;
     }

	table td{
         border: #DFEFFC 1px solid;
     }
     
 </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Total</th>
            
        </tr>
    </thead>
    <tbody>
<?php

    $i = 0;
    foreach ($result as $clave => $row) {


            foreach ($row as $k => $v) {
                echo '<tr>';
                echo '<td>'.strtoupper($k).'</td>';
                echo '<td>'.$v.'</td>';
                echo '</tr>';
                $i++;
            }
    }
    
?>
        
    </tbody>
</table>
</body>
</html>
