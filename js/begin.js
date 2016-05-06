var temp_layer = null;
if (typeof console == "undefined") {
    window.console = {
        log: function(msg) {
            ;
        }
    }
}
OpenLayers.Layer.WMS.prototype.getFullRequestString = function(newParams, altUrl) {
    var projectionCode = this.map.getProjection();
    var value = (projectionCode == "none") ? null : projectionCode
    if (this.options.sphericalmercatoralias) {
        if (value == 'EPSG:900913' || value == 'EPSG:102113' || value == 'EPSG:3857') {
            value = this.options.sphericalmercatoralias;
        }
    }
    if (parseFloat(this.params.VERSION) >= 1.3) {
        this.params.CRS = value;
    } else {
        this.params.SRS = value;
    }
    return OpenLayers.Layer.Grid.prototype.getFullRequestString.apply(this, arguments);
}
var in_options = {
    'internalProjection': new OpenLayers.Projection("EPSG:4326"),
    'externalProjection': new OpenLayers.Projection("EPSG:4326")
};
var out_options = {
    'internalProjection': new OpenLayers.Projection("EPSG:4326"),
    'externalProjection': new OpenLayers.Projection("EPSG:4326")
};
var formats = {
    'in': {
        wkt: new OpenLayers.Format.WKT(in_options),
        geojson: new OpenLayers.Format.GeoJSON(in_options)
    },
    'out': {
        wkt: new OpenLayers.Format.WKT(out_options),
        geojson: new OpenLayers.Format.GeoJSON(out_options)
    }
};

function replaceURLWithHTMLLinks(text) {
    var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/i;
    return text.replace(exp, "<a href='$1' target=\"_blank\">$1</a>");
}

// funciones para la aplicacion
function zoom_up() {
    var nzoom = 0;
    var opcionc = 0;
    var sw = 0;
    antzoom = mainMap.getZoom();
    //alert(antzoom);


    var x,y,z;
    if (antzoom < 21)
        actzoom = antzoom + 1;
    else
        actzoom = 21;

sw = 1;


//alert(dpto_zoom+"."+prov_zoom+"."+dist_zoom);


if(dpto_zoom==0 && prov_zoom==0  && dist_zoom==0)
{x=2;  y=6; z=8;}

else if(dpto_zoom!==0 && prov_zoom==0  && dist_zoom==0)
{x=dpto_zoom; y=6; z=8;}

else if(dpto_zoom!==0 && prov_zoom!==0  && dist_zoom==0)
{x=dpto_zoom; y=prov_zoom;  z=8;}

else if(dpto_zoom!==0 && prov_zoom!==0  && dist_zoom!==0)

{x=dpto_zoom; y=prov_zoom; z=dist_zoom;}
 
               //dpto_zoom =antzoom;
               //prov_zoom=0;
               //dist_zoom=0;

//////////////////////////////////////////////////////////

if(actzoom<x)
{opcionc=0;}
else if(actzoom>=x && actzoom<y)
  {opcionc=1;}
else if(actzoom>=y && actzoom<z)
    {opcionc=2;}

else if(actzoom>=z && actzoom<15)
    {opcionc=3;}

else if(actzoom>=15 && actzoom<17)
    {opcionc=4;}

else 
{opcionc=5;}


/*

   if ((antzoom <= 1 & actzoom > 1)) {
        opcionc = 1;
        sw = 1
    }

    if ((antzoom <= 6 & actzoom > 6)) {
        opcionc = 2;
        sw = 1
    }

    

    if ((antzoom <= 8 & actzoom > 8)) {
        opcionc = 3;
        sw = 1
    }



    if (antzoom < 15 && actzoom >= 15) {
        opcionc = 4;
        sw = 1
    }
    
    if (antzoom < 17 && actzoom >= 17) {
        opcionc = 5;
        sw = 1
    }
    
*/
    //alert("ZOOM ANTERIOR:"+antzoom+"OPCION:"+opcionc);

    if (sw == 1) {
        var layer1 = mainMap.getLayersByName("influencia");
        if (layer1[0])
            temp_layer = layer1[0].clone();
        eliminar_map(1);
        mainMap.zoomTo(actzoom);
        activar_capas(opcionc);
    
    //if(opcionc===5)
        //    crear_leyenda_mzn_estab();
      //  else
       //     crear_leyenda_mapa();

    } else {
        mainMap.zoomTo(actzoom)
    }
}

