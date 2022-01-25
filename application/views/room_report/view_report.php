<!DOCTYPE html>
<html>
<head>
  <title>Reporte</title>
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

  </style>



  <br><br>
  <div class="container">
    <div class="row ">

      <h5 align="center">Habitaciones que mas se alquilan en el periodo de</h5>
      <h5 align="center"><?=$periodo;?></h5>

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
</body>
</html>
