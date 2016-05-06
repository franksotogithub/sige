
<table border=1 cellpadding="0" cellspacing="0"  width=100% align=center style="font-family:arial;font-size:10pt;">
  <?php
    date_default_timezone_set('UTC'); 
    $fecha=ucfirst(strftime("%d/%m/%Y"));


foreach($result as $row):

                        ?> 
                         <tr>
                    
                     
                        <td>
                            <strong>Ciudad:</strong>   <?php echo $row->nombre_ciudad?>
                       </td>   
                       <td>
                           <strong>Distrito:</strong> <?php echo $row->nombre_distrito?> 
                       </td>               
                         
                       <td><strong>Fecha:</strong><?php echo $fecha ?></td>
                       
                         
                         </tr>
                                         
                      


          
 <?php endforeach;?>       
           
</table>
                          
                          
