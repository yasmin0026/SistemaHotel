<?php 
if (isset($actualizar)) {
	$action = "update";
	$card_title = 'Modificar registro';
	$id = '<input type="hidden" name="id_categoria" value="' . $this->uri->segment(3) . '">';
	$tipo = $actualizar->tipo_habitacion;
}else{
	$action = "insert";
	$card_title = 'Nuevo registro';
	$id = '';
	$tipo = '';
}
?>

<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form  action="<?= base_url() . 'CategoriasController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content lb">
						<span class="card-title center"><?=$card_title;?></span>
						<?=$id; ?>
						<br>

						<div class="input-field">
							<input id="tipo_habitacion" type="text" name="tipo_habitacion" value="<?=$tipo;?>">
							<label for="tipo_habitacion">Nombre del Nivel</label>
						</div>

					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light btnDynamic" type="submit">Guardar</button>
						<a href="<?=base_url().'CategoriasController/';?>" class="btn red">Mostrar</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m3 l3"></div>
	</div>
</div>