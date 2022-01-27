
<style>
  div.scrollmenu {
    
    overflow: auto;
    white-space: nowrap;
  }

  a.disabled { 
    pointer-events: none; 
    cursor: default; 
 }
</style>


<br><br>
<div class="container">
  <div class="row ">

    <div class="scrollmenu">
      <div id="man" style="width: 980px">
        <div class="card material-table">
          <div class="table-header" style="height: 100px;">
            <span class="table-title lb"><a href="<?=base_url().'RecepcionController/';?>">Recepcion/</a><a href="<?=base_url().'RecepcionController/AlojamientoView';?>">Alojamientos</a> </span>
            <!-- Acciones -->
            <div class="actions">
              <!--Select para filtrar datos -->
              <form class="" id="formFiltro">
                <select id="selectFiltro" name="id_nivel">

                  <option>Filtrar por Habitacion</option>
                  <option value="0">Mostrar Todo</option>

                  <?php foreach ($niv as $n) : ?>
                    <option value="<?php echo  $n->id_nivel; ?>">
                      <?php echo $n->nombre_nivel; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <br>
                <button type="submit" class="waves-effect waves-light btn btnDynamic" >Buscar datos<i class="material-icons right">search</i></button>
                
              </form>

            </div>
            <!-- Fin acciones -->
            


          </div>
          <table id="datatable" class="responsive">
            <thead>
              <tr>
                <th>Nombre Habitacion</th>
                <th>Estado Habitacion</th>
                <th>Tipo de Habitacion</th>
                <th>Nivel</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody id="result">

            </tbody>

          </table>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $("#formFiltro").submit(function(e) {
          e.preventDefault();
          var id = $("#selectFiltro").val();
      //console.log(id);
      var url = "<?= site_url('RecepcionController/filtroNivel/');?>"+ id;
      $("#result").load(url);
    });
      });
    </script>
  </div>
</div>



