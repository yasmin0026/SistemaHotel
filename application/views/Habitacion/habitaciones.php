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

      <div id="man" class="col s20"  style="width: 1900px">
        <div class="card material-table">
          <div class="table-header">
            <span class="table-title lb">Lista de Habitaciones</span>
            <!-- Acciones -->
            <div class="actions">
              <!-- Button de agregar -->
              <a href="<?=base_url().'HabitacionesController/newHabitacion';?>" class="waves-effect btn-flat rounded aDynamic tooltipped" data-position="left" data-tooltip="Agregar registro"><i class="material-icons">add</i></a>
              <!-- Busqueda -->
              <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
            </div>
            <!-- Fin acciones -->
          </div>
          <table id="datatable" class="responsive">
            <thead>
              <tr>
                <th >ID</th>
                <th>Nombre de la Habitacion</th>
                <th>Categoria de la Habitacion</th>
                <th>Nivel de la Habitacion</th>
                <th>Estado de la Habitacion</th>
                <th>Precio de la Habitacion</th>
                <th >Detalle de la Habitacion</th>             
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($habitaciones as $h): ?>
                <tr>
                 <td><?=$h->id_habitacion;?></td>
                 <td><?=$h->nombre_habitacion;?></td>
                 <td><?=$h->tipo_habitacion;?></td>
                 <td><?=$h->nombre_nivel;?></td>
                 <td><?=$h->estado_habitacion;?></td>
                 <td><?=$h->precio_habitacion;?></td>
                 <td><?=$h->detalle_habitacion;?></td>
                 <td>
                  <a class="btnEdit" href="<?=base_url().'HabitacionesController/edit/'.$h->id_habitacion;?>"><i class="dynamic material-icons">create</i></a>
                  <a class="btnDel" href="<?=base_url().'HabitacionesController/delete/'.$h->id_habitacion;?>"><i class="material-icons red-text">delete_forever</i></a>
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