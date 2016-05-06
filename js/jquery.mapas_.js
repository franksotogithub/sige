

function crear_map_giro(id_giro, cont, perso, venta)
{

    var cadena = $('#cboDistrito').attr('value').split('|');

    if (perso == "")
        perso = "A";
    if (venta == "")
        venta = "A";
    //alert("cadena="+cadena);
    //alert(venta);

    $(function () {
        $.ajax({
            type: 'post',
            dataType: 'html',
            url: 'index.php/mapas/crear_mapa_giro',
            data: 'id_giro=' + id_giro + '&ubigeo=' + cadena[0] + '&cont=' + cont + '&persona=' + perso + '&ventas=' + venta,
            success: function (result) {
                // alert("resultado_giro="+result);  
                crear_mapa_js_giro(result, id_giro);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

}
//crear mapa de poblacion
function crear_map_pob(asexo, aedades, aestudio, apea)
{

    var cadena = $('#cboDistrito').attr('value').split('|');

    if (asexo == "")
        asexo = "A";
    if (aedades == "")
        aedades = "A";
    if (aestudio == "")
        aestudio = "A";
    if (apea == "")
        apea = "A";
    //alert(perso);
    //alert(venta);

    $(function () {
        $.ajax({
            type: 'post',
            dataType: 'html',
            url: 'index.php/mapas/crear_mapa_poblacion',
            data: 'ubigeo=' + cadena[0] + '&sexo=' + asexo + '&edades=' + aedades + '&estudio=' + aestudio + '&pea=' + apea,
            success: function (result) {

                crear_mapa_js_pob(result);
                //alert(result);			
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

}



$(document).ready(function () {
    $("#create-mapa_inicio")

            .click(function () {

                iniciar_variable();


                log_visita_insertar('12', 'Inicio');
                zoomInicial();
            });
});






$(document).ready(function () {
    $("#create-mapa_img")
            //.button()
            .click(function () {
                var minx = getminXExtend();
                var maxx = getmaxXExtend();
                var miny = getminYExtend();
                var maxy = getmaxYExtend();
                var si = Obtener_chksi_cadena();
                var estra = Obtener_chkestrato();
                var pobla = Obtener_chkpoblacion();
                var mapa_pobla = nombremap_pobla();
                mapa_pobla.replace("&", "");
                var mapagiro = "";
                var cad_influencia = bloque_puntos_influencia
                
                
                //*****/
                $("#divChkCompetencia .w_opet").each(function (i, el) {
                    if ($(this).is(':checked')) {
                        //alert(nombremap_giro($(el).val()));
                        mapagiro = mapagiro + '&giro' + i + '=' + nombremap_giro($(el).val());
                        mapagiro = mapagiro + '&idgiro' + i + '=giro' + $(el).val();
                    }
                });
                
                if (mapagiro == "")
                    mapagiro = "&giro0=A&idgiro0=A&giro1=A&idgiro1=A&giro2=A&idgiro2=A";
                if (mapa_pobla == "")
                    mapa_pobla = "A";
                
                //alert(mapagiro);
                //****/
                //alert(si);
                $.ajax({
                    type: 'post',
                    dataType: 'html',
                    url: 'index.php/mapas/exportar_mapa',
                    data: 'minx=' + minx + '&maxx=' + maxx + '&miny=' + miny + '&maxy=' + maxy + '&si=' + si + '&estra=' + estra + '&pobla=' + pobla + '&mapa_pobla=' + mapa_pobla + '&cad_influencia=' + cad_influencia + mapagiro,                    
                    //data: 'minx=' + minx + '&maxx=' + maxx + '&miny=' + miny + '&maxy=' + maxy + '&mapa_pobla=' + mapa_pobla,                    
                    success: function (result) {
                        //alert(result);
                        imagen2 = result;

                        $("#tblArea_mapa tbody").append('<tr><td><img src="/SIG-NEGOCIOS/' + result + '"></td></tr>');
                        //$("#tblArea_mapa tbody").append('<tr><td><img src="/test/atlas/' + result + '"></td></tr>');
                        log_visita_insertar('11', imagen2.replace("map/", ""));
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                    }
                });

                $("#dialog-form_imagen").dialog({
                    autoOpen: true,
                    width: 820,
                    height: 450,
                    modal: true,
                    buttons: {
                        "Exportar": function () {

                            imagen2 = imagen2.replace("map/", "");

                            // window.open("index.php/area_influencia/exportar_imagen?imagen2="+imagen2);
                            document.getElementById("file").value = imagen2;
                            document.getElementById("FormularioExportacionImagen").submit();

                        },
                        "Salir": function () {

                            $(this).dialog("close");

                        }

                    },
                    close: function () {
                        $("#tblArea_mapa tr").remove();
                    }
                });

            });
});

function Obtener_chksi_cadena() {
    var cadena = "";

    for (i = 0; i < 10; i++) {
        if ($('#checkli' + i).attr('checked')) {
            cadena = cadena + "1";
        } else {
            cadena = cadena + "0";
        }
    }
    return cadena + "0";
}
function Obtener_chkestrato() {
    var cadena = "";
    if ($('#checkEstra').attr('checked')) {
        cadena = "1";
    } else {
        cadena = "0";
    }
    return cadena;
}
function Obtener_chkpoblacion() {
    var cadena = "";
    if ($('#checkCli').attr('checked')) {
        cadena = "1";
    } else {
        cadena = "0";
    }
    return cadena;
}

  
