<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class HabitacionesController extends CI_CONTROLLER{

    public function __construct(){
        parent::__construct();
        $this->load->model('PersonalizarModel');
        $this->load->model('PermisosModel');
        $this->load->model('Habitaciones');
        $this->load->model('Categorias');
        $this->load->model('Niveles');
        $this->load->model('Estados');

    }

    public function index(){
        if($this->session->userdata('is_logued_in')===  TRUE){
            $data = array(
                'page_title' => 'Sistema Hotelero',
                'view' => 'Habitacion/habitaciones',
                'data_view' =>array()
            );

            $allPagina = $this->PersonalizarModel->getPersonal();
            $data['allPagina'] = $allPagina;

            $categoria = $this->Categorias->getCategorias();
            $data['categoria'] = $categoria;

            $niveles = $this->Niveles->getNiveles();
            $data['niveles'] = $niveles;

            $estados = $this->Estados->getEstados();
            $data['estados'] = $estados;


            $habitaciones = $this->Habitaciones->getHabitaciones();
            $data['habitaciones'] = $habitaciones;

            $this->load->view('template/main',$data);
        }else{
            $this->load->view('login');
        }
    }

    public function newHabitacion(){
        if($this->session->userdata('is_logued_in') === TRUE){
            $data = array(
                'page_title' =>'Sistema Hotelero',
                'view' => 'Habitacion/dynamic-habitacion',
                'data_view' => array()
            );

            $categoria = $this->Categorias->getCategorias();
            $data['categoria'] = $categoria;

            $niveles = $this->Niveles->getNiveles();
            $data['niveles'] = $niveles;

            $estados = $this->Estados->getEstados();
            $data['estados'] = $estados;



            $allPagina = $this->PersonalizarModel->getPersonal();
            $data['allPagina'] = $allPagina;

            $this->load->view('template/main',$data);
        }else{
            $this->load->view('login');
        }

    }   

    public function insertHabitacion(){
        $datos = array(
         'nombre_habitacion' => $this->input->post('nombre_habitacion'),
         'id_categoria' => $this->input->post('id_categoria'),
         'id_nivel' => $this->input->post('id_nivel'),
         'id_tipo_estado' => $this->input->post('id_tipo_estado'),
         'precio_habitacion' => $this->input->post('precio_habitacion'),
         'detalle_habitacion' => $this->input->post('detalle_habitacion')

     );
        $this->Habitaciones->insertHabitacion($datos);
        $this->index();
        $this->session->set_flashdata('insert', '¡Registro insertado con exito!');
        redirect('HabitacionesController/');
    }

    public function edit($id_habitacion){
        if($this->session->userdata('is_logued_in') === TRUE){
            $data = array(
                'page_title' => 'Sistema Hotelero',
                'view' => 'Habitacion/dynamic-habitacion',
                'data_view' => array()
            ) ;

            $categoria = $this->Categorias->getCategorias();
            $data['categoria'] = $categoria;

            $niveles = $this->Niveles->getNiveles();
            $data['niveles'] = $niveles;

            $estados = $this->Estados->getEstados();
            $data['estados'] = $estados;


            $allPagina = $this->PersonalizarModel->getPersonal();
            $data['allPagina'] = $allPagina;

            $data['actualizar'] = $this->Habitaciones->getHabitacion($id_habitacion);

            $this->load->view('template/main',$data);
        }else{
            $this->load->view('login');
        }
    }

    public function updateHabitacion(){
        $datos = array(
            'nombre_habitacion' => $this->input->post('nombre_habitacion'),
            'id_categoria' => $this->input->post('id_categoria'),
            'id_nivel' => $this->input->post('id_nivel'),
            'id_tipo_estado' => $this->input->post('id_tipo_estado'),
            'precio_habitacion' => $this->input->post('precio_habitacion'),
            'detalle_habitacion' => $this->input->post('detalle_habitacion'),
            'id_habitacion' => $this->input->post('id_habitacion')
        );

        $this->Habitaciones->updateHabitacion($datos);
        $this->index();
        $this->session->set_flashdata('update','¡Registro modificado con exito!'.$datos['nombre_habitacion']);
        redirect('HabitacionesController/');
        
    }

    public function delete($id_habitacion){
        $this->Habitaciones->deleteHabitacion($id_habitacion);
        $this->session->set_flashdata('delete','¡Registro fue borrado!');
        $this->index();
        redirect('HabitacionesController/');
    }


}

?>