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

      <div id="man" class="col s12" style="width: 1020px">
        <div class="card material-table">
          <div class="table-header">
            <span class="table-title lb">Permisos de rol</span>
            <!-- Acciones -->
            <div class="actions">
              <!-- Button de agregar -->
              <a href="<?=base_url().'PermisosController/nuevoPermiso';?>" class="waves-effect btn-flat rounded aDynamic tooltipped" data-position="left" data-tooltip="Agregar registro"><i class="material-icons white-text">add</i></a>
              <!-- Busqueda -->
              <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
            </div>
            <!-- Fin acciones -->
          </div>
          <table id="datatable" class="responsive">
            <thead>
              <tr>
                <th>ID</th>
                <th>Rol</th>
                <th>Usuario</th>
                <th>Modulo asignado</th>
                <th>Crear</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($menu as $m): ?>
                <tr>
                  <td><?=$m->id_menu;?></td>
                  <td><?=$m->nombre_rol;?></td>
                  <td><?=$m->nick_usuario;?></td>
                  <td><?=$m->nombre_modulo;?></td>
                  <td><?=$m->crear;?></td>
                  <td><?=$m->actualizar;?></td>
                  <td><?=$m->eliminar;?></td>
                  <td>
                    <a class="btnEdit" href="<?=base_url().'PermisosController/editarPermiso/'.$m->id_menu;?>"><i class="material-icons dynamic">create</i></a>
                    <a class="btnDel" href="<?=base_url().'PermisosController/deletePermiso/'.$m->id_menu;?>"><i class="material-icons red-text">delete_forever</i></a>
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