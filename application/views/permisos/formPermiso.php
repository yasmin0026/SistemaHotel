<?php 
if (isset($update)) {
	$action = "updatePermiso";
	$card_title = 'Modificar Permiso de Rol';
	$id = '<input type="hidden" name="id_menu" value="' . $this->uri->segment(3) . '">';
	$id_rol = $update->id_rol;
	$id_modulo = $update->id_modulo;
	
}else{
	$action = "insertPermiso";
	$card_title = 'Nuevo Permiso de Rol';
	$id = '';
	$id_rol = '';
	$id_modulo = '';
	
}

?>

<div class="container">
	<div class="row">
		<div class="col s12 m3 l3"></div>
		<div class="col s12 m6 l6">
			<form  action="<?= base_url() . 'PermisosController/' . $action; ?>" method="post">
				<div class="card">
					<div class="card-content blue-text">
						<span class="card-title center lb"><?=$card_title;?></span>
						<?=$id; ?>
						<br>
						<label class="form-label lb">Seleccione el rol</label>
						<select name="id_rol" required>
							<option  class="option" required >-- Seleccione un rol --</option>
							<?php foreach ($rol as $r): ?>
								<?php if ($action == 'insertPermiso'): ?>
									<option required value="<?=$r->id_rol;?>"><?=$r->nombre_rol;?></option>
								<?php else: ?>
						<option required value="<?=$r->id_rol;?>" <?=$r->id_rol == $id_rol ? 'selected' : ""; ?>><?=$r->nombre_rol; ?></option>
								<?php endif ?>
							<?php endforeach; ?>
						</select>
						<br>
						<label class="form-label lb">Seleccione el modulo</label>
						<select name="id_modulo" required>
							<option  class="option" required >-- Seleccione un modulo --</option>
							<?php foreach ($modulo as $m): ?>
								<?php if ($action == 'insertPermiso'): ?>
									<option required value="<?=$m->id_modulo;?>"><?=$m->nombre_modulo;?></option>
								<?php else: ?>
	<option required value="<?=$m->id_modulo;?>" <?=$m->id_modulo == $id_modulo ? 'selected' : ""; ?>><?=$m->nombre_modulo; ?></option>
								<?php endif ?>
							<?php endforeach; ?> 
						</select>
						
					</div>
				</div>
				<div class="card-action">
					<button class="btn waves-effect waves-light btnDynamic" type="submit">Guardar</button>
					<a href="<?=base_url().'PermisosController/';?>" class="btn red">Mostrar</a>
				</div>
			</div>
		</form>
	</div>
	<div class="col s12 m3 l3"></div>
</div>
</div>