<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Model{

public function getRoles()
{
    $query = $this->db->get('tbl_rol');
    return $query->result();
}


public function insertRol($datos){
    if($this->db->insert('tbl_rol',$datos))
    return true;
else
    return false;
}

public function getRol($id_rol){
    $this->db->select('*');
    $this->db->from('tbl_rol');
    $this->db->where('id_rol',$id_rol);
    $query = $this->db->get();
    return $query->row();
}

public function updateRol($datos)
{
    $this->db->set('nombre_rol',$datos['nombre_rol']);
    $this->db->where('id_rol',$datos['id_rol']);
    if($this->db->update('tbl_rol'))
    return true;
else
    return false;
}

public function deleteRol($id_rol){
    $this->db->where('id_rol',$id_rol);
    if($this->db->delete('tbl_rol'))
    return true;
else
    return false;
}




}

?>