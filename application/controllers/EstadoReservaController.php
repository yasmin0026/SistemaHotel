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

			$estaReserv = $this->EstadoReservaModel->getEstadoReserv();
			$data['reserv']= $estaReserv;


			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function addEstadoResrv(){

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'estadoReserva/dynamic-estadoReserva',
				'data_view' => array()
			);
			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;



			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}

	}

	public function insertEstadoReserva(){
		$data= array(
			'estado_reserva'=> $this->input->post('estado_reserva')
		);

		$this->EstadoReservaModel->insertR($data);
		$this->index();
		$this->session->set_flashdata('insert','¡Registro insertado con exito!');
		redirect('EstadoReservaController/');

	}

	public function edit($id_estado_reserva){
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'estadoReserva/dynamic-estadoReserva',
				'data_view' => array()
			);
			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;


			$data['edit']=$this->EstadoReservaModel->get($id_estado_reserva);

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}

	}

	public function update(){
		$data= array(
			'id_estado_reserva'=> $this->input->post('id_estado_reserva'),
			'estado_reserva'=> $this->input->post('estado_reserva')
		);
		$this->EstadoReservaModel->updateEstadoReserv($data);
		$this->index();
		$this->session->set_flashdata('insert','¡Registro modificado con exito!'.$data['estado_reserva']);
		redirect('EstadoReservaController/');
	}

	public function delete($id_estado_reserva){
		$data = $this->EstadoReservaModel->getEstadoReserva();
		$info;
		foreach($data as $d){
			$info = $d->id_estado_reserva;
		}

		if ($info === $id_estado_reserva) {
			$this->session->set_flashdata('delete','¡No se puede eliminar!, una reserva esta usando este estado');
			$this->index();
		}else{

			$this->EstadoReservaModel->deleteE($id_estado_reserva);
			$this->session->set_flashdata('delete','¡Registro fue borrado!');
			$this->index();
			redirect('EstadoReservaController/');
		}

		redirect('EstadoReservaController/');
	}

	



	
}