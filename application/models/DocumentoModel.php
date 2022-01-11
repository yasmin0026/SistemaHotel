<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentoModel extends CI_Model {



	public function getDocumento($id_tipo_documento){
		$this->db->select('tbl_cliente.id_tipo_documento');
		$this->db->join('tbl_tipo_documento','tbl_tipo_documento.id_tipo_documento = tbl_cliente.id_tipo_documento');
		$this->db->where('tbl_cliente.id_tipo_documento',$id_tipo_documento);
		$query = $this->db->get('tbl_cliente');
		
		if($query->num_rows()==0)
			return false;
		else
			return true;
	}
	


	public function getDocumentoAll(){

		$query = $this->db->get('tbl_tipo_documento');
		return $query->result();
	}
	

	public function insertDocumento($datos)
	{
		if ($this->db->insert('tbl_tipo_documento',$datos))
			return true;
		else
			return false;
	}

	public function getDocumentoEdit($id_tipo_documento)
	{
		$this->db->select('*');
		$this->db->from('tbl_tipo_documento');
		$this->db->where('id_tipo_documento',$id_tipo_documento);
		$query = $this->db->get();
		return  $query->row();
	}

	public function updateDocumento($datos)
	{	
		
		$this->db->set('tipo_documento',$datos['tipo_documento']);
		$this->db->where('id_tipo_documento',$datos['id_tipo_documento']);
		if($this->db->update('tbl_tipo_documento'))
			return true;
		else
			return false;
	}

	public function deleteDocumento($id_tipo_documento)
	{
		$this->db->where('id_tipo_documento',$id_tipo_documento);
		if ($this->db->delete('tbl_tipo_documento'))
			return true;
		else
			return false;
	}
}