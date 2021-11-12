 

<!--   ------------------------------------------    INICIO NAV BAR ----------------------------------------------------        -->
<?php foreach ($allPagina as $p):?>

  <style>

    body{
      background-color: #E2E5E2;
    }


   /* Botones normales  */
   .btnDynamic {
     background-color: <?= $p->color_sistema; ?>;
     color: white;
   }

   .aDynamic {
     background-color: <?= $p->color_sistema; ?>;
     color: white;
   }

   .btnDynamic[type=submit] {
     background-color: <?= $p->color_sistema; ?>;
   }

   .btnDynamic:hover {
     background-color: <?= $p->color_sistema; ?>;
   }

   /* label color */
   .input-field label {
     color: <?= $p->color_sistema; ?>;
   }

   /* label focus color */
   .input-field input[type=text]:focus+label {
     color: <?= $p->color_sistema; ?>;
   }

   /* label underline focus color */
   .input-field input[type=text]:focus {
     border-bottom: 1px solid <?= $p->color_sistema; ?>;
     box-shadow: 0 1px 0 0 <?= $p->color_sistema; ?>;
   }

   /* valid color */
   .input-field input[type=text].valid {
     border-bottom: 1px solid <?= $p->color_sistema; ?>;
     box-shadow: 0 1px 0 0 <?= $p->color_sistema; ?>;
   }

   /* invalid color */
   .input-field input[type=text].invalid {
     border-bottom: 1px solid <?= $p->color_sistema; ?>;
     box-shadow: 0 1px 0 0 <?= $p->color_sistema; ?>;
   }

   /* icon prefix focus color */
   .input-field .prefix.active {
     color: <?= $p->color_sistema; ?>;
   }
 </style>
 <script type="text/javascript">
   window.onload = function() {
     $(".lb").css("color", "<?= $p->color_sistema; ?>");
     $('.form-label').css("color", "<?= $p->color_sistema; ?>");
     $(".dynamic").css("color", "<?= $p->color_sistema; ?>");
     $(".btnDynamic").css("background-color", "<?= $p->color_sistema; ?>");
     $(".input-field").css("color", "<?= $p->color_sistema; ?>");
   }
 </script>

 <nav>
  <div class="nav-wrapper" style="background-color:<?=$p->color_sistema;?>">
    <div >
      <a href="#!" class="brand-logo"><?=$p->nombre_sistema;?></a> 
      
    <?php endforeach; ?>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down ">


      <?php if ($this->session->userdata('id_rol') === '1') : ?>

       <li><a href="<?php echo base_url(); ?>LoginController/inicio">Reserva</a></li>
       <li><a href="<?php echo base_url(); ?>RecepcionController/index">Recepción</a></li>
       <li><a href="<?php echo base_url(); ?>DocumentoController/index">Tipo documento</a></li>
       




     <?php elseif ($this->session->userdata('id_rol') != '1') : ?>
      <?php $menu = $this->PermisosModel->getModulos($this->session->userdata("id_usuario"));?>
      <?php foreach($menu as $m): ?>
       <li><a href="<?php echo base_url().$m->url_modulo ?>"><?=$m->nombre_modulo ?></a></li>
     <?php endforeach; ?>

   <?php endif; ?>
   <li><a class="dropdown-trigger" href="#!" data-target="dropdown3">Habitaciones<i class="material-icons right">arrow_drop_down</i></a></li>
   <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Configuración<i class="material-icons right">arrow_drop_down</i></a></li>
   <li><a class="dropdown-trigger" href="#!" data-target="dropdown5">Usuario<i class="material-icons right">arrow_drop_down</i></a></li>
   
 </ul>
</div>

</div>
</nav>

<!--   -------------------------------------------------------- NAV 2  Vista Telefono-------------------------------------------------    -->
<ul class="sidenav" id="mobile-demo">
  <?php if($this->session->userdata('id_rol') === '1'): ?>

   <li><a href="<?php echo base_url(); ?>LoginController/inicio">Reserva</a></li>
   <li><a href="<?php echo base_url(); ?>RecepcionController/index">Recepción</a></li>
   <li><a href="<?php echo base_url(); ?>DocumentoController/index">Tipo documento</a></li>
  

   
 <?php elseif ($this->session->userdata('id_rol') != '1'): ?>
  <?php $menu = $this->PermisosModel->getModulos($this->session->userdata("id_usuario"));?>
  <?php foreach($menu as $m): ?>
   <li><a href="<?php echo base_url().$m->url_modulo ?>"><?=$m->nombre_modulo ?></a></li>
 <?php endforeach; ?>
<?php endif; ?>

<li><a class="dropdown-trigger" href="#!" data-target="dropdown4">Habitaciones<i class="material-icons right">arrow_drop_down</i></a></li>
<li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Configuración<i class="material-icons right">arrow_drop_down</i></a></li>
<li><a class="dropdown-trigger" href="#!" data-target="dropdown6">Usuario<i class="material-icons right">arrow_drop_down</i></a></li>

</ul>





<!--    ----------------------------------------- DROPDOWNS  1 -----------------------------------------------------              -->


<!-- ----------------------  CONFIGURACION ------------------- -->

