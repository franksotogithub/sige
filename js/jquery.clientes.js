

function enviar_clientes(id,cadena)
{
     
 if ( validar_ciudad()==false)
     {
     document.getElementById(id).checked=false; 
     return false;
     }


 if ( flag_sm!="1" && id=="checkEstra" )
     {
         jAlert('warning', 'Disculpe,esta opcion no es valida para esta ciudad', 'Mensaje del Sistema');
         document.getElementById(id).checked=false; 
     return false;
     }
   

     
     
 if ( validar_zoom()==false)
     {
     document.getElementById(id).checked=false; 
     return false;
     }

	var valor= document.getElementById(id).checked;
    switch (cadena) {
    case "POBLACION":
            if(valor == true){
                   
                   // visible_capa_pob(cadena);
                    crear_capa_poblacion();//se aumento momentaneo
                    novisible_capa("ESTRATO");
                    $("#leyMercado").removeClass("lestrato");
                    $("#leyMercado").addClass("lestratoPoblacion");
                    $('#titleyMercado').show();
                    $('#checkEstra').attr('checked', false);
                    
                    if (log_poblacion==0)
                        {
                         log_visita_insertar('6','poblacion');
                         log_poblacion=1;
                        }
                    
            }else{
                    $("#leyMercado").removeClass("lestratoPoblacion");
                    novisible_capa("POBLACION");
                    $('#titleyMercado').hide();
                    //$('#checkCli').attr('checked', false);
            }
            break;
    
    case "ESTRATO":
            if(valor == true){
                    
                    visible_capa_pob(cadena);
                    novisible_capa("POBLACION");
                    $("#leyMercado").removeClass("lestratoPoblacion");
                    $("#leyMercado").addClass("lestrato");
                    $('#titleyMercado').show();
                    $('#checkCli').attr('checked', false);
                    
                                        if (log_estrato==0)
                        {
                         log_visita_insertar('6','estrato');
                         log_estrato=1;
                        }
                    
                    
            }else{
                    $("#leyMercado").removeClass("lestrato");
                    novisible_capa("ESTRATO");
                    $('#titleyMercado').hide();
            }	
            break;
    }

    //if (valor==true){
    //    visible_capa_pob(cadena);
    //}else{
    //    novisible_capa(cadena);
    //}
}


function  crear_capa_poblacion()
{
    
                var pivot="";
                var x=0;
                var e=0;
                var n=0;
                var pea=0;

                var val_p=0;
                
                var v_sex=vsexo.toString();
                var v_eda=vedad.toString();
                var v_est=vestudio.toString();
                var v_pea=vpea.toString();

                 vsexo= new Array();
                 vedad= new Array();
                 vestudio=new Array();
                 vpea=new Array();
                
                
                $('#treePobacion').find('.jstree-checked, .jstree-undetermined').each(function () {
                    var node = $(this);
                    var file = node.attr('rel');
                    
                    if(node.attr('id')== "x"){
                        pivot = "x"
                    }else if(node.attr('id')== "e"){
                        pivot = "e"
                    }else if(node.attr('id')== "n"){
                        pivot = "n"
                    }else if(node.attr('id')=="pea"){
                        pivot = "pea"
                    }
                    
                    if(pivot== "x"){
                        if( file == 'hijo'){
                            vsexo[x] = node.attr('id');
                   
                            x++;
                        }
                    }else if(pivot== "e"){
                        if( file == 'hijo'){
                            vedad[e] = node.attr('id');
                               
                            e++;
                        }
                    }else if(pivot=="n"){
                        if( file == 'hijo'){
                            vestudio[n] = node.attr('id');
                   
                            n++;
                        }  
                    }else if(pivot=="pea"){
                        if( file == 'hijo'){
                            vpea[pea] = node.attr('id');
                        
                     
                            pea++;
                        }
                    }
                });
      
           crear_map_pob(vsexo,vedad,vestudio,vpea); //creando el mapa 

      
      //        if (v_sex!=vsexo.toString() || v_eda!=vedad.toString()|| v_est!=vestudio.toString()|| v_pea!=vpea.toString() )
      //            {
       //              crear_map_pob(vsexo,vedad,vestudio,vpea); //creando el mapa 
                      
       //           }else{
        //             crear_map_pob(vsexo,vedad,vestudio,vpea); //creando el mapa 
  
                   //visible_capa_pob("POBLACION");   
         //         }
                       
                document.getElementById("checkCli").checked=true;
    
    
}