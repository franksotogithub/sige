
$(document).ready(function(){
   $("#create-cerrar_session").click(function(evento){
     log_visita_insertar('13','Logout');
     alert("Gracias por su visita");

      window.location="index.php/login/cerrar_session";
 });
})  ;


function log_visita_insertar(tipo,parametro)
{

//ip=document.getElementById("ip").value;
//ip="";
     $(function() {
	    $.ajax({
		    type:'post',
		    dataType: 'html',
		    url:'index.php/log_visita',
                    data:'parametro='+parametro+'&tipo='+tipo+'&id_session='+id_session+'&ip='+ip,

		    success: function(result){

			    },
		    error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
		    }
	    });
	});

}


function limpiar_ciudad(){
	$('#cboDistrito').find('option').remove();
   $('#cboProvincia').find('option').remove();

}







$(document).ready(function() {
            $("#create-ayuda" )
	    //.button()
	    .click(function() {
    log_visita_insertar('14','Ayuda');
   window.open( "manual/Manual_usuario_ATLAS.pdf")
   } )

})
