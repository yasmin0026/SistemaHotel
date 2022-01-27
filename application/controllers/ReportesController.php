<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportesController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ReportesModel');
		$this->load->model('PersonalizarModel');
		$this->load->model('PermisosModel');
		$this->load->library('pdf');
	}

	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'reportes/reporte',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;
			$yearReportes =$this->ReportesModel->YearsReportes();
			$data['YR'] = $yearReportes;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function clienteFrecuente()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
					'page_title' => 'Clientes Frecuentes',
					'view' => 'reportes/ClienteFrecuenteReporte',
					'data_view' => array()
				);

			//El year del reporte
			$year = $this->input->post('selectYear');

			

			$clientes = $this->ReportesModel->ClientesFrecuentes($year);
			$data['frecuentes'] = $clientes;

			$data['year'] = $year;

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function DetalleClienteFrecuente()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'reportes/detalle',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$nombre = $this->input->post('nombre');
			$anio = $this->input->post('anio');


			$detalle = $this->ReportesModel->ClienteDetalles($anio,$nombre);
			$data['detalle'] = $detalle;

			$data['year'] = $anio;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function reporteClienteFrecuente()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	

			ob_start();

			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'reportes/VistaReporteCliente',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$nombre = $this->input->post('nombre');
			$anio = $this->input->post('anio');


			$detalle = $this->ReportesModel->ClienteDetalles($anio,$nombre);
			$data['detalle'] = $detalle;

			$data['year'] = $anio;

			$this->load->view('reportes/VistaReporteCliente',$data);

			$this->pdf->setPaper ($paper_size);
			$this->pdf->setPaper('B4');
			$this->pdf->loadhtml(ob_get_clean());
			$this->pdf->render();
			$this->pdf->stream("reporte", array("Attachment"=>0));

			
		}else{
			$this->load->view('login');
		}
	}

	public function FechasMasVacio()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
					'page_title' => 'Fechas Mas Vacias',
					'view' => 'reportes/FechasMasVacias',
					'data_view' => array()
				);

			//El year del reporte
			$year = $this->input->post('selectYear');
			

			$vacios = $this->ReportesModel->DiasVacios($year);
			$data['vacios'] = $vacios;

			$data['year'] = $year;

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function reporteDiasVacio()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	

			ob_start();

			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'reportes/VistaFechasVacio',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$anio = $this->input->post('anio');


			$detalle = $this->ReportesModel->DiasVacios($anio);
			$data['detalle'] = $detalle;

			$data['year'] = $anio;

			$this->load->view('reportes/VistaFechasVacio',$data);

			$this->pdf->setPaper ($paper_size);
			$this->pdf->setPaper('B4');
			$this->pdf->loadhtml(ob_get_clean());
			$this->pdf->render();
			$this->pdf->stream("reporte", array("Attachment"=>0));

			
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