function zoom_nivel(azoom) {
    var opcionc = 0;
    var sw = 0;
    antzoom = mainMap.getZoom();
    //alert(antzoom);
    //alert(azoom);


    if (antzoom < 1)
        actzoom = azoom;
    else
        actzoom = 21;



//if(azoom)


    /*
    if ((antzoom <= 4 & actzoom >= 4)) {
        if (actzoom < 13) {
            opcionc = 2
        } else {
            opcionc = 4
        }
        sw = 1
    }
    if ((antzoom >= 4 & antzoom < 13) && (actzoom < 4 || actzoom >= 13)) {
        if (actzoom < 4) {
            opcionc = 1
        } else {
            opcionc = 4
        }
        sw = 1
    }
    


    if ((antzoom >= 4 & antzoom < 15) && (actzoom < 4 || actzoom >= 15)) {
        if (actzoom < 4) {
            opcionc = 1
        } else {
            opcionc = 5
        }
        sw = 1
    }
    
    if ((antzoom >= 17 & actzoom < 17)) {
        if (actzoom > 4) {
            opcionc = 4
        } else {
            opcionc = 1
        }
        sw = 1
    }
    
    if ((antzoom >= 13 & actzoom < 13)) {
        if (actzoom > 4) {
            opcionc = 3
        } else {
            opcionc = 1
        }
        sw = 1
    }

  

*/

sw=1;

if(azoom<2)
{opcionc=0;}
else if(azoom>=2 && azoom<6)
    {opcionc=1;}
else if(azoom>6 && azoom<8)
    {opcionc=2;}

else if(azoom>=8 && azoom<15)
    {opcionc=3;}

else if(azoom>=15 && azoom<17)
    {opcionc=4;}

else 
{opcionc=5;}


    if (sw == 1) {
        var layer1 = mainMap.getLayersByName("influencia");
        if (layer1[0])
            temp_layer = layer1[0].clone();
        eliminar_map(1);


        mainMap.zoomTo(azoom);
        activar_capas(opcionc)

    if(opcionc===5)
            crear_leyenda_mzn_estab();
        else
            crear_leyenda_mapa();

    } else {
        mainMap.zoomTo(actzoom)
    }
}




function zoom_down() {
    var nzoom = 0;
    var opcionc = 0;
    var sw = 0;


    antzoom = mainMap.getZoom();
    if (antzoom > 0)
        actzoom = antzoom - 1;
    else
        actzoom = 0;




sw = 1;


if(dpto_zoom==0 && prov_zoom==0  && dist_zoom==0)
{x=2;  y=6; z=8;}

else if(dpto_zoom!==0 && prov_zoom==0  && dist_zoom==0)
{x=dpto_zoom; y=6; z=8;}

else if(dpto_zoom!==0 && prov_zoom!==0  && dist_zoom==0)
{x=dpto_zoom; y=prov_zoom;  z=8;}

else if(dpto_zoom!==0 && prov_zoom!==0  && dist_zoom!==0)
{x=dpto_zoom; y=prov_zoom; z=dist_zoom;}
  
 
               //dpto_zoom =antzoom;
               //prov_zoom=0;
               //dist_zoom=0;

//////////////////////////////////////////////////////////

if(actzoom<x)
{opcionc=0;

if(antzoom==1)
{dpto_zoom=0;}

}


else if(actzoom>=x && actzoom<y)
  {opcionc=1;
    if(antzoom>=y)
    {prov_zoom=0;}


}


else if(actzoom>=y && actzoom<z)
    {opcionc=2;

    if(antzoom>=z)
    {dist_zoom=0;}



    }

else if(actzoom>=z && actzoom<15)
    {opcionc=3;}

else if(actzoom>=15 && actzoom<17)
    {opcionc=4;}

else 
{opcionc=5;}


//////para especificar que justo cuando bajas del nivel de distrito , ya se encuentra liberado la variravle dist_zoom con valor de 0

/*
if(antzoom>z)
{dist_zoom=0;}

else {
if(antzoom>y)
{prov_zoom=0;}

else {
if(antzoom>x)
{dpto_zoom=0;}
}

}

*/
/////////////////////////////////////////////////////////////

    /*if (antzoom >= 17 && actzoom < 17) {
        opcionc = 4;
        sw = 1
    }
    
    if ((antzoom >= 15 & actzoom < 15)) {
        opcionc = 3;
        sw = 1
    }


  if (antzoom > 8 && actzoom <= 8) {
        opcionc = 2;
        sw = 1
    }


    if (antzoom > 6 && actzoom <= 6) {
        opcionc = 1;
        sw = 1
    }


    if (antzoom > 1 && actzoom <= 1) {
        opcionc = 0;
        sw = 1
    }

*/


    if (sw == 1) {
        var layer1 = mainMap.getLayersByName("influencia");
        if (layer1[0])
            temp_layer = layer1[0].clone();
        eliminar_map(1);
        mainMap.zoomTo(actzoom);
        activar_capas(opcionc)

    if(opcionc===5)
            crear_leyenda_mzn_estab();
        else
            crear_leyenda_mapa();

    } else {
        mainMap.zoomTo(actzoom)
    }






}

