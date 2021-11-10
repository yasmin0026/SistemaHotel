<?php 
if (isset($actualizar)) {
	$action = "updateImprevisto";
	$card_title = 'Modificar registro';
	$id = '<input type="hidden" name="id_imprevisto" value="' . $this->uri->segment(3) . '">';
	$tipo_imprevisto = $actualizar->tipo_imprevisto;
	$id_habitacion = $actualizar->id_habitacion;
	$descripcion = $actualizar->descripcion;
	$compensacion = $actualizar->compensacion;
}else{
	$action = "insertImprevisto";
	$card_title = 'Nuevo imprevisto';
	$id = '';
	$tipo_imprevisto = "";
	$id_habitacion = "";
	$descripcion = "";
	$compensacion = "";
}
?>

<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form  action="<?= base_url() . 'ImprevistoController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content lb">
						<span class="card-title center"><?=$card_title;?></span>
						<?=$id; ?>
						<br>

						<div class="input-field">
							<input id="tipo_imprevisto" type="text" name="tipo_imprevisto" value="<?=$tipo_imprevisto;?>">
							<label for="tipo_imprevisto">Tipo de Imprevisto</label>
						</div>

						<label class="form-label">Habitación </label>
						<select name="id_habitacion" id="id_habitacion"   class="form-select">
							<option class="option" required>Seleccionar</option>
							<?php foreach ($habitacion as $h): ?>
								<?php if ($action == 'insertImprevisto'): ?>
									<option required value="<?=$h->id_habitacion;?>"><?=$h->nombre_habitacion;?></option>
								<?php else: ?>
		<option required value="<?=$h->id_habitacion?>" <?=$h->id_habitacion == $id_habitacion ? 'selected' : ""; ?>><?=$h->nombre_habitacion; ?></option>
								<?php endif ?>
							<?php endforeach; ?>
						</select>
						<div class="input-field">
							<input id="descripcion" type="text" name="descripcion" value="<?=$descripcion;?>">
							<label for="descripcion">Descripcion</label>
						</div>

						<div class="input-field">
							<input id="compensacion" type="text" name="compensacion" value="<?=$compensacion;?>">
							<label for="descripcion">Compensacion</label>
						</div>

					</div>
					<div class="card-action">
						<button class="btn waves-effect waves-light btnDynamic" type="submit">Guardar</button>
						<a href="<?=base_url().'ImprevistoController/';?>" class="btn red">Mostrar</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col s12 m3 l3"></div>
	</div>
</div>