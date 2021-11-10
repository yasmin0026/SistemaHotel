<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadoReservaController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('EstadoReservaModel');
		$this->load->model('PersonalizarModel');
		$this->load->model('PermisosModel');
	}

	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'estadoReserva/estadoReserva',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}



	
}