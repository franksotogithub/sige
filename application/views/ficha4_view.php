
  <?php



foreach($result as $row):

        
$e1="";
$e2="";
$e3="";
$e4="";
$e5="";
$e6="";


$x1="";
$x2="";
    
    
    
$e1=(int)$row->s_e1;
$e2=(int)$row->s_e2;
$e3=(int)$row->s_e3;
$e4=(int)$row->s_e4;
$e5=(int)$row->s_e5;
$e6=(int)$row->s_e6;


$x1=(int)$row->s_x1;
$x2=(int)$row->s_x2;


    if( ($e1<0)){ $e1="";   }
        if( ($e2<0)){ $e2="";   }
            if( ($e3<0)){ $e3="";   }
                if( ($e4<0)){ $e4="";   }
                    if( ($e5<0)){ $e5="";   }
                        if( ($e6<0)){ $e6="";   }
                            if( ($x1<0)){ $x1="";   }
                               if( ($x2<0)){ $x2="";   }
   
    

      
                        ?> 
<tr>
 
                         <td  align="right" height="20"   bgcolor=<?php echo colores("giro")?>>
                               <?php echo $row->s_manzana?> 
                       </td>
                      
                        <td  align="right"  bgcolor=<?php echo colores("total")?>>
                            <?php echo $row->s_vivienda?>
                       </td>


                       <td   align="right"   bgcolor="<?php echo colores("total")?>">
                            <?php echo $row->s_hogares?>
                       </td>
                        
                          
                          <td   align="right"  bgcolor="<?php echo colores("total")?>">
                            <?php echo $row->s_poblacion?>
                       </td>
                       
                           
                          
                          <td  align="right"   bgcolor="<?php echo colores("e1")?>">
                            <?php echo $e1 ?>
                       </td>
                    
                       
                        <td  align="right"   bgcolor="<?php echo colores("e2")?>" >
                            <?php echo $e2 ?>
                       </td>
                       
                          <td  align="right"   bgcolor="<?php echo colores("e3")?>">
                            <?php echo $e3 ?>
                       </td>
                       
                          <td  align="right"   bgcolor="<?php echo colores("e4")?>">
                            <?php echo $e4 ?>
                       </td>
                       
                          <td  align="right"  bgcolor="<?php echo colores("e5")?>">
                            <?php echo $e5 ?>
                       </td>
                       
                             <td align="right"   bgcolor="<?php echo colores("e6")?>">
                            <?php echo $e6 ?>
                       </td>
                       
                       
                   
                             <td  align="right"  bgcolor="<?php echo colores("x1")?>">
                            <?php echo $x1 ?>
                       </td>
                    
                             <td align="right"   bgcolor="<?php echo colores("x2")?>">
                            <?php echo $x2 ?>
                       </td>
                            
                       
                   </tr>
                     <?php endforeach;?>      
  
       
</table>
