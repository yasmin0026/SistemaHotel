<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model{

    public function getUsuarios(){
        $this->db->join('tbl_rol','tbl_rol.id_rol = tbl_usuario.id_rol');
         $query = $this->db->get('tbl_usuario');
        return $query->result();
    }

    public function insertUsuario($datos){
        if($this->db->insert('tbl_usuario',$datos))
            return true;
        else
            return false;
    }

    public function getUsuario($id_usuario){
        $this->db->select('*');
        $this->db->from('tbl_usuario');
        $this->db->where('id_usuario',$id_usuario);
        $query = $this->db->get();
        return $query->row();
    }

    public function updateUsuario($datos){
        $this->db->set('nombres_usuario', $datos['nombres_usuario']);
        $this->db->set('apellido_usuario', $datos['apellido_usuario']);
        $this->db->set('nick_usuario', $datos['nick_usuario']);
        $this->db->set('contrasena_usuario', $datos['contrasena_usuario']);
        $this->db->set('id_rol', $datos['id_rol']);
        $this->db->set('id_usuario', $datos['id_usuario']);
    if($this->db->update('tbl_usuario'))
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


?>