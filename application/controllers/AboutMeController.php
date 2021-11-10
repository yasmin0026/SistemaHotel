<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutMeController extends CI_Controller {

    public function __construct(){
		parent::__construct();
        $this->load->model('PersonalizarModel');
        $this->load->model('Roles');
		$this->load->model('Profile');
	}

	public function myProfile($id)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'myprofile/profile',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

            $roles = $this->Roles->getRoles();
			$data['roles'] = $roles;

			$data['actualizar'] = $this->Profile->getUsuario($id);

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

    public function settingsUser($id)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'myprofile/dynamic_profile',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

            $roles = $this->Roles->getRoles();
			$data['roles'] = $roles;

			$data['actualizar'] = $this->Profile->getUsuario($id);

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

    public function updateMyInfo(){
		$datos = array(
			'id_usuario' => $this->input->post('id_usuario'),
			'nombres_usuario' => $this->input->post('nombres_usuario'),
			'apellido_usuario' => $this->input->post('apellido_usuario'),
			'nick_usuario' => $this->input->post('nick_usuario'),
			'contrasena_usuario' => $this->input->post('contrasena_usuario'),
            'recovery_pregunta' => base64_encode($this->input->post('recovery_pregunta')),
            'recovery_respuesta' => base64_encode($this->input->post('recovery_respuesta')),
            'id_rol' => $this->input->post('id_rol')
		);
		$this->Profile->updateInformation($datos);
		$this->myProfile($datos['id_usuario']);
		$this->session->set_flashdata('update',$datos["nombres_usuario"].' ¡Tu información se actualizo con exito!');
		redirect('AboutMeController/myProfile/'.$datos['id_usuario']);
	}

}