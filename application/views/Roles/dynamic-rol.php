<?php 
if (isset($actualizar)) {
	$action = "updateRol";
	$card_title = 'Modificar registro';
	$id = '<input type="hidden" name="id_rol" value="' . $this->uri->segment(3) . '">';
	$rol = $actualizar->nombre_rol;
}else{
	$action = "insertRol";
	$card_title = 'Nuevo registro';
	$id = '';
	$rol = '';
}

?>

<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form  action="<?= base_url() . 'RolesController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content blue-text">
						<span class="card-title center"><?=$card_title;?></span>
						<?=$id; ?>
						<br>

						<div class="input-field">
							<input id="nombre_rol" type="text" name="nombre_rol" value="<?=$rol;?>">
							<label for="nombre_rol">Nombre del Rol</label>
						</div>

					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light green accent-3" type="submit">Guardar</button>
						<a href="<?=base_url().'RolesController/';?>" class="btn red">Mostrar</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m3 l3"></div>
	</div>
</div>