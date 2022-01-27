
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form  action="<?= base_url(); ?>RecepcionController/updateAlojamiento" method="post">
				<div class="card">
					<div class="card-content lb">
						<span class="card-title center">Actualizar Registro</span>
						<input id="id_alojamiento" type="hidden" name="id_alojamiento" value="<?=$al->id_alojamiento ?>">
						<br>


						<label class="form-label">Cliente </label>
						<select name="id_cliente" id="id_cliente"   class="form-select">
							<option class="option" required>Seleccionar</option>
							<?php foreach ($client as $c): ?>
									<option required value="<?php echo  $c->id_cliente; ?>"
									 <?php echo $c->id_cliente == $al->id_cliente ? 'selected' : ""; ?>><?=$c->nombres_cliente; ?></option>
								
							<?php endforeach; ?>
						</select>
						<br>

						<label class="form-label">Habitacion </label>
						<select name="id_habitacion" id="id_habitacion"   class="form-select">

							<option class="option" required>Seleccionar</option>
							<?php foreach ($hab as $h): ?>
								
									<option required value="<?php echo $h->id_habitacion?>" 
										<?php echo $h->id_habitacion == $al->id_habitacion ? 'selected' : ""; ?>><?=$h->nombre_habitacion; ?></option>
								
							<?php endforeach; ?>
						</select>
						<br>

						<div class="input-field">
							<input id="tarifa" type="text" name="tarifa" value="<?=$al->tarifa;?>">
							<label for="tarifa">tarifa</label>
						</div>
						
						<div class="input-field">
							<input id="fecha_entrada" type="date" name="fecha_entrada" value="<?=$al->fecha_entrada;?>">
							<label for="fecha_entrada">Fecha de entrada</label>
						</div>

						<div class="input-field">
							<input id="fecha_salida" type="date" name="fecha_salida" value="<?=$al->fecha_salida;?>">
							<label for="fecha_salida">Fecha de salida</label>
						</div>


						<div class="input-field">
							<input id="precio_alojamiento" type="text" name="precio_alojamiento" value="<?=$al->precio_alojamiento;?>">
							<label for="precio_alojamiento">Precio de Alojamiento</label>
						</div>

						

					</div>
					<div class="card-action">
					<button class="btn waves-effect waves-light btnDynamic" name="enviar" type="submit">Guardar</button>
						<a href="<?=base_url().'RecepcionController/AlojamientoView';?>" class="btn red">Mostrar</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m3 l3"></div>
	</div>
</div>