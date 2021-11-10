<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalizarPage extends CI_Controller {

	
	public function __construct(){

		parent::__construct();
		$this->load->model('PersonalizarModel');
		$this->load->library('upload');
		$this->load->model('PermisosModel');
	}

	public function index()
	{	


		

		if ($this->session->userdata('is_logued_in') === TRUE) {	
			$data = array(
				'page_title' => 'Sistema Hotelero',
				'view' => 'personalizar/personalizarPage',
				'data_view' => array()
			);

			$allPagina =$this->PersonalizarModel->getPersonal();
			$data['allPagina'] = $allPagina;



			$this->load->view('template/main',$data);
		}else{
			$this->load->view('login');
		}

	}

	public function newStyle(){
		$id = $this->input->post('id');
		$data = array(
		
'imagen_logo' => $this->input->post('logo')
			
		);
		$path = './assets/img/';

		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['max_size'] = '2048';  //2MB max
		$config['max_width'] = '4480'; // pixel
		$config['max_height'] = '4480'; // pixel
		$config['file_name'] = $_FILES['logo']['name'];
		
		$this->upload->initialize($config);

	    if (!empty($_FILES['logo']['name'])) {
	        if ( $this->upload->do_upload('logo') ) {
	            $foto = $this->upload->data();
	            $data = array(
					'nombre_sistema' => $this->input->post('nombre'),
					'color_sistema' => $this->input->post('color'),
                            'imagen_logo'       => $foto['file_name'],
						
	                        );

							@unlink($path.$this->input->post('logo'));
		$resp = $this->PersonalizarModel->updateAppearance($data,$id);
		if ($resp == true) {
			redirect(base_url().'PersonalizarPage/');
		}
	}
	
}else{
	
	$data = array(
		'nombre_sistema' => $this->input->post('nombre'),
		'color_sistema' => $this->input->post('color'),
		
	);

	$resp = $this->PersonalizarModel->updateAppearance($data,$id);
	if ($resp == true) {
		redirect(base_url().'PersonalizarPage/');
	}
}
}
}
