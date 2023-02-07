<?php

class Padre extends CI_Controller {

	/**
	 * Padre Page for this controller.
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
        $this->load->driver("cache", array("adapter" => "apc", "backup" => "file"));
        //importando librerias
        if ($this->session) {//validando que exista una sesion
            $logged = $this->session->userdata("logged_in");
            if ($logged == false) {
                header("Location: " . site_url("Login"));
            }
        } else {//si no es asi redireccionamos al login
            header("Location: " . site_url("Login"));
        }
    }


	
}
