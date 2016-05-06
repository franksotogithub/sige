

function enviar_lugar_interes(id,cadena)
{

  if ( validar_ciudad()==false)
     {
     document.getElementById(id).checked=false; 
     return false;
     }
 
 
 
 if ( validar_zoom()==false)
     {
     document.getElementById(id).checked=false; 
     return false;
     }
  
  
  
  
  
  var valor= document.getElementById(id).checked;

if (valor==true)
    {
visible_capa_si(cadena);

    }else{
        
 novisible_capa_si(cadena);
 
    }

}

