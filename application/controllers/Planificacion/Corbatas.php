<?php

defined('BASEPATH') or exit('No direct script access allowed');
include(APPPATH . "controllers/Padre.php");

class Corbatas extends Padre
{
    /**
     * Producto_terminado Page for this controller made by Sergio Lopez 08/29/2022
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
        //$this->load->model("Detalle_reporte_m");
        //$this->load->model("Consulta_general_reportes_m");
    }

    public function index()
    {
        $data["namepage"] = "Control de Densidad";
        $data["title"] = "Control de Densidad";
        $data["modulos"] = $this->Navbar_m->getModulos();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('calidad/control_densidad/index_control_densidad', $data);
        $this->load->view('layout/footer');
    }

 
}
