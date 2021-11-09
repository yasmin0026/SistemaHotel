<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReservacionModel extends CI_Model {

	public function allReserv(){

		$this->db->select("id,title,color,start,end,nombre_cliente");
		$this->db->from("tbl_reserva");
		return $this->db->get()->result_array();
	}

	//selects 
	public function selecHab(){

		$data = $this->db->get('tbl_habitacion');
		return $data->Result(); 
	}

	public function selecPago(){
		$data = $this->db->get('tbl_estado_pago');
		return $data->Result(); 
	}

	public function selecEstadoR(){
		$data = $this->db->get('tbl_estado_reserva');
		return $data->Result(); 
	}

	public function insert_Reserv($data){
		$this->db->insert('tbl_reserva', $data);
	}

	public function Update($param){
		$datos  = array(
			'start' =>$param['start'] ,
			'end' =>$param['end']  
		);
		$this->db->where('id',$param['id']);
		$this->db->update('tbl_reserva',$datos);

		if ($this->db->affected_rows() ==1) {
			return 1;
		}else{
			return 0;
		}
	}

	public function Delete($id){
		$this->db->where('id', $id);
		return $this->db->delete('tbl_reserva');

	}

	
}