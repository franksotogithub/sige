$(document).ready(function() {
    $("#cboDepartamento").change(function(evento) { //iniciar_variable();
        varcom = "";
        ubigeo = ""
//                $("#txtCalle").val("");
//                $("#leyMercado").removeClass();
//                $("#tblChkCompetencia tbody").empty();
//                $("body input:checkbox").attr('checked', false);
        $('#cboProvincia').children().remove();
        $('#cboDistrito').children().remove();
//                $('#txtCalle').val("");
//                $('#txtCalle_id').val("");
        var cadena = $('#cboDepartamento').attr('value').split('|'); //alert("cambiando combo");
        //alert(cadena);
        ubigeo = cadena[0];
        ccdd=cadena[0];
        ccpp='';
        if (cadena)
        
        zoom_ciudad_dist(cadena[1], cadena[2], cadena[3], cadena[4], 1);
        //zoom_ciudad_dist(cadena[1], cadena[2], cadena[3], cadena[4], 1); //(x,y) es el centroide de la ciudad {}
        //alert(cadena[1]);
        codciudad = cadena[0]; //$('#cboCiudad').attr('value');
        flag_sm = cadena[5];
        if (flag_sm != '1') {
            $('#tdcheckEstra').css("display", "none")
        } else {
            $('#tdcheckEstra').css("display", "")
        }
        if (codciudad == "" || codciudad == "00") {
            activarpanelzoom('0'); //desactivar
            //zoomInicial();
        } else {
            activarpanelzoom('1'); //activar
        }
        $('#tblResultados tbody').children('tr').remove();
        $('#leyenda').html('');
        $(function() {
            $.ajax({
                type: 'post',
                dataType: 'html',
                url: 'index.php/ubicacion/consultar_provincia',
                data: 'accdd=' + codciudad,
                success: function(result) { //if(cbo!=''){
                    eval("$('#cboProvincia').addOption(" + result + ",false)"); //}
                    //alert(result)
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
//                log_visita_insertar('2', codciudad);
    });

    $("#cboProvincia").change(function(evento) { //iniciar_variable();
        varcom = "";
        ubigeo = ""
        $('#cboDistrito').children().remove();
        var cadena = $('#cboProvincia').attr('value').split('|'); //alert("cambiando combo");
        //alert(cadena);
        ubigeo = cadena[0] + cadena[1];
        ccpp=cadena[1];
        if (cadena)
            zoom_ciudad_dist(cadena[2], cadena[3], cadena[4], cadena[5], 2);

        var accdd = cadena[0]; //$('#cboCiudad').attr('value');
        codciudad = cadena[1];
        flag_sm = cadena[6];
        if (flag_sm != '1') {
            $('#tdcheckEstra').css("display", "none")
        } else {
            $('#tdcheckEstra').css("display", "")
        }
        if (codciudad == "" || codciudad == "00") {
            activarpanelzoom('0'); //desactivar
            //zoomInicial();
        } else {
            activarpanelzoom('1'); //activar
        }
        $('#tblResultados tbody').children('tr').remove();
        $('#leyenda').html('');
        $(function() {
            $.ajax({
                type: 'post',
                dataType: 'html',
                url: 'index.php/ubicacion/consultar_distrito',
                data: {'accdd': accdd, 'accpp': codciudad},
                success: function(result) { //if(cbo!=''){
                    eval("$('#cboDistrito').addOption(" + result + ",false)"); //}
					
					//$('#cboDistrito').addOption(JSON.parse(result),false); 

                    //alert(result)
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        });
    });

    $("#cboDistrito").change(function(evento) {
        varcom = "";
        $('#txtCalle').val("");
        var cadena = $('#cboDistrito').attr('value').split('|');
        //alert(cadena);
        ubigeo = cadena[0];
        
        zoom_ciudad_dist(cadena[1], cadena[2], cadena[3], cadena[4], 3);
         //$('#cboDistrito').attr('value');
//        buscar_centros_poblados();
//        log_visita_insertar('3', ubigeo);
//        $('#tblResultados tbody').children('tr').remove();
//        $('#leyenda').html('');
        buscar_centros_poblados();
        crear_leyenda_mapa();
    });


$("#txtCentroPoblado_id").keyup(function(event){
    if(event.keyCode == 13){
        $("#btnBuscarCentroPoblado").click();
    }
});



    $('#btnBuscarCentroPoblado').click(function() {
        buscar_centro_poblado();
        crear_leyenda_mapa();
        var cadena = $('#cboDistrito').attr('value').split('|');
       
        //mapa_centropoblado(cadena[1], cadena[2], cadena[3], cadena[4]);
       zoom_ciudad_dist(cadena[1], cadena[2], cadena[3], cadena[4], 3);
    });
});





function buscar_centro_poblado() {
    var term = $('#txtCentroPoblado_id').val();
    var tabla = $('#tblResultados tbody');
    var provincia = $('#cboProvincia option:selected').text();
    var distrito = $('#cboDistrito option:selected').text();
    tabla.remove('tr');
    

    $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'index.php/ubicacion/consultar_centropoblado',
        data: {'aubigeo': ubigeo, 'aterm': term},
        success: function(result) { //if(cbo!=''){
            //eval("$('#cboDistrito').addOption(" + result + ",false)"); //}
            //alert(result)
            tabla.children('tr').remove();
            $.each(result, function(i, cp) {
                

                var cadena2 = cp.id.split('|'); 
                var fila = '<tr><td><a href="javascript:mapa_centropoblado(' + cadena2[1]+','+cadena2[2]+','+cadena2[3]+','+cadena2[4]+')"><li><u> '  +cp.value + '</u> </li></a> <b>(' + provincia + '/' + distrito + ')</b></td></tr>';
                mapa_centropoblado(cadena2[1], cadena2[2], cadena2[3], cadena2[4]);
                //var fila = '<tr><td><a href="javascript:mapa_centropoblado(' + cadena[1]+','+cadena[2]+','+cadena[3]+','+cadena[4]+')"><li> '  +cp.value + '</li></a> <b>(' + provincia + '/' + distrito + ')</b></td></tr>';
                //var fila = '<tr><td style="padding: 2px">' + cp.value + ' <b>(' + provincia + '/' + distrito + ')</b></td></tr>';                
                tabla.append(fila);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}


function buscar_centros_poblados() {
    var term = $('#txtCentroPoblado_id').val();
    var tabla = $('#tblResultados tbody');
    var provincia = $('#cboProvincia option:selected').text();
    var distrito = $('#cboDistrito option:selected').text();
    tabla.remove('tr');
    

    $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'index.php/ubicacion/consultar_centropoblado',
        data: {'aubigeo': ubigeo, 'aterm': term},
        success: function(result) { //if(cbo!=''){
            //eval("$('#cboDistrito').addOption(" + result + ",false)"); //}
            //alert(result)
            tabla.children('tr').remove();
            $.each(result, function(i, cp) {
                

                var cadena = cp.id.split('|'); 


                var fila = '<tr><td><a href="javascript:mapa_centropoblado(' + cadena[1]+','+cadena[2]+','+cadena[3]+','+cadena[4]+')"><li><u> '  +cp.value + '</u> </li></a> <b>(' + provincia + '/' + distrito + ')</b></td></tr>';
				//var fila = '<tr><td style="padding: 2px">' + cp.value + ' <b>(' + provincia + '/' + distrito + ')</b></td></tr>';                
				tabla.append(fila);
            });
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function crear_leyenda_mapa() {
    var term = $('#txtCentroPoblado_id').val();
//    var tabla = $('#tblResultados tbody');
//    tabla.remove('tr');
    $('#leyenda').html('');
    $.ajax({
        type: 'post',
        dataType: 'html',
        url: 'index.php/ubicacion/leyenda_centropoblado',
        data: {'aubigeo': ubigeo, 'aterm': term},
        success: function(result) { //if(cbo!=''){
            //eval("$('#cboDistrito').addOption(" + result + ",false)"); //}
            //alert(result)
            $('#leyenda').html(result);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}


function crear_leyenda_mzn_estab() {
        var ley='';
        ley = ley + '<span id="titleyMercado" style="font-family:arial; font-size:11px; font-weight:bold; text-decoration:underline;  ">Leyenda del mapa</span>';
        ley = ley + '<div id="leyMercado" style="height:200px;">';
        ley = ley + '<table >';
        ley = ley + '<tr><td ><img src="images/viv.png" /></td><td style="font-size: 10.5px" colspan=2 > &nbsp;&nbsp;&nbsp;Vivienda</td></tr>';
        ley = ley + '<tr ><td ><img src="images/estab.png"/></td><td style="font-size: 10.5px" colspan=2>&nbsp;&nbsp;&nbsp;Establecimientos:</td></tr>';
        ley = ley + '<tr><td >&nbsp;&nbsp;</td><td width=20><img src="images/municipalidad.png" style="width:15px; "/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Municipalidad</td></tr>';
        ley = ley + '<tr><td>&nbsp;&nbsp;</td><td width=20><img src="images/educacion.png"  style="width:15px;"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Institucion Educativa</td></tr>';
        ley = ley + '<tr><td>&nbsp;&nbsp;</td><td><img src="images/iglesia_catolica.png" style="width:15px;"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Iglesia</td></tr>';
        ley = ley + '<tr><td>&nbsp;&nbsp;</td><td><img src="images/salud.png"  style="width:15px;"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Salud</td></tr>';
        ley = ley + '<tr><td>&nbsp;&nbsp;</td><td><img src="images/comisaria.png" style="width:15px;"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Comisaria</td></tr>';
        ley = ley + '<tr><td>&nbsp;&nbsp;</td><td><img src="images/particular_3.png" style="width:15px;"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Instituciones Locales</td></tr>';
        ley = ley + '<tr><td>&nbsp;&nbsp;</td><td><img src="images/otro_est.png" style="width:15px;"/></td><td style="font-size: 10.5px">&nbsp;&nbsp;&nbsp;Establecimientos Comerciales</td></tr>';
        ley = ley + '<tr><td ><img src="images/v_estab.png"/></td><td style="font-size: 10.5px" colspan=2>&nbsp;&nbsp;&nbsp;Viv. Establecimiento</td></tr>';
        ley = ley + '<tr><td ><img src="images/v_colec.png"/></td><td style="font-size: 10.5px" colspan=2>&nbsp;&nbsp;&nbsp;Viv. Colectiva</td></tr>';
        ley = ley + '<tr><td ><img src="images/otro.png"/></td><td style="font-size: 10.5px" colspan=2>&nbsp;&nbsp;&nbsp;Otro tipo de registro</td></tr>';
        ley = ley + '</table>';
        ley = ley + '</div>';
        $('#leyenda').html(ley);
    }


function mapa_centropoblado(cad1,cad2,cad3,cad4) {
//alert(""+cadena);
   //alert(cad1);
    //zoom_ciudad_dist(cadena[1], cadena[2], cadena[3], cadena[4]);
    zoom_ciudad_dist(cad1,cad2,cad3,cad4,4);
}
//$(document).ready(function() {
//        $("#cboDistrito").change(function(evento) {
//                varcom="";
//                $('#txtCalle').val("");
//                $('#txtCalle_id').val("");
//                var cadena = $('#cboDistrito').attr('value').split('|');
//                zoom_ciudad_dist(cadena[1], cadena[2], cadena[3], cadena[4]);
//                ubigeo = cadena[0] //$('#cboDistrito').attr('value');
//                log_visita_insertar('3', ubigeo);
//        });
//})

$(function() {
    $('#txtCalle').val("");
    $('#txtCalle_id').val("");
    $("#txtCalle").autocomplete({
        source: function(request, response) {
            if (varcom != request.term.substr(0, 3)) {
                varcom = request.term.substr(0, 3);
                $.ajax({
                    type: "POST",
                    url: "index.php/ubicacion/buscar_via",
                    dataType: "json",
                    data: {
                        term: varcom,
                        ubigeo: ubigeo
                    },
                    success: function(data) {
                        $('#txtCalle_id').val("");
                        complete = data;
                        response(data);
                    }
                });
            } else {
                if (complete.length > 0) {
                    var records = jlinq.from(complete).starts("value", request.term).select();
                    response(records);
                }
            }
        },
        minLength: 3,
        select: function(event, ui) {
            $('#txtCalle_id').val(ui.item.id);
        }
    });
});

$(document).ready(function() {
    $("#btnActualizarVia").click(function(evento) {
        if (document.getElementById("txtCalle").value == "" || document.getElementById("txtCalle_id").value == "") {
            jAlert('warning', 'Debe elegir una calle', 'Mensaje del Sistema');
            return false;
        }
        var cadena = $('#txtCalle_id').attr('value').split('|');
        zoom_ciudad_dist(cadena[2], cadena[3], cadena[4], cadena[5]);
        log_visita_insertar('4', cadena[0]);
    });
});
