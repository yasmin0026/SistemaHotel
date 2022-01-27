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

      <h3 align="center">Detalle Cliente Frecuente</h3>

      <table class="striped grey lighten-1">
        <thead>
          <tr>
            <th class="grey darken-3" style="text-align: center; color:white;">Nombre Cliente</th>
            <th class="grey darken-3" style="text-align: center; color:white;">Alojamientos Mensual</th>
            <th class="grey darken-3" style="text-align: center; color:white;">Mes Inicio</th>
            <th class="grey darken-3" style="text-align: center; color:white;">Mes Salida</th>
            <th class="grey darken-3" style="text-align: center; color:white;">Dias Hospedados</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($detalle as $f): ?>
              <tr>
                <td style="text-align: center;"><?=$f->nombres_cliente;?></td>
                <td style="text-align: center;"><?=$f->AlojamientosMesual;?></td>
                <td style="text-align: center;"><?=$f->MesInicio;?></td>
                <td style="text-align: center;"><?=$f->MesFinal;?></td>
                <td style="text-align: center;"><?=$f->DiasHospedados;?></td>
              </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

