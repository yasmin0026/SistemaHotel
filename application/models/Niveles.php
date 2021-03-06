<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Niveles extends CI_Model {


	public function getNiveles2($id_nivel){
        $this->db->select('tbl_habitacion.id_nivel');
		$this->db->join('tbl_niveles', 'tbl_niveles.id_nivel = tbl_habitacion.id_nivel');
		$this->db->where('tbl_habitacion.id_nivel', $id_nivel);
		$query = $this->db->get('tbl_habitacion');

		if($query->num_rows()==0)
			return false;
		else
			return true;
    }
 
	public function getNiveles()
	{
		$query = $this->db->get('tbl_niveles');
		return $query->result();
	}

	public function insertNivel($datos)
	{
		if ($this->db->insert('tbl_niveles',$datos))
			return true;
		else
			return false;
	}

	public function getNivel($id_nivel)
	{
		$this->db->select('*');
		$this->db->from('tbl_niveles');
		$this->db->where('id_nivel',$id_nivel);
		$query = $this->db->get();
		return  $query->row();
	}

	public function updateNivel($datos)
	{
		$this->db->set('nombre_nivel',$datos['nombre_nivel']);
		$this->db->where('id_nivel',$datos['id_nivel']);
		if($this->db->update('tbl_niveles'))
			return true;
		else
			return false;
	}
 
	public function deleteNivel($id_nivel)
	{
		$this->db->where('id_nivel',$id_nivel);
		if ($this->db->delete('tbl_niveles'))
			return true;
		else
			return false;
	}
}