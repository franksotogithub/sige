

  <?php



foreach($result as $row):

                        ?> 
                         <tr>
                             <td>
                                 <table width="100%" border="1" style="border-collapse:collapse;">
                                     <tr>
                                         
                                       <td >
                               Manzanas 
                       </td>
                     
                        <td align="right">
                            <?php echo $row->s_manzana?>
                       </td>   
                                         
                                     </tr>
                                         
                                     
                                 </table>
                                 
                             </td>
                        
                          </tr>


          
 <?php endforeach;?>       
           
 