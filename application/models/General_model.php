<?php
defined('BASEPATH') or exit('No direct script access allowed');

//General_model es una clase usada para traer datos de una sola tabla o ingresar datos a una misma
//no esta relacionado a modulos del sistema

class General_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getTable($tabla, $where = NULL)//metodo para traer cualquier tabla
    {
        $this->db->select("*");
        $this->db->from($tabla);
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function setTable($table,$data)//metodo para ingresar datos a cualquier tabla
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    public function deleteTable($table,$where)
    {
        $this->db->delete($table,$where);
        return $this->db->insert_id();
    }
    public function updateTable($table,$campos,$where)
    {
        $this->db->update($table,$campos,$where);
        return $this->db->insert_id();
    }
    
}
