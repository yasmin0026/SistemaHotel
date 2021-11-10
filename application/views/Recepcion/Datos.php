
<div class="container">
	<div class="row">
		
		
		<form  action="<?= base_url()?>RecepcionController/insertAlojamiento_Cliente" method="post">
			<div class="card col s12 m6">
				<div class="card-content lb">
					<span class="card-title center">Datos de Alojamiento</span>

					<br>
					<input  type="hidden" name="id_habitacion" value="<?=$h->id_habitacion ?>">
					<div class="col s6 m6">
						<div class="input-field">
							<input  type="text" name="nombre_habitacion" value="<?=$h->nombre_habitacion ?>">
							<label for="tipo_habitacion">Nombre habitacion</label>
						</div>

						<div class="input-field">

							
							<select name="id_categoria" class="form-control col-md-3" value="<?=$h->tipo_habitacion ?>" >

								<?php foreach ($tipoh as $k): ?>

									<option value="<?php echo $k->id_categoria ;?>"<?php echo $k->id_categoria == $h->id_categoria ? 'selected' : "" ?>><?php echo $k->tipo_habitacion ;?>
								</option>

							<?php endforeach; ?>

						</select>



						<label for="tipo_habitacion">Tipo de habitacion</label>
					</div>

					<div class="input-field">
						<input id="detalle_habitacion" type="text" name="detalle_habitacion" value="<?=$h->detalle_habitacion ?>">
						<label for="detalle_habitacion">Detalles</label>
					</div>

				</div>

				<div class="col s6 m6">
					<div class="input-field">
						<input id="precio_habitacion"  type="text" name="precio_habitacion" value="<?=$h->precio_habitacion ?>">
						<label for="precio_habitacion">Precio</label>
					</div>

					<div class="input-field">
						<input id="tarifa" type="text" name="tarifa" value="">
						<label for="tarifa">Tarifa</label>
					</div>

					<div class="input-field">
						<input id="fecha_entrada" type="date" name="fecha_entrada">
						<label for="fecha_entrada">Fecha de entrada</label>
					</div>

					<div class="input-field">
						<input type="date" id="fecha_salida" name="fecha_salida">
						<label for="fecha_salida">Fecha de salida</label>
					</div>

				</div>
				<div class="card-action col s12 m6" style="">
					<label></label>
				</div>
			</div>
		</div>




		<div class="col s12 m6">
			<div class="card">
				<div class="card-content lb">
					<span class="card-title center">Datos Personales</span>

					<br>

					<div class="input-field">
						<input id="nombres_cliente" type="text" name="nombres_cliente" >
						<label for="nombres_cliente">Nombre Completo</label>
					</div>

					<div class="input-field">
						<select name="id_tipo_documento" class="form-control col-md-3" >
							<option>Seleccione</option>

							<?php foreach ($documento as $k): ?>

								<option value="<?php echo $k->id_tipo_documento ;?>"><?php echo $k->tipo_documento ;?>
							</option>

						<?php endforeach; ?>

					</select>

					<label for="id_tipo_documento">Tipo deDocumento</label>
				</div>

				<div class="input-field">
					<input id="documento" type="text" name="documento" value="">
					<label for="documento">Documento</label>
				</div>
				<div class="input-field">
					<input id="telefono_cliente" type="text" name="telefono_cliente" >
					<label for="telefono_cliente">Contacto</label>
				</div>



			</div>
			<div class="card-action" >
				<button class="btn waves-effect waves-light btnDynamic" type="submit">Alojar</button>
				<a href="<?=base_url().'RecepcionController/';?>" class="btn red">Mostrar</a>
			</div>
		</div>
	</div>
</form>
</div>
</div>





