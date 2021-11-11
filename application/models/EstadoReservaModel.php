<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadoReservaModel extends CI_Model {


	public function getEstadoReserva(){
		$this->db->join('tbl_reserva','tbl_reserva.id_estado_reserva = tbl_estado_reserva.id_estado_reserva');
		$query = $this->db->get('tbl_estado_reserva');
    return $query->result();
	}


	public function getEstadoReserv(){
		$query = $this->db->get('tbl_estado_reserva');
    return $query->result();
	}

	public function insertR($data){
		$query =$this->db->insert('tbl_estado_reserva',$data);
    return $query;
	}

	public function get($id_estado_reserva){
		$this->db->select('*');
    $this->db->from('tbl_estado_reserva');
    $this->db->where('id_estado_reserva',$id_estado_reserva);
    $query = $this->db->get();
    return $query->row();
	}


	public function updateEstadoReserv($data){
		 $this->db->set('estado_reserva',$data['estado_reserva']);
    $this->db->where('id_estado_reserva',$data['id_estado_reserva']);
    if($this->db->update('tbl_estado_reserva'))
    return true;
else
    return false;
	}

	public function deleteE($id_estado_reserva){
		$this->db->where('id_estado_reserva',$id_estado_reserva);
		$query=$this->db->delete('tbl_estado_reserva');
		return $query;

	}
} 