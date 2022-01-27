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
              <?php foreach ($detalle as $vacios): ?>
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
</body>
</html>

