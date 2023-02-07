<?php

defined('BASEPATH') or exit('No direct script access allowed');
include(APPPATH . "controllers/Padre.php");

class Detalle_reporte extends Padre
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
        $this->load->model("Detalle_reporte_m");
        $this->load->model("Consulta_general_reportes_m");

    }

    public function index()
    {
        $data["namepage"] = "Reportes - Detalle Reporte";
        $data["title"] = "Detalle Reporte";
        $data["modulos"] = $this->Navbar_m->getModulos();

        //MAQUINAS
        $data["maquinas_impresora"] = $this->General_model->getTable("maquinas", array("tipo" => "imprentas"));
        $data["maquinas_pegadoras"] = $this->General_model->getTable("maquinas", array("tipo" => "pegadoras"));
        $data["maquinas_troqueladoras"] = $this->General_model->getTable("maquinas", array("tipo" => "troqueladoras"));
        $data["maquinas_flexografia"] = $this->General_model->getTable("maquinas", array("tipo" => "flexografia"));

        //OPERADORES
        $data["operaciones_impresoras"] = $this->General_model->getTable("operaciones_impresoras");
        $data["operaciones_troqueladoras"] = $this->General_model->getTable("operaciones_troqueladoras");
        $data["operaciones_pegadoras"] = $this->General_model->getTable("operaciones_pegadoras");
        $data["operaciones_flexografia"] = $this->General_model->getTable("operaciones_flexografia");

        //AUXILIARES
        $data["auxiliares_pegadoras"] = $this->General_model->getTable("operadores", array("zona" => "pegadoras"));
        $data["auxiliares_troqueladoras"] = $this->General_model->getTable("operadores", array("zona" => "troqueladoras"));
        $data["auxiliares_imprentas"] = $this->General_model->getTable("operadores", array("zona" => "imprentas"));
        $data["auxiliares_flexografia"] = $this->General_model->getTable("operadores", array("zona" => "flexografia"));

		$data["zona"] = $this->Consulta_general_reportes_m->get_zona_by_user();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Reportes/Detalle_reporte/index_detalle_reporte', $data);

        $this->load->view('layout/footer');
    }
    public function get_detalle()
    {
        $data['data'] = $this->Detalle_reporte_m->det_detalles($this->input->post('tipo'),$this->input->post("fecha_desde"), $this->input->post("fecha_hasta"));
        echo json_encode($data);
    }
}
