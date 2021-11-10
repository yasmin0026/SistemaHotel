<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadoController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('PersonalizarModel');
		$this->load->model('Estados');
        $this->load->model('PermisosModel');
	}

    public function index(){
        if($this->session->userdata('is_logued_in') === TRUE ){
            $data = array(
                'page_title' => 'Sistema Hotelero',
                'view' => 'Estados/estados',
                'data_view' => array()
            );

            $allPagina = $this->PersonalizarModel->getPersonal();
            $data['allPagina'] = $allPagina;

            $estados = $this->Estados->getEstados();
			$data['estados'] = $estados;

			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}
	}

public function newEstado(){
    if($this->session->userdata('is_logued_in') === TRUE){
        $data = array(
            'page_title' => 'Sistema Hotelero',
            'view' => 'Estados/dynamic-estados',
            'data_view' => array()
        );
        $allPagina = $this->PersonalizarModel->getPersonal();
        $data['allPagina'] = $allPagina;

        $this->load->view('template/main',$data);
    }else{
        $this->load->view('login');
    }
}

public function insertEstado(){
    $datos = array(
        'estado_habitacion' => $this->input->post('estado_habitacion')
    );
    $this->Estados->insertEstado($datos);
    $this->index();
    $this->session->set_flashdata('insert','¡Registro insertado con exito!');
    redirect('EstadoController/');
}

public function edit($id_tipo_estado)
{
    if($this->session->userdata('is_logued_in') === TRUE){
        $data =  array(
            'page_title'=>'Sistema Hotelero',
            'view' => 'Estados/dynamic-estados',
            'data_view'=>array()
        );

        $allPagina =$this->PersonalizarModel->getPersonal();
        $data['allPagina'] = $allPagina;

        $data['actualizar'] = $this->Estados->getEstado($id_tipo_estado);

        $this->load->view('template/main',$data);
    }else{
        $this->load->view('login');
    }
}

public function updateEstado(){
    $datos = array(
        'id_tipo_estado'  => $this->input->post('id_tipo_estado'),
        'estado_habitacion' => $this->input->post('estado_habitacion')
    );

    $this->Estados->updateEstado($datos);
    $this->index();
    $this->session->set_flashdata('update','¡Registro modificado con exito! '.$datos['estado_habitacion']);
    redirect('EstadoController/');
}

public function delete($id_tipo_estado){
    $this->Estados->deleteEstado($id_tipo_estado);
    $this->session->set_flashdata('delete','¡Registro fue borrado!');
    $this->index();
    redirect('EstadoController/');
}


}