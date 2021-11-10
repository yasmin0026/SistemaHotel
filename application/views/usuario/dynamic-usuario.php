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
	$pregunta = $actualizar->recovery_pregunta;
	$respuesta = $actualizar->recovery_respuesta;
} else {
	$action = "insertUsuario";
	$card_title = 'Nuevo registro';
	$id = '';
	$nombre = "";
	$apellido = "";
	$nick = "";
	$contrasena = "";
	$id_rol = "";
	$pregunta = "";
	$respuesta = "";
}

?>

<script type="text/javascript">
	$(document).on('change', '#generador', function(event) {
		$('#recovery_pregunta').val($("#generador option:selected").text());
		$('.labelActive').addClass('active');
	});
</script>
<div class="container">
	<div class="row">
		<div class="col s12 m1 l1"></div>

		<form action="<?= base_url() . 'UsuarioController/' . $action; ?>" method="post">
			<div class="card col s12 m9 l9">
				<div class="card-content lb">
					<span class="card-title center"><?= $card_title; ?></span>
					<?= $id; ?>
					<br>

					<div class="input-field col s12 m6 l6">
						<input id="nombres_usuario" type="text" name="nombres_usuario" value="<?= $nombre; ?>">
						<label for="nombres_usuario">Nombre del Usuario</label>
					</div>

					<div class="input-field col s12 m6 l6">
						<input id="apellido_usuario" type="text" name="apellido_usuario" value="<?= $apellido; ?>">
						<label for="apellido_usuario">Apellido del Usuario</label>
					</div>


					<div class="input-field col s12 m6 l6">
						<input id="nick_usuario" type="text" name="nick_usuario" value="<?= $nick; ?>">
						<label for="nick_usuario">Nick del Usuario</label>
					</div>

					<div class="input-field col s12 m6 l6">
						<input id="contrasena_usuario" type="text" name="contrasena_usuario" value="<?= $contrasena; ?>">
						<label for="contrasena_usuario">Contraseña del Usuario</label>
					</div>
					<div class="row">
						<div class="card col s12 m12 l12 yellow lighten-3">

							<div class="card-content lb">
								<span class="card-title lb">Seguridad</span>
								<br>
								<label class="lb" for="generador">GENERADOR: Subjerecias de posibles preguntas o pistas</label>
								<select id="generador" class="form-control" name="generador" id="generador">
									<option value="" selected="selected">Seleccione</option>
									<option value="1">Nombre de tu mamá</option>
									<option value="2">Nombre de tu papá</option>
									<option value="3">Nombre de tu primera mascota</option>
									<option value="4">Lugar de nacimiento</option>
									<option value="5">Nombre de tu primer amor</option>
									<option value="6">Nombre de tu mejor amigo/a</option>
									<option value="7">Nombre de tu conyugue</option>
									<option value="8">Nombre tu primer hijo/a</option>
									<option value="9">Color favorito</option>
									<option value="10">Tu comida favorita</option>
									<option value="11">Número de teléfono</option>
									<option value="12">Número favorito</option>
								</select>

								<br>

								<div class="input-field col s12 m6 l6">
									<input id="recovery_pregunta" type="text" name="recovery_pregunta" value="<?= $pregunta; ?>">
									<label for="recovery_pregunta" class="labelActive">Pregunta de recuperación</label>
								</div>

								<div class="input-field col s12 m6 l6">
									<input id="recovery_respuesta" type="text" name="recovery_respuesta" value="<?= $respuesta; ?>">
									<label for="recovery_respuesta" class="labelActive">Respuesta de recuperación</label>
								</div>

								<br>

								<label class="form-label lb">Rol</label>
								<select name="id_rol" class="form-select">
									<option class="option" required>Seleccionar</option>
									<?php foreach ($roles as $r) : ?>
										<?php if ($action == 'insertUsuario') : ?>
											<option required value="<?= $r->id_rol; ?>"><?= $r->nombre_rol; ?></option>
										<?php else : ?>
											<option required value="<?= $r->id_rol ?>" <?= $r->id_rol == $id_rol ? 'selected' : ""; ?>><?= $r->nombre_rol; ?></option>
										<?php endif ?>
									<?php endforeach; ?>
								</select>

							</div>
						</div>
					</div>

				</div>
				<div class="card-action">
					<button class="btn waves-effect waves-light btnDynamic" type="submit">Guardar</button>
					<a href="<?= base_url() . 'UsuarioController/'; ?>" class="btn red">Mostrar</a>
				</div>
			</div>
		</form>
	</div>
</div>