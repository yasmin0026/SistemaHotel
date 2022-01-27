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
      <div id="man" class="col s9 " style="width: 900px">
        <div class="card material-table">
          <div class="table-header">
             <span class="table-title"><a href="<?=base_url().'RecepcionController/';?>">Recepcion/</a><a href="<?=base_url().'RecepcionController/AlojamientoView';?>">Alojamientos</a> </span>
            <!-- Acciones -->
            <div class="actions">
              <!-- Button de agregar -->
              <a href="<?=base_url().'RecepcionController/index';?>" class="waves-effect btn-flat rounded aDynamic tooltipped" data-position="left" data-tooltip="Agregar registro"><i class="material-icons white-text">add</i></a>
              <!-- Busqueda -->
              <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
            </div>
            <!-- Fin acciones -->
          </div>
          <table id="datatable" class="responsive">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre del Cliente</th>
                <th>Habitacion</th>
                <th>Fecha de entrada</th>
                <th>Fecha de salida</th>
                <th>Precio</th>
                
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($alojamiento as $a): ?>
                <tr>
                  <td><?=$a->id_alojamiento;?></td>
                  <td><?=$a->nombres_cliente;?></td>
                  <td><?=$a->nombre_habitacion;?></td>
                  <td><?=$a->fecha_entrada;?></td>
                  <td><?=$a->fecha_salida;?></td>
                  <td><?=$a->precio_alojamiento;?></td>
                  
                  <td>
                    <a class="btnEdit" href="<?=base_url().'RecepcionController/ViewEdit/'.$a->id_alojamiento;?>"><i class="material-icons dynamic">create</i></a>
                    <a class="btnDel" href="<?=base_url().'RecepcionController/deleteAlojamiento/'.$a->id_alojamiento;?>"><i class="material-icons red-text">delete_forever</i></a>
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