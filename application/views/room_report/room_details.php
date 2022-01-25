
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
    <form action="<?=base_url().'RoomReports/Reporting'?>" method="POST" target="_blank">
      <input type="hidden" name="id_habitacion" value="<?= $id_habitacion;?>">
      <input type="hidden" name="inicio" value="<?php echo $ini; ?>">
      <input type="hidden" name="fin" value="<?php echo $fn; ?>">
      <input type="hidden" name="periodos" value="<?php echo $pd; ?>">
      <button class="btn pink" type="submit">Generar reporte  <i class="right material-icons">picture_as_pdf</i></button>
    </form>

    <div class="scrollmenu">
      <div id="man">
        <div class="card material-table">
          <table id="" class="responsive">
            <thead>
              <tr>
                <th>Nombre habitación</th>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Entrada</th>
                <th>Salida</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($frecuentes as $f): ?>
                <tr>
                  <td><?=$f->nombre_habitacion;?></td>
                  <td><?=$f->documento;?></td>
                  <td><?=$f->nombres_cliente;?></td>
                  <td><?=$f->fecha_entrada;?></td>
                  <td><?=$f->fecha_salida;?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>