function zoom_ciudad_dist(extend_xmin, extend_ymin, extend_xmax, extend_ymax, nivel) {
    
var dptoval=$('#cboDepartamento').val();
var provval=$('#cboProvincia').val();
var distval=$('#cboDistrito').val();

    var nzoom = 0;
    var opcionc = 0;
    var sw = 0;
    antzoom = mainMap.getZoom();
    actzoom = mainMap.getZoomForExtent(new OpenLayers.Bounds(extend_xmin, extend_ymin, extend_xmax, extend_ymax), true);
    /*if ((antzoom <= 4 & actzoom >= 4)  || dptoval!==null) {
        if (actzoom < 13) {
            opcionc = 2
        } else {
            opcionc = 3
        }
        sw = 1
    }
    if (((antzoom >= 4 & antzoom < 13) && (actzoom < 4 || actzoom >= 13) ) || provval!==null) {
        if (actzoom < 4) {
            opcionc = 1
        } else {
            opcionc = 3
        }
        sw = 1
    }
    if ((antzoom >= 13 & actzoom < 13)) {
        opcionc = 2;
        sw = 1
    }

    if ((antzoom >= 15 & actzoom < 17)) {
        opcionc = 3;
        sw = 1;
    }
*/

    sw = 1;


    if (sw == 1) {


        var layer1 = mainMap.getLayersByName("influencia");
        if (layer1[0])
            temp_layer = layer1[0].clone();
        eliminar_map(1);
        mainMap.zoomToExtent(new OpenLayers.Bounds(extend_xmin, extend_ymin, extend_xmax, extend_ymax), true);
        activar_capas(nivel);
    } else {
        mainMap.zoomToExtent(new OpenLayers.Bounds(extend_xmin, extend_ymin, extend_xmax, extend_ymax), true);
    }
    switch (nivel) {
    case 0:
            {

               dpto_zoom =0;
               prov_zoom=0;
               dist_zoom=0;
              // alert(dpto_zoom);
                //mainMap.zoomTo(4);
            }
            break;
                


        case 1:
            {

               dpto_zoom =actzoom;
               prov_zoom=0;
               dist_zoom=0;
              // alert(dpto_zoom);
                //mainMap.zoomTo(4);
            }
            break;
        case 2:
            {
                prov_zoom=actzoom;
                dist_zoom=0;
            }
            break;
        case 3:
            {
             
                dist_zoom=actzoom;   

            }
            break;

         case 4:    
           {
                mainMap.zoomTo(16);
            }
            break;
    }

}

