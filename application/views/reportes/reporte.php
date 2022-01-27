<?php
function pascua ($anno){
# Constantes mágicas
  $M = 24;
  $N = 5;
#Cálculo de residuos
  $a = $anno % 19;
  $b = $anno % 4;
  $c = $anno % 7;
  $d = (19*$a + $M) % 30;
  $e = (2*$b+4*$c+6*$d + $N) % 7;
# Decidir entre los 2 casos:
  if ( $d + $e < 10 ) {
    $dia = $d + $e + 22;
        $mes = 3; // marzo
      }
      else {
        $dia = $d + $e - 9;
        $mes = 4; //abril
      }
# Excepciones especiales (según artículo)
    if ( $dia == 26  and $mes == 4 ) { // 4 = abril
      $dia = 19;
    }
    if ( $dia == 25 and $mes == 4 and $d==28 and $e == 6 and $a >10 ) { // 4 = abril
      $dia = 18;
    }
    $ret = $dia.'-'.$mes.'-'.$anno;
    return ($ret);
  }

  function mesespanol($m){
   $m=intval($m);
   $meses="No Especificado,Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre";
   $mes=explode(",",$meses);
   $mesespan=$mes[$m];
   return $mesespan;
 }
 function diaespanol($d){
   $d=intval($d);
   $dias="No Especificado,Lunes,Martes,Miercoles,Jueves,Viernes,Sabado,Domingo";
   $dia=explode(",",$dias);
   $diasspan=$dia[$d];
   return $diasspan;
 }
 ?>

 <?php
 //ejecutarlo pasando el año como parámetro.
 $fecha = explode('-',pascua( date("Y")))
 ?>
 <style>
  div.scrollmenu {

    overflow: auto;
    white-space: nowrap;
  }

  ::-webkit-input-placeholder { color: black; } /* WebKit */
  ::-moz-placeholder { color: black; } /* Firefox 19+ */
  ::placeholder { color: black; }

</style>
<script type="text/javascript">
  $(document).on('change', '#periodos', function(event) {
    var s = document.getElementById('periodos');
    var item1 = s.options[s.selectedIndex].value;

    if (item1 == "saint") {
      $('#inicio').val('<?php echo date("Y-m-d", mktime(0,0,0,$fecha[1],$fecha[0]-7,$fecha[2])); ?>');
      $('#fin').val('<?php echo date("Y-m-d", mktime(0,0,0,$fecha[1],$fecha[0],$fecha[2])); ?>');
    } else if(item1 == 'days') {
      $('#inicio').val('');
      $('#fin').val('');
    } else if(item1 == 'weeks') {
      $('#inicio').val('');
      $('#fin').val('');
    }
  });

  // date picker
  $(document).ready(function(){

    $('.datepicker').datepicker( {"format":'yyyy-mm-dd'} ).datepicker("setDate", new Date());

  });
</script>



<br><br>
<div class="container">

  <br>

  <h4 align="center">REPORTES DEL SISTEMA</h4>
  <br>


  <div class="row">
    <div class="col s12 m4">
      <div class="card" style="padding: 10px; height: auto; border-radius: 15px">
        <div class="card-image">
          <br>
          <center> <img src="https://i.pinimg.com/originals/fd/7e/bb/fd7ebb6fb82af55351740321b9175679.png" style="width: 150px; height: auto;"> </center>
        </div>
        <br>
        <center> <span class="card-title" style="color: black;">Habitaciones Mas Alquiladas</span> </center>
        <div class="card-content">
          <p>Habitaciones que mas se alquilan  y en que periodos.</p>
        </div>
        <div class="card-action">
          <form action="<?=base_url().'RoomReports/';?>" method="POST">
            <center>
              <h6>Seleccione el periodo</h6>
              <select id="periodos" name="periodos" required>
                <option>seleccione una opción</option>
                <option value="saint">Semana santa</option>
                <option value="days">por rango de días</option>
                <!-- <option value="weeks">Semanas</option> -->
              </select>

              <input type="text" name="inicio" id="inicio" class="datepicker" placeholder="Fecha desde" required>
              <input type="text" name="fin" id="fin" class="datepicker" placeholder="Fecha hasta" required>
              <br>
              <button type="submit" class="btn btn btnDynamic">Enviar</button>
            </center>
          </form>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
          <div class="card" style="padding: 10px; height: 615px; border-radius: 15px">
            <div class="card-image">
              <br>
              <center> <img src="https://img.icons8.com/ios/500/calendar-minus.png" style="width: 150px; height: auto;"> </center>
            </div>
            <br>
              <center> <span class="card-title" style="color: black;">Fechas Menos Concurridas</span> </center>
            <div class="card-content">
              <p>Verificar que meses del año seleccionado han tenido menos alojamientos en el Hotel.</p>
            </div>
            <br>
            <br>
            <div class="card-action">
              <form style="padding: 8px" action="<?= base_url()?>ReportesController/FechasMasVacio" method="POST">
                <center>
                  <h6>Seleccione el año</h6>
                  <select name="selectYear" required="">
                    <?php foreach ($YR as $y): ?>
                      <option value="<?php echo $y->fecha ;?>"><?php echo $y->fecha ;?> </option>
                    <?php endforeach; ?>
                  </select>
                </center>
                <center><input type="submit" name="enviar" class="btn btn btnDynamic"></center>
              </form>
            </div>
          </div>
        </div>

    <div class="col s12 m4">
      <div class="card" style="padding: 10px; height: 615px; border-radius: 15px">
        <div class="card-image">
          <br>
          <center> <img src="https://cdn-icons-png.flaticon.com/512/115/115801.png" style="width: 150px; height: auto;"> </center>
        </div>
        <br>
        <center> <span class="card-title" style="color: black;">Clientes Frecuentes</span> </center>
        <div class="card-content">
          <p>Los clientes que más reservaciones a hecho en el hotel en un año natural.</p>
        </div>
        <br>
        <br>
        <div class="card-action">
          <form style="padding: 8px" action="<?= base_url()?>ReportesController/clienteFrecuente" method="POST">
            <center>
              <h6>Seleccione el año</h6>
              <select name="selectYear" required="">
                <?php foreach ($YR as $y): ?>
                  <option value="<?php echo $y->fecha ;?>"><?php echo $y->fecha ;?> </option>
                <?php endforeach; ?>
              </select>
            </center>
            <center><input type="submit" name="enviar" class="btn btn btnDynamic"></center>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
</div>



