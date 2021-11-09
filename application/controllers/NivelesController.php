<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NivelesController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('PersonalizarModel');
		$this->load->model('Niveles');
	}

	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Niveles/niveles',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$niveles = $this->Niveles->getNiveles();
			$data['niveles'] = $niveles;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function newNivel()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Niveles/dynamic-nivel',
				'data_view' => array()
			);

			$allPagina = $this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insertNivel()
	{
		$datos = array(
			'nombre_nivel' => $this->input->post('nombre_nivel')
		);

		$this->Niveles->insertNivel($datos);
		$this->index();
		$this->session->set_flashdata('insert','¡Registro insertado con exito!');
		redirect('NivelesController/');
	}


	public function edit($id_nivel)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Niveles/dynamic-nivel',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['actualizar'] = $this->Niveles->getNivel($id_nivel);

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function updateNivel()
	{
		$datos = array(
			'id_nivel' => $this->input->post('id_nivel'),
			'nombre_nivel' => $this->input->post('nombre_nivel')
		);

		$this->Niveles->updateNivel($datos);
		$this->index();
		$this->session->set_flashdata('update','¡Registro modificado con exito! '.$datos['nombre_nivel']);
		redirect('NivelesController/');
	}

	public function delete($id_nivel)
	{
		$this->Niveles->deleteNivel($id_nivel);
		$this->session->set_flashdata('delete','¡Registro fue borrado!');
		$this->index();
		redirect('NivelesController/');
	}
}