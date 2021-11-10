<?php
if (isset($actualizar)) {
	$action = "updateRol";
	$card_title = 'Modificar registro';
	$id = '<input type="hidden" name="id_rol" value="' . $this->uri->segment(3) . '">';
	$rol = $actualizar->nombre_rol;
	$crear = $actualizar->crear;
	$editar = $actualizar->actualizar;
	$eliminar  = $actualizar->eliminar;
} else {
	$action = "insertRol";
	$card_title = 'Nuevo registro';
	$id = '';
	$rol = '';
	$crear = '';
	$editar = '';
	$eliminar  = '';
}

?>

<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form action="<?= base_url() . 'RolesController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content lb">
						<span class="card-title center"><?= $card_title; ?></span>
						<?= $id; ?>
						<br>

						<div class="input-field">
							<input id="nombre_rol" type="text" name="nombre_rol" value="<?= $rol; ?>">
							<label for="nombre_rol">Nombre del Rol</label>
						</div>

						<div class="input-field">
							<select name="crear" class="form-select" require>
								<option>Seleccionar</option>
								<?php if ($action == 'insertRol') : ?>
									<option value="SI">SI</option>
									<option value="NO">NO</option>
								<?php else : ?>
									<?php if ($crear == "SI") : ?>
										<option value="SI" selected>SI</option>
										<option value="NO">NO</option>
									<?php else : ?>
										<option value="NO" selected>NO</option>
										<option value="SI">SI</option>
									<?php endif; ?>
								<?php endif ?>
							</select>
							<label for="nombre_rol">¿Puede crear?</label>
						</div>

						<div class="input-field">
							<select name="actualizar" class="form-select" require>
								<option>Seleccionar</option>
								<?php if ($action == 'insertRol') : ?>
									<option value="SI">SI</option>
									<option value="NO">NO</option>
								<?php else : ?>
									<?php if ($editar == "SI") : ?>
										<option value="SI" selected>SI</option>
										<option value="NO">NO</option>
									<?php else : ?>
										<option value="NO" selected>NO</option>
										<option value="SI">SI</option>
									<?php endif; ?>
								<?php endif ?>
							</select>
							<label for="nombre_rol">¿Puede editar?</label>
						</div>

						<div class="input-field">
							<select name="eliminar" class="form-select" require>
								<option>Seleccionar</option>
								<?php if ($action == 'insertRol') : ?>
									<option value="SI">SI</option>
									<option value="NO">NO</option>
								<?php else : ?>
									<?php if ($eliminar == "SI") : ?>
										<option value="SI" selected>SI</option>
										<option value="NO">NO</option>
									<?php else : ?>
										<option value="NO" selected>NO</option>
										<option value="SI">SI</option>
									<?php endif; ?>
								<?php endif ?>
							</select>
							<label for="nombre_rol">¿Puede eliminar?</label>
						</div>

					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light btnDynamic" type="submit">Guardar</button>
						<a href="<?= base_url() . 'RolesController/'; ?>" class="btn red">Mostrar</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m3 l3"></div>
	</div>
</div>