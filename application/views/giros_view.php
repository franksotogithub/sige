

  <?php


  
foreach($result as $row):
 $id=$row->id_gir;
                       ?> 
                         <tr>
                             <td >
                                        <table width="100%" border="1"  style="border-collapse:collapse;" >
                                            <tr>
                                         <td width="70%">

                                          <?php echo $row->nombre_giro?>  

                                       </td>

                                        <td  >
                                            <table  width="100%" style="border-collapse:collapse; border:thin" >
                                                <tr>
                                                    <td>
                                                       <img src="images/<?php if($id_giro1==$id){echo $color1;} if($id_giro2==$id){echo $color2;} if($id_giro3==$id){echo $color3;}?>.png">
                                                  
                                          
                               
                                                    </td>
                                                    <td align="right">
                                                       <?php echo $row->s_total?>  
                                                    </td> 

                                                </tr>

                                            </table>

                                       </td>
                                            </tr>
                                    </table>  
                             </td>
                             
                   
                          </tr>


          
 <?php endforeach;?>       
           
 

 