
<style>
  div.scrollmenu {
    
    overflow: auto;
    white-space: nowrap;
  }

</style>

<br><br>
<div class="container">
  <div class="row ">

  	<h4 align="center">Detalle Del Cliente Mas Frecuente Del Año <?php echo $year;?></h4>
    <br>
    <form action="<?= base_url()?>ReportesController/clienteFrecuente/" method="post">
      <input type="hidden" name="selectYear" value="2022">
      <center>
        <input type="submit" name="regresar" value="Regresar" class="btn btn-info">
      </center>
    </form>
    <br>
    <?php foreach ($detalle as $f): ?>

    <?php endforeach ?>
  <form action="<?= base_url()?>ReportesController/reporteClienteFrecuente/" method="post" target="_blank">
      <input type="hidden" name="nombre" value="<?=$f->nombres_cliente;?>">
      <input type="hidden" name="anio" value="<?php echo $year; ?>">
      <center>
        <input type="submit" name="Reporte" value="Generar reporte" class="btn btn-warning">
      </center>
    </form>
    <br>
    <div class="scrollmenu">
      <div id="man">
        <div class="card material-table">
          <table id="" class="responsive">
            <thead>
              <tr>
                <th>Nombre Cliente</th>
                <th>Alojamientos Mensual</th>
                <th>Mes Inicio</th>
                <th>Mes Salida</th>
                <th>Dias Hospedados</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($detalle as $f): ?>
                <tr>
                  <td><?=$f->nombres_cliente;?></td>
                  <td><?=$f->AlojamientosMesual;?></td>
                  <td><?=$f->MesInicio;?></td>
                  <td><?=$f->MesFinal;?></td>
                  <td><?=$f->DiasHospedados;?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>



