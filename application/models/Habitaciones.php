<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Habitaciones extends CI_Model{

    public function getHabitaciones(){
        $this->db->join('tbl_categoria','tbl_categoria.id_categoria = tbl_habitacion.id_categoria');
        $this->db->join('tbl_niveles','tbl_niveles.id_nivel = tbl_habitacion.id_nivel');
        $this->db->join('tbl_tipo_estado','tbl_tipo_estado.id_tipo_estado = tbl_habitacion.id_tipo_estado');
        $query = $this->db->get('tbl_habitacion');
        return $query->result();
    }

    public function insertHabitacion($datos){
        if($this->db->insert('tbl_habitacion',$datos))
            return true;
        else
            return false;
    }

    public function getHabitacion($id_habitacion){
        $this->db->select('*');
        $this->db->from('tbl_habitacion');
        $this->db->where('id_habitacion',$id_habitacion);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateHabitacion($datos){
        $this->db->set('nombre_habitacion', $datos['nombre_habitacion']);
        $this->db->set('id_categoria', $datos['id_categoria']);
        $this->db->set('id_nivel', $datos['id_nivel']);
        $this->db->set('id_tipo_estado', $datos['id_tipo_estado']);
        $this->db->set('precio_habitacion', $datos['precio_habitacion']);
        $this->db->set('detalle_habitacion', $datos['detalle_habitacion']);
        $this->db->where('id_habitacion', $datos['id_habitacion']);
    if($this->db->update('tbl_habitacion'))
        return true;
    else    
        return false;
    }

    public function deleteHabitacion($id_habitacion){
        $this->db->where('id_habitacion',$id_habitacion);
        if($this->db->delete('tbl_habitacion'))
            return true;
        else
            return false;
    }
}


?>