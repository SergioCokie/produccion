<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto_terminado_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_producto_terminado($where = NULL)//datos para datatable
    {
        $this->db->select("*");
        $this->db->from("producto_terminado_view");
        if ($where != null) {
            $this->db->like($where);
        }else {
            //$this->db->where("fecha_entrega BETWEEN CURDATE() - INTERVAL 31 DAY AND CURDATE()");
            //consulta donde trae los ultimos 30 dias, comentado por cuestiones de optimizacion
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function get_contenido_producto_terminado($id_producto) //obtenemos los datos mostrados en el modal
    {
        $this->db->select("*,username,contenido_producto_terminado.id AS id ");
        $this->db->from("contenido_producto_terminado");
        $this->db->join("producto_terminado", "producto_terminado.id = contenido_producto_terminado.id_producto ");
        $this->db->where("id_producto", $id_producto);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_especificacion_detalle($id_producto) 
    {
        $this->db->select("*");
        $this->db->from("detalle_producto_terminado d");
        $this->db->join("especificaciones_detalle e", "d.id = e.id_detalle");
        $this->db->where("id_producto", $id_producto);
        $query = $this->db->get();
        return $query->result();
    }
}
