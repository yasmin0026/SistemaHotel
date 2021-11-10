<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('PersonalizarModel');
		$this->load->model('Roles');
		$this->load->model('Usuarios');
		$this->load->model('PermisosModel');
	} 


	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Usuario/usuario',
				'data_view' =>array()
			);

			$allPagina = $this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$roles = $this->Roles->getRoles();
			$data['roles'] = $roles;

			$usuarios = $this->Usuarios->getUsuarios();
			$data['usuarios'] = $usuarios;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function newUsuario(){
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Usuario/dynamic-usuario',
				'data_view' =>array()
			);

			$allPagina = $this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$roles = $this->Roles->getRoles();
			$data['roles'] = $roles;


			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function insertUsuario(){
		$datos = array(
			'nombres_usuario' => $this->input->post('nombres_usuario'),
			'apellido_usuario' => $this->input->post('apellido_usuario'),
			'nick_usuario' => $this->input->post('nick_usuario'),
			'contrasena_usuario' => $this->input->post('contrasena_usuario'),
			'recovery_pregunta' => base64_encode($this->input->post('recovery_pregunta')),
            'recovery_respuesta' => base64_encode($this->input->post('recovery_respuesta')),
			'id_rol' => $this->input->post('id_rol'),
		);
		$this->Usuarios->insertUsuario($datos);
		$this->index();
		$this->session->set_flashdata('insert', '¡Registro insertado con exito!');
		redirect('UsuarioController/');
	}
	
	public function edit($id_usuario){
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Usuario/dynamic-usuario',
				'data_view' =>array()
			);

			$allPagina = $this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$roles = $this->Roles->getRoles();
			$data['roles'] = $roles;

			$data['actualizar'] = $this->Usuarios->getUsuario($id_usuario);

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function updateUsuario(){
		$datos = array(
			'id_usuario' => $this->input->post('id_usuario'),
			'nombres_usuario' => $this->input->post('nombres_usuario'),
			'apellido_usuario' => $this->input->post('apellido_usuario'),
			'nick_usuario' => $this->input->post('nick_usuario'),
			'contrasena_usuario' => $this->input->post('contrasena_usuario'),
			'recovery_pregunta' => base64_encode($this->input->post('recovery_pregunta')),
            'recovery_respuesta' => base64_encode($this->input->post('recovery_respuesta')),
			'id_rol' => $this->input->post('id_rol'),
		);
		$this->Usuarios->updateUsuario($datos);
		$this->index();
		$this->session->set_flashdata('update','¡Registro modificado con exito!'.$datos['nombres_usuario']);
		redirect('UsuarioController/');
	}

	public function delete($id_usuario){

		if($this->session->userdata('id_usuario') == $id_usuario){
			
			$this->session->set_flashdata('delete','¡No se puede eliminar su usuario!');

		}else{

			$this->Usuarios->deleteUsuario($id_usuario);
			$this->session->set_flashdata('delete','¡Registro fue borrado!');
			$this->index();
			redirect('UsuarioController/');

		}
		redirect('UsuarioController/');

	}



}
