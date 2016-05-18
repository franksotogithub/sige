 $(document).ready(function() {

	iColor[0]="";
	iColor[1]="";
	iColor[2]="";
	iColor[3]="";

    $("body input:checkbox").attr('checked',false);



    /****************************
    Boton Agregar/Quitar giro de negocio
    ****************************/
    $("#create-user" )
    .button()
    .click(function() {
       if ( validar_zoom()==false){return false;}
           if ( validar_ciudad()==false){return false;}
        $( "#dialog-form").dialog( {autoOpen:true,width: 360} );


    });

    /****************************
    cargar datos de giro de negocio
    ****************************/
    $.ajax({
        url:	    "index.php/competencia/consultar_capa_negocio",
        type:      	"post",
        dataType:  	"json",
        success:	function(data){
            jQuery.each(data, function(i, val) {
                $( "#tblGirosNegocio tbody" ).append( "<tr>" +
                        "<td><input class='w_opet' type='checkbox' value='" + val.id_capa + "' /><span class='w_compe' value='" + val.nombre_capa + "' >"+ val.nombre_capa + "</span><input type='hidden' id='"+val.id_capa+"' value='"+val.nombre_capa+"' ></td>"+
                        "</tr>" );
            });
        }

    });


    /**********************************
    //Ventana Giros de negocio
    **********************************/
    $( "#dialog-form" ).dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: {
            "Aceptar": function() {
                var f = false;
                var cad="";
                var item=1;
                var log_giros="";
                var existe = false;
                if($("#dialog-form input:checked").length < 4){
                    $("#dialog-form .w_opet").each(function (index, domEle){
                        if($(this).is(':checked')==false ){
                            $("#divChkCompetencia .w_opet").each(function (a, b){
                                if($(this).val()== $(domEle).val()){
                                    iColor[$('#color'+$(this).val()).val()]="";

                                }
                            });
                        }
                    });


                    $("#dialog-form .w_opet").each(function (index, domEle){
                        if($(this).is(':checked') ){
                            $("#divChkCompetencia .w_opet").each(function (a, b){
                            //alert($(this).val() + ' --- ' + $(domEle).val());
                                if($(this).val()!= $(domEle).val()){
                                   existe = false;
                                }else{
                                   existe = true;
                                   return false;
                                }
                            });

                            if (existe==false){
                                if(iColor[1]==""){
                                    numColor=1;
                                    iColor[1]= "X";
                                    backColors = "images/rrojo.png";
                                }else if(iColor[2]==""){
                                    numColor=2
                                    iColor[2]= "X";
                                    backColors = "images/razul.png";
                                }else if(iColor[3]==""){
                                    numColor=3
                                    iColor[3]= "X";
                                    backColors = "images/rnaranja.png";
                                }
                                //agregar ventana filtro de negocio seleccionado
                                //$( "#divChkCompetencia" ).append("<div  id='dialog-competencias"+$(this).val()+"' title='Filtro de Negocio'><div id='treeMenu"+$(this).val()+"' class='demo'></div></div>");
                                if($("#dialog-competencias"+$(this).val()).length){
                                    //alert("existe");
                                    $("#treeMenu"+$(this).val()).empty();
                                }else{
                                    $( "#divChkCompetencia" ).append("<div id='dialog-competencias"+$(this).val()+"' title='Filtro de Negocio '><div id='treeMenu"+$(this).val()+"' class='demo'></div></div>");
                                }

                                //agregar negocio seleccionado al div

                                $( "#tblChkCompetencia tbody").append( "<tr id='tr"+$(this).val()+"'>" +
                                                        $(this).parent().parent().html() +
                                                        //"<td><span  style='background-color:"+backColors+"' id=''>&nbsp;&nbsp;&nbsp;</span></td>" +
                                                        "<td align=right><img src="+backColors+" />" +
                                                        "<input type='hidden' class='iColor' id='color"+$(this).val()+"' value='"+numColor+"' /></td>" +
                                                        "</tr>"
                                );

                                $("#divChkCompetencia input:checkbox").attr('checked',true);
                                crear_map_giro($(this).val(),numColor,'A','A');
                                visible_giro($(this).val());
                                log_giros=log_giros+","+$(this).val();
                            }
                        }else{//no checked
                            $("#tr"+$(this).val()).remove();
                            novisible_giro($(this).val());
                        }
                    });
                  if (log_giros!=""){

                 log_visita_insertar('5',log_giros.substring(1));
                  }

                }else{
                    jAlert('warning', 'Solo se permite tres condiciones de busqueda...!!!', 'Mensaje del Sistema');
                };

                $("#divChkCompetencia .w_opet").each( function (i, el) {
                    $(this).click(function(){
                        if($(this).is(':checked') ){
                           visible_giro($(el).val());
                        }else{
                           novisible_giro($(el).val())
                        }
                    });

                    $("#divChkCompetencia .w_compe").each( function (n, obj){
                        if(n==i){
                            //alert($(obj).val());
                            $(obj).click(function(){
                                $( "#dialog-competencias"+$(el).val()).show();
                                $( "#dialog-competencias"+$(el).val()).dialog({
                                    autoOpen: true,
                                    height: 300,
                                    width: 350,
                                    modal: true,
                                    buttons: {
                                        "Aceptar": function() {
                                            var pivot="";
                                            var p=0;
                                            var v=0;
                                            var pers= new Array();
                                            var vent= new Array();
                                            //alert($(el).val());
                                            $('#treeMenu'+$(el).val()).find('.jstree-checked, .jstree-undetermined').each(function () {
                                                var node = $(this);
                                                var file = node.attr('rel');

                                                if(node.attr('id')== "p"){
                                                    pivot = "p"
                                                }else if(node.attr('id')== "v"){
                                                    pivot = "v"
                                                }

                                                if(pivot== "p"){
                                                    if( file == 'hijo'){
                                                        pers[p] = node.attr('id');
                                                        p++;
                                                    }
                                                }else if(pivot== "v"){
                                                    if( file == 'hijo'){
                                                        vent[v] = node.attr('id');
                                                        v++;
                                                    }
                                                }
                                            });

                                            if(p==0 || v==0){

                                                    jAlert('warning','Debe de seleccionar por lo menos una variable de Poblaci�n y una de Ventas', 'Mensaje del Sistema');
											}else{

                                                    //creando el mapa
                                                    crear_map_giro($(el).val(),document.getElementById("color"+$(el).val()).value,pers,vent);
											}

                                        },
                                        "Salir": function() {
                                            $( this ).dialog( "close" );
                                        }
                                    },
                                    close: function() {
                                        //allFields.val( "" ).removeClass( "ui-state-error" );
                                    }
                                });
                            });

                            /****************************
                            tree Filtro de negocio
                            ****************************/
                            $( "#dialog-competencias"+$(el).val()).hide();
                            $("#treeMenu"+$(el).val()).jstree({
                                "json_data" : {
                                        "ajax" :{
                                            "url":"index.php/competencia/consultar_rango_variable_negocio"
                                        }
                                    },
                                "plugins" : [ "themes", "json_data","checkbox","types","ui","contextmenu" ],
                                "types" : {
                                    "max_depth" : -2,
                                    "max_children" : -2,
                                    "valid_children" : [ "drive" ],
                                    "types" : {
                                        "default" : {
                                            "valid_children" : "none",
                                            "icon" : {
                                               "image" : "images/blanco.gif"
                                            }
                                        },
                                        "folder" : {
                                            "valid_children" : [ "default", "folder" ],
                                            "icon" : {
                                                "image" : "<?php echo base_url()?>images/tree/folder.png"
                                            }
                                        },
                                        "drive" : {
                                            "valid_children" : [ "default", "folder" ],
                                            "icon" : {
                                                "image" : "<?php echo base_url()?>images/tree/root.png"
                                            },
                                            "start_drag" : false,
                                            "move_node" : false,
                                            "delete_node" : false,
                                            "remove" : false
                                        }
                                    }
                                },
                                "ui" : {
                                    "initially_select" : []

                                }
                            })
                            .bind("loaded.jstree", function(e,data) {
                                 /* handler  code */
                                $("#treeMenu"+$(el).val()).jstree("check_all");
                                $("#treeMenu"+$(el).val()).jstree("open_all")
                            });
                        }
                    });
                });
            },
            "Salir": function() {
                $( this ).dialog( "close" );
            }
        },
        close: function() {
            //allFields.val( "" ).removeClass( "ui-state-error" );
        }
    });

    /****************************
    cargar datos ventana Filtro Poblacion
    ****************************/

    $("#treePobacion").jstree({
        "json_data" : {
            "ajax" :{
                "url":"index.php/clientes/consultar_rango_variable_poblacion"
            }
        },
        "plugins" : [ "themes", "json_data","checkbox","types","ui","contextmenu" ],
        "types" : {
            "max_depth" : -2,
            "max_children" : -2,
            "valid_children" : [ "drive" ],

            "types" : {
                "default" : {
                    "valid_children" : "none",
                    "icon" : {
                      "image" : "images/blanco.gif"                    }
                },
                "folder" : {
                    "valid_children" : [ "default", "folder" ],
                    "icon" : {
                        "image" : "images/tree/folder.png"
                    }
                },
                "drive" : {
                    "valid_children" : [ "default", "folder" ],
                    "icon" : {
                        "image" : "images/tree/root.png"
                    },
                    "start_drag" : false,
                    "move_node" : false,
                    "delete_node" : false,
                    "remove" : false
                }
            }
        },
        "ui" : {
            "initially_select" : []
        }
    })
    .bind("loaded.jstree", function(e,data) {
        /* handler  code */

       $("#treePobacion").jstree("check_all");
       $('#treePobacion').jstree('open_all')

    });


    /**********************************
    //Ventana Filtro poblacion
    **********************************/
    $(".chkClientes").click(function(){


        if ( validar_zoom()==false){
            //document.getElementById(id).checked=false;
            return false;
        }
        if ( validar_ciudad()==false){

            return false;
        }
        $( "#dialog-clientes" ).dialog( {autoOpen: true});
    })

    $( "#dialog-clientes" ).dialog({
        autoOpen: false,
        height: 300,
        width: 350,
        modal: true,
        buttons: {
            "Aceptar": function() {

       crear_capa_poblacion()
            },
            Salir: function() {
                $( this ).dialog( "close" );
            }
        },
        close: function() {
            //allFields.val( "" ).removeClass( "ui-state-error" );
        }
    });




    /**************************
    Configuracion acordion
    *****************************/

    $("#accordion").accordion({
        collapsible: true
    });

    $( "#tabs" ).tabs({
        collapsible: true
    });


    /****************************************
    Cargar Ciudad
    **************************************/

    $.ajax({
        type:'post',
        dataType: 'html',
        url:'index.php/ubicacion/consultar_departamento',
        success: function(result){


            eval("$('#cboDepartamento').addOption("+ result +",false)");
        },
        error:function (xhr, ajaxOptions, thrownError){
            alert(xhr.status + ' ' + thrownError);
            //alert(thrownError);
        }
    });


    /****************************
    Datos de Sitio de interes
    ****************************/
    $.ajax({
    type:'post',
    dataType: 'json',
    url:'index.php/sitio_interes/consultar_tipo_lugar_interes',
    success: function(data){
        jQuery.each(data, function(i, val) {
            $( "#tblLugar_Interes tbody" ).append( "<tr>" +
            "<td><input type='checkbox' onclick=enviar_lugar_interes('checkli"+i+"','"+val.cadena+"') id='checkli"+i+"'   />" + val.nombre_tipo_lugar + "</td>" +
            "<td><img border='' src='images/"+i+".PNG' /></td>" +
            "</tr>" );
        });
    },
    error:function (xhr, ajaxOptions, thrownError){
        alert(xhr.status + ' ' + thrownError);
        //alert(thrownError);
    }
    });


