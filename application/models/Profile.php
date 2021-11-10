<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Model
{

    public function getUsuario($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_usuario');
        $this->db->join("tbl_rol", "tbl_rol.id_rol = tbl_usuario.id_rol");
        $this->db->where('id_usuario', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateInformation($datos)
    {
        $this->db->set('nombres_usuario', $datos['nombres_usuario']);
        $this->db->set('apellido_usuario', $datos['apellido_usuario']);
        $this->db->set('nick_usuario', $datos['nick_usuario']);
        $this->db->set('contrasena_usuario', $datos['contrasena_usuario']);
        $this->db->set('id_rol', $datos['id_rol']);
        $this->db->set('recovery_pregunta', $datos['recovery_pregunta']);
        $this->db->set('recovery_respuesta', $datos['recovery_respuesta']);
        $this->db->where('id_usuario', $datos['id_usuario']);
        if ($this->db->update('tbl_usuario'))
            return true;
        else
            return false;
    }
}
