<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Model {


	public function getCategorias2($id_categoria){

		$this->db->select('tbl_habitacion.id_categoria');
		$this->db->join('tbl_categoria', 'tbl_categoria.id_categoria = tbl_habitacion.id_categoria');
		$this->db->where('tbl_habitacion.id_categoria', $id_categoria);
		$query = $this->db->get('tbl_habitacion');

		if($query->num_rows()==0)
			return false;
		else
			return true;
	}

	public function getCategorias()
	{
		$query = $this->db->get('tbl_categoria');
		return $query->result();
	}

	public function insert($datos)
	{
		if ($this->db->insert('tbl_categoria',$datos))
			return true;
		else
			return false;
	}

	public function getCategoria($id_categoria)
	{
		$this->db->select('*');
		$this->db->from('tbl_categoria');
		$this->db->where('id_categoria',$id_categoria);
		$query = $this->db->get();
		return  $query->row();
	}

	public function update($datos)
	{
		$this->db->set('tipo_habitacion',$datos['tipo_habitacion']);
		$this->db->where('id_categoria',$datos['id_categoria']);
		if($this->db->update('tbl_categoria'))
			return true;
		else
			return false;
	}

	public function delete($id_categoria)
	{
		$this->db->where('id_categoria',$id_categoria);
		if ($this->db->delete('tbl_categoria'))
			return true;
		else
			return false;
	}
}