//comienza mapa

myLayout = $('body').layout({defaults: {
    size:"auto",
    contentIgnoreSelector:"span",
    togglerLength_open:35,	
    togglerLength_closed:35,
    hideTogglerOnSlide:		true,
    togglerTip_open:"Close This Pane",
    togglerTip_closed:	"Open This Pane",
    resizerTip:	"Resize This Pane"},
    north: {spacing_open:	1,
    togglerLength_open:	0,
    togglerLength_closed:-1,
    resizable: false,
    slidable:	false,	
    fxName:	"none"}, 	
    west: {size:300	,
    spacing_closed:	21,	
    togglerLength_closed:	21,	
    togglerAlign_closed:"top",
    togglerLength_open:0,	
    togglerTip_open:"Close West Pane",	
    togglerTip_closed:	"Open West Pane",
    resizerTip_open:"Resize West Pane",	
    slideTrigger_open:"click" ,	
    initClosed:	false,	
    fxName:	"drop",	
    fxSpeed:"normal",
    fxSettings:	{easing: ""}}
,	east: {size:250	,
spacing_closed:21,	togglerLength_closed:21,togglerAlign_closed:"top",
togglerLength_open:	0,	togglerTip_open:		"Close East Pane",
togglerTip_closed:	"Open East Pane",	resizerTip_open:		"Resize East Pane",	slideTrigger_open:		"click",
initClosed:			true,	fxName:"drop",	fxSpeed:"normal",fxSettings:{easing: ""}}	,
south: {maxSize:100,	minSize:0,spacing_closed:0,	slidable:false	,	initClosed:			false,
togglerLength_open:	0},	center: {minWidth:200,	minHeight:200}});

