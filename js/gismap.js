 function handleMeasurements(event) {
    var geometry = event.geometry;
    var units = event.units;
    var order = event.order;
    var measure = event.measure;
    var element = document.getElementById('output'); 
    var out = "";
    if(order == 1) {
	out += "Afstand " + measure.toFixed(3) + " " + units;
    } else {
	out += "Oppervlak " + measure.toFixed(3) + " " + units + "2";
    }
    element.innerHTML = out;
}


function LoadMap(divId) {
	
//****************************************************	
	var projection = new OpenLayers.Projection("EPSG:4326");
	 
	var options = {
		projection: projection,
		maxScale: 200,
		maxResolution: "auto",
		minScale: 10000000,			
		
		scales: [10000000,7500000,5000000,2500000, 1000000, 750000,500000,225000, 180000,135000.01,90000, 67500.01, 45000, 33750.01, 22500,9000,4500,2250,900,400,200],
		//scales: [10000000,7500000,5000000,2500000, 1000000, 225000, 180000,135000.01,90000, 67500.01, 45000, 33750.01, 22500,9000,4500,2250,900],
		
		numZoomLevels: 21,
		
		controls: [new CtrlMoverZoom({zoomWorldIcon: true})],
        //  controls: [new OpenLayers.Control.PanZoomBar()],

             //control:[],
		maxExtent: new OpenLayers.Bounds(-81.328230 , -18.350928, -68.652279, -0.038606),
        restrictedExtent:new OpenLayers.Bounds(-84.328230 , -18.350928, -62.652279, -0.038606),
		allOverlays: false
	};
	
	var map = new OpenLayers.Map(divId, options);
//alert("paso1/"+map);
	//var vector_inicial=new OpenLayers.Layer.Vector("inicial",{isBaseLayer: true});
        var layer_pu=new OpenLayers.Layer.WMS("Poligono Urbano",url_servidormap,{layers:'poligono_urbano',format:'image/gif',transparent:true},{isBaseLayer:true,'buffer':0,singleTile:true});
//alert("paso2/"+map);    
        //map.addLayers([vector_inicial]);
        map.addLayers([layer_pu]);



/*	var layer_raster_2 = new OpenLayers.Layer.Google(
    "Google Streets",
    {'sphericalMercator': true
    // 'maxExtent': new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34), numZoomLevels: 22
    }
	);
*/
//map.addLayers([layer_pu,layer_raster_2]);


	map.zoomToMaxExtent();
 
	//map.addControl(new OpenLayers.Control.PanZoom()); 
	//map.addControl(new OpenLayers.Control.LayerSwitcher({'ascending':false})); /*QUITAR AL FINAL*/ 	
	

	var movermouse = new OpenLayers.Control.DragPan();

 map.addControl(movermouse);
//map.addControl(new OpenLayers.Control.LayerSwitcher());


//map.addControl(new OpenLayers.Control.WMSLegend());
    movermouse.activate();
			
	return map;
    }//****************************FIN DE MAP
	
function quitar(mapa){
	
	mapa.layers[0].setVisibility(false);
};

jsgismap="gismap";
