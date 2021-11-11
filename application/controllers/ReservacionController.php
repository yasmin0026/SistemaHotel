<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReservacionController extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('ReservacionModel');
		$this->load->model('PersonalizarModel');
		$this->load->model('PermisosModel');
	}
	
	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema de Hotel',
				'view' => 'reserva/reserva',
				'data_view' => array()
			);
			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['habi'] = $this->ReservacionModel->selecHab();
		//select estado de pago
			$data['pago'] = $this->ReservacionModel->selecPago();
		//select estado de reserva
			$data['esR'] = $this->ReservacionModel->selecEstadoR();

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}

	}



	public function reservacion(){
		
		$events = $this->ReservacionModel->allReserv();
		echo json_encode($events);
	}

	public function insertReserv(){
		if($this->input->post('title')){
			$data= array(
				'id_habitacion'  => $this->input->post('id_habitacion'),
				'title'  => $this->input->post('title'),
				'color'  => $this->input->post('color'),
				'start'  => $this->input->post('start'),
				'end'  => $this->input->post('end'),
				'id_estado_reserva'  => $this->input->post('id_estado_reserva'),
				'nombre_cliente'  => $this->input->post('nombre_cliente'),
				'id_estado_pago'  => $this->input->post('id_estado_pago'),
			);

			$this->ReservacionModel->insert_Reserv($data);
			$this->index();

		}	
		
		redirect('ReservacionController/');
	}

	public function UpdateReserv(){
		$param['id']=$this->input->post('id');
		$param['start']=$this->input->post('start');
		$param['end']=$this->input->post('end');

		$data = $this->ReservacionModel->Update($param);
		echo json_encode($data);
	}

	public function DeleteReserv(){
		$id = $this->input->post('id');
		$data = $this->ReservacionModel->Delete($id);
		echo $data;
		
	}


}