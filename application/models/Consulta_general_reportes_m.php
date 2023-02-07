<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Consulta_general_reportes_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_zona_by_user()
    {
        $this->db->select("zona");
        $this->db->from("usuarios");
        $this->db->join("operadores", "operadores.username = usuarios.username ");
        $this->db->where("usuarios.username", $this->session->userdata("username"));
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_maquinas($familia)
    {
        if ($familia == "total") {
            $query = $this->db->query("SELECT * FROM maquinas ORDER BY CASE WHEN tipo = 'imprentas' THEN 1 ELSE 2 END , nombre_maquina DESC");
        } else if ($familia == "" || $familia == "todos") {
            $query = $this->db->query("SELECT * FROM maquinas WHERE tipo != '' ORDER BY CASE WHEN tipo = 'imprentas' THEN 1 ELSE 2 END , nombre_maquina DESC");
        } elseif (($familia == "pegadoras" || $familia == "troqueladoras") && $this->session->userdata("id_rol") == "2") {
            $query = $this->db->query("SELECT * FROM maquinas where tipo = 'troqueladoras' OR  tipo = 'pegadoras' ORDER BY nombre_maquina DESC");
        } else {
            $query = $this->db->query("SELECT * FROM maquinas where tipo = '$familia' ORDER BY nombre_maquina DESC");
        }
        return $query->result();
    }
    public function mostrar_reportes_en_tabla($maquina, $tipo, $where = NULL) //TODAS ESTAS SON VISTAS
    {

        $this->db->select("*");
        if ($tipo == "imprentas") {
            
            $this->db->from("consulta_general_de_reportes_imprenta");
            $this->db->where("codigo_equipo", $maquina);
            $this->session->userdata("id_rol") == 4 ? $this->db->where("username", $this->session->userdata("username")) : '';
        } else if ($tipo == "troqueladoras") {
            $this->db->from("consulta_general_de_reportes_troqueladoras");
            $this->db->where("codigo_equipo", $maquina);
            $this->session->userdata("id_rol") == 4 ? $this->db->where("username", $this->session->userdata("username")) : '';
        } else if ($tipo == "pegadoras") {
            $this->db->from("consulta_general_de_reportes_pegadoras");
            $this->db->where("codigo_equipo", $maquina);
            $this->session->userdata("id_rol") == 4 ? $this->db->where("username", $this->session->userdata("username")) : '';
        } else if ($tipo == "flexografia") {
            $this->db->from("consulta_general_de_reportes_flexografia");
            $this->db->where("codigo_equipo", $maquina);
            $this->session->userdata("id_rol") == 4 ? $this->db->where("username", $this->session->userdata("username")) : '';
        }
        $where != null ? $this->db->like($where) : $this->db->limit(10);

        if ($this->session->userdata("username") == 2) { //operador
            $this->db->order_by("");
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function control_de_trabajo($data, $tipo) //mostrando control de trabajo (basicamente es el detalle del reporte)
    {
        if ($tipo == "IMPRENTAS") {
            try {
                $sql = "CALL `ps_control_trabajo_impresora`(?,?)";
                $result = $this->db->query($sql, $data);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else if ($tipo == "TROQUELADORAS") {
            try {
                $sql = "CALL `ps_control_trabajo_troqueladora`(?,?)";
                $result = $this->db->query($sql, $data);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else if ($tipo == "PEGADORAS") {
            try {
                $sql = "CALL `ps_control_trabajo_pegadora`(?,?)";
                $result = $this->db->query($sql, $data);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else if ($tipo == "FLEXOGRAFIA") {
            try {
                $sql = "CALL `ps_control_trabajo_flexografia`(?,?)";
                $result = $this->db->query($sql, $data);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        return $result->result();
    }
    public function informacion_reporte($tipo, $data) //informacion superior de detalle del reporte
    {
        try {
            $sql =  ($tipo == "imprentas" ? "CALL `INFO_REPORTE_IMPRESORAS`(?)" : ($tipo == "pegadoras" ? "CALL `INFO_REPORTE_PEGADORAS`(?)"  : ($tipo == "troqueladoras" ? "CALL `INFO_REPORTE_TROQUELADORAS`(?)"  : ($tipo == "flexografia" ? "CALL `INFO_REPORTE_FLEXOGRAFIA`(?)"  : "no se xd")))) . "";
            $result = $this->db->query($sql, $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $result->result();
    }

    public function auxiliar_por_reporte($id_reporte, $tipo)
    {
        if ($tipo == "imprentas") {
            $this->db->select("codigo_auxiliar1,nombre_corto AS nombre_operador ");
            $this->db->distinct();
            $this->db->from("reportes_impresoras");
            $this->db->join("operadores", "operadores.codigo_operador = reportes_impresoras.codigo_auxiliar1");
            $this->db->where("id_reporte", $id_reporte);
            $query = $this->db->get();
        } else if ($tipo == "troqueladoras") {
            $this->db->select("codigo_auxiliar1,nombre_corto AS nombre_operador ");
            $this->db->distinct();
            $this->db->from("reportes_troqueladoras");
            $this->db->join("operadores", "operadores.codigo_operador = reportes_troqueladoras.codigo_auxiliar1");
            $this->db->where("id_reporte", $id_reporte);
            $query = $this->db->get();
        } else if ($tipo == "pegadoras") {
            $query = $this->db->query("SELECT DISTINCT codigo_auxiliar1,nombre_corto AS nombre_operador 
            FROM reportes_pegadoras INNER JOIN operadores ON operadores.codigo_operador = reportes_pegadoras.codigo_auxiliar1 
            WHERE id_reporte = '$id_reporte' UNION
            SELECT DISTINCT codigo_auxiliar2,nombre_corto AS nombre_operador 
            FROM reportes_pegadoras INNER JOIN operadores ON operadores.codigo_operador = reportes_pegadoras.codigo_auxiliar2 
            WHERE id_reporte = '$id_reporte' UNION
            SELECT DISTINCT codigo_auxiliar3, nombre_corto AS nombre_operador 
            FROM reportes_pegadoras INNER JOIN operadores ON operadores.codigo_operador = reportes_pegadoras.codigo_auxiliar3 
            WHERE id_reporte = '$id_reporte' UNION 
            SELECT DISTINCT codigo_auxiliar4, nombre_corto AS nombre_operador 
            FROM reportes_pegadoras
            INNER JOIN operadores ON operadores.codigo_operador = reportes_pegadoras.codigo_auxiliar4 
            WHERE id_reporte = '$id_reporte'");
        } else if ($tipo == "flexografia") {
            $query = $this->db->query("SELECT DISTINCT codigo_auxiliar1,nombre_corto AS nombre_operador 
            FROM reportes_flexografia INNER JOIN operadores ON operadores.codigo_operador = reportes_flexografia.codigo_auxiliar1 
            WHERE id_reporte = $id_reporte UNION
            SELECT DISTINCT codigo_auxiliar2,nombre_corto AS nombre_operador 
            FROM reportes_flexografia INNER JOIN operadores ON operadores.codigo_operador = reportes_flexografia.codigo_auxiliar2 
            WHERE id_reporte = $id_reporte");
            $query = $this->db->get();
        }
        return $query->result();
    }
    public function acutalizar_detalle_reporte($data, $where, $tipo) //optimizar esta consulta
    {
        if ($tipo == "imprentas") {
            $this->db->update("reportes_impresoras", $data, $where);
            return $this->db->insert_id();
        } else if ($tipo == "troqueladoras") {
            $this->db->update("reportes_troqueladoras", $data, $where);
            return $this->db->insert_id();
        } else if ($tipo == "pegadoras") {
            $this->db->update("reportes_pegadoras", $data, $where);
            return $this->db->insert_id();
        } else if ($tipo == "flexografia") {
            $this->db->update("reportes_flexografia", $data, $where);
            return $this->db->insert_id();
        }
    }

    public function generar_codigo_reporte($maquina)
    {
        $this->db->select("CONVERT( SUBSTRING_INDEX( SUBSTRING_INDEX( id_codigo, '_', - 1 ), '_', - 1 ), UNSIGNED INTEGER ) + 1 AS codigo ");
        $this->db->from("codigo_reporte");
        $this->db->where("maquina", $maquina);
        $this->db->order_by("id_codigo", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();

        $codigo_reporte = "";
        foreach ($query->result() as $data) {
            $codigo_reporte = $data->codigo;
        }
        if ($codigo_reporte == "") {
            $codigo_reporte = 1;
        }
        $n = 0;
        $numero = intval($codigo_reporte);
        do {
            $numero = floor($numero / 10);
            $n = $n + 1;
        } while ($numero > 0);

        $ceros = abs(7 - $n);
        $codigo = "";
        for ($i = 0; $i < $ceros; $i++) {
            $codigo .= "0";
        }
        $codigo_reporte =  $maquina .  "_" . $codigo . intval($codigo_reporte);
        return $codigo_reporte;
    }

}
