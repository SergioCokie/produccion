<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detalle_reporte_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function det_detalles($tipo, $fecha_desde, $fecha_hasta)
    {
        $this->db->select("*");
        if ($tipo == "imprentas") {
            $this->db->from("detalle_reporte_imprenta");
            $this->db->where("fecha BETWEEN '$fecha_desde' AND '$fecha_hasta'");
        } else if ($tipo == "troqueladoras") {
            $this->db->from("detalle_reporte_troqueladora");
            $this->db->where("fecha BETWEEN '$fecha_desde' AND '$fecha_hasta'");
        }else if ($tipo == "pegadoras") {
            $this->db->from("detalle_reporte_pegadora");
            $this->db->where("fecha BETWEEN '$fecha_desde' AND '$fecha_hasta'");
        }else if ($tipo == "flexografia") {
            $this->db->from("detalle_reporte_flexografia");
            $this->db->where("fecha BETWEEN '$fecha_desde' AND '$fecha_hasta'");
        }
        $query = $this->db->get();
        return $query->result();
    }
}
