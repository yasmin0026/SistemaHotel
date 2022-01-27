<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecepcionController extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('RecepcionModel');
		$this->load->model('PersonalizarModel');
		$this->load->model('PermisosModel');
	}
	
	public function index()
	{

		if ($this->session->userdata('is_logued_in') === TRUE) {

			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Recepcion/Recepcion.php',
				'data_view' => array()
			);
			//niveles
			$allpagina =$this->RecepcionModel->SelectNiv(); 
			$data['niv'] = $allpagina;

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			//$data['hab'] = $this->RecepcionModel->getAlojamiento();



			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	
 //muestra la vista para agregar a la tabla alojamiento y cliente llevando los datos de la tabla habitacion
	public function editar($id_habitacion){
		if ($this->session->userdata('is_logued_in') === TRUE) {

			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Recepcion/Datos.php',
				'data_view' => array()
			);

			

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

		
			$data['h'] = $this->RecepcionModel->getAll($id_habitacion);

			$data['tipoh'] = $this->RecepcionModel->selectTipo();
			$data['documento'] = $this->RecepcionModel->selectDocumento();

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function insertAlojamiento_Cliente(){
			//tbl_alojamiento
		$data_alojamiento  = array(
			'id_habitacion' =>$this->input->post('id_habitacion') ,
			'tarifa' =>$this->input->post('tarifa') ,
			'fecha_entrada' =>$this->input->post('fecha_entrada') ,
			'fecha_salida' => $this->input->post('fecha_salida') );
			//tbl_cliente
		$data_cliente = array(
			'nombres_cliente' =>$this->input->post('nombres_cliente') ,
			'id_tipo_documento' =>$this->input->post('id_tipo_documento') , 
			'documento' =>$this->input->post('documento') , 
			'telefono_cliente' =>$this->input->post('telefono_cliente')  );


		$data = $this->RecepcionModel->insert($data_alojamiento, $data_cliente);
		if ($data) {
			$this->index();
			$this->session->set_flashdata('insert','¡Alojamiento realizado con exito!');
			redirect('RecepcionController/AlojamientoView');
		}else{
			echo "fallo algo revise";
		}



	}

	



	public function filtroNivel($id){

		if($id==0){
			$data['hab'] =$this->RecepcionModel->getAlojamiento();
		}else{

			$data['hab'] =$this->db->query("SELECT * FROM tbl_habitacion h INNER JOIN tbl_categoria c ON c.id_categoria = h.id_categoria INNER JOIN tbl_tipo_estado e ON e.id_tipo_estado= h.id_tipo_estado 
				INNER JOIN tbl_niveles n ON n.id_nivel = h.id_nivel WHERE h.id_nivel='$id' ")->result();
		}
		$this->load->view('Recepcion/Result.php',$data);
		
	}

	public function AlojamientoView(){
		if ($this->session->userdata('is_logued_in') === TRUE) {

			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Recepcion/Alojamiento.php',
				'data_view' => array()
			);

			

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['alojamiento'] = $this->RecepcionModel->getAlojamiento2();
			

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function deleteAlojamiento($id_alojamiento){
		$this->RecepcionModel->deleteAlojamientos($id_alojamiento);
		$this->session->set_flashdata('delete','¡Registro fue borrado!');
		$this->index();
		redirect('RecepcionController/AlojamientoView');

	}

	public function ViewEdit($id_alojamiento){
		if ($this->session->userdata('is_logued_in') === TRUE) {

			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Recepcion/formAlojamiento.php',
				'data_view' => array()
			);

			

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['al'] =$this->RecepcionModel->editAlojamiento($id_alojamiento);
			 

			$data['hab'] = $this->RecepcionModel->selectHab();
			$data['client'] = $this->RecepcionModel->selectClient();
			

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}


	public function updateAlojamiento(){
    $datos = array(
        'id_alojamiento'  => $this->input->post('id_alojamiento'),
        'id_cliente' => $this->input->post('id_cliente'),
        'id_habitacion' => $this->input->post('id_habitacion'),
        'tarifa' => $this->input->post('tarifa'),
        'fecha_entrada' => $this->input->post('fecha_entrada'),
        'fecha_salida' => $this->input->post('fecha_salida'),
        'precio_alojamiento' => $this->input->post('precio_alojamiento')

    );

    $this->RecepcionModel->editar($datos);
    $this->session->set_flashdata('update','¡Registro modificado con exito! '.$datos['id_cliente']);
    redirect('RecepcionController/AlojamientoView');
}


}

?>