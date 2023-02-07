<?php

defined('BASEPATH') or exit('No direct script access allowed');
include(APPPATH . "controllers/Padre.php");

class Informe_cumplimiento extends Padre
{
    /**
     * Producto_terminado Page for this controller made by Sergio Lopez 01/09/2022
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
        $this->load->model("Cumplimiento_cantidades_m");
    }

    public function index()
    {
        $data["namepage"] = "Reportes - Cumplimiento de Cantidades";
        $data["title"] = "Cumplimiento de Cantidades";
        $data["modulos"] = $this->Navbar_m->getModulos();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('Reportes/Informe_cumplimiento/index_informe', $data);

        $this->load->view('layout/footer');
    }
    public function get_informe()
    {
        $data['data'] = $this->Cumplimiento_cantidades_m->get_cumplimiento_cantidades($this->input->post("fecha_desde"), $this->input->post("fecha_hasta"));
        echo json_encode($data);
        //print_r($data);
    }
    public function test()
    { //OBTENIENDO VALIDACIONES DE ARRANQUE PARA MOSTRAR EN CUMPLIMIENTO DE CANTIDADES
        $data = $this->General_model->getTable("validacion_arranque");
        echo json_encode($data);
    }
    public function get_validacion_arranque2()
    { //OBTENIENDO VALIDACIONES DE ARRANQUE PARA MOSTRAR EN CUMPLIMIENTO DE CANTIDADES
        $data['validacion_arranque'] = $this->General_model->getTable("validacion_arranque", array("ot" => $this->input->post("orden_trabajo")));
        $this->load->view('Reportes/Informe_cumplimiento/adicionales/validacion_arranque', $data);
    }
    public function get_contenido_validacion_arranque2()
    {
        # code...
        $data['contenido'] = $this->General_model->getTable("contenido_validacion_arranque", array("id_validacion" => $this->input->post("id_validacion")));
        $this->load->view('Reportes/Informe_cumplimiento/adicionales/contenido_validacion',$data);
    }
}
