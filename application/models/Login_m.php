<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
    public function obtener_usuario($user, $pass)
    {
        $hashed_pass = sha1($pass);
        $this->db->select("count(*) as Login, u.id, u.username, nombre, id_rol,rolname,o.codigo_operador,o.nombre_operador");
        $this->db->from("usuarios u");
        $this->db->join('usuarios_roles r', 'u.id_rol = r.ID');
        $this->db->join('operadores o', 'o.username = u.username',"left");
        $this->db->where("u.username",$user);
        $this->db->where("contra2",$hashed_pass);
        $this->db->group_by(array("u.id"));
        $query = $this->db->get();
        return $query->row();
    }

    public function array_session($objquery)
    {
        # code...
        $datasession = array(
            "id" => $objquery->id,
            "username" => $objquery->username,
            "nombre" => $objquery->nombre,
            "id_rol" => $objquery->id_rol,
            "rolname" => $objquery->rolname,
            "codigo_operador" => $objquery->codigo_operador,
            "nombre_operador" => $objquery->nombre_operador,
            "logged_in" => TRUE

        );

        return $datasession;
    }

    public function login($user, $pass)
    {
        # code...
        $datos = new stdClass();
        $datos->estado = false;

        $objquery = $this->obtener_usuario($user, $pass);
        if ($objquery != null) {
            # code...
            if ($objquery->Login ==1 ) {
                # code...
                $datos->estado = true;
                $datos->mensaje = "Login Correcto";
            }
        }else{
            $datos->estado = false;
            $datos->mensaje = "Login Incorrecto";
        }

        if ($datos->estado == true) {
            # code...
            $arraySession = $this->array_session($objquery);
            $this->session->set_userdata($arraySession);
        } 
      
        return $datos;
    }

}
