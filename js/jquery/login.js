function valida(o)
{
	obj=o.value;
	var txt;
	txt="ABCDEFGHIJKLMN�OPQRSTUVWXYZabcdefghijklmn�opqrstuvwxyz1234567890@.-_";
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
		alert("LO SIENTO\nSolo use letras y numeros");
		o.focus();
		return false;
		}
	

}
function padre() {

     if(document.domain!='http://sige.inei.gob.pe')
		{
		alert("Error");
			history.back();
		
		}
	else
		{if (window.parent.frames.length > 0) 
			history.back();
		}
		
}  

function ir()
{
       document.login.action='login.php'
       document.login.submit();
       
 

}
function validar_Logueo()
{
  var usuario = document.getElementById("txtUsuario").value;
  var password =  document.getElementById("txtPassword").value;
  
if (usuario=="")
    {
       alert( 'Ingresar Usuario');
        
    }else if(password=="") {
        
       alert( 'Ingresar Password');
  
    }else{
        
        document.login.submit();
    }
    
}


function recuperar_clave()
{
    var txtusuario="";
    txtusuario=document.getElementById("txtUsuario").value;  


    if (txtusuario=="")
        {
            alert("Debe ingresar un usuario");
        }else{
        
       if (confirm("Desea enviar su clave a su correo?")) 
    {
 
    	    $.ajax({
		    type:'post',
		    dataType: 'html',
		    url:'index.php/correo_control/enviar_clave',
                    data:'txtusuario='+txtusuario,
               
		    success: function(result){							
			alert(result)
			    },  
		    error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
		    }  
	    });
        }
    }
    
}
