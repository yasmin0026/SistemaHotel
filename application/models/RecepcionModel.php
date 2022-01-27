<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecepcionModel extends CI_Model {

	public function SelectNiv(){

		$data = $this->db->get('tbl_niveles');
		return $data->Result(); 
	}

	public function getAlojamiento(){

		$this->db->select('*');
		$this->db->from('tbl_habitacion h');
		$this->db->join('tbl_categoria c','c.id_categoria = h.id_categoria','INNER');
		$this->db->join('tbl_tipo_estado e','e.id_tipo_estado = h.id_tipo_estado','INNER');
		$this->db->join('tbl_niveles n','n.id_nivel = h.id_nivel','INNER');

		$query = $this->db->get();
		return $query->result();
	}
	

	public function getAll($id_habitacion){

		$this->db->select('*');
		$this->db->from('tbl_habitacion');
		$this->db->where('id_habitacion',$id_habitacion);
		$query = $this->db->get();
		return  $query->row();

	}
	
	

	public function selectTipo(){

		$data = $this->db->get('tbl_categoria');
		return $data->Result(); 
	}

	public function selectHab(){

		$data = $this->db->get('tbl_habitacion');
		return $data->Result(); 
	}
	

	public function selectClient(){

		$data = $this->db->get('tbl_cliente');
		return $data->Result(); 
	}
	
	public function selectDocumento(){

		$data = $this->db->get('tbl_tipo_documento');
		return $data->Result(); 
	}

	public function insert($tbl_alojamiento, $tbl_cliente){

		//tbl_cliente
		$this->db->insert('tbl_cliente', $tbl_cliente);
		$id_cliente = $this->db->insert_id();

		//tbl_alojamiento
		

		$tbl_alojamiento['id_cliente'] = $id_cliente;
		$this->db->insert('tbl_alojamiento', $tbl_alojamiento);	
		return $tbl_alojamiento_id = $this->db->insert_id();		
	}

	public function getAlojamiento2(){

		$this->db->select('*');
		$this->db->from('tbl_alojamiento a');
		$this->db->join('tbl_cliente c','c.id_cliente = a.id_cliente','INNER');
		$this->db->join('tbl_habitacion h','h.id_habitacion = a.id_habitacion','INNER');
		

		$query = $this->db->get();
		return $query->result();
	}

	public function deleteAlojamientos($id_alojamiento){
		$this->db->where('id_alojamiento',$id_alojamiento);
		if ($this->db->delete('tbl_alojamiento'))
			return true;
		else
			return false;
	}

	public function editAlojamiento($id_alojamiento){
		$this->db->select('*');
		 $this->db->from('tbl_alojamiento');
		 $this->db->where('id_alojamiento=' .$id_alojamiento);

		 $al =$this->db->get();
		 return $al->row();
	}

	 public function editar($datos)
    {
       
        $this->db->set('id_cliente',$datos['id_cliente']);
        $this->db->set('id_habitacion',$datos['id_habitacion']);
        $this->db->set('tarifa',$datos['tarifa']);
        $this->db->set('fecha_entrada',$datos['fecha_entrada']);
        $this->db->set('fecha_salida',$datos['fecha_salida']);
        $this->db->set('fecha_salida',$datos['fecha_salida']);
         $this->db->set('precio_alojamiento',$datos['precio_alojamiento']);

        $this->db->where('id_alojamiento',$datos['id_alojamiento']);
        if($this->db->update('tbl_alojamiento'))
            return true;
        else
            return false;
    }
	

	
}

?>