<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadoPagoController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('EstadoPagoModel');
		$this->load->model('PersonalizarModel');
		$this->load->model('PermisosModel');
	}

	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'estadoPago/estadoPago',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$estadoPago = $this->EstadoPagoModel->getEstadoPago();
			$data['pag']= $estadoPago;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function addEstadoPago(){

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'estadoPago/dynamic-estadoPago',
				'data_view' => array()
			);
			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;



			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}

	}

	public function insertEstadoPago(){
		$data= array(
			'estado_pago'=> $this->input->post('estado_pago')
		);

		$this->EstadoPagoModel->insert($data);
		$this->index();
		$this->session->set_flashdata('insert','¡Registro insertado con exito!');
		redirect('EstadoPagoController/');
	}

	public function getDatos($id_estado_pago){
		if($this->session->userdata('is_logued_in') === TRUE){
			$data =  array(
				'page_title'=>'Sistema Hotelero',
				'view' => 'estadoPago/dynamic-estadoPago',
				'data_view'=>array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['actualizarP'] = $this->EstadoPagoModel->getDataT($id_estado_pago);

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}

	}

	public function updateEstadoPago(){
		$data= array(
			'id_estado_pago'=> $this->input->post('id_estado_pago'),
			'estado_pago'=> $this->input->post('estado_pago')
		);

		$this->EstadoPagoModel->Editar($data);
		$this->index();
		$this->session->set_flashdata('update','¡Registro modficado con exito!'.$data['estado_pago']);
		redirect('EstadoPagoController/');
	}

	public function deleteEstadoPago($id_estado_pago){

		$data = $this->EstadoPagoModel->getEstadoPago2();
		$info;
		foreach($data as $d){
			$info = $d->id_estado_pago;
		}

		if ($info === $id_estado_pago) {

			$this->session->set_flashdata('delete','¡No se puede eliminar!, una reserva esta usando este estado');
			$this->index();

			redirect('EstadoPagoController/');

		}else{
			$this->EstadoPagoModel->delete($id_estado_pago);
			$this->session->set_flashdata('delete','¡Registro fue borrado!');
			$this->index();
			redirect('EstadoPagoController/');	
		}


		redirect('EstadoPagoController/');	
	}

}