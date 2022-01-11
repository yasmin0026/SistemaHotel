<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImprevistoController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ImprevistoModel');
		$this->load->model('PersonalizarModel');
		$this->load->model('PermisosModel');
	}

	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Imprevisto/imprevisto',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['Imprevisto'] = $this->ImprevistoModel->getImprevistoAll();
			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function newImprevisto()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Imprevisto/formImprevisto',
				'data_view' => array()
			);

			$allPagina = $this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;


			$data['habitacion'] = $this->ImprevistoModel->getHabitacion();
			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insertImprevisto()
	{
		$datos = array(
			'tipo_imprevisto' => $this->input->post('tipo_imprevisto'),
			'id_habitacion' => $this->input->post('id_habitacion'),
			'fecha_imprevisto' => $this->input->post('fecha_imprevisto'),
			'descripcion' => $this->input->post('descripcion'),
			'compensacion' => $this->input->post('compensacion')
		);

		$this->ImprevistoModel->insertImprevisto($datos);
		$this->index();
		$this->session->set_flashdata('insert','¡Registro insertado con exito!');
		redirect('ImprevistoController/');
	}


	public function editImprevisto($id_imprevisto)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Imprevisto/formImprevisto',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['actualizar'] = $this->ImprevistoModel->getImprevistoEdit($id_imprevisto);
			$data['habitacion'] = $this->ImprevistoModel->getHabitacion();
			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function updateImprevisto()
	{
		$datos = array(
			'tipo_imprevisto' => $this->input->post('tipo_imprevisto'),
			'id_habitacion' => $this->input->post('id_habitacion'),
			'fecha_imprevisto' => $this->input->post('fecha_imprevisto'),
			'descripcion' => $this->input->post('descripcion'),
			'compensacion' => $this->input->post('compensacion'),
			'id_imprevisto' => $this->input->post('id_imprevisto')
		);

		$this->ImprevistoModel->updateImprevisto($datos);
		$this->index();
		$this->session->set_flashdata('update','¡Registro modificado con exito! '.$datos['tipo_imprevisto']);
		redirect('ImprevistoController/');
	}

	public function deleteImprevisto($id_imprevisto)
	{
		$this->ImprevistoModel->deleteImprevisto($id_imprevisto);
		$this->session->set_flashdata('delete','¡Registro fue borrado!');
		$this->index();
		redirect('ImprevistoController/');
	}
	
}