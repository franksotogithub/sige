

  <?php
  
$sum_total=0;
$sum_i1=0;
$sum_i2=0;
$sum_i3=0;

$sum_p1=0;
$sum_p2=0;
$sum_p3=0;
$sum_p4=0;
$sum_p5=0;

$sum_v1=0;
$sum_v2=0;
$sum_v3=0;
$sum_v4=0;
$sum_v5=0;


foreach($result as $row):

$total=$row->s_total;
$i1=(int)$row->s_i1;
$i2=(int)$row->s_i2;
$i3=(int)$row->s_i3;

$p1=(int)$row->s_p1;
$p2=(int)$row->s_p2;
$p3=(int)$row->s_p3;
$p4=(int)$row->s_p4;
$p5=(int)$row->s_p5;

$v1=(int)$row->s_v1;
$v2=(int)$row->s_v2;
$v3=(int)$row->s_v3;
$v4=(int)$row->s_v4;
$v5=(int)$row->s_v5;

$sum_total=$sum_total+(int)$total;     

$sum_i1=$sum_i1+$i1; 
$sum_i2=$sum_i2+$i2; 
$sum_i3=$sum_i3+$i3;


if( $p1<0)
    {   
$p1="";
}else{
$sum_p1=$sum_p1+$p1;  
}


if( $p2<0)
    {   
$p2="";
}else{
$sum_p2=$sum_p2+$p2;  
}
if( $p3<0)
    {   
$p3="";
}else{
$sum_p3=$sum_p3+$p3;  
}
if( $p4<0)
    {   
$p4="";
}else{
$sum_p4=$sum_p4+$p4;  
}
if( $p5<0)
    {   
$p5="";
}else{
$sum_p5=$sum_p5+$p5;  
}

if( $v1<0)
    {   
$v1="";
}else{
$sum_v1=$sum_v1+$v1;  
}

if( $v2<0)
    {   
$v2="";
}else{
$sum_v2=$sum_v2+$v2;  
}
if( $v3<0)
    {   
$v3="";
}else{
$sum_v3=$sum_v3+$v3;  
}
if( $v4<0)
    {   
$v4="";
}else{
$sum_v4=$sum_v4+$v4;  
}
if( $v5<0)
    {   
$v5="";
}else{
$sum_v5=$sum_v5+$v5;  
}


      
                        ?> 
<tr>
 
                         <td    bgcolor=<?php echo colores("giro")?>>
                             <h5>    <?php echo ($this->router->fetch_method()==='consultar_area_influencia_datos') ? utf8_decode($row->nombre_giro) : $row->nombre_giro; ?> </h5>
                       </td>
                      
                        <td  align="right" bgcolor=<?php echo colores("total")?>>
                            <?php echo $row->s_total?>
                       </td>


                       <td   align="right"   bgcolor="<?php echo colores("i1")?>">
                            <?php echo $i1?>
                       </td>
                        
                          
                          <td   align="right"  bgcolor="<?php echo colores("i2")?>">
                            <?php echo $i2?>
                       </td>
                       
                           
                          
                          <td  align="right"   bgcolor="<?php echo colores("i3")?>">
                            <?php echo $i3?>
                       </td>
                    
                       
                        <td   align="right"  bgcolor="<?php echo colores("p1")?>"   >
                           <?php echo $p1?>
                       </td>
                       
                          <td  align="right"   bgcolor="<?php echo colores("p2")?>">
                            <?php echo $p2?>
                       </td>
                       
                          <td  align="right"   bgcolor="<?php echo colores("p3")?>">
                            <?php echo $p3?>
                       </td>
                       
                          <td  align="right"  bgcolor="<?php echo colores("p4")?>">
                            <?php echo $p4?>
                       </td>
                       
                             <td  align="right"  bgcolor="<?php echo colores("p5")?>">
                            <?php echo $p5?>
                       </td>
                       
                       
                            <td   align="right" bgcolor="<?php echo colores("v1")?>">
                            <?php echo $v1?>
                       </td>
                       
                             <td  align="right"  bgcolor="<?php echo colores("v2")?>">
                            <?php echo $v2?>
                       </td>
                             <td  align="right"  bgcolor="<?php echo colores("v3")?>">
                            <?php echo $v3?>
                       </td>
                    
                             <td  align="right"  bgcolor="<?php echo colores("v4")?>">
                            <?php echo $v4?>
                       </td>
                             <td  align="right"  bgcolor="<?php echo colores("v5")?>">
                            <?php echo $v5?>
                       </td>          
            
                       
                   </tr>
                     <?php endforeach;?>       
           
          <tr>
              
              <td  bgcolor="<?php echo colores("giro")?>"><h4>Total</h4></td>
                <td align="right"  bgcolor="<?php echo colores("total")?>" ><?php echo $sum_total?></td>
                  <td  align="right"  bgcolor="<?php echo colores("i1")?>"><?php echo $sum_i1?> </td>
                    <td  align="right" bgcolor="<?php echo colores("i2")?>"><?php echo $sum_i2?> </td>
                      <td  align="right" bgcolor="<?php echo colores("i3")?>"><?php echo $sum_i3?>  </td>
                        <td  align="right" bgcolor="<?php echo colores("p1")?>"><?php echo $sum_p1?></td>
                          <td  align="right" bgcolor="<?php echo colores("p2")?>"><?php echo $sum_p2?></td>
                            <td align="right"  bgcolor="<?php echo colores("p3")?>"><?php echo $sum_p3?></td>
                              <td align="right"  bgcolor="<?php echo colores("p4")?>"><?php echo $sum_p4?></td>
                                <td  align="right" bgcolor="<?php echo colores("p5")?>"><?php echo $sum_p5?></td>
                                  <td align="right"  bgcolor="<?php echo colores("v1")?>"><?php echo $sum_v1?></td>
                                    <td align="right"  bgcolor="<?php echo colores("v2")?>"><?php echo $sum_v2?></td>
                                      <td align="right"  bgcolor="<?php echo colores("v3")?>"><?php echo $sum_v3?></td>
                                        <td align="right"  bgcolor="<?php echo colores("v4")?>"><?php echo $sum_v4?></td>
                                          <td align="right"  bgcolor="<?php echo colores("v5")?>"><?php echo $sum_v5?></td>
              
          </tr>
          
</table>

 
