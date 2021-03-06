<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$page_title ?></title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css">
	<!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-colorpicker.min.css">

	<!-- Datatable css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	
	<!-- Calendario -->
	<link href='<?php echo base_url(); ?>assets/plugins/fullcalendar-3.10.4/fullcalendar.min.css' rel='stylesheet' />

	<link href='<?php echo base_url(); ?>assets/plugins/fullcalendar-3.10.4/fullcalendar.print.min.css' rel='stylesheet' media='print' />

	<script src='<?php echo base_url(); ?>assets/plugins/fullcalendar-3.10.4/lib/moment.min.js'></script>
	<script src='<?php echo base_url(); ?>assets/plugins/fullcalendar-3.10.4/lib/jquery.min.js'></script>
	<script src='<?php echo base_url(); ?>assets/plugins/fullcalendar-3.10.4/fullcalendar.min.js'></script>
	<!-- idioma español -->
	<script src='<?php echo base_url(); ?>assets/plugins/fullcalendar-3.10.4/locale/es.js'></script>

	<style type="text/css">
		@font-face {
			font-family: 'Material Icons';
			font-style: normal;
			font-weight: 400;
			src: url(<?=base_url().'assets/iconos/font/MaterialIcons-Regular.ttf';?>); /* For IE6-8 */
			src: local('Material Icons'),
			local(<?=base_url().'assets/iconos/font/MaterialIcons-Regular.ttf';?>),
			url(https://example.com/MaterialIcons-Regular.woff2) format('woff2'),
			url(https://example.com/MaterialIcons-Regular.woff) format('woff'),
			url(<?=base_url().'assets/iconos/font/MaterialIcons-Regular.ttf';?>) format('truetype');
		}

		.material-icons {
			font-family: 'Material Icons';
			font-weight: normal;
			font-style: normal;
			font-size: 24px;  /* Preferred icon size */
			display: inline-block;
			line-height: 1;
			text-transform: none;
			letter-spacing: normal;
			word-wrap: normal;
			white-space: nowrap;
			direction: ltr;

			/* Support for all WebKit browsers. */
			-webkit-font-smoothing: antialiased;
			/* Support for Safari and Chrome. */
			text-rendering: optimizeLegibility;

			/* Support for Firefox. */
			-moz-osx-font-smoothing: grayscale;

			/* Support for IE. */
			font-feature-settings: 'liga';
		}
	</style>
</head>
<body>
	<style type="text/css">
		#toast-container {
			min-width: 10%;
			top: 80%;
			right: 20%;
			transform: translateX(50%) translateY(50%);
		}
	</style>
	<?php if ($this->session->flashdata('insert')): ?>
		<script>
			$(function() {
				M.toast({
					html: '<?=$this->session->flashdata('insert')?>',
					displayLength: 2000,
					classes: 'rounded green accent-3 pulse'
				});
			})
		</script>
	<?php endif; ?>
	<?php if($this->session->flashdata('delete')): ?>
		<script>
			$(function() {
				M.toast({
					html: '<?=$this->session->flashdata('delete')?>',
					displayLength: 2000,
					classes: 'rounded red accent-4 pulse'
				});
			})
		</script>
	<?php endif; ?>

	<?php if($this->session->flashdata('update')): ?>
		<script>
			$(function() {
				M.toast({
					html: '<?=$this->session->flashdata('update')?>',
					displayLength: 2000,
					classes: 'rounded blue darken-2 pulse'
				});
			})
		</script>
	<?php endif; ?>

	<?php $this->load->view('template/header'); ?>
	<?php $this->load->view($view,$data_view); ?>
	<?php $this->load->view('template/footer'); ?>

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker.min.js"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function(){
				M.AutoInit();
			});

		</script>
	</body>
	</html>