function crear_capa_si(nomcapa) {
    var nueva_capa;
    switch (nomcapa) {
        case 'GRIFO':
            nueva_capa = new OpenLayers.Layer.WMS("siGRIFO", url_servidormap, {
                layers: 'si_grifo',
                format: 'image/png',
                transparent: true
            }, {
                'buffer': 0,
                singleTile: true
            });
            break;
        case 'CLINICA':
            nueva_capa = new OpenLayers.Layer.WMS("siCLINICA", url_servidormap, {
                layers: 'si_clinica',
                format: 'image/png',
                transparent: true
            }, {
                'buffer': 0,
                singleTile: true
            });
            break;
        case 'CORREO':
            nueva_capa = new OpenLayers.Layer.WMS("siCORREO", url_servidormap, {
                layers: 'si_correo',
                format: 'image/png',
                transparent: true
            }, {
                'buffer': 0,
                singleTile: true
            });
            break;
        case 'BOMBERO':
            nueva_capa = new OpenLayers.Layer.WMS("siBOMBERO", url_servidormap, {
                layers: 'si_bombero',
                format: 'image/png',
                transparent: true
            }, {
                'buffer': 0,
                singleTile: true
            });
            break;
        case 'HOSPITAL':
            nueva_capa = new OpenLayers.Layer.WMS("siHOSPITAL", url_servidormap, {
                layers: 'si_hospital',
                format: 'image/png',
                transparent: true
            }, {
                'buffer': 0,
                singleTile: true
            });
            break;
        case 'IGLESIA':
            nueva_capa = new OpenLayers.Layer.WMS("siIGLESIA", url_servidormap, {
                layers: 'si_iglesia',
                format: 'image/png',
                transparent: true
            }, {
                'buffer': 0,
                singleTile: true
            });
            break;
        case 'MERCADO':
            nueva_capa = new OpenLayers.Layer.WMS("siMERCADO", url_servidormap, {
                layers: 'si_mercado',
                format: 'image/png',
                transparent: true
            }, {
                'buffer': 0,
                singleTile: true
            });
            break;
        case 'MUNICIPALIDAD':
            nueva_capa = new OpenLayers.Layer.WMS("siMUNICIPALIDAD", url_servidormap, {
                layers: 'si_municipalidad',
                format: 'image/png',
                transparent: true
            }, {
                'buffer': 0,
                singleTile: true
            });
            break;
        case 'PNP':
            nueva_capa = new OpenLayers.Layer.WMS("siPNP", url_servidormap, {
                layers: 'si_pnp',
                format: 'image/png',
                transparent: true
            }, {
                'buffer': 0,
                singleTile: true
            });
            break;
        case 'UNIVERSIDAD':
            nueva_capa = new OpenLayers.Layer.WMS("siUNIVERSIDAD", url_servidormap, {
                layers: 'si_universidad',
                format: 'image/png',
                transparent: true
            }, {
                'buffer': 0,
                singleTile: true
            });
            break
    }
    nueva_capa.setVisibility(true);
    return nueva_capa
}

function visible_capa(aNombrecapa) {
    var layer1 = mainMap.getLayersByName(aNombrecapa);
    if (layer1[0]) {
        layer1[0].setVisibility(true)
    }
}

function visible_capa_pob(aNombrecapa) {
    var layer1 = mainMap.getLayersByName(aNombrecapa);
    if (layer1[0]) {
        layer1[0].setVisibility(true)
    } else {
        var capa = crear_mapa_js_pob("mapa_negocios.map");
        if (capa) {
            mainMap.addLayers([capa])
        }
    }
}

function novisible_capa(aNombrecapa) {
    var layer1 = mainMap.getLayersByName(aNombrecapa);
    if (layer1[0])
        layer1[0].setVisibility(false)
}

function visible_capa_si(aNombrecapa) {
    var Nombrecapa = "si" + aNombrecapa;
    var layer1 = mainMap.getLayersByName(Nombrecapa);
    if (layer1[0]) {
        layer1[0].setVisibility(true)
    } else {
        var capa = crear_capa_si(aNombrecapa);
        if (capa) {
            mainMap.addLayers([capa])
        }
    }
}

function novisible_capa_si(aNombrecapa) {
    aNombrecapa = "si" + aNombrecapa;
    var layer1 = mainMap.getLayersByName(aNombrecapa);
    if (layer1[0]) {
        layer1[0].setVisibility(false)
    }
}

