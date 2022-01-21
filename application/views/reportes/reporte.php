
<style>
  div.scrollmenu {
    
    overflow: auto;
    white-space: nowrap;
  }

  ::-webkit-input-placeholder { color: black; } /* WebKit */
  ::-moz-placeholder { color: black; } /* Firefox 19+ */
  ::placeholder { color: black; }

</style>



<br><br>
<div class="container">

  <br><br><br><br>

    <h4 align="center">REPORTES DEL SISTEMA</h4>
    <br><br>


     <div class="row">
        <div class="col s12 m4">
          <div class="card" style="padding: 10px; height: 550px; border-radius: 15px">
            <div class="card-image">
              <br>
              <center> <img src="https://cdn-icons-png.flaticon.com/512/90/90417.png" style="width: 150px; height: auto;"> </center>
            </div>
            <br>
              <center> <span class="card-title" style="color: black;">Tipo De Reporte 1</span> </center>
            <div class="card-content">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
            <br><br>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="card" style="padding: 10px; height: 550px; border-radius: 15px">
            <div class="card-image">
              <br>
              <center> <img src="https://cdn-icons-png.flaticon.com/512/90/90417.png" style="width: 150px; height: auto;"> </center>
            </div>
            <br>
              <center> <span class="card-title" style="color: black;">Tipo De Reporte 2</span> </center>
            <div class="card-content">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
            <br><br>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="card" style="padding: 10px; height: 550px; border-radius: 15px">
            <div class="card-image">
              <br>
              <center> <img src="https://cdn-icons-png.flaticon.com/512/115/115801.png" style="width: 150px; height: auto;"> </center>
            </div>
            <br>
              <center> <span class="card-title" style="color: black;">Clientes Frecuentes</span> </center>
            <div class="card-content">
              <p>Los clientes que más reservaciones a hecho en el hotel en un año natural.</p>
            </div>
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
                <center><input type="submit" name="enviar" class="btn btn-succes"></center>
              </form>
            </div>
          </div>
        </div>
      </div>

  </div>
</div>



