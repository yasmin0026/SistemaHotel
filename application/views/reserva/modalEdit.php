 <!--Actualizar Registros-->
 <div id="modalEdit" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Editar Reservacion</h4>
      <!-- Formulario-->    

      <div class="row">
        <form class="col s12" method="POST" action="">

          <div class="row">
            <div class="input-field col s12">
              <input id="txtid" name="id" type="text" value="">
              
              <select id="txid_habitacion" name="id_habitacion">  
                  <option>Seleccionar-</option>
                <?php foreach ($habi as $h): ?>

                  <option value="<?php echo $h->id_habitacion; ?>">
                    <?php echo $h->nombre_habitacion; ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <label for="id_habitacion">Habitacion</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="txttitle" name="title" type="text" class="validate" value="">
              <label for="title">Titulo de Reservacion</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <p>
                <label >Elige un Color</label>
              <fieldset style="border: none;">
              
                <label>
                  <input  value="#fc5335" id="txcolor" name="color" type="radio" style="border: #fc5335;"/>
                 <span style="background-color: #fc5335;padding: 25px;border-radius: 50px;"></span>
               </label>
             
              <label>
                <input value="#fcc735"  id="txcolor" name="color" type="radio"/>
                <span style="background-color: #fcc735;padding: 25px;border-radius: 50px;"></span>
              </label>
            
              <label>
                <input value="#0af5dd"  id="txcolor" name="color" type="radio"/>
                <span style="background-color:#0af5dd;padding: 25px;border-radius: 50px;"></span>
              </label>
            
              <label>
                <input  value="#8953e0"  id="txcolor" name="color" type="radio"/>
                <span style="background-color:#8953e0 ;padding: 25px;border-radius: 50px;"></span> 
              </label>

              <label>
                <input  value="#0bb51f"  id="txcolor" name="color" type="radio"/>
                <span style="background-color:#0bb51f ;padding: 25px;border-radius: 50px;"></span> 
              </label>
             </fieldset>
          </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
              <label for="password">Fecha de inicio</label>
              <br>
              <input id="txstart" name="start" type="text">
              
            </div>
         
            <div class="input-field col s6">
              <label for="end">Fecha de finalizacion</label>
              <br>
              <input id="txend" name="end" type="text" >
 
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <select id="txid_estado_reserva" name="id_estado_reserva">
                <option>Seleccionar-</option>
                <?php foreach ($esR as $p): ?>

                  <option value="<?php echo $p->id_estado_reserva; ?>">
                    <?php echo $p->estado_reserva; ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <label for="id_estado_reserva">Estado de Reserva</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="txnombre_cliente" name="nombre_cliente" type="text" class="validate">
              <label for="nombre_cliente">Nombre del cliente</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <select name="txid_estado_pago" id="id_estado_pago">
                <option>Seleccionar-</option>
                <?php foreach ($pago as $p): ?>

                  <option value="<?php echo $p->id_estado_pago; ?>">
                    <?php echo $p->estado_pago; ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <label for="id_estado_pago">Estado de pago</label>
            </div>
          </div>
        </form>
     </div>
      <!-- Fin Formulario-->
    </div>
    <div class="modal-footer">
      <input type="submit" name="enviar" value="Actualizar" class="modal-close waves-effect waves-green btn-flat">
       <input type="submit" name="enviar" value="Cancelar" class="modal-close waves-effect waves-green btn-flat">
    </div>

    

  </div>