function visible_giro(idcapa) {
    var capa = "giro" + idcapa;
    var layer1 = mainMap.getLayersByName(capa);
    if (layer1[0])
        layer1[0].setVisibility(true)
}

function novisible_giro(idcapa) {
    var capa = "giro" + idcapa;
    var layer1 = mainMap.getLayersByName(capa);
    if (layer1[0])
        layer1[0].setVisibility(false)
}

function are_influencia(figuras) {
    var text1 = '{"type": "FeatureCollection" , "features": [{"geometry": {"type": "GeometryCollection","geometries":';
    var text2 = '} }] }';
    var text3 = text1 + figuras + text2;
    var figura3 = formats['in']['geojson'].read(text3);
    if (figura3) {
        if (figura3.constructor != Array) {
            figura3 = [figura3]
        }
    }
    var vector_layer = mainMap.getLayersByName("influencia");
    if (vector_layer[0]) {
        vector_layer[0].removeAllFeatures();
        vector_layer[0].addFeatures(figura3)
    }
    $("#dialog-form_area").dialog("close")
}

function poner_punto(lon1, lat1) {
    var geojson_format = new OpenLayers.Format.GeoJSON();
    var punto = {
        "type": "FeatureCollection",
        "features": [{
                "geometry": {
                    "type": "GeometryCollection",
                    "geometries": [{
                            "type": "Point",
                            "coordinates": [lon1, lat1]
                        }]
                }
            }]
    };
    var vector_punto = mainMap.getLayersByName("centro");
    if (vector_punto[0]) {
        vector_punto[0].removeAllFeatures();
        vector_punto[0].addFeatures(geojson_format.read(punto))
    }
}

function eliminar_capa(nomcapa) {
    var layer1 = mainMap.getLayersByName(nomcapa);
    if (layer1[0]) {
        var nlayer = mainMap.getLayerIndex(layer1[0]);
        mainMap.removeLayer(layer1[0], mainMap.getExtent());
        layer1[0].destroy()
    }
}

function eliminar_capa_giro(nomcapa) {
    nomcapa = nomcapa = "giro" + nomcapa;
    var layer1 = mainMap.getLayersByName(nomcapa);
    if (layer1[0]) {
        var nlayer = mainMap.getLayerIndex(layer1[0]);
        layer1[0].destroy();
        return 1
    }
    return 0
}

function crear_mapa_js_giro(nombre_archivo, nom_giro) {
    eliminar_capa_giro(nom_giro);
    nom_giro = "giro" + nom_giro;
    var url_map_giro = url_servidormap_2 + nombre_archivo;
    var layer_giros = new OpenLayers.Layer.WMS(nom_giro, url_map_giro, {
        layers: nom_giro,
        format: 'image/png',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true,
        visibility: true
    });
    mainMap.addLayers([layer_giros])
}

function crear_mapa_js_pob(nombre_archivo) {
    eliminar_capa("POBLACION");
    var url_map_giro = url_servidormap_2 + nombre_archivo;
    var layer_pob = new OpenLayers.Layer.WMS("POBLACION", url_map_giro, {
        layers: 'poblacion',
        format: 'image/png',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true,
        visibility: true
    });
    mainMap.addLayers([layer_pob]);
    mainMap.raiseLayer(layer_pob, (mainMap.getNumLayers() - 4) * (-1))
}

