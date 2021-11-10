
<br><br>
<div class="container">
  <div class="row">
    <div class="col s1"></div>

    <div id="man" class="col s9">
      <div class="card material-table">
        <div class="table-header">
          <span class="table-title lb">Tipo de documento</span>
          <!-- Acciones -->
          <div class="actions">
            <!-- Button de agregar -->
            <a href="<?=base_url().'DocumentoController/newDocumento';?>" class="waves-effect btn-flat rounded aDynamic tooltipped" data-position="left" data-tooltip="Agregar registro"><i class="material-icons white-text">add</i></a>
            <!-- Busqueda -->
            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
          <!-- Fin acciones -->
        </div>
        <table id="datatable" class="responsive">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tipo de documento</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($documento as $d): ?>
              <tr>
                <td><?=$d->id_tipo_documento;?></td>
                <td><?=$d->tipo_documento;?></td>
                <td>
                  <a class="btnEdit" href="<?=base_url().'DocumentoController/editDocumento/'.$d->id_tipo_documento;?>"><i class="material-icons dynamic">create</i></a>
                  <a class="btnDel" href="<?=base_url().'DocumentoController/deleteDocumento/'.$d->id_tipo_documento;?>"><i class="material-icons red-text">delete_forever</i></a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>