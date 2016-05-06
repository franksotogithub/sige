
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



function iniciar_variable()
{

	url_servidormap= "http://sige.inei.gob.pe/cgi-bin/mapserv?map=/var/www/html/test/atlas/map/mapa_negocios_cp.map";
	url_servidormap_2= "http://sige.inei.gob.pe/cgi-bin/mapserv?map=/var/www/html/test/atlas/map/";




	proxy_prefix="./proxy.php?url=";

	//Iniciar autocomplete
	varcom="";
	ubigeo =""

	//area influencia

	bloque_id_manzana="" ;
	bloque_puntos_influencia="";

	//ubicacion

	ubigeo="";
	codciudad="";
	flag_sm="";
	//js mapa

	imagen2="";
	iColor[0]="";
	iColor[1]="";
	iColor[2]="";
	iColor[3]="";

	//inicializar combo ciudad
	limpiar_ciudad();
	$('#tblResultados tbody').children('tr').remove();
}



$(document).ready(function() {
            $("#create-ayuda" )
	    //.button()
	    .click(function() {
    log_visita_insertar('14','Ayuda');
   window.open( "manual/Manual_usuario_ATLAS.pdf")
   } )

})
