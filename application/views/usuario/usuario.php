
<br><br>
<div class="container">
  <div class="row">
    <div class="col s1"></div>
    <div class="alert alert-secondary" role="alert">
<a href="<?php echo base_url(); ?>UsuarioController/">Usuarios</a><i> / </i>
<a href="<?php echo base_url(); ?>RolesController/">Roles</a>
</div>
    <div id="man" class="col s20">
      <div class="card material-table">
        <div class="table-header">
          <span class="table-title">Lista de Usuarios</span>
          <!-- Acciones -->
          <div class="actions">
            <!-- Button de agregar -->
            <a href="<?=base_url().'UsuarioController/newUsuario';?>" class="waves-effect btn-flat rounded green accent-3 tooltipped" data-position="left" data-tooltip="Agregar registro"><i class="material-icons">add</i></a>
            <!-- Busqueda -->
            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
          <!-- Fin acciones -->
        </div>
        <table id="datatable" class="responsive">
          <thead>
            <tr>
                <th >ID</th>
             <th>Nombre del Usuario</th>
              <th>Apellido del Usuario</th>
              <th>Nick del Usuario</th>
              <th>Contraseña del Usuario</th>
              <th>Rol del Usuario</th>
          
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($usuarios as $u): ?>
              <tr>
             <td><?=$u->id_usuario;?></td>
                <td><?=$u->nombres_usuario;?></td>
                <td><?=$u->apellido_usuario;?></td>
                <td><?=$u->nick_usuario;?></td>
                <td><?=$u->contrasena_usuario;?></td>
                <td><?=$u->nombre_rol;?></td>              
                <td>
                  <a href="<?=base_url().'UsuarioController/edit/'.$u->id_usuario;?>"><i class="material-icons blue-text">create</i></a>
                  <a href="<?=base_url().'UsuarioController/delete/'.$u->id_usuario;?>"><i class="material-icons red-text">delete_forever</i></a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>