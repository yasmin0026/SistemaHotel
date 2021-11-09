<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model
{


	public function getUser($usuario,$contraseña){
	 	$this->db->where('nick_usuario',$usuario);
		$this->db->where('contrasena_usuario',$contraseña);
		$login = $this->db->get('tbl_usuario',1);

		return $login;    

	}  

} 

?>