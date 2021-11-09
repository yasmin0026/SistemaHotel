
<br><br>
<div class="container">
  <div class="row">
    <div class="col s1"></div>

    <div id="man" class="col s9">
      <div class="card material-table">
        <div class="table-header">
          <span class="table-title">Lista de categorías</span>
          <!-- Acciones -->
          <div class="actions">
            <!-- Button de agregar -->
            <a href="<?=base_url().'CategoriasController/new';?>" class="waves-effect btn-flat rounded green accent-3 tooltipped" data-position="left" data-tooltip="Agregar registro"><i class="material-icons">add</i></a>
            <!-- Busqueda -->
            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
          <!-- Fin acciones -->
        </div>
        <table id="datatable" class="responsive">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tipo de habitación</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($categorias as $c): ?>
              <tr>
                <td><?=$c->id_categoria;?></td>
                <td><?=$c->tipo_habitacion;?></td>
                <td>
                  <a href="<?=base_url().'CategoriasController/edit/'.$c->id_categoria;?>"><i class="material-icons blue-text">create</i></a>
                  <a href="<?=base_url().'CategoriasController/delete/'.$c->id_categoria;?>"><i class="material-icons red-text">delete_forever</i></a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>