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

      <div id="man" class="col s9" style="width: 900px">
        <div class="card material-table">
          <div class="table-header">
            <span class="table-title lb">Estados de Pago</span>
            <!-- Acciones -->
            <div class="actions">
              <!-- Button de agregar -->
              <a href="<?=base_url().'EstadoPagoController/addEstadoPago';?>" class="aDynamic waves-effect btn-flat rounded  tooltipped" data-position="left" data-tooltip="Agregar registro"><i class="material-icons white-text">add</i></a>
              <!-- Busqueda -->
              <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
            </div>
            <!-- Fin acciones -->
          </div>
          <table id="datatable" class="responsive">
            <thead>
              <tr>
                <th>ID</th>
                <th>Estado de Habitaciones</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pag as $p): ?>
                <tr>
                  <td><?=$p->id_estado_pago;?></td>
                  <td><?=$p->estado_pago;?></td>
                  <td>
                    <a class="btnEdit" href="<?=base_url().'EstadoPagoController/getDatos/'.$p->id_estado_pago;?>"><i class="dynamic material-icons">create</i></a>
                    <a class="btnDel" href="<?=base_url().'EstadoPagoController/deleteEstadoPago/'.$p->id_estado_pago;?>"><i class="material-icons red-text">delete_forever</i></a>
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