<?php

class Ubicacion_model extends CI_Model {

    function Ubicacion_model() {


        parent::__construct();
    }

    function consultar_ciudad() {

        $query = $this->db->get('ciudad_consultar()');
        return $query->result();
    }

    function consultar_departamento() {
        $query = $this->db->get('departamento_consultar2()');
        return $query->result();
    }

    function consultar_provincia($accdd) {
        $query = $this->db->get("provincia_consultar3('$accdd')");
        return $query->result();
    }

    function leyenda_resumen_distritos_actualizados(){
        $query=$this->db->query("select count(gid) as cantidad  from  distritos_2014 where prj_atlas_estado='1'");
         return $query->result();
    }

    function leyenda_resumen_distritos_no_actualizados(){
        $query=$this->db->query("select count(gid) cantidad  from  distritos_2014 where prj_atlas_estado<>'1'");
         return $query->result();
    }

    function consultar_distrito($accdd, $accpp) {
        $query = $this->db->query("select * from distrito_consultar2('$accdd', '$accpp')");
        return $query->result();
    }

    function consultar_centropoblado($ubigeo, $term) {
        $query = $this->db->query("select * from centropoblado_consultar2('$ubigeo', '$term')");
        return $query->result();
    }

    function consultar_leyenda_cp($ubigeo, $term) {
        $sql = "select (CASE WHEN area = '1' THEN 'CCPP Urbano' ELSE 'CCPP Rural' END) as tipo, count(area) as cantidad, area
            from centro_poblado_2014 WHERE ubigeo = '$ubigeo' AND nomccpp ILIKE '%$term%' GROUP BY ubigeo, area order by 1 DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function buscar_distrito($codciudad) {

        $query = $this->db->get("dist_buscar('" . $codciudad . "')");
        return $query->result();
    }

    function consultar_giro() {

        $query = $this->db->get('giro_consultar()');
        return $query->result();
    }

    function buscar_via($ubigeo, $nombre_via) {

        $sql = "select *  from via_buscar('" . $ubigeo . "','" . $nombre_via . "')";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function buscar_via_tramo($id_via) {

        $query = $this->db->get('via_tramo_buscar($id_via)');
        return $query->result();
    }

    function buscar_nucleo($ubigeo) {

        $query = $this->db->get("nnuu_buscar('" . $ubigeo . "')");
        return $query->result();
    }

    function buscar_lugar_de_interes($ubigeo) {

        $query = $this->db->get("lugar_de_interes_buscar('" . $ubigeo . "')");
        return $query->result();
    }

}

?>