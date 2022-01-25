<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoomModel extends CI_Model {

	public function rooms_details($inicio,$fin){
		$this->db->select('tbl_habitacion.nombre_habitacion,tbl_alojamiento.id_habitacion, count(tbl_habitacion.id_habitacion) As frecuencia');
		$this->db->from('tbl_alojamiento');
		$this->db->join('tbl_habitacion', 'tbl_alojamiento.id_habitacion = tbl_habitacion.id_habitacion');
		$this->db->join('tbl_cliente','tbl_alojamiento.id_cliente = tbl_cliente.id_cliente');
		$this->db->where("fecha_entrada between '".$inicio."' and '".$fin."'");
		$this->db->group_by("tbl_habitacion.nombre_habitacion");
		$query = $this->db->get();
		return  $query->result();
	}

	public function room_details($inicio,$fin,$id_habitacion){

		$this->db->select('tbl_alojamiento.*,tbl_cliente.documento,tbl_cliente.nombres_cliente,tbl_alojamiento.id_habitacion,tbl_habitacion.nombre_habitacion');
		$this->db->from('tbl_alojamiento');
		$this->db->join('tbl_habitacion', 'tbl_alojamiento.id_habitacion = tbl_habitacion.id_habitacion');
		$this->db->join('tbl_cliente','tbl_alojamiento.id_cliente = tbl_cliente.id_cliente');
		$this->db->where("fecha_entrada between '".$inicio."' and '".$fin."'");
		$this->db->where("tbl_habitacion.id_habitacion =".$id_habitacion);
		$this->db->order_by("tbl_cliente.documento","asc");
		$query = $this->db->get();
		return  $query->result();

	}
	

	
} 