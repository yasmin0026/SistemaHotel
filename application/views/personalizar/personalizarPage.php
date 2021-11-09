<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<style type="text/css">
.imgLogo{
	width: 280px;
}

</style>
<body>

	<div class="container">
		<div class="row">
			<h2>Personalizar Página web</h2>
			<br>	
			<div class="col s12 l6 m8">
				
				<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>PersonalizarPage/newStyle" autocomplete="off">
					<div class="form-group mb-4">
						<?php foreach ($allPagina as $p):?>
							<input type="hidden" name="id" value="<?=$p->id_personalizar;?>">
							<label>Logo Actual: </label><br>			
							<img class="imgLogo" src="<?php echo base_url().'assets/img/'.$p->imagen_logo ?>"><br>
							<label for="pass" class="sr-only">Nuevo logo:</label><br>
							<input type="file" name="logo" class="form-control" id="logo">

							<input type="hidden" name="logo" value="<?=$p->imagen_logo?>">



						</div>
						<br>
						<br>		
					</div>
					<div class="col s12 l6 m8">

						<div class="form-group">
							<label for="nombre" class="sr-only">Nombre del Sistema</label>
							<input type="text" name="nombre" class="form-control" value="<?=$p->nombre_sistema?>">
						</div>
						<label>Color de Navbar: </label><br>
						<div id="demo5-1" class="inl-bl" data-container="#demo5-1" data-color="<?=$p->color_sistema;?>" data-inline="true">
							<input type="text" name="color" value="<?=$p->color_sistema;?>">
						</div>
						<br>
						<br>
						<?php $color = $p->color_sistema; ?>
					<?php endforeach; ?>
					<input  name="login" id="login" class="btn btn-block login-btn mb-4" style="background-color:<?=$color;?>" type="submit" value="Enviar">
				</form>
			</div>
			
		</div>
	</div>
	
	<script>
		$(function() {
			$('#demo5-1').colorpicker();
			

		});
	</script>
</body>
</html>