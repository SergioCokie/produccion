<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	/**
	 * Login Page for this controller made by Sergio Lopez 14/06/22.
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
		$this->load->model("Login_m");
	}
	public function index()
	{
		$logged = $this->session->has_userdata("logged_in");
		if ($logged) {
			header("Location: " . site_url(" "));
		} else {
			$this->load->view("Login/new_login");
		}
	}
	public function Login()
	{
		$user = $this->input->post("usuario");
		$pass = $this->input->post("contra");
		$res = $this->Login_m->login($user, $pass);
		if ($res->estado) {
			header("Location: " . site_url(" "));
		} else {
			header("Location: " . site_url(" "));
		}
	
	}

	public function logOut()
	{
		$this->session->sess_destroy();
		session_write_close();
		header("Location: " . site_url(" "));
	}
}
