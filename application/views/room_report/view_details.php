<style>
  div.scrollmenu {

    overflow: auto;
    white-space: nowrap;
  }
</style>



<br><br>
<div class="container">
  <div class="row">
    <h4 style="text-align: center;">Habitaciones que mas se alquilan en el periodo de</h4>
    <h4 style="text-align: center;"><?= $periodo; ?></h4>
    <div class="col s6 m6 l6">
      <form action="<?= base_url() . 'RoomReports/Reporting1' ?>" method="POST" target="_blank">
        <input type="hidden" name="inicio" value="<?php echo $ini; ?>">
        <input type="hidden" name="fin" value="<?php echo $fn; ?>">
        <input type="hidden" name="periodos" value="<?php echo $pd; ?>">
        <button class="btn btnDynamic" type="submit">Generar este reporte<i class="right material-icons">file_download</i></button>
      </form>
    </div>
    <div class="col s6 m6 l6">
      <a href="<?= base_url() ?>ReportesController/index/" class="btn btn red">Regresar a reporteria<i class="right material-icons">reply</i></a>
    </div>
  </div>

  <div class="row">
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
              <?php foreach ($frecuentes as $f) : ?>
                <tr>
                  <td><?= $f->nombre_habitacion; ?></td>
                  <td><?= $f->frecuencia; ?></td>
                  <td>
                    <form action="<?= base_url() . 'RoomReports/RoomDetails' ?>" method="POST">
                      <input type="hidden" name="id_habitacion" value="<?= $f->id_habitacion; ?>">
                      <input type="hidden" name="inicio" value="<?php echo $ini; ?>">
                      <input type="hidden" name="fin" value="<?php echo $fn; ?>">
                      <input type="hidden" name="periodos" value="<?php echo $pd; ?>">
                      <button class="btn btn btnDynamic" type="submit">Ver detalles<i class="right material-icons">remove_red_eye</i></button>
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
