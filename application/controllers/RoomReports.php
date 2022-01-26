<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoomReports extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('RoomModel');
		$this->load->model('PersonalizarModel');
		$this->load->model('PermisosModel');
		$this->load->library('pdf');
	}

	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Clientes Frecuentes',
				'view' => 'room_report/view_details',
				'data_view' => array()
			);

			$inicio = $this->input->post('inicio');
			$fin  = $this->input->post('fin');
			$periodos = $this->input->post('periodos');

			if ($periodos == "saint") {
				$data['periodo'] = "Semana santa";
			} elseif ($periodos == "days") {
				$data['periodo'] = $inicio. " a ".$fin;
			}else {
				$data['periodo'] = "semanas desde el".$inicio. " a ".$fin;
			}

			$detalles = $this->RoomModel->rooms_details($inicio,$fin);
			$data['frecuentes'] = $detalles;

			$data['pd'] = $periodos;
			$data['ini'] = $inicio;
			$data['fn'] = $fin;
			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function RoomDetails()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'room_report/room_details',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$inicio = $this->input->post('inicio');
			$fin  = $this->input->post('fin');
			$periodos = $this->input->post('periodos');
			$id_habitacion = $this->input->post('id_habitacion');

			if ($periodos == "saint") {
				$data['periodo'] = "Semana santa";
			} elseif ($periodos == "days") {
				$data['periodo'] = $inicio. " a ".$fin;
			}else {
				$data['periodo'] = "semanas desde el".$inicio. " a ".$fin;
			}

			$data['pd'] = $periodos;
			$data['ini'] = $inicio;
			$data['fn'] = $fin;
			$data['id_habitacion'] = $id_habitacion;

			$detalles = $this->RoomModel->room_details($inicio,$fin,$id_habitacion);
			$data['frecuentes'] = $detalles;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function horaFecha()
	{
		$Object = new DateTime();
		$Object->setTimezone(new DateTimeZone('America/El_Salvador'));
		$fechaHora = $Object->format("d-m-Y_His");
		return $fechaHora;
	}

	public function Reporting()
	{
		$Object = new DateTime();
		$Object->setTimezone(new DateTimeZone('America/El_Salvador'));
		$DateAndTime = $Object->format("d-m-Y h:i:s a");

		if ($this->session->userdata('is_logued_in') === TRUE) {	

			ob_start();

			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'room_report/view_report',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$inicio = $this->input->post('inicio');
			$fin  = $this->input->post('fin');
			$periodos = $this->input->post('periodos');
			$id_habitacion = $this->input->post('id_habitacion');

			if ($periodos == "saint") {
				$data['periodo'] = "Semana santa";
			} elseif ($periodos == "days") {
				$data['periodo'] = $inicio. " a ".$fin;
			}else {
				$data['periodo'] = "semanas desde el".$inicio. " a ".$fin;
			}

			$data['pd'] = $periodos;
			$data['ini'] = $inicio;
			$data['fn'] = $fin;

			$detalles = $this->RoomModel->room_details($inicio,$fin,$id_habitacion);
			$data['frecuentes'] = $detalles;
			$room = $this->RoomModel->habitacion($id_habitacion);
			

			$this->load->view('room_report/view_report',$data);

			$this->pdf->setPaper ($paper_size);
			$this->pdf->setPaper('B4');
			$this->pdf->loadhtml(ob_get_clean());
			$this->pdf->render();
			$this->pdf->stream("report_room-".$room->nombre_habitacion."_fecha_".$inicio."_a_".$fin."-".$this->horaFecha(), array("Attachment"=>0));

			
		}else{
			$this->load->view('login');
		}
	}

	public function Reporting1()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	

			ob_start();

			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'room_report/view_report1',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$inicio = $this->input->post('inicio');
			$fin  = $this->input->post('fin');
			$periodos = $this->input->post('periodos');

			if ($periodos == "saint") {
				$data['periodo'] = "Semana santa";
			} elseif ($periodos == "days") {
				$data['periodo'] = $inicio. " a ".$fin;
			}else {
				$data['periodo'] = "semanas desde el".$inicio. " a ".$fin;
			}

			$data['pd'] = $periodos;
			$data['ini'] = $inicio;
			$data['fn'] = $fin;

			$detalles = $this->RoomModel->rooms_details($inicio,$fin);
			$data['frecuentes'] = $detalles;

			$this->load->view('room_report/view_report1',$data);

			$this->pdf->setPaper ($paper_size);
			$this->pdf->setPaper('B4');
			$this->pdf->loadhtml(ob_get_clean());
			$this->pdf->render();
			$this->pdf->stream("report_rooms".$this->horaFecha(), array("Attachment"=>0));

			
		}else{
			$this->load->view('login');
		}
	}



//EJEMPLO DE REPORTE

/*
	public function detalle_pdf()
	{

		ob_start();
		$habitacion = $this->ReportesModel->ClienteDetalles(2022,'Daniel Fernando');
		$data['habitacion'] = $habitacion;
		
		$this->load->view('reportes/pruebaR',$data);
		//$paper_size = array(0,0,360,756.00);
		//$this->pdf->setPaper ($paper_size); 
		$this->pdf->setPaper('letter');
		$this->pdf->loadhtml(ob_get_clean());
		$this->pdf->render();
		$this->pdf->stream("reporte", array("Attachment"=>0));

	}

*/
	




	
}