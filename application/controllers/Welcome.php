<?php
defined('BASEPATH') or exit('No direct script access allowed');
include(APPPATH . "controllers/Padre.php");

class Welcome extends Padre
{

	/**
	 * Welcome Page for this controller made by Sergio Lopez 14/06/22.
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

	}
	public function index()
	{
		$data["namepage"] = "Producción - Inicio";
		$data["title"] = "Producción";

		$data["modulos"] = $this->Navbar_m->getModulos();

		$this->load->view('layout/header',$data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('layout/footer');
	}
	public function navbar()
	{
		$data = $this->General_model->getTable("autorizaciones", array("id_usuario" => $this->input->post("id_usuario")));
		echo json_encode($data);
	}
	public function sub_modulos()
	{
		# code...
		//print_r($_POST);
		 $data = $this->General_model->getTable("submodulos", array("id" => $this->input->post("id_submodulo")));
		echo json_encode($data); 

	}
}
