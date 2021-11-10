<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentoController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('DocumentoModel');
		$this->load->model('PersonalizarModel');
		$this->load->model('PermisosModel');
	}

	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'documento/documento',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['documento'] = $this->DocumentoModel->getDocumentoAll();
			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}


 	public function newDocumento()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'documento/formDocumento',
				'data_view' => array()
			);

			$allPagina = $this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insertDocumento()
	{
		$datos = array(
			'tipo_documento' => $this->input->post('tipo_documento')
		);

		$this->DocumentoModel->insertDocumento($datos);
		$this->index();
		$this->session->set_flashdata('insert','¡Registro insertado con exito!');
		redirect('DocumentoController/');
	}


	public function editDocumento($id_tipo_documento)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'documento/formDocumento',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['actualizar'] = $this->DocumentoModel->getDocumentoEdit($id_tipo_documento);

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function updateDocumento()
	{
		$datos = array(
			'id_tipo_documento' => $this->input->post('id_tipo_documento'),
			'tipo_documento' => $this->input->post('tipo_documento')
		);

		$this->DocumentoModel->updateDocumento($datos);
		$this->index();
		$this->session->set_flashdata('update','¡Registro modificado con exito! '.$datos['tipo_documento']);
		redirect('DocumentoController/');
	}

	public function deleteDocumento($id_tipo_documento)
	{
		$this->DocumentoModel->deleteDocumento($id_tipo_documento);
		$this->session->set_flashdata('delete','¡Registro fue borrado!');
		$this->index();
		redirect('DocumentoController/');
	}
	
}