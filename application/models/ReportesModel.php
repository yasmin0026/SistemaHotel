<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportesModel extends CI_Model {



	public function YearsReportes(){

		$this->db->select("Date_format(fecha_salida,'%Y') as fecha");
		//$this->db->from('tbl_alojamiento');
		$this->db->group_by("fecha");
		$query = $this->db->get('tbl_alojamiento');
		return  $query->result();

	}


	public function ClienteDetalles($anio,$nombre){

		$this->db->select('c.nombres_cliente,
			count(c.nombres_cliente) as AlojamientosMesual,
			MONTHNAME(a.fecha_entrada) as MesInicio,
			MONTHNAME(a.fecha_salida) as MesFinal ,
			SUM(timestampdiff(DAY, a.fecha_entrada, a.fecha_salida)) as DiasHospedados');
		$this->db->from('tbl_alojamiento a');
		$this->db->join('tbl_cliente c', 'a.id_cliente = c.id_cliente');
		$this->db->where("a.fecha_salida BETWEEN CAST(concat('$anio','-01-01') AS DATE) AND CAST(concat('$anio','-12-31') AS DATE) and c.nombres_cliente = '$nombre'");
		$this->db->group_by("c.nombres_cliente, MesInicio, MesFinal");
		$this->db->order_by('SUM(AlojamientosMesual), nombres_cliente', 'DESC');
		$query = $this->db->get();
		return  $query->result();

	}

	public function ClientesFrecuentes($year){

		$this->db->select('c.nombres_cliente,
			count(c.nombres_cliente) as AlojamientosMesual,
			SUM(timestampdiff(DAY, a.fecha_entrada, a.fecha_salida)) as DiasHospedados');
		$this->db->from('tbl_alojamiento a');
		$this->db->join('tbl_cliente c', 'a.id_cliente = c.id_cliente');
		$this->db->where("a.fecha_salida BETWEEN CAST(concat('$year','-01-01') AS DATE) AND CAST(concat('$year','-12-31') AS DATE)");
		$this->db->group_by("c.nombres_cliente");
		$this->db->order_by('AlojamientosMesual', 'DESC');
		$query = $this->db->get();
		return  $query->result();

	}
	

	
} 