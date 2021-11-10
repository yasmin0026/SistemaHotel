<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Recovery extends CI_Model{

    public function getUsuarioByNick($nick)
    {
        $this->db->where("nick_usuario = '".$nick."'");
        $query = $this->db->get('tbl_usuario');
        return $query->row();
    }

    public function getUsuarioByIdNick($id,$nick,$pregunta,$respuesta)
    {
        $this->db->where("nick_usuario = '".$nick."'");
        $this->db->where("recovery_pregunta = '".$pregunta."'");
        $this->db->where("recovery_respuesta = '".$respuesta."'");
        $this->db->where("id_usuario = '".$id."'");
        $query = $this->db->get('tbl_usuario');
        return $query->row();
    }

    public function updateUsuario($datos){
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

    public function deleteUsuario($id_usuario){
        $this->db->where('id_usuario',$id_usuario);
        if($this->db->delete('tbl_usuario'))
            return true;
        else
            return false;
    }
}
