$(document).ready(function() {

     /*   $("#filaDepartamento").hide();
        $("#filaProvincia").hide();
        $("#filaDistrito").hide();
        $("#filaDistrito").hide();
        $("#filaCentroPoblado").hide();
        $("#filaBuscarCentroPoblado").hide();
        $("#filaTipoDistritos").show();
        
       
        crear_leyenda_resumen('1');
*/

        
        $("#filaDepartamento").show();
        $("#filaProvincia").show();
        $("#filaDistrito").show();
        $("#filaCentroPoblado").show();
        $("#filaBuscarCentroPoblado").show();

//        $("#filaTipoDistritos").hide();
        $("#leyenda_resumen").show();

        $("#etiqueta1").show();
        $("#etiqueta2").hide();
        $("#etiqueta3").hide();

        //$("#informacion-mapa-resumen").hide();
        
        $("#select-resumen").hide();

        $("#mapa-resumen").val('1');


 $("#create-mapa_inicio" ).click(function() {
      iniciar_variable();   
      zoomInicial();
  });



$("#informacion-mapa-resumen").click(function(){

//alert('Hola');
tabla_info('00','Nacional');
});


$("#mapa-resumen").click(function(e){

  /*     
        
if($("#mapa-resumen").val()=='1')

{   
    $("#select-resumen").show();
    $("#mapa-resumen").val('2');
}

else
{   
    $("#select-resumen").hide();
    $("#mapa-resumen").val('1');

}

 */


 $("#leyenda_resumen").show();

$("#etiqueta1").css({"bottom": "140px"});
$("#etiqueta1").show();

$("#etiqueta2").show();
$("#etiqueta3").show(); 
$("#informacion-mapa-resumen").show();
$("#cboDepartamento").val("00");
$('#cboProvincia').children().remove();
$('#cboDistrito').children().remove();

 crear_leyenda_resumen('1');
activar_capas_resumen('1');
activarpanelzoom('0');


}) ;




$('#myForm input').change(function(e) {
var valor_leyenda=$('input[name="myRadio"]:checked', '#myForm').val();

$("#leyenda_resumen").show();

$("#etiqueta1").css({"bottom": "140px"});
$("#etiqueta1").show();

$("#etiqueta2").show();
$("#etiqueta3").show(); 
$("#informacion-mapa-resumen").show();
$("#cboDepartamento").val("00");
$('#cboProvincia').children().remove();
$('#cboDistrito').children().remove();



if(valor_leyenda=='1')
{       
               
         crear_leyenda_resumen('1');
         activar_capas_resumen('1');
}

else {
         crear_leyenda_resumen('2');
         activar_capas_resumen('2');
}

   //alert($('input[name="myRadio"]:checked', '#myForm').val()); 
});

/*

$("#cboPresentacion").change(function(evento) {
//alert($("#cboPresentacion").val());

if($("#cboPresentacion").val()=='1')
        {
        $("#filaDepartamento").hide();
        $("#filaProvincia").hide();
        $("#filaDistrito").hide();
        $("#filaCentroPoblado").hide();
        $("#filaBuscarCentroPoblado").hide();

        
        $("#filaTipoDistritos").show();
        $("#leyenda_resumen").show();
        $("#etiqueta1").show();
        $("#etiqueta2").show();
        $("#etiqueta3").show();
        

        crear_leyenda_resumen('1');
        activar_capas_resumen('1');

        }
else

        {
        $("#filaDepartamento").show();
        $("#filaProvincia").show();
        $("#filaDistrito").show();
        $("#filaCentroPoblado").show();
        $("#filaBuscarCentroPoblado").show();

        $("#filaTipoDistritos").hide();
        $("#leyenda_resumen").hide();
        $("#etiqueta1").hide();
        $("#etiqueta2").hide();
        $("#etiqueta3").hide();
        activar_capas(0);
        

        }

});

*/

/*

$("#cboTipoDistritos").change(function(e){
var valor_tipo=$("#cboTipoDistritos").val();

    if(valor_tipo=='1')
        {

          crear_leyenda_resumen('1');
          activar_capas_resumen('1');
        }


    else
    {

    crear_leyenda_resumen('2');   
    activar_capas_resumen('2');
    }



});

*/



    $("#cboDepartamento").change(function(evento) { //iniciar_variable();
        
        //$('input[name="myRadio"]:checked', '#myForm').val('0');

/*Valores iniciales del formulario del resumen */
        //$("#informacion-mapa-resumen").hide();  
        $('#myForm input').removeAttr('checked');
        $("#select-resumen").hide();
        $("#mapa-resumen").val('1');
        $("#leyenda_resumen").hide();
        $("#etiqueta1").hide();
        $("#etiqueta2").hide();
        $("#etiqueta3").hide();

        $('#leyenda').children().remove();
        $('#tblResultados tbody').children('tr').remove();
        $('#leyenda').html('');
//////////////////////////////////////////////*
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

        seleccionar_departamento();

//                log_visita_insertar('2', codciudad);
    });


function seleccionar_departamento()
{

        var cadena = $('#cboDepartamento').attr('value').split('|'); //alert("cambiando combo");
        //alert(cadena);
        ubigeo = cadena[0];
        accdd=cadena[0];
        flag_sm = cadena[5];        
        
        if (cadena)
        {

        if (accdd == "" || accdd == "00") {
            activarpanelzoom('0'); //desactivar
            iniciar_variable();
            zoomInicial();
        } else {
            zoom_ciudad_dist(cadena[1], cadena[2], cadena[3], cadena[4], 1);
            activarpanelzoom('1'); //activar
        }

        
        }
        //zoom_ciudad_dist(cadena[1], cadena[2], cadena[3], cadena[4], 1); //(x,y) es el centroide de la ciudad {}
        //alert(cadena[1]);
        


        if (flag_sm != '1') {
            $('#tdcheckEstra').css("display", "none")
        } else {
            $('#tdcheckEstra').css("display", "")
        }
    
        
        $(function() {
            $.ajax({
                type: 'post',
                dataType: 'html',
                url: 'index.php/ubicacion/consultar_provincia',
                data: 'accdd=' + accdd,
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
}





    $("#cboProvincia").change(function(evento) { //iniciar_variable();
        

        varcom = "";
        ubigeo = "";
        $('#tblResultados tbody').children('tr').remove();
        $('#leyenda').children().remove();
        //$('#leyenda').children('tr').remove();
        $('#cboDistrito').children().remove();
        seleccionar_provincia();
    });


    function seleccionar_provincia()

    {   
        
        var cadena = $('#cboProvincia').attr('value').split('|'); //alert("cambiando combo");
        //alert(cadena);
        //ubigeo = cadena[0] + cadena[1];
        ubigeo = cadena[0];
        //ccpp=cadena[1];
        var accdd = ubigeo.substr(0,2); //$('#cboCiudad').attr('value');
        var accpp = ubigeo.substr(2,4);
        flag_sm = cadena[5];


        if (cadena)
        {  

        if (accpp == "" || accpp == "00") 
            //activarpanelzoom('0'); //desactivar
            //zoomInicial();
             seleccionar_departamento();

    

        //else {
         //   activarpanelzoom('1'); 
        //}  

        else     
            zoom_ciudad_dist(cadena[1], cadena[2], cadena[3], cadena[4], 2);
        
    
        

        }    
            //zoom_ciudad_dist(cadena[], cadena[3], cadena[4], cadena[5], 2);



        if (flag_sm != '1') {
            $('#tdcheckEstra').css("display", "none")
        } else {
            $('#tdcheckEstra').css("display", "")
        }

        
        $(function() {
            $.ajax({
                type: 'post',
                dataType: 'html',
                url: 'index.php/ubicacion/consultar_distrito',
                data: {'accdd': accdd, 'accpp': accpp},
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

    }




    $("#cboDistrito").change(function(evento) {
        varcom = "";
        $('#txtCalle').val("");
        seleccionar_distrito();
        
    });


    function seleccionar_distrito()
    {

        var cadena = $('#cboDistrito').attr('value').split('|');
        ubigeo = cadena[0];
        var accdd = ubigeo.substr(0,2); 
        var accpp = ubigeo.substr(2,4);   
        var accddi = ubigeo.substr(4,6); 
        if (cadena)
        {    
            
    
        if (accpp == "" || accpp == "00") 
              seleccionar_provincia();

        else
             zoom_ciudad_dist(cadena[1], cadena[2], cadena[3], cadena[4], 3);   

        }

        buscar_centros_poblados();
        crear_leyenda_mapa();
    }




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






function crear_leyenda_resumen(tipo){
        


        var cant_distritos='';
        var ley='';
var cant_distritos_no='';
/*
       $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'index.php/ubicacion/leyenda_resumen',
        data: {'tipo': tipo},
        success: function(result) { //if(cbo!=''){
            //eval("$('#cboDistrito').addOption(" + result + ",false)"); //}
            //alert(result)
            //$('#leyenda').html(result);

            //alert(result);

        cant_distritos=result;  

        ley = ley + '<span id="titleyMercado" style="font-family:arial; font-size:11px; font-weight:bold; text-decoration:underline;  ">Leyenda </span>';
        ley = ley + '<table>';
        
       // if(tipo=='1')
        ley = ley + '<tr><td ><img src="images/rectangulo_verde3.png" /></td><td style="font-size: 10.5px" colspan=2 > '+cant_distritos+' Distritos 1/ con cartografia actualizada</td></tr>';
        
       // else
        ley = ley + '<tr><td ><img src="images/rectangulo_rojo3.png" /></td><td style="font-size: 10.5px" colspan=2 > '+cant_distritos+' Distritos 1/ con cartografia no actualizada</td></tr>';    


        ley = ley + '</table>';
        
        $('#leyenda_resumen').html(ley);    

            //alert(cant_distritos);

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
        });
    

*/



       $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'index.php/ubicacion/leyenda_resumen',
        data: {'tipo': '2'},
        success: function(result) { //if(cbo!=''){
            //eval("$('#cboDistrito').addOption(" + result + ",false)"); //}
            //alert(result)
            //$('#leyenda').html(result);

            //alert(result);

        cant_distritos_no=result;  

        
        
        //$('#leyenda_resumen').html(ley);    

            //alert(cant_distritos);



        $.ajax({
        type: 'get',
        dataType: 'html',
        url: 'index.php/ubicacion/leyenda_resumen',
        data: {'tipo': tipo},
        success: function(result2) { 

        cant_distritos=result2;  

        ley = ley + '<span id="titleyMercado" style="font-family:arial; font-size:11px; font-weight:bold; text-decoration:underline;  ">Leyenda </span>';
        ley = ley + '<table>';
        
       // if(tipo=='1')
        ley = ley + '<tr><td ><img src="images/rectangulo_verde3.png" /></td><td style="font-size: 10.5px" colspan=2 > '+cant_distritos+' Distritos 1/ con cartografia actualizada</td></tr>';
        
       // else
        ley = ley + '<tr><td ><img src="images/rectangulo_rojo3.png" /></td><td style="font-size: 10.5px" colspan=2 > '+cant_distritos_no+' Distritos 1/ con cartografia no actualizada</td></tr>';    


        ley = ley + '</table>';
        
        $('#leyenda_resumen').html(ley);    

            //alert(cant_distritos);

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
        });
    






        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
        });



        


//            alert(cant_distritos);
        
/*        ley = ley + '<span id="titleyMercado" style="font-family:arial; font-size:11px; font-weight:bold; text-decoration:underline;  ">Leyenda </span>';
        ley = ley + '<table>';
        ley = ley + '<tr><td ><img src="images/rectangulo_rojo.png" /></td><td style="font-size: 10.5px" colspan=2 > '+cant_distritos+' Distritos con cartografia actualizada</td></tr>';
        ley = ley + '</table>';
        
        $('#leyenda_resumen').html(ley);
*/
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
