<?php

use Dompdf\Dompdf;
use Dompdf\Options;
use FontLib\Table\Type\post;
use phpDocumentor\Reflection\Types\This;
use SebastianBergmann\CodeUnit\CodeUnit;

defined('BASEPATH') or exit('No direct script access allowed');
include(APPPATH . "controllers/Padre.php");

class Consulta_general extends Padre
{

	/**
	 * Consulta_general Page for this controller made by Sergio Lopez 16/06/22.
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
		$this->load->model("Consulta_general_reportes_m");
	}
	public function index()
	{
		$data["namepage"] = "Reportes - Consulta General";
		$data["title"] = "<p style='font-size:14pt;'>Consulta De Reporte General<p>";

		$data["modulos"] = $this->Navbar_m->getModulos();
		$data["zona"] = $this->Consulta_general_reportes_m->get_zona_by_user();
		$zona = ($data["zona"] != null ? $data["zona"][0]->zona : "");

		$data["maquinas"] = $this->Consulta_general_reportes_m->get_all_maquinas($zona);

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar', $data);
		$this->load->view('Reportes/consulta_general/index_consulta_general', $data);

		$this->load->view('layout/footer');
	}
	public function get_all_reportes()
	{
		$data['data'] = $this->Consulta_general_reportes_m->mostrar_reportes_en_tabla($this->input->post("maquina"), $this->input->post("tipo"));
		echo json_encode($data);
	}

	public function filtrado_tablas_maquinas()
	{
		$arrayDetalle = [];
		foreach ($_POST["detalle"] as $key => $value) {
			if ($value != "") {
				$arrayDetalle[$key] = $value;
			}
		}
		$data['data'] = $this->Consulta_general_reportes_m->mostrar_reportes_en_tabla($_POST["data"]["maquina"], $_POST["data"]["tipo"], $arrayDetalle);
		echo json_encode($data);
	}

	//REPORTE EN ESPECIFICO (DE AQUI PARA ABAJO ES SOLAMENTE PARA REPORTES)
	public function reporte($id_reporte = null, $tipo = null, $maquina = null, $fila = null)
	{
		$data["namepage"] = "Reportes - Detalles";
		$data["title"] = "Maquina " . $maquina . "";
		$data["modulos"] = $this->Navbar_m->getModulos();
		$data["objetios_recibidos"] = array("id_reporte" => $id_reporte, "tipo_maquina" => $tipo, "maquina" => $maquina, "id_fila" => $fila);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar', $data);

		if ($tipo == "imprentas") {

			$data["operaciones"]     		= $this->General_model->getTable("operaciones_impresoras");
			$data["validacion_de_arranque"] = $this->General_model->getTable("validacion_arranque", array("id_reporte" => $id_reporte));
			$data["codigo_reporte"] 		= $this->General_model->getTable("codigo_reporte", array("id_codigo" => $id_reporte));
			$data['before_after'] 			= $this->Consulta_general_reportes_m->mostrar_reportes_en_tabla($maquina, $tipo, array("codigo_equipo" => $maquina));
			$data["auxiliares"] 			= $this->General_model->getTable("operadores", array("zona" => "imprentas"));
			$data["auxiliar_por_reporte"] 	= $this->Consulta_general_reportes_m->auxiliar_por_reporte($id_reporte, "imprentas");
			$data["control_de_trabajo"] 	= $this->Consulta_general_reportes_m->control_de_trabajo(array("id_reporte_s" => $id_reporte, "maquinas_s" => $maquina,), "IMPRENTAS");
			$this->load->view('Reportes/consulta_general/encabezado_rerportes', $data);
			$this->load->view('Reportes/consulta_general/reporte_impresora/reporte_impresora_index', $data);

		} else if ($tipo == "troqueladoras") {

			$data["operaciones"] 			= $this->General_model->getTable("operaciones_troqueladoras");
			$data["codigo_reporte"] 		= $this->General_model->getTable("codigo_reporte", array("id_codigo" => $id_reporte));
			$data['before_after'] 			= $this->Consulta_general_reportes_m->mostrar_reportes_en_tabla($maquina, $tipo, array("codigo_equipo" => $maquina));
			$data["auxiliares"] 			= $this->General_model->getTable("operadores", array("zona" => "troqueladoras"));
			$data["auxiliar_por_reporte"] 	= $this->Consulta_general_reportes_m->auxiliar_por_reporte($id_reporte, "troqueladoras");
			$data["control_de_trabajo"] 	= $this->Consulta_general_reportes_m->control_de_trabajo(array("id_reporte_s" => $id_reporte, "maquinas_s" => $maquina,), "TROQUELADORAS");
			$this->load->view('Reportes/consulta_general/encabezado_rerportes', $data);
			$this->load->view('Reportes/consulta_general/reporte_troqueladora/reporte_troqueladora_index', $data);

		} else if ($tipo == "pegadoras") {

			$data["operaciones"] 			= $this->General_model->getTable("operaciones_troqueladoras");
			$data["cierres"] 				= $this->General_model->getTable("cierres");
			$data["codigo_reporte"] 		= $this->General_model->getTable("codigo_reporte", array("id_codigo" => $id_reporte));
			$data['before_after'] 			= $this->Consulta_general_reportes_m->mostrar_reportes_en_tabla($maquina, $tipo, array("codigo_equipo" => $maquina));
			$data["auxiliares"] 			= $this->General_model->getTable("operadores", array("zona" => "pegadoras"));
			$data["auxiliar_por_reporte"] 	= $this->Consulta_general_reportes_m->auxiliar_por_reporte($id_reporte, "pegadoras");
			$data["control_de_trabajo"] 	= $this->Consulta_general_reportes_m->control_de_trabajo(array("id_reporte_s" => $id_reporte, "maquinas_s" => $maquina,), "PEGADORAS");

			$this->load->view('Reportes/consulta_general/encabezado_rerportes', $data);
			$this->load->view('Reportes/consulta_general/reporte_pegadora/reporte_pegadora_index', $data);

		} else if ($tipo == "flexografia") {

			$data["operaciones"] 			= $this->General_model->getTable("operaciones_flexografia");
			$data["material_flexografia"] 	= $this->General_model->getTable("material_flexografia");
			$data["codigo_reporte"] 		= $this->General_model->getTable("codigo_reporte", array("id_codigo" => $id_reporte));
			$data['before_after'] 			= $this->Consulta_general_reportes_m->mostrar_reportes_en_tabla($maquina, $tipo, array("codigo_equipo" => $maquina));
			$data["auxiliares"] 			= $this->General_model->getTable("operadores", array("zona" => "flexografia"));
			$data["auxiliar_por_reporte"] 	= $this->Consulta_general_reportes_m->auxiliar_por_reporte($id_reporte, "pegadoras");
			$data["control_de_trabajo"] 	= $this->Consulta_general_reportes_m->control_de_trabajo(array("id_reporte_s" => $id_reporte, "maquinas_s" => $maquina,), "FLEXOGRAFIA");

			$this->load->view('Reportes/consulta_general/encabezado_rerportes', $data);
			$this->load->view('Reportes/consulta_general/reporte_flexografia/reporte_flexografia_index', $data);
			
		}

		$this->load->view('layout/footer');
	}

	public function get_trello()
	{
		$trello = $this->General_model->getTable("trello", array("codigo_maquina" => $this->input->post("maquina")));
		echo json_encode($trello);
	}
	public function informacion_reporte_detalle() //informacion general del header del reporte, muestra horas trabajadas y filas a agregar
	{
		$informacion_reporte = $this->Consulta_general_reportes_m->informacion_reporte($this->input->post("tipo_maquina"), array("reporte" => $this->input->post("id_reporter")));
		echo json_encode($informacion_reporte);
	}
	public function agregar__filas()
	{
		//esto no tendria que ser asi pero ni modo asi lo dejaron
		$ultima_fila_de_reprote = $this->General_model->getTable($this->input->post("tabla"), array("id_reporte" => $this->input->post("reporte")));
		$ultimo_id = 0;
		foreach ($ultima_fila_de_reprote as $key => $value) {
			if ($key + 1 == count($ultima_fila_de_reprote)) {
				$ultimo_id = $value->ID;
			}
		}
		$now = new DateTime();
		$date = $now->format('Y-m-d');
		$date_time = $now->format('Y-m-d H:i:s');
		$data = array(
			"ID" 					=> $ultimo_id + 1,
			"fecha" 				=> $date,
			"tipo_recurso" 			=> "MQ",
			"codigo_operador" 		=> $this->session->userdata("codigo_operador"),
			"username" 				=> $this->session->userdata("username"),
			"codigo_equipo" 		=> $this->input->post("maquina"),
			"id_reporte" 			=> $this->input->post("reporte"),
			"id_padre" 				=> "0",
			"fecha_creacion_fila" 	=> $date_time,
		);
		$data["reporte_impresora"] 	= $this->General_model->setTable($this->input->post("tabla"), $data);
		$data["operaciones"] 		= $this->General_model->getTable("operaciones_impresoras");
		$data["auxiliares"] 		= $this->General_model->getTable("operadores", array("zona" => "imprentas"));

		$this->load->view('Reportes/consulta_general/reporte_impresora/adicionales/filas', $data);
	}

	public function actualizar_campos_de_fila()//actualizar campos individuales (es decir campos especificos de una fila)
	{
		$res = $this->Consulta_general_reportes_m->acutalizar_detalle_reporte(
			array($this->input->post("campo") => $this->input->post("value")), //SE LE ENVIA EL CAMPO Y EL VALOR A ENVIAR PARA MODIFICAR
			array("ID" => $this->input->post("id"), "id_reporte" => $this->input->post("codigo_reporte")), //SE ENVIA EL WHERE 
			$this->input->post("familia") //EL TIPO DE FAMILIA A MODIFICAR
		);
		echo $res;
	}
	public function actualizar_todos_los_aux()
	{
		$res = $this->Consulta_general_reportes_m->acutalizar_detalle_reporte(
			array($this->input->post("campo") => $this->input->post("value")), //SE LE ENVIA EL CAMPO Y EL VALOR A ENVIAR PARA MODIFICAR
			array("id_reporte" => $this->input->post("codigo_reporte")), //SE ENVIA EL WHERE 
			$this->input->post("familia") //EL TIPO DE FAMILIA A MODIFICAR
		);
		echo $res;
	}
	public function update_velnom_velefect()
	{ //actualizar la tabla codigigo reporte en los campos de velocidades 
		$res = $this->General_model->updateTable("codigo_reporte", array($this->input->post("campo") => $this->input->post("value")), array("id_codigo" => $this->input->post("id")));
		echo $res;
	}
	public function acutlizar_contenido_validacion_arranque()
	{ //actualizamos el contenido de validacion de arranque, cuando haga un cambio se catualizara el campo, se le envian los datos necesarios para actualizar
		$res = $this->General_model->updateTable("contenido_validacion_arranque", array($this->input->post("campo") => $this->input->post("value")), array("id" => $this->input->post("id")));
		echo $res;
	}
	public function actualizar_fila()
	{ //actualizar los campos al ingresar el id trello (en este caso son 4 campos [id_trello,descripcion_trello,lista_trello,producto])
		$data = array(
			"lista_trello" 			=> $this->input->post("lista_trello"),
			"descripcion_trello" 	=> $this->input->post("descripcion_trello"),
			"producto" 				=> $this->input->post("producto"),
			"cliente" 				=> $this->input->post("cliente"),
			"ot_trello" 			=> $this->input->post("ot_trello"),
			"id_ficha_trello" 		=> $this->input->post("id_ficha_trello"),
		);
		$res = $this->Consulta_general_reportes_m->acutalizar_detalle_reporte(
			$data, //SE LE ENVIA EL CAMPO Y EL VALOR A ENVIAR PARA MODIFICAR
			array("ID" => $this->input->post("ID"), "id_reporte" => $this->input->post("id_reporte")), //SE ENVIA EL WHERE 
			$this->input->post("familia") //EL TIPO DE FAMILIA A MODIFICAR
		);
	}
	public function insertar_reporte()
	{ //se agrega un nuevo reporte, todo dependera de lo que le manden desde js, el objeto contendra el tipo de reporte y asi se aran las inserciones
		$now = new DateTime();
		$date = $now->format('Y-m-d');
		$date_time = $now->format('Y-m-d H:i:s');

		$codigo_reporte = $this->Consulta_general_reportes_m->generar_codigo_reporte($_POST["maquina"]);
		date_default_timezone_set('America/El_Salvador');
		$time = date('G:i:s', time());
		$datos_codigo_reporte = array(
			"id_codigo" 		=> $codigo_reporte,
			"maquina" 			=> $_POST["maquina"],
			"codigo_operador" 	=> $this->session->userdata("codigo_operador"),
			"username" 			=> $this->session->userdata("username"),
			"estado" 			=> "Abierto",
			"tiempo" 			=> $time,
			"fecha_creacion" 	=> $date,
		);
		$this->General_model->setTable("codigo_reporte", $datos_codigo_reporte);

		for ($i = 1; $i <= 10; $i++) { //agregando las filas al reporte, poner en el for la cantidad de filas a agregar por default
			$datos_reporte = array(
				"ID" 					=> $i,
				"fecha" 				=> $date,
				"tipo_recurso" 			=> "MQ",
				"codigo_operador" 		=> $this->session->userdata("codigo_operador"),
				"username" 				=> $this->session->userdata("username"),
				"codigo_equipo" 		=> $this->input->post("maquina"),
				"id_reporte" 			=> $codigo_reporte,
				"codigo_auxiliar1" 		=> NULL,
				"fecha_creacion_fila" 	=> $date_time);
				
			if ($this->input->post("tipo") == "imprentas") {
				$this->General_model->setTable("reportes_impresoras", $datos_reporte);
			} else if ($this->input->post("tipo") == "troqueladoras") {
				$this->General_model->setTable("reportes_troqueladoras", $datos_reporte);
			} else if ($this->input->post("tipo") == "pegadoras") {
				$this->General_model->setTable("reportes_pegadoras", $datos_reporte);
			} else if ($this->input->post("tipo") == "flexografia") {
				$this->General_model->setTable("reportes_flexografia", $datos_reporte);
			}
		}
		echo "" . $codigo_reporte . "/" . $_POST["tipo"] . "/" . $_POST["maquina"] . ""; //en el js se toma el valor retornado y con esto puedes redireccionar 
		//el formato que se retorna es => CODIGO_REPORTE/TIPO_MAQUINA/MAQUINA con esto redirecciona a function reporte(); con los parametros enviado
	}
	public function mostrar_agregar_validacion_de_arranque()
	{ //mostrando o insertando validaciones de arranque
		$getValidacionArranque  =  $this->General_model->getTable("validacion_arranque", array("id_fila" => $this->input->post("id_fila"), "id_reporte" => $this->input->post("id_reporte")));
		if (empty($getValidacionArranque)) { //si viene vacio $getValidacionArranque hacemos insert en validacion de  arranque con su contenido
			$now = new DateTime();
			$date = $now->format('Y-m-d');
			$data = array(
				"fecha" 		=> $date,
				"cliente" 		=> $this->input->post("cliente"),
				"producto" 		=> $this->input->post("producto"), // por el momento se le pone un codigo quedamos mientras se investiga 
				"maquina"		=> $this->input->post("maquina"),
				"ot" 			=>  $this->input->post("ot"),
				"turno" 		=> "dia",
				"operador" 		=> $this->session->userdata("nombre_operador"),
				"id_fila" 		=> $this->input->post("id_fila"),
				"id_reporte" 	=> $this->input->post("id_reporte"),
			);
			$res = $this->General_model->setTable("validacion_arranque", $data);
			for ($i = 1; $i <= 6; $i++) {
				$contenido_val_arranque = array(
					"id_contenido"  => $i,
					"id_validacion" => $res
				);
				$this->General_model->setTable("contenido_validacion_arranque", $contenido_val_arranque);
			}
			$data["contenido_validacion_arranque"] = $this->General_model->getTable("contenido_validacion_arranque", array("id_validacion" => $res));
			$this->load->view('Reportes/consulta_general/reporte_impresora/adicionales/contenido_validacion_arranque', $data);
		} else { //si trae un valor $getValidacionArranque se pintaran los datos por medio de javascript
			$data["contenido_validacion_arranque"] = $this->General_model->getTable("contenido_validacion_arranque", array("id_validacion" => $this->input->post("id_validacion")));
			$this->load->view('Reportes/consulta_general/reporte_impresora/adicionales/contenido_validacion_arranque', $data);
		}
	}
	public function mostrar_contenido_validacion_de_arranque()
	{
		$contenido_validacion_arranque = $this->General_model->getTable("contenido_validacion_arranque", array("id_validacion" => $_POST["id_fila"]));
		echo json_encode($contenido_validacion_arranque);
	}

	public function estado_del_reporte()
	{
		$res = $this->General_model->getTable("codigo_reporte", array("id_codigo" => $this->input->post("id_reporter")));
		echo json_encode($res);
	}
	public function mostrar_validacion_arranque()
	{
		$res = $this->General_model->getTable("validacion_arranque", array("id_fila" => $this->input->post("id_fila"), "id_reporte" => $this->input->post("id_reporte")));
		echo json_encode($res);
	}

	public function actualizar_validacion_arranque()
	{
		$res = $this->General_model->updateTable("validacion_arranque", array($this->input->post("campo") => $this->input->post("value")), array("id" => $this->input->post("id")));
		echo $res;
	}
	public function actualizar_codigo_reprote()
	{
		$res = $this->General_model->updateTable("codigo_reporte", array($this->input->post("campo") => $this->input->post("value")), array("id_codigo" => $this->input->post("id")));
		echo $res;
	}

	public function eliminar_filas_de_reportes()
	{
		$res = $this->General_model->deleteTable($this->input->post("tabla"), array("ID" => $this->input->post("id_fila"), "id_reporte" => $this->input->post("id_reporte")));
		echo $res;
	}
	public function cambiar_estado_reporte()
	{ //metodo para cambiar estado o agregar MO al reporte
		$this->General_model->updateTable("codigo_reporte", array("estado" =>  $this->input->post("estado")), array("id_codigo" => $this->input->post("reporte")));

		//SI EL ESTADO BIENE PARA CERRAR AGREGANDO LAS MO
		if ($this->input->post("estado") == "Cerrado") {
			$res = $this->General_model->getTable($this->input->post("tabla"), array("id_reporte" => $this->input->post("reporte"), "tipo_recurso" => "MQ"));



			// se hace este if para agregar las MO y AUX, algunas reportes tiene mas de un auxiliar 
			//TODO: ENCONTRAR FORMA DE OPTIMIZAR ESTE CODIGO
			if ($this->input->post("tabla") == "reportes_pegadoras") {
				foreach ($res as $key => $value) {
					if (empty($res[$key]->codigo_operacion)) { //ELIMINANDO CADA FILA QUE NO TENGA CODIGO DE OPERACION, QUIERE DECIR QUE NO SE HIZO NADA
						$this->General_model->deleteTable($this->input->post("tabla"), array("ID" => $res[$key]->ID));
					} else {
						$res[$key]->MO = "OP";
						$res[$key]->tipo_recurso = "MO";
						if (!empty($res[$key]->codigo_auxiliar1)) {
							$res[$key]->MO = "AUX";
							$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
							$res[$key]->MO = "OP";
						}
						if (!empty($res[$key]->codigo_auxiliar2)) {
							$res[$key]->MO = "AUX";
							$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
							$res[$key]->MO = "OP";
						}
						if (!empty($res[$key]->codigo_auxiliar3)) {
							$res[$key]->MO = "AUX";
							$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
							$res[$key]->MO = "OP";
						}
						if (!empty($res[$key]->codigo_auxiliar4)) {
							$res[$key]->MO = "AUX";
							$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
							$res[$key]->MO = "OP";
						}
						$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
					}
				}
			} else if ($this->input->post("tabla") == "reportes_flexografia") {
				foreach ($res as $key => $value) {
					if (empty($res[$key]->codigo_operacion)) { //ELIMINANDO CADA FILA QUE NO TENGA CODIGO DE OPERACION, QUIERE DECIR QUE NO SE HIZO NADA
						$this->General_model->deleteTable($this->input->post("tabla"), array("ID" => $res[$key]->ID));
					} else {
						$res[$key]->MO = "OP";
						$res[$key]->tipo_recurso = "MO";
						if (!empty($res[$key]->codigo_auxiliar1)) {
							$res[$key]->MO = "AUX";
							$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
							$res[$key]->MO = "OP";
						}
						if (!empty($res[$key]->codigo_auxiliar2)) {
							$res[$key]->MO = "AUX";
							$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
							$res[$key]->MO = "OP";
						}
						$res[$key]->MO = "AUX";
						$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
						$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
						$res[$key]->MO = "OP";

						$this->General_model->setTable($this->input->post("tabla"), $res[$key]); //TODO: CREAR DOS FILAS DE AUX POR DEFECTO
					}
				}
			} else { //SOLO IMPRESORA Y TROQUELADORA
				foreach ($res as $key => $value) {
					if (empty($res[$key]->codigo_operacion)) { //ELIMINANDO CADA FILA QUE NO TENGA CODIGO DE OPERACION, QUIERE DECIR QUE NO SE HIZO NADA
						$this->General_model->deleteTable($this->input->post("tabla"), array("ID" => $res[$key]->ID));
					} else {
						$res[$key]->MO = "OP";
						$res[$key]->tipo_recurso = "MO";
						if (!empty($res[$key]->codigo_auxiliar1)) {
							$res[$key]->MO = "AUX";
							$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
							$res[$key]->MO = "OP";
						}

						$this->General_model->setTable($this->input->post("tabla"), $res[$key]);
					}
				}
			}
		}
	}
}
