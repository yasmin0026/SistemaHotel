<?php 
if (isset($actualizar)) {
	$action = "updateHabitacion";
	$card_title = 'Modificar registro';
	$id = '<input type="hidden" name="id_habitacion" value="' . $this->uri->segment(3) . '">';
	$habitacion = $actualizar->nombre_habitacion;
	$id_categoria = $actualizar->id_categoria;
	$id_nivel = $actualizar->id_nivel;
	$id_tipo_estado = $actualizar->id_tipo_estado;
	$precio = $actualizar->precio_habitacion;
	$detalle = $actualizar->detalle_habitacion;
}else{
	$action = "insertHabitacion";
	$card_title = 'Nuevo registro';
	$id = '';
	$habitacion = "";
	$id_categoria = "";
	$id_nivel = "";
	$id_tipo_estado = "";
	$precio = "";
	$detalle = "";
}

?>

<style>
	option{
		left:10%;
	}

</style>
<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form action="<?= base_url() . 'HabitacionesController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content lb">
						<span class="card-title center"><?=$card_title;?></span>
						<?=$id; ?>
						<br>

						<div class="input-field">
							<input id="nombre_habitacion" type="text" name="nombre_habitacion"
							value="<?=$habitacion;?>">
							<label for="nombre_habitacion" class="lb">Estado de la habitacion</label>
						</div>


						<div >
							<label class="form-label">Categoria de habitacion</label>
							<select name="id_categoria" required>
								<option  class="option" required >Seleccionar</option>
								<?php foreach ($categoria as $c): ?>
									<?php if ($action == 'insertHabitacion'): ?>
										<option required value="<?=$c->id_categoria;?>"><?=$c->tipo_habitacion;?></option>
									<?php else: ?>
<option required value="<?=$c->id_categoria;?>" <?=$c->id_categoria == $id_categoria ? 'selected' : ""; ?>><?=$c->tipo_habitacion; ?></option>
									<?php endif ?>
								<?php endforeach; ?>
							</select>
						</div>


						<br>

						<label class="form-label">Nivel de habitacion</label>
						<select name="id_nivel" class="form-select" required>
							<option class="option" required>Seleccionar</option>
							<?php foreach ($niveles as $n): ?>
								<?php if ($action == 'insertHabitacion'): ?>
									<option required value="<?=$n->id_nivel;?>"><?=$n->nombre_nivel;?></option>
								<?php else: ?>
	<option required value="<?=$n->id_nivel?>" <?=$n->id_nivel == $id_nivel ? 'selected' : ""; ?>><?=$n->nombre_nivel; ?></option>
								<?php endif ?>
							<?php endforeach; ?>
						</select>


						<br>
						
						<label class="form-label">Estado de habitacion</label>
						<select name="id_tipo_estado" id="estado"   class="form-select">
							<option class="option" required>Seleccionar</option>
							<?php foreach ($estados as $e): ?>
								<?php if ($action == 'insertHabitacion'): ?>
									<option required value="<?=$e->id_tipo_estado;?>"><?=$e->estado_habitacion;?></option>
								<?php else: ?>
<option required value="<?=$e->id_tipo_estado?>" <?=$e->id_tipo_estado == $id_tipo_estado ? 'selected' : ""; ?>><?=$e->estado_habitacion; ?></option>
								<?php endif ?>
							<?php endforeach; ?>
						</select>




						<div class="input-field">
							<input id="precio_habitacion" type="text" name="precio_habitacion" value="<?=$precio;?>">
							<label for="precio_habitacion">Precio de la habitacion</label>
						</div>
						<div class="input-field">
							<input id="detalle_habitacion" type="text" name="detalle_habitacion" value="<?=$detalle;?>">
							<label for="detalle_habitacion">Detalle de la habitacion</label>
						</div>

					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light btnDynamic" type="submit">Guardar</button>
						<a href="<?=base_url().'HabitacionesController/';?>" class="btn red">Mostrar</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m3 l3"></div>
	</div>
</div>