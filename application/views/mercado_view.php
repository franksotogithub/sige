  <?php



foreach($result as $row):

                        ?> 
                         <tr>
                             <td>
                                 <table  border="1" width="100%" style="border-collapse:collapse;">
                                     <tr>
                                           <td>
                                                    Poblacion
                                           </td>

                                           <td align="right">
                                                 <?php echo $row->s_poblacion?>
                                           </td>
                                     </tr>    
                                 </table>
                             </td>
                          
                         </tr>
                     
                    <tr>
                             <td>
                                 <table  border="1" width="100%" style="border-collapse:collapse;">
                                     <tr>
                                           <td>
                                                    Hogares
                                           </td>

                                          <td align="right">
                                                 <?php echo $row->s_hogares?>
                                           </td>
                                     </tr>    
                                 </table>
                             </td>
                          
                       </tr>
                     
                          
                          
                       <tr>
                             <td>
                                 <table border="1" width="100%" style="border-collapse:collapse;">
                                     <tr>
                                           <td>
                                                    Viviendas
                                           </td>

                                          <td align="right">
                                                 <?php echo $row->s_vivienda?>
                                           </td>
                                     </tr>    
                                 </table>
                             </td>
                          
                       </tr>


          
 <?php endforeach;?>     