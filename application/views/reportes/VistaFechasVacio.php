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

      <h3 align="center">Meses Con Menos Alojamientos</h3>

    	<table class="striped grey lighten-1">
        <thead>
          <tr>
            <th class="grey darken-3" style="text-align: center; color:white;">Meses</th>
            <th class="grey darken-3" style="text-align: center; color:white;"># Dias del mes</th>
            <th class="grey darken-3" style="text-align: center; color:white;"># Dias totales hospedado</th>
            <th class="grey darken-3" style="text-align: center; color:white;"># Dias totales no hospedado</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($detalle as $vacios) : ?>
            <tr>
              <td style="text-align: center;"><?=$vacios->Mes;?></td>
              <td style="text-align: center;"><?=$vacios->DiasDelMes;?></td>
              <td style="text-align: center;"><?=$vacios->DiasHospedados;?></td>
              <td style="text-align: center;"><?=$vacios->DiasNoHospedados;?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
        </div>
      </div>
    
</body>
</html>