<ul class="dropdown-content" id="dropdown1">
  <?php if($this->session->userdata('id_rol') === '1'): ?>
    <li><a href="<?php echo base_url(); ?>UsuarioController">Usuarios y Roles</a></li>
    <li><a href="<?php echo base_url(); ?>PersonalizarPage">Personalizar página</a></li>
    <li><a href="<?php echo base_url(); ?>PermisosController/index">Asignar Permisos</a></li>
    <li><a href="<?php echo base_url(); ?>ReportesController/index">Reportes</a></li>

  <?php elseif($this->session->userdata('id_rol') != '1'): ?>
    <?php $menu = $this->PermisosModel->getModulos3($this->session->userdata("id_usuario"));?>
    <?php foreach($menu as $m): ?>
     <li><a href="<?php echo base_url().$m->url_modulo ?>"><?=$m->nombre_modulo ?></a></li>
   <?php endforeach; ?>
 <?php endif ?>

</ul>


<!--    ----------------------------------------- DROPDOWNS 1 version  2 vista telefono -------------------------------------------     -->

<!-- ----------------------  CONFIGURACION ------------------- -->

<ul class="dropdown-content" id="dropdown2">
  <?php if($this->session->userdata('id_rol') === '1'): ?>
   <li><a href="<?php echo base_url(); ?>UsuarioController">Usuarios y Roles</a></li>
   <li><a href="<?php echo base_url(); ?>PersonalizarPage">Personalizar página</a></li>
   <li><a href="<?php echo base_url(); ?>PermisosController/index">Asignar Permisos</a></li>
   <li><a href="<?php echo base_url(); ?>ReportesController/index">Reportes</a></li>


 <?php elseif($this->session->userdata('id_rol') != '1'): ?>
  <?php $menu = $this->PermisosModel->getModulos3($this->session->userdata("id_usuario"));?>
  <?php foreach($menu as $m): ?>
   <li><a href="<?php echo base_url().$m->url_modulo ?>"><?=$m->nombre_modulo ?></a></li>
 <?php endforeach; ?>
<?php endif; ?>

</ul>

<!--    ----------------------------------------- DROPDOWNS  3 -----------------------------------------------------              -->


<!-- ----------------------  HABITACIONES ------------------- -->


<ul class="dropdown-content" id="dropdown3">
  <?php if($this->session->userdata('id_rol') === '1'): ?>
   <li><a href="<?php echo base_url(); ?>EstadoController/">Estado de habitacion</a></li>
   <li><a href="<?php echo base_url(); ?>HabitacionesController/">Habitaciones</a></li>
   <li><a href="<?php echo base_url(); ?>CategoriasController/">Categorias</a></li>
   <li><a href="<?php echo base_url(); ?>NivelesController/">Ubicación</a></li>
   <li><a href="<?php echo base_url(); ?>ImprevistoController/index">Imprevistos</a></li>
   <li><a href="<?php echo base_url(); ?>EstadoPagoController/index">Estado pago</a></li>
   <li><a href="<?php echo base_url(); ?>EstadoReservaController/index">Estado reserva</a></li>

 <?php elseif($this->session->userdata('id_rol') != '1'): ?>
  <?php $menu = $this->PermisosModel->getModulos2($this->session->userdata("id_usuario"));?>
  <?php foreach($menu as $m): ?>
   <li><a href="<?php echo base_url().$m->url_modulo ?>"><?=$m->nombre_modulo ?></a></li>
 <?php endforeach; ?>
<?php endif ?>

</ul>


<!--    ----------------------------------------- DROPDOWNS  3 version 2 vista telefono ---------------------------------------------     -->

<!-- ----------------------  HABITACIONES ------------------- -->

<ul class="dropdown-content" id="dropdown4">
  <?php if($this->session->userdata('id_rol') === '1'): ?>
    <li><a href="<?php echo base_url(); ?>EstadoController/">Estado de habitacion</a></li>
    <li><a href="<?php echo base_url(); ?>HabitacionesController/">Habitaciones</a></li>
    <li><a href="<?php echo base_url(); ?>CategoriasController/">Categorias</a></li>
    <li><a href="<?php echo base_url(); ?>NivelesController/">Ubicación</a></li>
    <li><a href="<?php echo base_url(); ?>ImprevistoController/">Imprevistos</a></li>
    <li><a href="<?php echo base_url(); ?>EstadoPagoController/index">Estado pago</a></li>
    <li><a href="<?php echo base_url(); ?>EstadoReservaController/index">Estado reserva</a></li>

  <?php elseif($this->session->userdata('id_rol') != '1'): ?>
    <?php $menu = $this->PermisosModel->getModulos2($this->session->userdata("id_usuario"));?>
    <?php foreach($menu as $m): ?>
     <li><a href="<?php echo base_url().$m->url_modulo ?>"><?=$m->nombre_modulo ?></a></li>
   <?php endforeach; ?>
 <?php endif; ?>

</ul>


<!--    ----------------------------------------- DROPDOWNS  4 -----------------------------------------------------              -->

<!-- ---------------------- USUARIO ------------------- -->

<ul class="dropdown-content" id="dropdown5">
 <li><a href="<?php echo base_url() . 'AboutMeController/myProfile/' . $this->session->userdata('id_usuario'); ?>">Mi cuenta</a></li>
 <li><a href="<?php echo base_url(); ?>LoginController/logout">Cerrar sesión</a></li>
</ul>

<!--    ----------------------------------------- DROPDOWNS  4 version 2 vista telefono ----------------------------------------------   -->

<!-- ---------------------- USUARIO ------------------- -->

<ul class="dropdown-content" id="dropdown6">

  <li><a href="<?php echo base_url(); ?>LoginController/index">Mi cuenta</a></li>
  <li><a href="<?php echo base_url(); ?>LoginController/logout">Cerrar sesión</a></li>
</ul>

<!--   ------------------------------------------    FIN NAV BAR ----------------------------------------------------        -->