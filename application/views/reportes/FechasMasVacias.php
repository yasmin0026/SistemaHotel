
<style>
  div.scrollmenu {
    
    overflow: auto;
    white-space: nowrap;
  }

</style>



<br><br>
<div class="container">
  <div class="row ">

  	<h4 align="center">Meses Con Menos Alojamientos Del Año <?php echo $year;?></h4>
    <center>
      <a href="<?= base_url()?>ReportesController/index/"><button class="btn btn btnDynamic">Regresar</button></a>
    </center>
    <br>
    <?php foreach ($vacios as $f): ?>

    <?php endforeach ?>
  <form action="<?= base_url()?>ReportesController/reporteDiasVacio/" method="post" target="_blank">
      <input type="hidden" name="anio" value="<?php echo $year; ?>">
      <center>
        <input type="submit" name="Reporte" value="Generar reporte" class="btn btn btnDynamic">
      </center>
    </form>
    <br>

  	<div class="scrollmenu">
      <div id="man">
        <div class="card material-table">
          <table id="" class="responsive">
            <thead>
              <tr>
                <th>Meses</th>
                <th># Dias del mes</th>
                <th># Dias totales hospedado</th>
                <th># Dias totales no hospedado</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($vacios as $vacios): ?>
                <tr>
                  <td><?=$vacios->Mes;?></td>
                  <td><?=$vacios->DiasDelMes;?></td>
                  <td><?=$vacios->DiasHospedados;?></td>
                  <td><?=$vacios->DiasNoHospedados;?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>



