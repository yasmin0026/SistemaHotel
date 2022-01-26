<!DOCTYPE html>
<html>

<head>
  <title>Reporte habitaciones más alquiladas</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap-colorpicker.min.css">

  <!-- Datatable css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
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
      border:1px solid #00bfa5;
      border-color: #00bfa5;
    }
  </style>



  <br><br>
  <div class="container">
    <div class="row ">

      <h4 id="centro">Habitaciones que mas se alquilan en el periodo de</h4>
      <h4 id="centro"><?= $periodo; ?></h4>
      <br>

      <div class="scrollmenu">
        <div id="man">
          <div class="card">
            <table id="" class="teal lighten-5">
              <thead>
                <tr>
                  <th class="teal accent-4" style="text-align: center;">Nombre de la habitacion</th>
                  <th class="teal accent-4" style="text-align: center;">Fecuencia (Veces)</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($frecuentes as $f) : ?>
                  <tr>
                    <td style="text-align: center;"><?= $f->nombre_habitacion; ?></td>
                    <td style="text-align: center;"><?= $f->frecuencia; ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>