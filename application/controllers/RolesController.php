<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RolesController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('PersonalizarModel');
		$this->load->model('Roles');
        $this->load->model('PermisosModel');
	}

    public function index(){
        if($this->session->userdata('is_logued_in') === TRUE ){
            $data = array(
                'page_title' => 'Sistema Hotelero',
                'view' => 'Roles/roles',
                'data_view' => array()
            );

            $allPagina = $this->PersonalizarModel->getPersonal();
            $data['allPagina'] = $allPagina;

            $roles = $this->Roles->getRoles();
            $data['roles'] = $roles;

            $this->load->view('template/main',$data);
        }else{
            $this->load->view('login');
         }
    }

    public function newRol(){
        if($this->session->userdata('is_logued_in') === TRUE){
            $data = array(
                'page_title' => 'Sistema Hotelero',
                'view' => 'Roles/dynamic-rol',
                'data_view' => array()
            );
            $allPagina = $this->PersonalizarModel->getPersonal();
            $data['allPagina'] = $allPagina;

            $this->load->view('template/main',$data);
        }else{
            $this->load->view('login');
        }
    }

    public function insertRol(){
        $datos = array(
            'nombre_rol' => $this->input->post('nombre_rol')
        );
        $this->Roles->insertRol($datos);
        $this->index();
        $this->session->set_flashdata('insert','¡Registro insertado con exito!');
        redirect('RolesController/');
    }

    public function edit($id_rol)
    {
        if($this->session->userdata('is_logued_in') === TRUE){
            $data =  array(
                'page_title'=>'Sistema Hotelero',
                'view' => 'Roles/dynamic-rol',
                'data_view'=>array()
            );

            $allPagina =$this->PersonalizarModel->getPersonal();
            $data['allPagina'] = $allPagina;

            $data['actualizar'] = $this->Roles->getRol($id_rol);

            $this->load->view('template/main',$data);
        }else{
            $this->load->view('login');
        }
    }

    public function updateRol(){
        $datos = array(
            'id_rol'  => $this->input->post('id_rol'),
            'nombre_rol' => $this->input->post('nombre_rol')
        );

        $this->Roles->updateRol($datos);
        $this->index();
        $this->session->set_flashdata('update','¡Registro modificado con exito! '.$datos['estado_habitacion']);
        redirect('RolesController/');
    }

    public function delete($id_rol){
       $data = $this->Roles->getUsuarios();
       $info;
       foreach($data as $d){
            $info = $d->id_rol;
        }

        if($id_rol == 1){
            $this->session->set_flashdata('delete','No se puede eliminar el rol administrador');

        }elseif($info === $id_rol){
           $this->session->set_flashdata('delete','¡No se puede eliminar!, un usuario esta usando este rol');
           $this->index();
           redirect('RolesController/');

        }else{
            $this->Roles->deleteRol($id_rol);
            $this->session->set_flashdata('delete','¡Registro fue borrado!');
            $this->index();
            redirect('RolesController/');

        }

        redirect('RolesController/');

    }


}