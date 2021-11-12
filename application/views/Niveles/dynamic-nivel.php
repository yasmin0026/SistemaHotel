<?php 
if (isset($actualizar)) {
	$action = "updateNivel";
	$card_title = 'Modificar registro';
	$id = '<input type="hidden" name="id_nivel" value="' . $this->uri->segment(3) . '">';
	$nombre = $actualizar->nombre_nivel;
}else{
	$action = "insertNivel";
	$card_title = 'Nuevo registro';
	$id = '';
	$nombre = '';
}

?>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form  action="<?= base_url() . 'NivelesController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content lb">
						<span class="card-title center"><?=$card_title;?></span>
						<?=$id; ?>
						<br>

						<div class="input-field">
							<input id="nombre_nivel" type="text" name="nombre_nivel" value="<?=$nombre;?>">
							<label for="nombre_nivel" class="lb">Ubicacion</label>
						</div>

					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light btnDynamic" type="submit">Guardar</button>
						<a href="<?=base_url().'NivelesController/';?>" class="btn red">Mostrar</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m3 l3"></div>
	</div>
</div>