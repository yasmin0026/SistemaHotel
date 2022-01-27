<!DOCTYPE html>
<html>

<head>
  <title>Reporte habitación</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css">
</head>

<body>

  <style>
    div.scrollmenu {
      overflow: auto;
      white-space: nowrap;
    }

    #centro {
      text-align: center;
    }

    th,
    td {
      border: 1px solid #6200ea;
      border-color: #6200ea;
    }
  </style>



  <br><br>
  <div class="container">
    <div class="row ">

      <h5 id="centro">Habitaciones que mas se alquilan en el periodo de</h5>
      <h5 id="centro"><?= $periodo; ?></h5>

      <br>

      <table class="striped grey lighten-1">
        <thead>
          <tr>
            <th class="grey darken-3" style="text-align: center; color:white;">Nombre habitación</th>
            <th class="grey darken-3" style="text-align: center; color:white;">Documento</th>
            <th class="grey darken-3" style="text-align: center; color:white;">Nombre</th>
            <th class="grey darken-3" style="text-align: center; color:white;">Entrada</th>
            <th class="grey darken-3" style="text-align: center; color:white;">Salida</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($frecuentes as $f) : ?>
            <tr>
              <td style="text-align: center;"><?= $f->nombre_habitacion; ?></td>
              <td style="text-align: center;"><?= $f->documento; ?></td>
              <td style="text-align: left;"><?= $f->nombres_cliente; ?></td>
              <td style="text-align: center;"><?= $f->fecha_entrada; ?></td>
              <td style="text-align: center;"><?= $f->fecha_salida; ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>

    </div>
  </div>
</body>

</html>