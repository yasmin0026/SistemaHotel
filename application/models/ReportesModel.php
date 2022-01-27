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
			ELT(MONTH(a.fecha_entrada), "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre") as MesInicio,
			ELT(MONTH(a.fecha_salida), "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre") as MesFinal,
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


		public function DiasVacios($year){

		$query = $this->db->query("select concat(p.mes,'/','2022') as Mes,
			day(last_day(cast(CONCAT('2022-',p.mes2,'-',01) as date))) as DiasDelMes,
			ifnull(SUM(timestampdiff(DAY, v.fecha_entrada, v.fecha_salida)), 0) as DiasHospedados,
			(day(last_day(cast(CONCAT('2022-',p.mes2,'-',01) as date))) - ifnull(SUM(timestampdiff(DAY, v.fecha_entrada, v.fecha_salida)), 0)) as DiasNoHospedados

			from (select 'Enero' as mes, 1 as mes2 union select 'Febrero', 2  union select'Marzo', 3  union select 'Abril', 4  union select 'Mayo', 5  union 
			select 'Junio', 6  union select 'Julio', 7  union select 'Agosto', 8  union select 'Septiembre', 9  union select 'Octubre', 10  union 
            select 'Noviembre', 11  union select 'Diciembre', 12 ) P

            left join tbl_alojamiento v
            
            on MONTH(v.fecha_entrada) = p.mes2
            and YEAR(v.fecha_entrada) = 2022

       		group by p.mes
       		order by DiasNoHospedados DESC;");
		
		return $query->result();

	}

	

	
} 