function activar_capas(opcioncapa) {
    var nombre = $('#txtCentroPoblado_id').val();

    var layer_dpto_2 = new OpenLayers.Layer.WMS("Departamentos2", url_servidormap, {
        layers: 'dptos-inicio',
        //layers: 'dptos,dptos-borde',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });
   
    


    var layer_dpto = new OpenLayers.Layer.WMS("Departamentos", url_servidormap, {
        //layers: 'dptos-borde,provincia-inicio',
        layers: 'dptos-borde,provincia,prov-borde-zoom',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });

    var layer_prov = new OpenLayers.Layer.WMS("Provincias", url_servidormap, {
        layers: 'oceano,prov-borde,distrito,distrito-borde-zoom',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });
    var layer_dist = new OpenLayers.Layer.WMS("Distritos", url_servidormap, {
        layers: 'oceano,distrito2,distrito-borde,red_vial,centro_poblado,rios',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });
    layer_dist.mergeNewParams({"nombre": nombre});
    layer_dist.mergeNewParams({"ubigeo": ubigeo});
//    console.log(ubigeo);
    var layer_cp = new OpenLayers.Layer.WMS("Centro Poblado", url_servidormap, {
        layers: 'oceano,centro_poblado',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });

    var layer_viv = new OpenLayers.Layer.WMS("viviendas2", url_servidormap, {
        layers: 'vivenda_establecimiento',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });

    var layer_viv_r = new OpenLayers.Layer.WMS("viviendas3", url_servidormap, {
        layers: 'vivenda_establecimiento_r',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });

    var layer_redvial = new OpenLayers.Layer.WMS("Red Vial", url_servidormap, {
        layers: 'oceano,red_vial',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });
    var layer_ciu = new OpenLayers.Layer.WMS("Ciudad", url_servidormap, {
        layers: 'ciudades,via_tramos_2,distrito',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });
    var layer_pu = new OpenLayers.Layer.WMS("Poligono Urbano", url_servidormap, {
        layers: 'poligono_urbano',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });
    var layer_via = new OpenLayers.Layer.WMS("Vias", url_servidormap, {
        layers: 'via_tramos',
        format: 'image/gif',
        transparent: true
    }, {
        isBaseLayer: false,
        singleTile: true
    });
    var layer_estrato = new OpenLayers.Layer.WMS("ESTRATO", url_servidormap, {
        layers: 'estratos_manzana',
        format: 'image/png',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true,
        visibility: $('#checkEstra').attr('checked')
    });
    var layer_manzana = new OpenLayers.Layer.WMS("Manzanas", url_servidormap, {
        layers: 'manzana,area_verde',
        format: 'image/png',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });

    var layer_manzanacod = new OpenLayers.Layer.WMS("Manzanascod", url_servidormap, {
        layers: 'manzanacod,area_verde',
        format: 'image/png',
        transparent: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });

    var layer_raster = new OpenLayers.Layer.WMS("global_raster", url_servidormap, {
        layers: 'global_raster',
        format: 'image/jpeg',
        nomagic: true
    }, {
        isBaseLayer: false,
        'buffer': 0,
        singleTile: true
    });
    var style_poligono = new OpenLayers.Style({
        fillColor: "#999999",
        fillOpacity: 0.5,
        hoverFillColor: "white",
        hoverFillOpacity: 0.8,
        strokeColor: "#00FF66",
        strokeOpacity: 1,
        strokeWidth: 3,
        strokeDashstyle: "solid"
    });


    if (temp_layer) {
        if (temp_layer.features) {
            vector_layer = temp_layer.clone()
        } else {
            vector_layer = new OpenLayers.Layer.Vector("influencia", {
                visibility: true,
                styleMap: new OpenLayers.StyleMap(style_poligono)
            })
        }
    } else {
        vector_layer = new OpenLayers.Layer.Vector("influencia", {
            visibility: true,
            styleMap: new OpenLayers.StyleMap(style_poligono)
        })
    }
    vector_punto = new OpenLayers.Layer.Vector("centro", {
        visibility: true
    });

//alert(opcioncapa);

    if(opcioncapa == 0){

        var allBaseLayers = [layer_raster, layer_dpto_2];
        mainMap.addLayers(allBaseLayers);
        vector_layer.setVisibility(false);
        temp_capa=0;
    }


 else {
        if (opcioncapa == 1) {
        var allBaseLayers = [layer_raster, layer_dpto];
        mainMap.addLayers(allBaseLayers);
        vector_layer.setVisibility(false);
        temp_capa=1;

                             } 


    else {
        if (opcioncapa == 2) {
            var allBaseLayers = [layer_raster, layer_prov];
            mainMap.addLayers(allBaseLayers);
            vector_layer.setVisibility(false);
            temp_capa=2;
        } else if (opcioncapa == 3) {
            var allBaseLayers = [layer_dist, vector_punto];
            mainMap.addLayers(allBaseLayers);
            vector_layer.setVisibility(false);
            temp_capa=3;

    } else if (opcioncapa == 4) {
            //var allBaseLayers = [layer_manzana, layer_estrato, vector_layer, layer_via, vector_punto,layer_redvial];
            var allBaseLayers = [layer_manzana, layer_dist, layer_via, vector_layer, vector_punto ];
            mainMap.addLayers(allBaseLayers);
            vector_layer.setVisibility(true);
            temp_capa=4;
        } else {
            var allBaseLayers = [layer_manzanacod, layer_dist, layer_via, vector_layer, vector_punto, layer_viv, layer_viv_r ];
        mainMap.addLayers(allBaseLayers);
            vector_layer.setVisibility(true)
        }
        var ncapas = mainMap.getNumLayers();
        var i, ind_pob = 0,
                contc = 0;
        for (i = 0; i < ncapas; i++) {
            nombrecapa2 = mainMap.layers[i].name.substr(0, 3);
            if (nombrecapa2 == "POB") {
                ind_pob = i
            }
        }
        i = 1;
        while (i < ncapas) {
            nombrecapa = mainMap.layers[i].name.substr(0, 2);
            if ((nombrecapa == "si") || (nombrecapa == "gi")) {
                mainMap.raiseLayer(mainMap.layers[i], (mainMap.getNumLayers() - 1));
                ncapas--;
                contc++
            } else {
                i++
            }
        }
        if (ind_pob != 0) {
            mainMap.raiseLayer(mainMap.layers[ind_pob], 2)
        }
    }
  }
}

function getEscala() {
    return mainMap.getScale()
}

function getminXExtend() {
    return mainMap.getExtent().left
}

function getmaxXExtend() {
    return mainMap.getExtent().right
}

function getminYExtend() {
    return mainMap.getExtent().bottom
}

function getmaxYExtend() {
    return mainMap.getExtent().top
}

function zoomInicial() {
    actzoom = 0;
    eliminar_map(0);
    mainMap.zoomToMaxExtent();
    limpiar_area_influencia();
    activar_capas(0);
    document.getElementById("cboDepartamento").value = "00"
}

function eliminar_map(opcioncapa) {
    var nombrecapa = "";
    var nombrecapa2 = "";
    var i = 1;
    while (i < mainMap.getNumLayers()) {
        nombrecapa = mainMap.layers[i].name.substr(0, 2);
        nombrecapa2 = mainMap.layers[i].name.substr(0, 3);
        if (opcioncapa == "1") {
            if ((nombrecapa != "si") && (nombrecapa != "gi") && (nombrecapa2 != "POB")) {
                mainMap.layers[i].destroy()
            } else {
                i++
            }
        } else {
            mainMap.layers[i].destroy()
        }
    }
}

function nombremap_giro(idcapa) {
    var capa = "giro" + idcapa;
    var layer1 = mainMap.getLayersByName(capa);
    var nombreg = "";
    if (layer1[0]) {
        nombreg = layer1[0].getURL(new OpenLayers.Bounds(getminXExtend(), getminYExtend(), getmaxXExtend(), getmaxYExtend())).substr(48, 24)
    }
    return nombreg
}
         
function nombremap_pobla() {
    var layer1 = mainMap.getLayersByName("poblacion");
    //var nombreg = "map/mapa_negocios.map";
    console.log(layer1);
    var nombreg = "map/mapa_negocios_cp.map";
    if (layer1[0]) {
        nombreg = layer1[0].getURL(new OpenLayers.Bounds(getminXExtend(), getminYExtend(), getmaxXExtend(), getmaxYExtend())).substr(48, 24)
    }
    return nombreg
}

function activarpanelzoom(sw) {
    var mcontrol = mainMap.getControlsBy("name", "controlpz");
    if (sw == '0') {
        mcontrol[0].div.style.display = 'none'
    } else
        mcontrol[0].div.style.display = ''
}

function limpiar_area_influencia() {
    var vector_layer2 = mainMap.getLayersByName("influencia");
    if (vector_layer2[0]) {
        vector_layer2[0].removeAllFeatures();
        temp_layer = vector_layer2[0].clone();
        bloque_puntos_influencia = ""
    }
}
;

jsbegin = "begin";
