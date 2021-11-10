<?php
if (isset($actualizar)) {
    $card_title = 'Modificar registro';
    $id = '<input type="hidden" name="id_usuario" value="' . $this->uri->segment(3) . '">';
    $nombre = $actualizar->nombres_usuario;
    $apellido = $actualizar->apellido_usuario;
    $nick = $actualizar->nick_usuario;
    $contrasena = $actualizar->contrasena_usuario;
    $id_rol = $actualizar->id_rol;
    $nombre_rol = $actualizar->nombre_rol;
    $pregunta = base64_decode($actualizar->recovery_pregunta);
    $respuesta = base64_decode($actualizar->recovery_respuesta);
}
?>
<script type="text/javascript">
    
    $(document).on('change', '#generador', function(event) {
        $('#recovery_pregunta').val($("#generador option:selected").text());
        $('.labelActive').addClass('active');
    });
</script>

</style>
<div class="container">

    <div class="row">
        <div class="col s12">
            <form action="<?= base_url() . 'AboutMeController/updateMyInfo'?>" method="post">
                <div class="card z-depth-5">
                    <div class="card-image">
                        <img src="<?= base_url() . 'assets/img/5.jpg'; ?>" style="background-size:cover; height: 150px;">
                        <span class="card-title">
                            <i class="material-icons large gray-text">account_circle</i> <b>Mostrando perfil de: </b><?= $nombre . ' ' . $apellido; ?>
                        </span>
                        <button class="btnDynamic btn-floating halfway-fab waves-effect waves-light z-depth-5" type="submit"><i class="material-icons">save</i></button>
                    </div>
                    <div class="card-content">
                        <?=$id;?>
                        <div class="input-field inline">
                            <input id="nombres_usuario" type="text" name="nombres_usuario" value="<?= $nombre; ?>">
                            <label for="nombres_usuario" class="lb">Sus nombres</label>
                        </div>

                        <div class="input-field inline">
                            <input id="apellido_usuario" type="text" name="apellido_usuario" value="<?= $apellido; ?>">
                            <label for="apellido_usuario" class="lb">Sus apellidos</label>
                        </div>
                        <div class="input-field inline">
                            <input id="nick_usuario" type="text" name="nick_usuario" value="<?= $nick; ?>">
                            <label for="nick_usuario" class="lb">Su nick de usuario</label>
                        </div>

                        <div class="input-field inline">
                            <input id="contrasena_usuario" type="text" name="contrasena_usuario" value="<?= $contrasena; ?>">
                            <label for="contrasena_usuario" class="lb">Su contraseña</label>
                        </div>

                        <div class="card green accent-1">
                            <div class="card-content">
                                <span class="card-title purple-text ">Apartado de seguridad</span>
                                <p class="blue-text">
                                    En este apartado podrás establecer el método de recupeeración para su contraseña en caso de olvidarla.
                                    Puedes formular tu propia pregunta, o bien seleccionar una pre-establecida en el generador de preguntas.
                                </p><br>
                                <label class="lb" for="generador">GENERADOR: Subjerecias de posibles preguntas o pistas</label>
                                <select id="generador" class="form-control" name="generador" id="generador">
                                    <option value="" selected="selected">Seleccione</option>
                                    <option value="1">Nombre de tu mamá</option>
                                    <option value="2">Nombre de tu papá</option>
                                    <option value="3">Nombre de tu primera mascota</option>
                                    <option value="4">Lugar de nacimiento</option>
                                    <option value="5">Nombre de tu primer amor</option>
                                    <option value="6">Nombre de tu mejor amigo/a</option>
                                    <option value="7">Nombre de tu conyugue</option>
                                    <option value="8">Nombre tu primer hijo/a</option>
                                    <option value="9">Color favorito</option>
                                    <option value="10">Tu comida favorita</option>
                                    <option value="11">Número de teléfono</option>
                                    <option value="12">Número favorito</option>
                                </select>

                                <div class="input-field">
                                    <input id="recovery_pregunta" type="text" name="recovery_pregunta" class="validate" value="<?= $pregunta; ?>">
                                    <label for="recovery_pregunta" class="labelActive">Pregunta de recuperación</label>
                                    <span class="helper-text" data-error="wrong" data-success="right"></span>
                                </div>

                                
                                <div class="input-field">
                                    <input id="recovery_respuesta" type="text" name="recovery_respuesta" value="<?= $respuesta; ?>">
                                    <label for="recovery_respuesta" class="labelActive red-text">Respuesta de recuperación</label>
                                    <span class="red-text float-right"><i class="tiny material-icons">report_problem</i> Esta será la clave para el exito de recuperación de tu contraseña</span>
                                </div>

                            </div>
                        </div>

                        <label class="lb">Rol en el sistema</label>
                        <input type="text" value="<?= $nombre_rol; ?>" readonly>
                        <input name="id_rol" type="hidden" value="<?= $id_rol; ?>">
                        
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>