myLayout.addCloseBtn("#west-closer", "west");



pic1= new Image();pic1.src="images/go-lt-on.gif";pic2= new Image();pic2.src="images/go-rt-on.gif";pic3 = new Image();pic3.src="images/spinner.gif";
$('#buttonmeasure').button({text: false,icons: {primary: 'measure-icon'}});$("#buttonpanzoom").button({text: false,icons: {primary: 'zoompaninfo-icon'}});mainMap = LoadMap('mainmap'); //retardo();
$(".mapfooter").mapwidget(mainMap, 'mouseposition', {labelLatitude: " breedte:", labelLongitude: " lengte: ", latLonSeparator: "", decimalPlaces: 4});$("#scale-info").mapwidget(mainMap, 'scalebar', {labelScale: ""} );mapPos = $(mainMap.div).offset();$featureDialog = $('<div></div').dialog ({autoOpen: false, title: 'Informatie', position: [mapPos.left + 5, mapPos.top + 5]});mainMap.viewPortDiv.oncontextmenu = OpenLayers.Function.False;var history_counter = 0;

var going_back = false;

$.history.init(function(hash) 
{if (hash == "") {going_back = true;going_back = false;} 
else {hashcounter = hash.substring(0, hash.indexOf(":"));
if (hashcounter != history_counter) 
    {
        history_counter = hashcounter;hash = hash.substring(hash.indexOf(":") + 1);
bounds = new OpenLayers.Bounds();
bounds.left = parseFloat(hash.substring(0, hash.indexOf(',')));
hash = hash.substring(hash.indexOf(',') + 1);
bounds.bottom = parseFloat(hash.substring(0, hash.indexOf(',')));
hash = hash.substring(hash.indexOf(',') + 1);
bounds.right = parseFloat(hash.substring(0, hash.indexOf(',')));
hash = hash.substring(hash.indexOf(',') + 1);
bounds.top = parseFloat(hash);
going_back = true;
mainMap.zoomToExtent (bounds);
going_back = false;

}}});


