   

   
   function validar_zoom()
   {

       		                     if (eval(mainMap.getZoom())<13)
                   {
                 
                  jAlert('warning', 'Disculpe, debe aproximarse mas para  acceder a esta opcion', 'Mensaje del Sistema');
                    return false;
                   }else{
                       
                      return true;
                   }
   }
 
 function validar_ciudad()
 {
     if ( codciudad=="" || codciudad=="00" )
     {
         jAlert('warning', 'Debe seleccionar una ciudad', 'Mensaje del Sistema');
         
       return false;
     } else if(ubigeo=="") {
        jAlert('warning', 'Debe seleccionar un distrito', 'Mensaje del Sistema');  
        return false;
     }else{
         return true;
     } 
     
     
 }
 






function valida_numeros(o)
{
	obj=o.value;
	var txt;
	txt="1234567890";
	var texto=o.value;
	var c
	var error=false;
	var y=o.value;
	var  i;
	var t;
	t="";
	for (i=0; i<txt.length; i=i+1)
		{
		c=texto.charAt(i);
		if(txt.indexOf(c)<0)
			{
			error=true;
			o.value=t;
			i=txt.length+1;
			
			}
		else 
			t=t+c;
		}
	if(error==true)
		{

 jAlert('warning', 'Solo ingrese numeros', 'Mensaje del Sistema');
                  


				o.focus();
		return false;
		}
	

}
