<table cellpadding="0" cellspacing="0" width="100%" border="1" bordercolor="#666666" style="border-collapse:collapse;">

          <?php
            $nombre_var2="";
            $nombre_var="";
            $conta=1;
                 ?>  
                 <tr>
                       <td align="center"  bgcolor=<?php echo colores("giro")?>   rowspan="2" width="7%" >
                         <h5>Total Manzanas</h5>
                       </td>   
                       <td align="center" bgcolor=<?php echo colores("total")?>   rowspan="2"  width="7%"  >
                        <h5>  Total Viviendas</h5>
                       </td>
                          <td align="center" bgcolor=<?php echo colores("total")?>  rowspan="2"  width="7%"  >
                        <h5> Total Hogares</h5>
                       </td>
                       
                             <td align="center" bgcolor=<?php echo colores("total")?>   rowspan="2" width="7%"  >
                        <h5>  Total Poblacion</h5>
                       </td>
                       
                        <?php foreach($result as $row):
                        $nombre_var= $row->nombre_var
                        ?> 
                       <?php if($nombre_var2!= $nombre_var){ ?>
                         
                         <td bgcolor="<?php echo colores($row->campo_variable)?>" 
                          align="center" colspan=<?php echo  $row->col?>>
                             <h5> <?php echo ($this->router->fetch_method()==='consultar_area_influencia_datos') ? utf8_decode($nombre_var) : $nombre_var; ?></h5>
                       </td>
                      <?php 
                       $nombre_var2=$nombre_var;
                       $conta=$conta+1;
                       }?>
                       
                     
             <?php endforeach;?>
                       
                       
                   </tr>

                  
           <tr>
                 
                        <?php
                        $campo="";
                        foreach($result as $row):
                        $campo=$row->campo;
                        ?> 
                                                
       <td   height="35"  bgcolor="<?php echo colores($row->campo)?>" align="center"  width="8%"> 
           <h5> <?php echo ($this->router->fetch_method()==='consultar_area_influencia_datos') ? utf8_decode($row->des_rango) : $row->des_rango; ?> </h5>
       </td> 
                       
                      
                 
             <?php endforeach;?>
                      
                   </tr>
                   

