
<style>
  div.scrollmenu {

    overflow: auto;
    white-space: nowrap;
  }

</style>



<br><br>
<div class="container">
  <div class="row ">

  	<h4 align="center">Habitaciones que mas se alquilan en el periodo de <?=$periodo;?></h4>
    <center>
      <a href="<?= base_url()?>ReportesController/index/"><button class="btn btn-info">Regresar</button></a>
    </center>

    <div class="scrollmenu">
      <div id="man">
        <div class="card material-table">
          <table id="" class="responsive">
            <thead>
              <tr>
                <th>Nombre de la habitacion</th>
                <th>Fecuencia (Veces)</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($frecuentes as $f): ?>
                <tr>
                  <td><?=$f->nombre_habitacion;?></td>
                  <td><?=$f->frecuencia;?></td>
                  <td>
                    <form action="<?=base_url().'RoomReports/RoomDetails'?>" method="POST">
                      <input type="hidden" name="id_habitacion" value="<?= $f->id_habitacion;?>">
                      <input type="hidden" name="inicio" value="<?php echo $ini; ?>">
                      <input type="hidden" name="fin" value="<?php echo $fn; ?>">
                      <input type="hidden" name="periodos" value="<?php echo $pd; ?>">
                      <input type="submit" name="enviar" value="Ver detalles" class="btn btn-info">
                    </form>
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



