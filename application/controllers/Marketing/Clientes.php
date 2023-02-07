<?php

defined('BASEPATH') or exit('No direct script access allowed');
include(APPPATH . "controllers/Padre.php");

class Clientes extends Padre
{
    /**
     * Producto_terminado Page for this controller made by Sergio Lopez 09/19/2022
     * 
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("General_model");
        $this->load->model("Navbar_m");
        $this->load->model("Marketing_m");
    }

    public function index()
    {
        $data["namepage"] = "Reportes - Clientes";
        $data["title"] = "Clientes";
        $data["modulos"] = $this->Navbar_m->getModulos();

        $data["prueba_de_otra_conexion"] = $this->Marketing_m->test();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Marketing/Clientes/index_clientes', $data);

        $this->load->view('layout/footer');
    }
  
}
