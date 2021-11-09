<?php 
if (isset($actualizar)) {
	$action = "updateUsuario";
	$card_title = 'Modificar registro';
	$id = '<input type="hidden" name="id_usuario" value="' . $this->uri->segment(3) . '">';
	$nombre = $actualizar->nombres_usuario;
    $apellido = $actualizar->apellido_usuario;
    $nick = $actualizar->nick_usuario;
    $contrasena = $actualizar->contrasena_usuario;
    $id_rol = $actualizar->id_rol;
 
}else{
	$action = "insertUsuario";
	$card_title = 'Nuevo registro';
	$id = '';
	$nombre = "";
    $apellido = "";
    $nick = "";
    $contrasena = "";
    $id_rol = "";
    
}

?>

   
</style>
<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form action="<?= base_url() . 'UsuarioController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content blue-text">
						<span class="card-title center"><?=$card_title;?></span>
						<?=$id; ?>
						<br>

						<div class="input-field">
							<input id="nombres_usuario" type="text" name="nombres_usuario"
								value="<?=$nombre;?>">
							<label for="nombres_usuario">Nombre del Usuario</label>
						</div>

                        <div class="input-field">
							<input id="apellido_usuario" type="text" name="apellido_usuario" value="<?=$apellido;?>">
							<label for="apellido_usuario">Apellido del Usuario</label>
						</div>
						<div class="input-field">
							<input id="nick_usuario" type="text" name="nick_usuario" value="<?=$nick;?>">
							<label for="nick_usuario">Nick del Usuario</label>
						</div>

                        <div class="input-field">
							<input id="contrasena_usuario" type="text" name="contrasena_usuario" value="<?=$contrasena;?>">
							<label for="contrasena_usuario">Contraseña del Usuario</label>
						</div>
                        <label class="form-label">Rol</label>
							<select name="id_rol"   class="form-select">
								<option class="option" required>Seleccionar</option>
								<?php foreach ($roles as $r): ?>
								<?php if ($action == 'insertUsuario'): ?>
								<option required value="<?=$r->id_rol;?>"><?=$r->nombre_rol;?></option>
								<?php else: ?>
								<option required value="<?=$r->id_rol?>" <?=$r->id_rol == $id_rol ? 'selected' : ""; ?>>
									<?=$r->nombre_rol; ?>
								</option>
								<?php endif ?>
								<?php endforeach; ?>
							</select>
					



						

					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light green accent-3" type="submit">Guardar</button>
						<a href="<?=base_url().'UsuarioController/';?>" class="btn red">Mostrar</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m3 l3"></div>
	</div>
</div>