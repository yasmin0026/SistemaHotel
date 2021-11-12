<?php 
if (isset($actualizar)) {
	$action = "updateEstado";
	$card_title = 'Modificar registro';
	$id = '<input type="hidden" name="id_tipo_estado" value="' . $this->uri->segment(3) . '">';
	$estado = $actualizar->estado_habitacion;
}else{
	$action = "insertEstado";
	$card_title = 'Nuevo registro';
	$id = '';
	$estado = '';
}

?>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form  action="<?= base_url() . 'EstadoController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content lb">
						<span class="card-title center"><?=$card_title;?></span>
						<?=$id; ?>
						<br>

						<div class="input-field">
							<input id="estado_habitacion" type="text" name="estado_habitacion" value="<?=$estado;?>">
							<label for="estado_habitacion" class="lb">Estado de la habitacion</label>
						</div>

					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light btnDynamic" type="submit">Guardar</button>
						<a href="<?=base_url().'EstadoController/';?>" class="btn red">Mostrar</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m3 l3"></div>
	</div>
</div>