 

<!--   ------------------------------------------    INICIO NAV BAR ----------------------------------------------------        -->
<?php foreach ($allPagina as $p):?>
  <nav>
    <div class="nav-wrapper" style="background-color:<?=$p->color_sistema;?>">
      <div class="">
        <a href="#!" class="brand-logo"><?=$p->nombre_sistema;?></a>
      <?php endforeach; ?>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">


        <?php if ($this->session->userdata('id_rol') === '1') : ?>

         <li><a href="<?php echo base_url(); ?>LoginController/inicio">Reserva</a></li>
         <li><a href="<?php echo base_url(); ?>RecepcionController/index">Recepción</a></li>
         <li><a href="<?php echo base_url(); ?>NivelesController/">Ubicación</a></li>
         <li><a href="<?php echo base_url(); ?>EstadoController/">Estado</a></li>
         <li><a href="<?php echo base_url(); ?>CategoriasController/">Categorias</a></li>
         <li><a href="<?php echo base_url(); ?>HabitacionesController/">Habitaciones</a></li>
         <li><a href="<?php echo base_url(); ?>PermisosController/index">Asignar Permisos</a></li>


       <?php elseif ($this->session->userdata('id_rol') != '1') : ?>
        <?php $menu = $this->PermisosModel->getModulos($this->session->userdata("id_usuario"));?>
        <?php foreach($menu as $m): ?>
         <li><a href="<?php echo base_url().$m->url_modulo ?>"><?=$m->nombre_modulo ?></a></li>
       <?php endforeach; ?>

     <?php endif; ?>
     <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Configuración<i class="material-icons right">arrow_drop_down</i></a></li>

   </ul>
 </div>

</div>
</nav>


<ul class="sidenav" id="mobile-demo">
  <?php if($this->session->userdata('id_rol') === '1'): ?>

    <li><a href="<?php echo base_url(); ?>LoginController/inicio">Reserva</a></li>
    <li><a href="<?php echo base_url(); ?>RecepcionController/index">Recepción</a></li>
    <li><a href="<?php echo base_url(); ?>NivelesController/">Ubicación</a></li>
    <li><a href="<?php echo base_url(); ?>EstadoController/">Estado</a></li>
    <li><a href="<?php echo base_url(); ?>CategoriasController/">Categorias</a></li>
    <li><a href="<?php echo base_url(); ?>HabitacionesController/">Habitaciones</a></li>
    <li><a href="<?php echo base_url(); ?>PermisosController/index">Asignar Permisos</a></li>

  <?php elseif ($this->session->userdata('id_rol') != '1'): ?>
    <?php $menu = $this->PermisosModel->getModulos($this->session->userdata("id_usuario"));?>
    <?php foreach($menu as $m): ?>
     <li><a href="<?php echo base_url().$m->url_modulo ?>"><?=$m->nombre_modulo ?></a></li>
   <?php endforeach; ?>
 <?php endif; ?>

 <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Configuración<i class="material-icons right">arrow_drop_down</i></a></li>
 
</ul>

<ul class="dropdown-content" id="dropdown1">
  <?php if($this->session->userdata('id_rol') === '1'): ?>
    <li><a href="<?php echo base_url(); ?>UsuarioController">Usuarios y Roles</a></li>
    <li><a href="<?php echo base_url(); ?>PersonalizarPage">Personalizar página</a></li>



  <?php elseif($this->session->userdata('id_rol') != '1'): ?>
    <?php $menu = $this->PermisosModel->getModulos2($this->session->userdata("id_usuario"));?>
    <?php foreach($menu as $m): ?>
     <li><a href="<?php echo base_url().$m->url_modulo ?>"><?=$m->nombre_modulo ?></a></li>
   <?php endforeach; ?>
 <?php endif ?>
 <li><a href="<?php echo base_url(); ?>LoginController/index">Mi cuenta</a></li>
 <li><a href="<?php echo base_url(); ?>LoginController/logout">Cerrar sesión</a></li>
</ul>




<ul class="dropdown-content" id="dropdown2">
  <?php if($this->session->userdata('id_rol') === '1'): ?>
   <li><a href="<?php echo base_url(); ?>UsuarioController">Usuarios y Roles</a></li>
   <li><a href="<?php echo base_url(); ?>PersonalizarPage">Personalizar página</a></li>



 <?php elseif($this->session->userdata('id_rol') != '1'): ?>
  <?php $menu = $this->PermisosModel->getModulos2($this->session->userdata("id_usuario"));?>
  <?php foreach($menu as $m): ?>
   <li><a href="<?php echo base_url().$m->url_modulo ?>"><?=$m->nombre_modulo ?></a></li>
 <?php endforeach; ?>
<?php endif; ?>
<li><a href="<?php echo base_url(); ?>LoginController/index">Mi cuenta</a></li>
<li><a href="<?php echo base_url(); ?>LoginController/logout">Cerrar sesión</a></li>
</ul>

<!--   ------------------------------------------    FIN NAV BAR ----------------------------------------------------        -->