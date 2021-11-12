<style>
  div.scrollmenu {

    overflow: auto;
    white-space: nowrap;
  }

</style>
<br><br>
<div class="container">
  <div class="row">
    <div class="scrollmenu">
      <div class="alert alert-secondary" role="alert">
        <a href="<?php echo base_url(); ?>UsuarioController/">Usuarios</a><i> / </i>
        <a href="<?php echo base_url(); ?>RolesController/">Roles</a>
      </div>
      <div id="man" class="col s20" style="width: 970px">
        <div class="card material-table">
          <div class="table-header">
            <span class="table-title lb">Lista de Roles</span>
            <!-- Acciones -->
            <div class="actions">
              <!-- Button de agregar -->
              <a href="<?= base_url() . 'RolesController/newRol'; ?>" class="aDynamic waves-effect btn-flat rounded tooltipped" data-position="left" data-tooltip="Agregar registro"><i class="material-icons white-text">add</i></a>
              <!-- Busqueda -->
              <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
            </div>
            <!-- Fin acciones -->
          </div>
          <table id="datatable" class="responsive">
            <thead>
              <tr>
                <th></th>
                <th colspan="5" class="center-align">
                  <h5>Permisos</h5>
                </th>
              </tr>
              <tr>
                <th>ID</th>
                <th>Nombre del Rol</th>
                <th>Crear</th>
                <th>Modificar</th>
                <th>Eliminar</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($roles as $r) : ?>
                <tr>
                  <td><?= $r->id_rol; ?></td>
                  <td><?= $r->nombre_rol; ?></td>
                  <td><?= $r->crear ;?></td>
                  <td><?= $r->actualizar ;?></td>
                  <td><?= $r->eliminar ;?></td>
                  <td>
                    <a class="btnEdit" href="<?= base_url() . 'RolesController/edit/' . $r->id_rol; ?>"><i class="material-icons dynamic">create</i></a>
                    <a class="btnDel" href="<?= base_url() . 'RolesController/delete/' . $r->id_rol; ?>"><i class="material-icons red-text">delete_forever</i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>