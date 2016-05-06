<?php

class Area_influencia_model extends CI_Model {

    function Area_influencia_model() {


        parent::__construct();
    }

    function buscar_area_influencia_map($puntox, $puntoy, $radio) {

        $sql = "select *  from ccpp_buscar_area_influencia2('" . $puntox . "','" . $puntoy . "'," . $radio . ")";
        $query = $this->db->query($sql);
        return $query->result();
    }


    function buscar_area_influencia_dpto($puntox, $puntoy) {

        $sql = "select *  from ccdd_buscar_area_influencia('" . $puntox . "','" . $puntoy . "')";
        $query = $this->db->query($sql);
        return $query->result();
    }


    function buscar_area_influencia_prov($puntox, $puntoy) {

        $sql = "select *  from ccpp_buscar_area_influencia('" . $puntox . "','" . $puntoy . "')";
        $query = $this->db->query($sql);
        return $query->result();
    }



    function buscar_area_influencia_dist($puntox, $puntoy) {
        $sql = "select *  from ccdi_buscar_area_influencia('" . $puntox . "','" . $puntoy . "')";
        $query = $this->db->query($sql);
        return $query->result();
    }


    function buscar_area_influencia_viv($puntox, $puntoy, $radio) {

        $sql = "select *  from viv_buscar_area_influencia_3('" . $puntox . "','" . $puntoy . "'," . $radio . ")";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function consultar_area_influencia_nombre_variable_N() {
        $query = $this->db->get('rango_variable_negocio_ficha()');
        return $query->result();
    }

    function consultar_area_influencia_nombre_variable_P() {
        $query = $this->db->get('rango_variable_poblacion_ficha()');
        return $query->result();
    }







    function consultar_area_influencia_datos_dpto($ubigeo) {

        //$sql = "select * from CARTOGRAFIA where ubigeo = '".$ubigeo."' and codccpp='".$ccpp."' order by ubigeo, codccpp, poblacion, vivienda";
        //despues de frecuencia \"tiempo en minutos\" as \"tiempo en minutos hacia la capital del distrito\",
        $sql = "select 
                    nombdep as Departamento, 
                    total_pp  as  \"Total de provincias\", 
                    total_di  as  \"Total de distritos\",     
                    total_ccpp  as  \"Total de centros poblados\",
                    p29_1 \"Vivienda particular\",
                    p29_2 \"Establecimiento\",
                    p29_3 \"Vivienda y Establecimento\",
                    p29_4 \"Vivienda colectiva\",
                    p29_5 \"Otro tipo de registro\",
                    p30_1 \"Vivienda con ocupantes presentes\",
                    p30_2 \"Vivienda con ocupantes ausentes\",
                    p30_3 \"Vivienda en alquiler o venta\",
                    p30_4 \"Vivienda en construccion o reparacion\",
                    p30_5 \"Vivienda abandonada o cerrada\",
                    p30_6 \"Otro tipo de vivienda desocupada\",
                    total_pers \"Total de personas\",
                    total_m \"Total de mujeres\",
                    total_h \"Total de hombres\",
                    rr1 \"Poblacion de 0 a 14 años \",
                    rr2 \"Poblacion de 15 a 64 años\",
                    rr3 \"Poblacion de 65 a mas años\",
                    p34_1 \"Establecimiento activo\",
                    p34_2 \"Establecimiento inactivo\",
                    p34_3 \"Establecimiento en construccion\",
                    p38 \"Numero de trabajadores\"
                    from departamentos_2014 where ccdd = '" . $ubigeo . "' ";

        $rs = $this->db->query($sql);
        $_result = $rs->result();
        $this->count_rows = count($_result);
        $this->total_pages = count($_result);
        $result = array();
        if ($rs->num_rows() > 0) {
            $result = $rs->result_array();
        }
        $rs->free_result();
        return $result;
    }




    function consultar_area_influencia_datos_prov($ubigeo) {

        //$sql = "select * from CARTOGRAFIA where ubigeo = '".$ubigeo."' and codccpp='".$ccpp."' order by ubigeo, codccpp, poblacion, vivienda";
        //despues de frecuencia \"tiempo en minutos\" as \"tiempo en minutos hacia la capital del distrito\",
        $sql = "select 
                    nombdep as Departamento,
                    nombprov as Provincia, 
                    total_di  as  \"Total de distritos\",     
                    total_ccpp  as  \"Total de centros poblados\",
                    p29_1 \"Vivienda particular\",
                    p29_2 \"Establecimiento\",
                    p29_3 \"Vivienda y Establecimento\",
                    p29_4 \"Vivienda colectiva\",
                    p29_5 \"Otro tipo de registro\",
                    p30_1 \"Vivienda con ocupantes presentes\",
                    p30_2 \"Vivienda con ocupantes ausentes\",
                    p30_3 \"Vivienda en alquiler o venta\",
                    p30_4 \"Vivienda en construccion o reparacion\",
                    p30_5 \"Vivienda abandonada o cerrada\",
                    p30_6 \"Otro tipo de vivienda desocupada\",
                    total_pers \"Total de personas\",
                    total_m \"Total de mujeres\",
                    total_h \"Total de hombres\",
                    rr1 \"Poblacion de 0 a 14 años \",
                    rr2 \"Poblacion de 15 a 64 años\",
                    rr3 \"Poblacion de 65 a mas años\",
                    p34_1 \"Establecimiento activo\",
                    p34_2 \"Establecimiento inactivo\",
                    p34_3 \"Establecimiento en construccion\",
                    p38 \"Numero de trabajadores\"
                    from provincias_2014 where ccdd||ccpp = '" . $ubigeo . "' ";

        $rs = $this->db->query($sql);
        $_result = $rs->result();
        $this->count_rows = count($_result);
        $this->total_pages = count($_result);
        $result = array();
        if ($rs->num_rows() > 0) {
            $result = $rs->result_array();
        }
        $rs->free_result();
        return $result;
    }


    function consultar_area_influencia_datos_dist($ubigeo) {

        //$sql = "select * from CARTOGRAFIA where ubigeo = '".$ubigeo."' and codccpp='".$ccpp."' order by ubigeo, codccpp, poblacion, vivienda";
        //despues de frecuencia \"tiempo en minutos\" as \"tiempo en minutos hacia la capital del distrito\",
        $sql = "select 
                    nombdep as Departamento,
                    nombprov as Provincia, 
                    nombdist  as  Distrito,     
                    total_ccpp  as  \"Total de centros poblados\",
                    p29_1 \"Vivienda particular\",
                    p29_2 \"Establecimiento\",
                    p29_3 \"Vivienda y Establecimento\",
                    p29_4 \"Vivienda colectiva\",
                    p29_5 \"Otro tipo de registro\",
                    p30_1 \"Vivienda con ocupantes presentes\",
                    p30_2 \"Vivienda con ocupantes ausentes\",
                    p30_3 \"Vivienda en alquiler o venta\",
                    p30_4 \"Vivienda en construccion o reparacion\",
                    p30_5 \"Vivienda abandonada o cerrada\",
                    p30_6 \"Otro tipo de vivienda desocupada\",
                    total_pers \"Total de personas\",
                    total_m \"Total de mujeres\",
                    total_h \"Total de hombres\",
                    rr1 \"Poblacion de 0 a 14 años \",
                    rr2 \"Poblacion de 15 a 64 años\",
                    rr3 \"Poblacion de 65 a mas años\",
                    p34_1 \"Establecimiento activo\",
                    p34_2 \"Establecimiento inactivo\",
                    p34_3 \"Establecimiento en construccion\",
                    p38 \"Numero de trabajadores\"
                    from distritos_2014 where ccdd||ccpp||ccdi = '" . $ubigeo . "' ";

        $rs = $this->db->query($sql);
        $_result = $rs->result();
        $this->count_rows = count($_result);
        $this->total_pages = count($_result);
        $result = array();
        if ($rs->num_rows() > 0) {
            $result = $rs->result_array();
        }
        $rs->free_result();
        return $result;
    }






    function consultar_area_influencia_datos_ccpp($ubigeo, $ccpp) {

        //$sql = "select * from CARTOGRAFIA where ubigeo = '".$ubigeo."' and codccpp='".$ccpp."' order by ubigeo, codccpp, poblacion, vivienda";
		//despues de frecuencia \"tiempo en minutos\" as \"tiempo en minutos hacia la capital del distrito\",
        $sql = "select 
                    departamento, 
                    provincia, 
                    distrito, 
                    \"centro poblado\",
					categoria,
				    ubigeo || codccpp as \"codigo de ubigeo y centro poblado\",  
		    coordenada_x as longitud,
                    coordenada_y as latitud,
		    coordenada_z as altitud,
                    poblacion,
                    vivienda,
                    \"agua por red publica\",
                    \"energia electrica\" as \"energia electrica en la vivienda\", 
                    \"desague por red publica\",
                    \"via de mayor uso\",
                    \"transporte de mayor uso\", 
                    \"frecuencia\",
					\"tiempo en minutos\" as \"tiempo en minutos hacia la capital del distrito\",
                    \"alumbrado publico\",
                    \"telefono publico\",
                    \"local comunal\",
                    \"hostal / albergue\",
                    \"estacion de radio\", 
                    \"institucion educativa primaria\",
                    \"institucion educativa secundaria\",
                    \"establecimiento/ puesto de salud\",
                    \"puesto policial\",
                    \"oficina de correo\", 
                    \"cabina de internet\",
                    \"heladas /nevadas\",
                    \"granizadas\",
                    \"lluvias\",
                    \"sequias\",
                    \"vendavales (vientos fuertes)\",
                    \"inundaciones\",
                    \"derrumbes/deslizamientos\", 
                    \"huaycos / aludes/aluviones\",
                    \"desertificaciones\",
                    \"salinizacion de los suelos\",
                    \"actividad volcanica\",\"sismos\",
                    \"tsunami u oleadas anomalos\", 
                    \"otros fenomenos nat.\",
                    \"derrame de sustancias o desechos toxicos\",
                    \"fugas de gases toxicos\",
                    \"explosiones\",
                    \"incendios y quemas\", 
                    \"crianza de animales en zonas urbanas\",
                    \"incremento de zonas indus. no autorizadas\",
                    \"zonas aeropecuarias\" as \"zonas aereoportuarias\",
                    \"rellenos sanitarios\", 
                    \"suberciones y o confictos sociales\" as \"subversiones y/o conflictos sociales\",
                    \"otros peligros\",
                    \"un lecho de rio o quebrada\",
                    \"un cuartel militar o policial\",
                    \"una via ferrea\", 
                    \"la erosion de rios en laderas de cerros\",
                    \"barrancos o precipicios\",
                    \"otros\",
                    \"pistas y veredas en la mayori de sus calles y/o manzanas\", 
                    \"canales de drenaje en las calles para la evacuacion de las agua\" as \"canales de drenaje en las calles para la evacuacion de las aguas\"  
                from CARTOGRAFIA where ubigeo = '" . $ubigeo . "' and codccpp='" . $ccpp . "' order by ubigeo, codccpp, poblacion, vivienda";



        $rs = $this->db->query($sql);
        $_result = $rs->result();
        $this->count_rows = count($_result);
        $this->total_pages = count($_result);
        $result = array();
        if ($rs->num_rows() > 0) {
            $result = $rs->result_array();
        }
        $rs->free_result();
        return $result;
    }

    function consultar_area_influencia_datos_viv_img($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg) {
        if (!empty($zona)) {
            $sql = "SELECT foto FROM CPV2014_0301 WHERE ccdd = '" . substr($ubigeo, 0, 2) . "' and ccpp='" . substr($ubigeo, 2, 2) . "' and ccdi='" . substr($ubigeo, 4, 2) . "' and codccpp='" . $ccpp . "' and zona_id='" . $zona . "' and manzana_final_id='" . $manzana . "' and frente_id='" . $frente . "' and id_reg='" . $idreg . "' ";
        } else {
            $sql = "SELECT foto FROM CPV2014_0301 WHERE ccdd = '" . substr($ubigeo, 0, 2) . "' and ccpp='" . substr($ubigeo, 2, 2) . "' and ccdi='" . substr($ubigeo, 4, 2) . "' and codccpp='" . $ccpp . "' and id_reg='" . $idreg . "' ";
        }

        $rs = $this->db->query($sql);
        $row = $rs->row_array();
        $image = NULL;
        if($row['foto']){
            $image = pg_unescape_bytea($row['foto']);
        }
        return $image;
    }



    function consultar_area_influencia_datos_viv_img_2($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg) {
        
        
        $flag = 0;
        
        if (!empty($zona)) {
            $sql = "SELECT 1 flag FROM CPV2014_0301 WHERE ccdd = '" . substr($ubigeo, 0, 2) . "' and ccpp='" . substr($ubigeo, 2, 2) . "' and ccdi='" . substr($ubigeo, 4, 2) . "' and codccpp='" . $ccpp . "' and zona_id='" . $zona . "' and manzana_final_id='" . $manzana . "' and frente_id='" . $frente . "' and id_reg='" . $idreg . "'  and foto is not null and (p29 in ('2','3') and p34='1') and foto_estado='1' ";
        } else {
            $sql = "SELECT 1 flag FROM CPV2014_0301 WHERE ccdd = '" . substr($ubigeo, 0, 2) . "' and ccpp='" . substr($ubigeo, 2, 2) . "' and ccdi='" . substr($ubigeo, 4, 2) . "' and codccpp='" . $ccpp . "' and id_reg='" . $idreg . "' and foto is not null and (p29 in ('2','3') and p34='1') and foto_estado='1' ";
        }

        $rs = $this->db->query($sql);
        $_result = $rs->result();
        //$this->count_rows = count($_result);

        if(count($_result)>0)
        {//$row = $rs->row_array();

           // if($row['flag']){
            $flag = 1;
           // }
        }
        
        
        
        return $flag;
    }



    function consultar_area_influencia_datos_viv($ubigeo, $ccpp, $zona, $manzana, $frente, $idreg) {

        if (!empty($zona)) {
            $sql = "select departamento as \"DEPARTAMENTO\", provincia as \"PROVINCIA\", distrito as \"DISTRITO\", nomccpp as \"CENTRO POBLADO\",
ccdd||ccpp||ccdi||codccpp as \"codigo de ubigeo y centro poblado\",
coordenada_x as longitud,
coordenada_y as latitud,
case catvia
	when '1' then 'AVENIDA'
	when '2' then 'CALLE'
	when '3' then 'JIRON'
	when '4' then 'PASAJE'
	when '5' then 'CARRETERA'
	when '6' then 'OTRO'
end as VÍA, nomvia as \"NOMBRE DE VIA\", p22_a || ' ' || p22_b as \"NRO. DE PUERTA\", 
case p29 
	when '1' then 'VIVIENDA PARTICULAR'
	when '2' then 'ESTABLECIMIENTO'
	when '3' then 'VIVIENDA Y ESTABLECIMIENTO'
	when '4' then 'VIVIENDA COLECTIVA'
	when '5' then 'OTRO TIPO DE REGISTO'
end as \"USO DEL LOCAL\",
case
   when P33 IS NULL AND P31 IS NULL THEN 'EN ALQUILER O VENTA / EN CONSTRUCCIÓN O REPARACIÓN / ABANDONADA O CERRADA / OTRA CAUSA'
   ELSE case p31 
        when '1' then 'VIVEN PERMANENTEMENTE'
        when '2' then 'DE USO OCACIONAL'
	end
END as \"ESTADO DEL LOCAL\",
p33 as \"TOTAL DE PERSONAS\",
s1 as \"TOTAL HOMBRES\", 
s2 as \"TOTAL MUJERES\",
rr1 as \"POBLACIÓN DE 0 A 14 AÑOS\",
rr2 as \"POBLACIÓN DE 15 A 64 AÑOS\",
rr3 as \"POBLACIÓN DE 65 A MáS AÑOS\",
p35 as \"RAZON SOCIAL\",
p36_o as \"ACTIVIDAD ECONOMICA\", p38 as \"NUMERO DE TRABAJADORES\",
case p37 
	when '1' then 'UNICO'
	when '2' then 'PRINCIPAL'
	when '3' then 'SUCURSAL'
	when '4' then 'AUXILIAR'
end as \"CATEGORIA DEL ESTABLECIMIENTO\""
                    . " from CPV2014_0301 "
                    . " where ccdd = '" . substr($ubigeo, 0, 2) . "' and ccpp='" . substr($ubigeo, 2, 2) . "' and ccdi='" . substr($ubigeo, 4, 2) . "' "
                    . " and codccpp='" . $ccpp . "' and zona_id='" . $zona . "' and manzana_final_id='" . $manzana . "' and frente_id='" . $frente . "' and id_reg='" . $idreg . "' "
                    . " order by codccpp, id_reg";
        } else {
            $sql = "select departamento as \"DEPARTAMENTO\", provincia as \"PROVINCIA\", distrito as \"DISTRITO\", nomccpp as \"CENTRO POBLADO\",
ccdd||ccpp||ccdi||codccpp as \"codigo de ubigeo y centro poblado\",
coordenada_x as longitud,
coordenada_y as latitud,
case catvia
	when '1' then 'AVENIDA'
	when '2' then 'CALLE'
	when '3' then 'JIRON'
	when '4' then 'PASAJE'
	when '5' then 'CARRETERA'
	when '6' then 'OTRO'
end as Via, nomvia as \"NOMBRE DE VIA\", p22_a || ' ' || p22_b as \"NRO. DE PUERTA\", 
case p29 
	when '1' then 'VIVIENDA PARTICULAR'

	when '2' then 'ESTABLECIMIENTO'
	when '3' then 'VIVIENDA Y ESTABLECIMIENTO'
	when '4' then 'VIVIENDA COLECTIVA'
	when '5' then 'OTRO TIPO DE REGISTO'
end as \"USO DEL LOCAL\",
case
   when P33 IS NULL AND P31 IS NULL THEN 'EN ALQUILER O VENTA / EN CONSTRUCCIÓN O REPARACIÓN / ABANDONADA O CERRADA / OTRA CAUSA'
   ELSE case p31 
        when '1' then 'VIVEN PERMANENTEMENTE'
        when '2' then 'DE USO OCACIONAL'
	end
END as \"ESTADO DEL LOCAL\",
p33 as \"TOTAL DE PERSONAS\",
s1 as \"TOTAL HOMBRES\", 
s2 as \"TOTAL MUJERES\",
rr1 as \"POBLACIÓN DE 0 A 14 AÑOS\",
rr2 as \"POBLACIÓN DE 15 A 64 AÑOS\",
rr3 as \"POBLACIÓN DE 65 A MáS AÑOS\",
p35 as \"RAZON SOCIAL\",
p36_o as \"ACTIVIDAD ECONOMICA\", p38 as \"NUMERO DE TRABAJADORES\",
case p37 
	when '1' then 'UNICO'
	when '2' then 'PRINCIPAL'
	when '3' then 'SUCURSAL'
	when '4' then 'AUXILIAR'
end as \"CATEGORIA DEL ESTABLECIMIENTO\""
                    . " from CPV2014_0301 "
                    . " where ccdd = '" . substr($ubigeo, 0, 2) . "' and ccpp='" . substr($ubigeo, 2, 2) . "' and ccdi='" . substr($ubigeo, 4, 2) . "' "
                    . " and codccpp='" . $ccpp . "' and id_reg='" . $idreg . "' "
                    . " order by codccpp, id_reg";
        }

        $rs = $this->db->query($sql);
        $_result = $rs->result();
        $this->count_rows = count($_result);
        $this->total_pages = count($_result);
        $result = array();
        if ($rs->num_rows() > 0) {
            $result = $rs->result_array();
        }
        $rs->free_result();
        return $result;
    }









    function consultar_area_influencia_datos_N($txtManzanas, $id_giro1, $id_giro2, $id_giro3, $p1_1, $p2_1, $p3_1, $p4_1, $p5_1, $v1_1, $v2_1, $v3_1, $v4_1, $v5_1, $p1_2, $p2_2, $p3_2, $p4_2, $p5_2, $v1_2, $v2_2, $v3_2, $v4_2, $v5_2, $p1_3, $p2_3, $p3_3, $p4_3, $p5_3, $v1_3, $v2_3, $v3_3, $v4_3, $v5_3) {

        $sql = "select * from datomxneg_mz_consultar_ficha('" . $txtManzanas . "'," . $id_giro1 . "," . $id_giro2 . "," . $id_giro3 . "
           ,'" . $p1_1 . "','" . $p2_1 . "','" . $p3_1 . "','" . $p4_1 . "','" . $p5_1 . "','" . $v1_1 . "','" . $v2_1 . "','" . $v3_1 . "','" . $v4_1 . "','" . $v5_1 . "'
           ,'" . $p1_2 . "','" . $p2_2 . "','" . $p3_2 . "','" . $p4_2 . "','" . $p5_2 . "','" . $v1_2 . "','" . $v2_2 . "','" . $v3_2 . "','" . $v4_2 . "','" . $v5_2 . "'
           ,'" . $p1_3 . "','" . $p2_3 . "','" . $p3_3 . "','" . $p4_3 . "','" . $p5_3 . "','" . $v1_3 . "','" . $v2_3 . "','" . $v3_3 . "','" . $v4_3 . "','" . $v5_3 . "'
                     )";
        $query = $this->db->query($sql);


        return $query->result();
    }

    function consultar_area_influencia_datos_P($manzanas, $x1, $x2, $e1, $e2, $e3, $e4, $e5, $e6, $n1, $n2, $n3, $pea1, $pea2, $pea3) {

        $sql = "select * from datomxpob_mz_consultar_ficha('" . $manzanas . "','" . $x1 . "','" . $x2 . "','" . $e1 . "','" . $e2 . "',
       '" . $e3 . "','" . $e4 . "','" . $e5 . "','" . $e6 . "','" . $n1 . "','" . $n2 . "','" . $n3 . "','" . $pea1 . "','" . $pea2 . "','" . $pea3 . "')";
        $query = $this->db->query($sql);


        return $query->result();
    }

    function obtener_nombre_ciudad_distrito($puntox, $puntoy) {

        $sql = "select * from ciudad_dist_obtener_nombre('" . $puntox . "', '" . $puntoy . "')";

        $query = $this->db->query($sql);


        return $query->result();
    }

}

?>
