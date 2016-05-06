<html>
    <head>
        <title>Sistema de Información Geográfica para Emprendedores</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript">
		
$(document).ready(function(){
$("#create-mapa_img").click(function () {
                var minx = -92.959518854318;
                var maxx = -57.020990145682;
                var miny = -14.242669883987;
                var maxy = -4.1468641160131;
                var si = 00000000000;
                var estra = 0;
                var pobla = 0;
                var mapa_pobla = 'map/mapa_negocios_cp.map';
                mapa_pobla.replace("&", "");
                var mapagiro = "";
                var cad_influencia = '' //'bloque_puntos_influencia
                //*****/

                    mapagiro = "&giro0=A&idgiro0=A&giro1=A&idgiro1=A&giro2=A&idgiro2=A";
                    mapa_pobla = "A";

                $.ajax({
                    type: 'post',
                    dataType: 'html',
                    url: 'mapas/exportar_mapa_otro',
                    data: 'minx=' + minx + '&maxx=' + maxx + '&miny=' + miny + '&maxy=' + maxy + '&si=' + si + '&estra=' +
                            estra + '&pobla=' + pobla + '&mapa_pobla=' + mapa_pobla + '&cad_influencia=' + cad_influencia + mapagiro,
                    success: function (result) {
                        console.log(result);
                        imagen2 = result;

                        //$( "#tblArea_mapa tbody" ).append('<tr><td><img src="/SIG-NEGOCIOS/'+result+'"></td></tr>');  
                        $("#tblArea_mapa tbody").append('<tr><td><img src="/test/atlas/' + result + '"></td></tr>');
                        //log_visita_insertar('11', imagen2.replace("map/", ""));
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr);
                        //alert('error: ' + xhr.descrip);
                        //alert('error: ' + thrownError);
                    }
                });



})
})
;

		</script>
  
    
    </head>
    <body>


<button id="create-mapa_img" value="mapa">Mapa</button>
<table id="tblArea_mapa" >
	<tbody>

        </tbody>
    </table>


    </body>
</html>
