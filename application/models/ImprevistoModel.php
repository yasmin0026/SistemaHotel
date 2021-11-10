<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImprevistoModel extends CI_Model {


	public function getImprevistoAll(){
        $this->db->join('tbl_habitacion','tbl_habitacion.id_habitacion = tbl_imprevisto.id_habitacion');
         $query = $this->db->get('tbl_imprevisto');
        return $query->result();
    }

	 public function getHabitacion()
	{
		$query = $this->db->get('tbl_habitacion');
		return $query->result();
	}

	public function insertImprevisto($datos)
	{
		if ($this->db->insert('tbl_imprevisto',$datos))
			return true;
		else
			return false;
	}

	public function getImprevistoEdit($id_imprevisto)
	{
		$this->db->select('*');
		$this->db->from('tbl_imprevisto');
		$this->db->where('id_imprevisto',$id_imprevisto);
		$this->db->join("tbl_habitacion","tbl_habitacion.id_habitacion = tbl_imprevisto.id_habitacion");
		$query = $this->db->get();
		return  $query->row();
	}

	public function updateImprevisto($datos)
	{	
		$this->db->set('tipo_imprevisto',$datos['tipo_imprevisto']);
		$this->db->set('id_habitacion',$datos['id_habitacion']);
		$this->db->set('descripcion',$datos['descripcion']);
		$this->db->set('compensacion',$datos['compensacion']);
		$this->db->where('id_imprevisto',$datos['id_imprevisto']);
		if($this->db->update('tbl_imprevisto'))
			return true;
		else
			return false;
	}

	public function deleteImprevisto($id_imprevisto)
	{
		$this->db->where('id_imprevisto',$id_imprevisto);
		if ($this->db->delete('tbl_imprevisto'))
			return true;
		else
			return false;
	}
}