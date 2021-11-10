<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermisosModel extends CI_Model{
    

    public function getMenu(){
        $this->db->join('tbl_rol R','M.id_rol = R.id_rol');
        $this->db->join('tbl_usuario U','R.id_rol = U.id_rol');
        $this->db->join('tbl_modulos MO','M.id_modulo = MO.id_modulo');
        $query = $this->db->get('menu_rol_modulo M');
        return $query->result();
    }

 
    public function getModulos($id_usuario){
        $query = $this->db->query("SELECT U.id_usuario,
            U.nick_usuario,
            MO.id_modulo,
            MO.nombre_modulo,
            MO.url_modulo
            FROM menu_rol_modulo M, tbl_modulos MO, tbl_rol R, tbl_usuario U
            where U.id_rol = R.id_rol
            and M.id_modulo = MO.id_modulo
            and M.id_rol = R.id_rol
            and U.id_usuario = '$id_usuario'
            and MO.tipo = '1';");
        return $query->result();
    }

    public function getModulos2($id_usuario){
        $query = $this->db->query("SELECT U.id_usuario,
            U.nick_usuario,
            MO.id_modulo,
            MO.nombre_modulo,
            MO.url_modulo
            FROM menu_rol_modulo M, tbl_modulos MO, tbl_rol R, tbl_usuario U
            where U.id_rol = R.id_rol
            and M.id_modulo = MO.id_modulo
            and M.id_rol = R.id_rol
            and U.id_usuario = '$id_usuario'
            and MO.tipo = '2';");
        return $query->result();
    }

    public function getRol()
    {
        $query = $this->db->get('tbl_rol');
        return $query->result();
    }

    public function getModuloOp()
    {
        $query = $this->db->get('tbl_modulos');
        return $query->result();
    }


    public function insertPermiso($datos)
    {
        if ($this->db->insert('menu_rol_modulo',$datos))
            return true;
        else
            return false;
    }


    public function getMenuAll($id_menu)
    {
        $this->db->select('*');
        $this->db->from('menu_rol_modulo');
        $this->db->where('id_menu',$id_menu);
        $query = $this->db->get();
        return  $query->row();
    }


    public function updatePermiso($datos)
    {   
        $this->db->set('eliminar',$datos['eliminar']);
        $this->db->set('actualizar',$datos['actualizar']);
        $this->db->set('crear',$datos['crear']);
        $this->db->set('id_modulo',$datos['id_modulo']);
        $this->db->set('id_rol',$datos['id_rol']);
        $this->db->where('id_menu',$datos['id_menu']);
        if($this->db->update('menu_rol_modulo'))
            return true;
        else
            return false;
    }

    public function deletePermiso($id_menu)
    {
        $this->db->where('id_menu',$id_menu);
        if ($this->db->delete('menu_rol_modulo'))
            return true;
        else
            return false;
    }

}

?>