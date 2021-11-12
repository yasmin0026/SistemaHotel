<?php
if (isset($actualizar)) {
    $action = "updateUsuario";
    $card_title = 'Modificar registro';
    $id = '<input type="hidden" name="id_usuario" value="' . $this->uri->segment(3) . '">';
    $nombre = $actualizar->nombres_usuario;
    $apellido = $actualizar->apellido_usuario;
    $nick = $actualizar->nick_usuario;
    $contrasena = $actualizar->contrasena_usuario;
    $id_rol = $actualizar->id_rol;
    $nombre_rol = $actualizar->nombre_rol;
    $id_usuario = $actualizar->id_usuario;
}
?>


</style>
<br>
<br>
<div class="container">

    <div class="row">
        <div class="col s12">
            <div class="card z-depth-5">
                <div class="card-image">
                    <img src="<?= base_url() . 'assets/img/5.jpg'; ?>" style="background-size:cover; height: 150px;">
                    <span class="card-title">
                        <i class="material-icons large gray-text">account_circle</i> <b>Mostrando perfil de: </b><?= $nombre . ' ' . $apellido; ?>
                    </span>

                    <a class="btn-floating halfway-fab waves-effect waves-light z-depth-5 btnDynamic" href="<?= base_url() . 'AboutMeController/settingsUser/' . $id_usuario; ?>"><i class="material-icons">create</i></a>
                </div>
                <div class="card-content">
                    <div class="input-field inline">
                        <input id="nombres_usuario" type="text" name="nombres_usuario" value="<?= $nombre; ?>" readonly>
                        <label for="nombres_usuario" class="lb">Nombres</label>
                    </div>

                    <div class="input-field inline">
                        <input id="apellido_usuario" type="text" name="apellido_usuario" value="<?= $apellido; ?>" readonly>
                        <label for="apellido_usuario" class="lb">Apellidos</label>
                    </div>
                    <div class="input-field inline">
                        <input id="nick_usuario" type="text" name="nick_usuario" value="<?= $nick; ?>" readonly>
                        <label for="nick_usuario" class="lb">Nick de Usuario</label>
                    </div>
                    <br>
                    <label class="form-label" class="lb">Rol en el sistema</label>
                    <select name="id_rol" disabled="true">
                        <option class="option" required>Seleccionar</option>
                        <?php foreach ($roles as $r) : ?>
                            <?php if ($action == 'insertUsuario') : ?>
                                <option required value="<?= $r->id_rol; ?>"><?= $r->nombre_rol; ?></option>
                            <?php else : ?>
                                <option required value="<?= $r->id_rol ?>" <?= $r->id_rol == $id_rol ? 'selected' : ""; ?>><?= $r->nombre_rol; ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>