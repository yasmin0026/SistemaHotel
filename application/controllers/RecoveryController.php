<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecoveryController extends CI_Controller {

    public function __construct(){
		parent::__construct();
        $this->load->model('PersonalizarModel');
        $this->load->model('Recovery');
	}

	public function index()
	{
		if ($this->session->userdata('is_logued_in') == FALSE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getSistemaOnlyRow();
			$data['allPagina'] = $allPagina;

			$this->load->view('recovery/username',$data);
		}else{
			$this->load->view('login');
		}
	}

    public function search()
	{
		if ($this->session->userdata('is_logued_in') == FALSE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getSistemaOnlyRow();
			$data['allPagina'] = $allPagina;

            $nick = $this->input->post('nick');
            $validacion = $this->Recovery->getUsuarioByNick($nick);

            if ($validacion != null) {
                $data['datos'] = $validacion;
                $this->load->view('recovery/pregunta',$data);
            }else{
                echo $this->session->set_flashdata('msg','Error no se pudo encontrar vuelve a intentarlo');
                redirect('RecoveryController/');
            }
		}else{
			$this->load->view('login');
		}
	}

	public function changePassword()
	{
		if ($this->session->userdata('is_logued_in') == FALSE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getSistemaOnlyRow();
			$data['allPagina'] = $allPagina;

            $nick = $this->input->post('nick');
			$id = $this->input->post('id');
			$pregunta = base64_encode($this->input->post('recovery_pregunta'));
			$respuesta = base64_encode($this->input->post('recovery_respuesta'));
            $validacion = $this->Recovery->getUsuarioByIdNick($id,$nick,$pregunta,$respuesta);

            if ($validacion != null) {
                $data['datos'] = $validacion;
                $this->load->view('recovery/contrasena',$data);
            }else{
                echo $this->session->set_flashdata('msg','Error no se pudo encontrar vuelve a intentarlo');
                redirect('RecoveryController/');
            }
		}else{
			$this->load->view('login');
		}
	}

	public function setPassword()
	{
		$datos = array(
			'id_usuario' => $this->input->post('id'),
			'nombres_usuario' => $this->input->post('nombre'),
			'apellido_usuario' => $this->input->post('apellido'),
			'nick_usuario' => $this->input->post('nick'),
			'contrasena_usuario' => $this->input->post('contrasena'),
			'recovery_pregunta' => $this->input->post('pregunta'),
            'recovery_respuesta' => $this->input->post('respuesta'),
			'id_rol' => $this->input->post('id_rol')
		);
		$resp = $this->Recovery->updateUsuario($datos);
		if ($resp) {
			redirect(base_url().'LoginController/');
		} else {
			echo $this->session->set_flashdata('msg','Error no se pudo encontrar vuelve a intentarlo');
                redirect('RecoveryController/');
		}
	}
}