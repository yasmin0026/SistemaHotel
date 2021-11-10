<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();

		$this->load->model('LoginModel');
		$this->load->model('PersonalizarModel');
		$this->load->model('PermisosModel');
		$this->load->library('form_validation');
		$this->load->helper('form');
		
	}

	public function index()
	{	
		$allPagina =$this->PersonalizarModel->getPersonal();
		$data['allPagina'] = $allPagina;
		$this->load->view('login', $data);
		
	}


	public function inicio()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema de Hotel',
				'view' => 'reserva/reserva',
				'data_view' => array()
			);
			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}



	}


	public function userAuth(){
		$usuario = $this->input->post('usuario',TRUE);
		$contraseña = $this->input->post('contrasenia',TRUE);
		$validacion = $this->LoginModel->getUser($usuario,$contraseña);

		if ($validacion->num_rows() > 0) {
			$data = $validacion->row_array();
			$id_usuario = $data['id_usuario'];
			$usuario = $data['nick_usuario'];
			$contraseña = $data['contrasena_usuario'];
			$id_rol = $data['id_rol'];
			$crear = $data['crear'];
			$actualizar = $data['actualizar'];
			$eliminar = $data['eliminar'];

			$session_data = array(
				'id_usuario' => $id_usuario,
				'nick_usuario' => $usuario,
				'contrasena_usuario' => $contraseña,
				'id_rol' => $id_rol,
				'crear' => $crear,
				'actualizar' => $actualizar,
				'eliminar' => $eliminar, 
				'is_logued_in' => TRUE 
			);

			$this->session->set_userdata($session_data);
			if ($id_rol === '1' ) {
				redirect('LoginController/inicio');
			}elseif($id_rol != '1'){
				redirect('LoginController/inicio');
			}

		}else{
			echo $this->session->set_flashdata('msg','Usuario o contraseña Incorrectos');
			redirect('LoginController');
		}



	}



	public function logout(){
		if ($this->session->userdata('is_logued_in') == TRUE ) {
			$this->session->sess_destroy();
			redirect(base_url().'LoginController');
		}


	} 

	
	
}
