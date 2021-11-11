<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriasController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('PersonalizarModel');
		$this->load->model('Categorias');
		$this->load->model('PermisosModel');
	}

	public function index()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Categorias/categorias',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['categorias'] = $this->Categorias->getCategorias();

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function new()
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Categorias/dynamic-categoria',
				'data_view' => array()
			);

			$allPagina = $this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function insert()
	{
		$datos = array(
			'tipo_habitacion' => $this->input->post('tipo_habitacion')
		);

		$this->Categorias->insert($datos);
		$this->index();
		$this->session->set_flashdata('insert','¡Registro insertado con exito!');
		redirect('CategoriasController/');
	}


	public function edit($id_categoria)
	{
		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'Categorias/dynamic-categoria',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;

			$data['actualizar'] = $this->Categorias->getCategoria($id_categoria);

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

	public function update()
	{
		$datos = array(
			'id_categoria' => $this->input->post('id_categoria'),
			'tipo_habitacion' => $this->input->post('tipo_habitacion')
		);

		$this->Categorias->update($datos);
		$this->index();
		$this->session->set_flashdata('update','¡Registro modificado con exito! '.$datos['tipo_habitacion']);
		redirect('CategoriasController/');
	}

	public function delete($id_categoria)
	{	$data = $this->Categorias->getCategorias2();
		$info;
		foreach($data as $d){
			$info = $d->id_categoria;
		}

		if ($info === $id_categoria) {
			$this->session->set_flashdata('delete','¡No se puede eliminar!, una habitacion esta usando esta categoria');
			$this->index();
			redirect('CategoriasController/');
		}else{
			$this->Categorias->delete($id_categoria);
			$this->session->set_flashdata('delete','¡Registro fue borrado!');
			$this->index();
			redirect('CategoriasController/');
		}


		
		redirect('CategoriasController/');
	} 
}