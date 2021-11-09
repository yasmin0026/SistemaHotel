<style>
    #man{
       position: relative;
        width: 130%;
        left: -15%;
    }
</style>
<br><br>
<div class="container">
  <div class="row">
    <div class="col s1"></div>

    <div id="man" class="col s20">
      <div class="card material-table">
        <div class="table-header">
          <span class="table-title">Lista de Habitaciones</span>
          <!-- Acciones -->
          <div class="actions">
            <!-- Button de agregar -->
            <a href="<?=base_url().'HabitacionesController/newHabitacion';?>" class="waves-effect btn-flat rounded green accent-3 tooltipped" data-position="left" data-tooltip="Agregar registro"><i class="material-icons">add</i></a>
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
                  <a href="<?=base_url().'HabitacionesController/edit/'.$h->id_habitacion;?>"><i class="material-icons blue-text">create</i></a>
                  <a href="<?=base_url().'HabitacionesController/delete/'.$h->id_habitacion;?>"><i class="material-icons red-text">delete_forever</i></a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>