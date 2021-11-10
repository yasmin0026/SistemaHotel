<?php 
if (isset($edit)) {
	$action = "update";
	$card_title = 'Modificar registro';
	$id_estado_reserva = '<input type="hidden" name="id_estado_reserva" value="' . $this->uri->segment(3) . '">';
	$estado_reserva = $edit->estado_reserva;
}else{
	$action = "insertEstadoReserva";
	$card_title = 'Nuevo registro';
	$id_estado_reserva = '';
	$estado_reserva = '';
}

?>

<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form  action="<?= base_url() . 'EstadoReservaController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content blue-text">
						<span class="card-title center"><?=$card_title;?></span>
						<?=$id_estado_reserva; ?>
						<br>

						<div class="input-field">
							<input id="estado_reserva" type="text" name="estado_reserva" value="<?=$estado_reserva;?>">
							<label for="estado_reserva">Estado de Reservacion</label>
						</div>

					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light btnDynamic" type="submit">Guardar</button>
						<a href="<?=base_url().'EstadoPagoController/';?>" class="btn red">Mostrar</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m3 l3"></div>
	</div>
</div>