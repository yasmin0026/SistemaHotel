<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalizarModel extends CI_Model
{


	public function getPersonal(){

		$allPagina = $this->db->get('tbl_personalizar');
		return $allPagina->result();

	}  

	public function getSistema(){
		$this->db->select('nombre_sistema');
		$this->db->from('tbl_personalizar');
		$pagina = $this->db->get();
		return $pagina->result();

	}



	public function updateAppearance($data,$id)
	{
		$this->db->where('id_personalizar',$id);
		if ($this->db->update('tbl_personalizar',$data))
			return true;
		else
			return false;
	}


} 

?>