<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadoPagoModel extends CI_Model {

public function getEstadoPago(){
    $query = $this->db->get('tbl_estado_pago');
    return $query->result();
}

public function insert($data){
    $query =$this->db->insert('tbl_estado_pago',$data);
    return $query;
    
}

public function delete($id_estado_pago){
	$this->db->where('id_estado_pago',$id_estado_pago);
		$query=$this->db->delete('tbl_estado_pago');
		return $query;
}
public function getDataT($id_estado_pago){
	$this->db->select('*');
    $this->db->from('tbl_estado_pago');
    $this->db->where('id_estado_pago',$id_estado_pago);
    $query = $this->db->get();
    return $query->row();
}

public function Editar($data){
	 $this->db->set('estado_pago',$data['estado_pago']);
    $this->db->where('id_estado_pago',$data['id_estado_pago']);
    if($this->db->update('tbl_estado_pago'))
    return true;
else
    return false;
}
	
} 