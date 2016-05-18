
var url_servidormap= "http://sige.inei.gob.pe/cgi-bin/mapserv?map=/var/www/html/test/atlas/map/mapa_negocios_cp.map";
var url_servidormap_2= "http://sige.inei.gob.pe/cgi-bin/mapserv?map=/var/www/html/test/atlas/map/";

//var url_servidormap_2= "http://localhost:8020/cgi-bin/mapserv.exe?map=c://ms4w//apps//local//data//";

//var url_servidormap= "http://localhost:8020/cgi-bin/mapserv.exe?map=c://ms4w//apps//local//data//mapa_negocios_cp.map";

var myLayout;
var mainMap = null;
var proxy_prefix="./proxy.php?url=";
var antEscala,escala=0,antzoom, actzoom,lon,lat;

var dpto_zoom=0;
var prov_zoom=0;
var dist_zoom=0;


   var ccdd='';
    var ccpp='';


//area influencia

 var bloque_id_manzana="" ;
 var bloque_puntos_influencia="";

 //ubicacion

var ubigeo="";
var codciudad="";
var flag_sm="";
//js mapa

var imagen2="";

var iColor = new Array(3);

var jsopenlayer="";
var jsvalidar="";
var jsquery="";
var jsquery_ui="";
var jslayout="";
var jshistory="";
var jsmapwidget="";
var jsmapas="";
var jscontrolzoom="";
var jsgismap="";
var jstree="";
var jsfunciones="";
var jsbegin="";
var jsselectboxes="";
var jsubicacion="";
var areainfluencia="";
var jslugarinteres="";
var jsclientes="";
var jsalertas="";
var jsloader="";
var log_estrato=0;
var log_poblacion=0;
var id_session=0;
var ip="";

                 var vsexo= new Array();
                 var vedad= new Array();
                 var vestudio=new Array();
                 var vpea=new Array();
var complete="";
var varcom="";

var temp_capa=0;