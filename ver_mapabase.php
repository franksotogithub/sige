<head> 
<title>Manzansas</title> 
<style type="text/css"> 
#map { 
width: 800px; 
height: 540px; 
border: 1px solid black; 
} 
</style> 
<script type="text/javascript" src="http://openlayers.org/api/2.9/OpenLayers.js"></script> 
<script type="text/javascript"> 
var map, layer; 

function init(){ 
map = new OpenLayers.Map( 'map',{ 
	maxExtent: new OpenLayers.Bounds(-77.350, -12.377, -76.5381, -11.970 ),	
	minExtent: new OpenLayers.Bounds(-76.9545, -12.20294, -76.93433, -12.18938 ),
	maxScale: 1000,
	minScale: 300000,	
	controls: [new OpenLayers.Control.PanZoomBar()],
	projection: "EPSG:4326"} 
); 

var layer_dpto = new OpenLayers.Layer.WMS("Departamentos",
"/usr/sbin/mapserv?map=/var/www/html/SIG-NEGOCIOS/map/prueba3.map",
{layers: 'dptos',format:'image/png', transparent:true},{isBaseLayer: false});

map.addLayers([layer_dpto]); 
map.zoomToMaxExtent(); 
map.addControl(new OpenLayers.Control.LayerSwitcher({'ascending':false})); 
map.addControl(new OpenLayers.Control.MousePosition()); 
map.addControl(new OpenLayers.Control.ScaleLine()); 
//map.addControl(new OpenLayers.Control.PanZoomBar()); 
map.addControl(new OpenLayers.Control.MouseToolbar()); 
map.addControl(new OpenLayers.Control.Scale()); 
map.addControl(new OpenLayers.Control.OverviewMap()); 
map.addControl(new OpenLayers.Control.KeyboardDefaults()); 
map.addControl(new OpenLayers.Control.PanZoom()); 

} 
</script> 
</head> 
<body onLoad="init()"> 
<div> Ubicacion de Manzanas </div> 
<div id="map"></div> 
</body> 
</html>