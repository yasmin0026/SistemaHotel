<?php 
if (isset($actualizarP)) {
	$action = "updateEstadoPago";
	$card_title = 'Modificar registro';
	$id_estado_pago = '<input type="hidden" name="id_estado_pago" value="' . $this->uri->segment(3) . '">';
	$estado_pago = $actualizarP->estado_pago;
}else{
	$action = "insertEstadoPago";
	$card_title = 'Nuevo registro';
	$id_estado_pago = '';
	$estado_pago = '';
}

?>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form  action="<?= base_url() . 'EstadoPagoController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content blue-text">
						<span class="card-title center"><?=$card_title;?></span>
						<?=$id_estado_pago; ?>
						<br>

						<div class="input-field">
							<input id="estado_pago" type="text" name="estado_pago" value="<?=$estado_pago;?>">
							<label for="estado_pago">Estado Pago</label>
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