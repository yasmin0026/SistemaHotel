
<br><br>
<div class="container">
  <div class="row">
    <div class="col s1"></div>

    <div id="man" class="col s9">
      <div class="card material-table">
        <div class="table-header">
          <span class="table-title lb">Imprevistos</span>
          <!-- Acciones -->
          <div class="actions">
            <!-- Button de agregar -->
            <a href="<?=base_url().'ImprevistoController/newImprevisto';?>" class="waves-effect btn-flat rounded aDynamic tooltipped" data-position="left" data-tooltip="Agregar registro"><i class="material-icons white-text">add</i></a>
            <!-- Busqueda -->
            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
          <!-- Fin acciones -->
        </div>
        <table id="datatable" class="responsive">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tipo de Imprevisto</th>
              <th>Habitación</th>
              <th>Descripcion</th>
              <th>Compensación</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Imprevisto as $i): ?>
              <tr>
                <td><?=$i->id_imprevisto;?></td>
                <td><?=$i->tipo_imprevisto;?></td>
                <td><?=$i->nombre_habitacion;?></td>
                <td><?=$i->descripcion;?></td>
                <td><?=$i->compensacion;?></td>
                <td>
                  <a class="btnEdit" href="<?=base_url().'ImprevistoController/editImprevisto/'.$i->id_imprevisto;?>"><i class="material-icons dynamic">create</i></a>
                  <a class="btnDel" href="<?=base_url().'ImprevistoController/deleteImprevisto/'.$i->id_imprevisto;?>"><i class="material-icons red-text">delete_forever</i></a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>