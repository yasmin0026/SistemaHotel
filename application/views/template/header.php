<!--   ------------------------------------------    INICIO NAV BAR ----------------------------------------------------        -->
<?php foreach ($allPagina as $p):?>
  <nav>
    <div class="nav-wrapper" style="background-color:<?=$p->color_sistema;?>">
      <div class="">
        <a href="#!" class="brand-logo"><?=$p->nombre_sistema;?></a>

        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
        <li><a href="<?php echo base_url(); ?>EstadoController/">Estado</a></li>
          <li><a href="<?php echo base_url(); ?>ReservacionController/index">Reserva</a></li>
          <li><a href="<?php echo base_url(); ?>RecepcionController/">Recepción</a></li>
          <li><a href="<?php echo base_url(); ?>NivelesController/">Niveles</a></li>
          <li><a href="<?php echo base_url(); ?>CategoriasController/">Categorias</a></li>
          <li><a href="<?php echo base_url(); ?>HabitacionesController/">Habitaciones</a></li>
          <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Configuración<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>

    </div>
  </nav>
<?php endforeach; ?>

<ul class="sidenav" id="mobile-demo">
<li><a href="<?php echo base_url(); ?>EstadoController/">Estado</a></li>
  <li><a href="<?php echo base_url(); ?>LoginController/inicio">Reserva</a></li>
  <li><a href="<?php echo base_url(); ?>RecepcionController/">Recepción</a></li>
  <li><a href="<?php echo base_url(); ?>NivelesController/">Niveles</a></li>
  <li><a href="<?php echo base_url(); ?>CategoriasController/">Categorias</a></li>
  <li><a href="<?php echo base_url(); ?>HabitacionesController/">Habitaciones</a></li>
  <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Configuración<i class="material-icons right">arrow_drop_down</i></a></li>
</ul>

<ul class="dropdown-content" id="dropdown1">
  <li><a href="<?php echo base_url(); ?>UsuarioController">Usuarios y Roles</a></li>
  <li><a href="<?php echo base_url(); ?>PersonalizarPage">Personalizar página</a></li>
  <li><a href="<?php echo base_url(); ?>">Mi cuenta</a></li>
  <li><a href="<?php echo base_url(); ?>LoginController/logout">Cerrar sesión</a></li>

</ul>

<ul class="dropdown-content" id="dropdown2">
 <li><a href="<?php echo base_url(); ?>UsuarioController">Usuarios y Roles</a></li>
 <li><a href="<?php echo base_url(); ?>PersonalizarPage">Personalizar página</a></li>
 <li><a href="<?php echo base_url(); ?>">Mi cuenta</a></li>
 <li><a href="<?php echo base_url(); ?>LoginController/logout">Cerrar sesión</a></li>
</ul>

<!--   ------------------------------------------    FIN NAV BAR ----------------------------------------------------        -->