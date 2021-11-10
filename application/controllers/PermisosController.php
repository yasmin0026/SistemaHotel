<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosController extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('PersonalizarModel');
		$this->load->model('PermisosModel');
		$this->load->model('PermisosModel');
	}

	public function index()
	{	

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'permisos/permisos',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['menu'] = $this->PermisosModel->getMenu();
			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}

	}

 
	public function nuevoPermiso(){
		if($this->session->userdata('is_logued_in') === TRUE){
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'permisos/formPermiso',
				'data_view' => array()
			);
			$allPagina = $this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['menu'] = $this->PermisosModel->getMenu();

			$data['rol'] = $this->PermisosModel->getRol();
			$data['modulo'] = $this->PermisosModel->getModuloOp();
			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	
	public function insertPermiso(){
		$datos = array(
			'id_rol' => $this->input->post('id_rol'),
			'id_modulo' => $this->input->post('id_modulo'),
		);

		$this->PermisosModel->insertPermiso($datos);
		$this->index();
		$this->session->set_flashdata('insert','¡Registro insertado con exito!');
		redirect('PermisosController/');
	}

	public function editarPermiso($id_menu)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'permisos/formPermiso',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['rol'] = $this->PermisosModel->getRol();
			$data['modulo'] = $this->PermisosModel->getModuloOp();
			$data['update'] = $this->PermisosModel->getMenuAll($id_menu);

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function updatePermiso()
	{
		$datos = array(
			'id_rol' => $this->input->post('id_rol'),
			'id_modulo' => $this->input->post('id_modulo'),
			'id_menu' => $this->input->post('id_menu')
		);

		$this->PermisosModel->updatePermiso($datos);
		$this->index();
		$this->session->set_flashdata('update','¡Registro modificado con exito! ');
		redirect('PermisosController/');
	}

	public function deletePermiso($id_menu)
	{
		$this->PermisosModel->deletePermiso($id_menu);
		$this->session->set_flashdata('delete','¡Registro fue borrado!');
		$this->index();
		redirect('PermisosController/');
	}



}
