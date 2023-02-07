<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navbar_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getModulos() //obtenemos todos los modulos
    {
        $this->db->select("*");
        $this->db->from("autorizaciones a");
        $this->db->join("submodulos s","s.id = a.id_submodulo");
        $this->db->join("modulos m","m.id = s.id_modulo",'right');
        $this->db->where("a.id_usuario",$this->session->userdata("id"));
        $this->db->group_by("m.modulo");
        $this->db->order_by("m.id", "ASC");
        $query = $this->db->get();
        return $query->result();
    }
  

}
