
<style>
  div.scrollmenu {
    
    overflow: auto;
    white-space: nowrap;
  }

</style>



<br><br>
<div class="container">
  <div class="row ">

  	<h4 align="center">Cliente Mas Frecuente Del Año <?php echo $year;?></h4>
    <center>
      <a href="<?= base_url()?>ReportesController/index/"><button class="btn btn-info">Regresar</button></a>
    </center>

  	<div class="scrollmenu">
      <div id="man">
        <div class="card material-table">
          <table id="" class="responsive">
            <thead>
              <tr>
                <th>Nombre Cliente</th>
                <th>Alojamientos en el año</th>
                <th>Dias totales hospedado</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($frecuentes as $f): ?>
                <tr>
                  <td><?=$f->nombres_cliente;?></td>
                  <td><?=$f->AlojamientosMesual;?></td>
                  <td><?=$f->DiasHospedados;?></td>
                  <td>
                    <form action="<?=base_url().'ReportesController/DetalleClienteFrecuente'?>" method="POST">
                      <input type="hidden" name="nombre" value="<?= $f->nombres_cliente;?>">
                      <input type="hidden" name="anio" value="<?php echo $year; ?>">
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



