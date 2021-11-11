<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estados extends CI_Model{


    public function getEstados2(){
         $this->db->join('tbl_habitacion','tbl_habitacion.id_tipo_estado = tbl_tipo_estado.id_tipo_estado');
        $query = $this->db->get('tbl_tipo_estado');
        return $query->result();
    }

    public function getEstados(){
        $query = $this->db->get('tbl_tipo_estado');
        return $query->result();
    }


    public function insertEstado($datos){
        if($this->db->insert('tbl_tipo_estado',$datos))
            return true;
        else
            return false;
    }

    public function getEstado($id_tipo_estado){
        $this->db->select('*');
        $this->db->from('tbl_tipo_estado');
        $this->db->where('id_tipo_estado',$id_tipo_estado);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateEstado($datos)
    {
        $this->db->set('estado_habitacion',$datos['estado_habitacion']);
        $this->db->where('id_tipo_estado',$datos['id_tipo_estado']);
        if($this->db->update('tbl_tipo_estado'))
            return true;
        else
            return false;
    }

    public function deleteEstado($id_tipo_estado){
        $this->db->where('id_tipo_estado',$id_tipo_estado);
        if($this->db->delete('tbl_tipo_estado'))
            return true;
        else
            return false;
    }




}

?>