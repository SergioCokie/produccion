<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cumplimiento_cantidades_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    
    public function get_cumplimiento_cantidades($fecha_desde, $fecha_hasta)
    {
        
        $this->db->select("*");
        $this->db->from("informe_cumplimiento_cantidades");
        $this->db->where("fecha BETWEEN '$fecha_desde' AND '$fecha_hasta'");
        $this->db->where("cantidad_produc !=", "");
        $query = $this->db->get();
        return $query->result();
    }
}
