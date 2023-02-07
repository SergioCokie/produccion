<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
       

	}

	public function test() //obtenemos todos los modulos
    {
        /* $DB2 = $this->load->database('imultiples', TRUE);
        $DB2->select("*");
        $DB2->from("ot");
        //$query = $this->db->get();
        $query = $DB2->get();

        return $query->result(); */
    }
  

}