mainMap.events.register("dblclick", mainMap, function(e) {

var lonlat = mainMap.getLonLatFromViewPortPx(e.xy);
lon=lonlat.lon;
lat=lonlat.lat;
alert('longitud:'+lon + ' latitud:'+lat);
document.getElementById("txtPuntox").value=lon;
document.getElementById("txtPuntoy").value=lat;



//poner_punto(lon,lat);

//------------------------------------------------
        //ir directo a tabla informativa
        //------------------------------------------------
        
//alert(mainMap.getZoom());


var valor
var zoom_valor= mainMap.getZoom();

//var dptoval=$('#cboDepartamento').val();
//var provval=$('#cboProvincia').val();
//var distval=$('#cboDistrito').val();


//alert(temp_capa);

//var temp_capa=getcapaBase();
//alert(temp_capa);



if(temp_capa==0){

            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: 'index.php/area_influencia/buscar_area_influencia_dpto',
                data: 'txtPuntox=' + lon + "&txtPuntoy=" + lat ,
                success: function (result) {
                    //console.log(result);

                    if (result == "") {
                        jAlert('warning', 'Disculpe por el momento no existe informacion en el area seleccionada', 'Mensaje del Sistema');
                        $(this).dialog("close");
                        return false
                    }

                    bloque = result.split("|");
                    var ubigeo= bloque[0];
                    var nombubigeo=bloque[1];
                        
                    tabla_info(ubigeo,nombubigeo);
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
}

else if (temp_capa==1 )

{
 $.ajax({
                type: 'GET',
                dataType: 'html',
                url: 'index.php/area_influencia/buscar_area_influencia_prov',
                data: 'txtPuntox=' + lon + "&txtPuntoy=" + lat ,
                success: function (result) {
                    //console.log(result);

                    if (result == "") {
                        jAlert('warning', 'Disculpe por el momento no existe informacion en el area seleccionada', 'Mensaje del Sistema');
                        $(this).dialog("close");
                        return false
                    }


                    bloque = result.split("|");
                    var ubigeo= bloque[0];
                    var nombubigeo=bloque[1];
                      
                    tabla_info(ubigeo,nombubigeo);
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });


}

else if (temp_capa==2)
{



 $.ajax({
                type: 'GET',
                dataType: 'html',
                url: 'index.php/area_influencia/buscar_area_influencia_dist',
                data: 'txtPuntox=' + lon + "&txtPuntoy=" + lat ,
                success: function (result) {
                    //console.log(result);

                    if (result == "") {
                        jAlert('warning', 'Disculpe por el momento no existe informacion en el area seleccionada', 'Mensaje del Sistema');
                        $(this).dialog("close");
                        return false
                    }

                    bloque = result.split("|");
                    var ubigeo= bloque[0];
                    var nombubigeo=bloque[1];
                  
                    tabla_info(ubigeo,nombubigeo);
                    
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

}




/*
        if (zoom_valor<4 ){
          
     



            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: 'index.php/area_influencia/buscar_area_influencia_dpto',
                data: 'txtPuntox=' + lon + "&txtPuntoy=" + lat ,
                success: function (result) {
                    //console.log(result);

                    if (result == "") {
                        jAlert('warning', 'Disculpe por el momento no existe informacion en el area seleccionada', 'Mensaje del Sistema');
                        $(this).dialog("close");
                        return false
                    }

                    bloque = result.split("|");
                    var ubigeo= bloque[0];
                    var nombubigeo=bloque[1];
                
                    tabla_info(ubigeo,nombubigeo);
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        }*/
        
/*       


        else if (  (zoom_valor>=4 && zoom_valor<6)  ||  dptoval!==null ){
            
        //alert(lon);
        //alert(lat);
            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: 'index.php/area_influencia/buscar_area_influencia_prov',
                data: 'txtPuntox=' + lon + "&txtPuntoy=" + lat ,
                success: function (result) {
                    

                    if (result == "") {
                        jAlert('warning', 'Disculpe por el momento no existe informacion en el area seleccionada', 'Mensaje del Sistema');
                        $(this).dialog("close");
                        return false
                    }


                    bloque = result.split("|");
                    var ubigeo= bloque[0];
                    var nombubigeo=bloque[1];
                     
                    tabla_info(ubigeo,nombubigeo);
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        }


        else if (   (zoom_valor>=6 && zoom_valor<11 )  ||  provval!==null  ){
            
      
            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: 'index.php/area_influencia/buscar_area_influencia_dist',
                data: 'txtPuntox=' + lon + "&txtPuntoy=" + lat ,
                success: function (result) {
                    //console.log(result);

                    if (result == "") {
                        jAlert('warning', 'Disculpe por el momento no existe informacion en el area seleccionada', 'Mensaje del Sistema');
                        $(this).dialog("close");
                        return false
                    }

                    bloque = result.split("|");
                    var ubigeo= bloque[0];
                    var nombubigeo=bloque[1];
                  
                    tabla_info(ubigeo,nombubigeo);
                    
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        }

*/




//        if((zoom_valor>=8 && zoom_valor<17 ) ){
    else  if(temp_capa==3  ){

        var radio=0;
        
        if(zoom_valor==5) radio=1000;
        else if(zoom_valor==6) radio=750;
        else if(zoom_valor==7) radio=500;
        else if(zoom_valor==8) radio=250;
        else if(zoom_valor==9) radio=100;
        else  radio=75;
  

            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: 'index.php/area_influencia/buscar_area_influencia_map',
                data: 'txtPuntox=' + lon + "&txtPuntoy=" + lat + "&txtRadio="+radio,
                success: function (result) {
                    //console.log(result);

                    if (result == "[]&&") {
                        jAlert('warning', 'Disculpe por el momento no existe informacion en el area seleccionada', 'Mensaje del Sistema');
                        $(this).dialog("close");
                        return false
                    }
                    bloque_id_manzana = result.split("&&");
                    bloque_puntos_influencia = bloque_id_manzana[0];
                    //are_influencia(bloque_puntos_influencia)
                    //console.log(bloque_id_manzana);
                    if (bloque_id_manzana[5] !== "1" && bloque_id_manzana[5] !== "") {
                        ir_directo_tablainfo2();
                    } else if (bloque_id_manzana[5] === "1" && bloque_id_manzana[5] !== "") {
                       
                        ir_directo_tablainfo2();
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }



        else{
            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: 'index.php/area_influencia/buscar_area_influencia_viv',
                data: 'txtPuntox=' + lon + "&txtPuntoy=" + lat + "&txtRadio=1",
                success: function (result) {
                   

                    if (result == "[]&&") {
                        jAlert('warning', 'Disculpe por el momento no existe informacion en el area seleccionada', 'Mensaje del Sistema');
                        $(this).dialog("close");
                        return false
                    }
                    bloque_id_manzana = result.split("&&");
                    bloque_puntos_influencia = bloque_id_manzana[0];
                    //are_influencia(bloque_puntos_influencia)
                    //console.log(bloque_id_manzana);
                    


                    if (bloque_id_manzana[7] !== "") {
                        ir_directo_tablainfo3();
                    }


                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
});







var startX = 0, startY = 0;mainMap.viewPortDiv.ontouchstart = function (event) {startX = event.touches[0].pageX;startY = event.touches[0].pageY;};
mainMap.viewPortDiv.ontouchmove = function (event) {var targetEvent =  event.touches.item(0);mainMap.pan (startX - targetEvent.clientX, startY - targetEvent.clientY, {animate: false, dragging: false});event.preventDefault();return false;};
var dx = 0, dy = 0;
$(".mapdialog")[0].ontouchstart = function (event){pos = $(this).dialog("option", "position");
var targetEvent =  event.touches[0];dx = targetEvent.clientX - pos[0];dy = targetEvent.clientY - pos[1];}
$(".mapdialog")[0].ontouchmove = function (event) {var targetEvent =  event.touches[0];
$(this).dialog( "option", "position", [targetEvent.clientX - dx, targetEvent.clientY - dy]);}
mainMap.viewPortDiv.ontouchend = function (event) { };$("body")[0].ontouchmove = function (event){event.preventDefault();};$("body")[0].ontouchend = function (event) { };$(".ui-dialog").bind("contextmenu", function(e) {return false;});//activar_capas(1);
escala=getEscala();actzoom=mainMap.getZoom();activarpanelzoom('0');

});






function  tabla_info(ubigeo,nombubigeo){

    $("#tblArea_informacion").jqGrid('GridUnload');
    $('#imgviv').html('');


    $("#dialog-form_area_informacion").dialog({
        autoOpen: true,
        width: 680,
        height: 500,
        modal: true,
        buttons: {
            "Exportar": function () {
        $("#excelubigeo").val(ubigeo);
        $("#excelccpp").val('');
                
        $("#FormularioExportacion").submit()
            },
            "Salir": function () {
                $(this).dialog("close");
                $("#tblArea_informacion tr").remove()
            }
        },
        close: function () {
            $("#tblArea_informacion tr").remove()
        }
    });

    if(ubigeo=='00')
        cargar_grilla_nacional();   
    else 
        cargar_grilla1(ubigeo);   
    

    if(ubigeo=='00')
    {vTema = " .:: Resumen " + nombubigeo + " ::. ";}    

    else if(ubigeo.length==2)
    {vTema = " .:: Departamento " + nombubigeo + " ::. ";}

    else if(ubigeo.length==4)
    {vTema = " .:: Provincia " + nombubigeo + " ::. ";}
    
    else if(ubigeo.length==6)
    {vTema = " .:: Distrito " + nombubigeo + " ::. ";}



    
    $('#dialog-form_area_informacion').dialog("option", "title", vTema);

    // $('#tblArea_reporte').trigger( 'reloadGrid' );
    $("#divfoto").css("display", "none");

}


function ir_directo_tablainfo2() {

    $("#tblArea_informacion").jqGrid('GridUnload');
    $('#imgviv').html('');


    $("#dialog-form_area_informacion").dialog({
        autoOpen: true,
        width: 680,
        height: 500,
        modal: true,
        buttons: {
            "Exportar": function () {
		      $("#excelubigeo").val(bloque_id_manzana[2]);
                $("#excelccpp").val(bloque_id_manzana[3]);
                
		$("#FormularioExportacion").submit()
            },
            "Salir": function () {
                $(this).dialog("close");
                $("#tblArea_informacion tr").remove()
            }
        },
        close: function () {
            $("#tblArea_informacion tr").remove()
        }
    });

	cargar_grilla2();	

    
    var vTema = '';
    if ($("#nodetitle").val() !== "") {
        vTema = " .:: " + bloque_id_manzana[4] + " ::. ";
    }
	console.log(bloque_id_manzana);
    
    $('#dialog-form_area_informacion').dialog("option", "title", vTema);

    // $('#tblArea_reporte').trigger( 'reloadGrid' );
    $("#divfoto").css("display", "none");
}

var nullFormatter = function(cellvalue, options, rowObject) {
    
    if(cellvalue === undefined || cellvalue === "" || cellvalue === null) {
        cellvalue = '-';
    }
    return cellvalue;
}


function ir_directo_tablainfo3() {

    $("#tblArea_informacion").jqGrid('GridUnload');
    $('#imgviv').html('');

    $("#dialog-form_area_informacion").dialog({
        autoOpen: true,
        width: 680,
        height: 500,
        modal: true,
        buttons: {
//            "Exportar": function () {
//                $("#excelubigeo").val(bloque_id_manzana[2]);
//                $("#excelccpp").val(bloque_id_manzana[3]);
//
//                $("#FormularioExportacion").submit()
//            },
            "Salir": function () {
                $(this).dialog("close");
                $("#tblArea_informacion tr").remove()
            }
        },
        close: function () {
            $("#tblArea_informacion tr").remove()
        }
    });

	cargar_grilla3();


//    var vTema = '';
//    if ($("#nodetitle").val() !== "") {
//        vTema = " .:: " + bloque_id_manzana[4] + " ::. ";
//    }
//
    $('#dialog-form_area_informacion').dialog("option", "title", "");

    cargar_enlace_foto();

    //if(bloque_id_manzana[8]=='2' || bloque_id_manzana[8]=='3'){
    //    $("#divfoto").css("display", "");
    //}else{
    //    $("#divfoto").css("display", "none");
    //}

}






function abrirfoto(){
    if(bloque_id_manzana[8]=='2' || bloque_id_manzana[8]=='3'){
        carga_imagen();
    }
}




function cargar_grilla1(ubi){
   //alert(temp_capa);

    //alert("temp_capa");
    $("#tblArea_informacion").jqGrid('GridUnload');
    data = {"names": ["Descripci&oacute;n", "Total"] };

    
    var url_ubi='';

    if(ubi=='00')
    url_ubi='index.php/area_influencia/consultar_reporte_nacional';    
    else if(ubi.length==2)
    url_ubi='index.php/area_influencia/consultar_reporte_dpto';
    else if (ubi.length==4)    
        url_ubi='index.php/area_influencia/consultar_reporte_prov';
        else if (ubi.length==6)
            url_ubi='index.php/area_influencia/consultar_reporte_dist';

    jQuery("#tblArea_informacion").jqGrid({
        url: url_ubi,
        datatype: "json",
        mtype: "GET",
        postData: {
            "ubigeo": ubi
        },

        colNames: data.names,
        colModel: [
            {name: 'descripcion', index: 'descripcion', width: 450, sortable: false},
            {name: 'vnac', index: 'vnac', width: 180, sortable: false, formatter: nullFormatter}
        ],
        rowNum: 300,
        rowList: [10, 20, 30],
        //height: $("#dialog-form_area_informacion").height() - 30,
    height: 350,
        viewrecords: true,
        caption: ""
    });
}


function cargar_grilla_nacional(){
   //alert(temp_capa);

    //alert("temp_capa");
    $("#tblArea_informacion").jqGrid('GridUnload');
    data = {"names": ["Descripci&oacute;n", "Numero","Actualizados","%"] };

    
    var url_ubi='';

  
    url_ubi='index.php/area_influencia/consultar_reporte_nacional';    
 

    jQuery("#tblArea_informacion").jqGrid({
        url: url_ubi,
        datatype: "json",
        mtype: "GET",
     
        colNames: data.names,
        colModel: [
            {name: 'descripcion', index: 'descripcion', width: 300, sortable: false,},
            {name: 'numero', index: 'vnac', width: 90, sortable: false, formatter: nullFormatter,align:'right'},
             {name: 'actualizado', index: 'vnac', width: 120, sortable: false, formatter: nullFormatter,align:'right'},
             {name: '%', index: 'vnac', width: 100, sortable: false, formatter: nullFormatter,align:'right'}
        ],
        rowNum: 300,
        rowList: [10, 20, 30],
        //height: $("#dialog-form_area_informacion").height() - 30,
    height: 350,
   
        viewrecords: true,
        caption: ""
    });
}











function cargar_grilla2(dat){
    $("#tblArea_informacion").jqGrid('GridUnload');
    data = {"names": ["Descripci&oacute;n", "Total"] };
    
    jQuery("#tblArea_informacion").jqGrid({
        url: 'index.php/area_influencia/consultar_reporte_zsc',
        datatype: "json",
        mtype: "GET",
        postData: {
            "ubigeo": bloque_id_manzana[2],
            "ccpp": bloque_id_manzana[3]
        },
        
        colNames: data.names,
        colModel: [
            {name: 'descripcion', index: 'descripcion', width: 450, sortable:false},
            {name: 'vnac', index: 'vnac', width: 180, sortable:false, formatter: nullFormatter}
        ],
        rowNum: 300,
        rowList: [10, 20, 30],
        height: $("#dialog-form_area_informacion").height()-30,
        viewrecords: true,
        caption: "",
        gridComplete: function(){
            
            var rows = $("#tblArea_informacion").jqGrid('getDataIDs');

                for (var i = 0; i < rows.length; i++){ 

                    var flag1 = $("#tblArea_informacion").jqGrid('getCell', rows[i], 'descripcion');
                        if(flag1 === 'CABINA DE INTERNET' || flag1 === 'OTROS FENOMENOS NAT.' || flag1 ==='OTROS PELIGROS'){
                            $("#tblArea_informacion").setCell(rows[i],'descripcion','',{'border-bottom-width': '5px'});
                             $("#tblArea_informacion").setCell(rows[i],'vnac','',{'border-bottom-width': '5px'});
                        }
                }
            
        }
    });
    

    
}







function cargar_grilla3(dat) {
    $("#tblArea_informacion").jqGrid('GridUnload');
    data = {"names": ["Descripci&oacute;n", "Total"]};

    jQuery("#tblArea_informacion").jqGrid({
        url: 'index.php/area_influencia/consultar_reporte_viv',
        datatype: "json",
        mtype: "GET",
        postData: {
            "ubigeo": bloque_id_manzana[2],
            "ccpp": bloque_id_manzana[3],
            "zona": bloque_id_manzana[4],
            "manzana": bloque_id_manzana[5],
            "frente": bloque_id_manzana[6],
            "idreg": bloque_id_manzana[7]
        },
        colNames: data.names,
        colModel: [
            {name: 'descripcion', index: 'descripcion', width: 450, sortable: false},
            {name: 'vnac', index: 'vnac', width: 180, sortable: false, formatter: nullFormatter}
        ],
        rowNum: 300,
        rowList: [10, 20, 30],
        //height: $("#dialog-form_area_informacion").height() - 30,
	height: 350,
        viewrecords: true,
        caption: ""
    });


}





function cargar_enlace_foto()
{


  $.ajax({       type: 'GET',
                dataType: 'html',
                url: 'index.php/area_influencia/consultar_reporte_viv_img_flag',
                data: "ubigeo="+bloque_id_manzana[2]+"&ccpp="+bloque_id_manzana[3]+"&zona="+bloque_id_manzana[4]+"&manzana="+bloque_id_manzana[5]+"&frente="+bloque_id_manzana[6]+"&idreg="+ bloque_id_manzana[7],
                success: function (result) {
                    //console.log(result);

                    if (result == '1') {
                    $("#divfoto").css("display", "");
                    }

                    else

                    {$("#divfoto").css("display", "none");}

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

}



/*
function carga_imagen() {
    var vhtml="";
    //vhtml = '<img src="http://sige.inei.gob.pe/test/atlas/generaimg/img.php" />';
    //$("#imgviv").html(vhtml);



    $.ajax({
        type: "POST",
        //contentType: "image/png",
        url: "./generaimg/img.php",
        data: "ubigeo="+bloque_id_manzana[2]+"&ccpp="+bloque_id_manzana[3]+"&zona="+bloque_id_manzana[4]+"&manzana="+bloque_id_manzana[5]+"&frente="+bloque_id_manzana[6]+"&idreg="+ bloque_id_manzana[7],

    })
    .done(function( msg ) {
        
        $('#imgviv').html('<img src="data:image/png;base64,' + msg + '" />');
    });
            
}
*/

function carga_imagen() {

    $.ajax({
        type: "POST",
        //contentType: "image/png",
        url: "./generaimg/img.php",
        
        data: "ubigeo="+bloque_id_manzana[2]+"&ccpp="+bloque_id_manzana[3]+"&zona="+bloque_id_manzana[4]+"&manzana="+bloque_id_manzana[5]+"&frente="+bloque_id_manzana[6]+"&idreg="+ bloque_id_manzana[7]

    })
    .done(function( msg ) {
        
        //$('#imgviv').html('<h1>'+msg+'</h1>');
        
        /* imagen con zoom
        //$('#imgviv').html('<img id="id_zoom" src="data:image/png;base64,' + msg + '"    width="670" height="480"   data-zoom-image="data:image/png;base64,' + msg + '" /> ');

        //$("#id_zoom").elevateZoom();
        
*/
        $('#imgviv').html('<img id="id_zoom" src="data:image/png;base64,' + msg + '"    width="670" height="480"   /> ');
            //$("#id_zoom").attr("src","data:image/png;base64," + msg );

        //$("#imgviv").find("#zoom_01").elevateZoom();

    });
    
    
    $("#dialog-foto").dialog({
        autoOpen: true,
        width: 700,
        height: 550,
        modal: true,
        buttons: {
            "Salir": function () {
                $(this).dialog("close");
                //$("#tblArea_informacion tr").remove()
            }
        },
        close: function () {
            //$("#tblArea_informacion tr").remove()
        }
    });
    
    
    
            
}
