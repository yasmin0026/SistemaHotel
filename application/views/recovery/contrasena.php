<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title><?= $page_title; ?></title>
    <?php $color = $allPagina->color_sistema; ?>
    <style>
        /* Botones normales  */
        .btnDynamic {
            background-color: <?= $color; ?>;
            color: white;
        }

        .aDynamic {
            background-color: <?= $color; ?>;
            color: white;
        }

        .btnDynamic[type=submit] {
            background-color: <?= $color; ?>;
        }

        .btnDynamic:hover {
            background-color: <?= $color; ?>;
        }

        .icon_prefix {
            color: <?= $color; ?>;
        }

        /* label color */
        .input-field label {
            color: <?= $color; ?>;
        }

        /* label focus color */
        .input-field input[type=text]:focus+label {
            color: <?= $color; ?>;
        }

        /* label underline focus color */
        .input-field input[type=text]:focus {
            border-bottom: 1px solid #000;
            border-bottom-color: <?= $color; ?>;
            box-shadow: 0 1px 0 0 #000;
        }

        /* valid color */
        .input-field input[type=text].valid {
            border-bottom: 1px solid #000;
            border-bottom-color: <?= $color; ?>;
            box-shadow: 0 1px 0 0 #000;
        }

        /* invalid color */
        .input-field input[type=text].invalid {
            border-bottom: 1px solid #000;
            border-bottom-color: <?= $color; ?>;
            box-shadow: 0 1px 0 0 #000;
        }

        /* icon prefix focus color */
        .input-field .prefix.active {
            color: <?= $color; ?>;
        }
    </style>
    <script type="text/javascript">
        window.onload = function() {
            $(".lb").css("color", "<?= $color; ?>");
            $(".dynamic").css("color", "<?= $color; ?>");
            $(".btnDynamic").css("background-color", "<?= $color; ?>");
            $(".activate").css("color", "<?= $color; ?>");
        }
    </script>

</head>

<?php
if (isset($datos)) {
    $id = $datos->id_usuario;
    $nombre = $datos->nombres_usuario;
    $apellido = $datos->apellido_usuario;
    $nick = $datos->nick_usuario;
    $contrasena = $datos->contrasena_usuario;
    $id_rol = $datos->id_rol;
    $pregunta = $datos->recovery_pregunta;
    $respuesta = $datos->recovery_respuesta;
}
?>

<div class="container">
    <form action="<?= base_url() . 'RecoveryController/setPassword'; ?>" method="POST">
        <div class="row">
            <div class="col s12 m2"></div>
            <div class="col s12 m7 l7">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo base_url() . 'assets/img/dont_remove_portada.jpg'; ?>" style="background-size:cover; height: 150px;">
                        <span class="card-title"><b>??Bienvenido!</b></span>
                    </div>
                    <div class="card-content">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <input type="hidden" name="nombre" value="<?= $nombre; ?>">
                        <input type="hidden" name="apellido" value="<?= $apellido; ?>">
                        <input type="hidden" name="nick" value="<?= $nick; ?>">
                        <input type="hidden" name="id_rol" value="<?= $id_rol; ?>">
                        <input type="hidden" name="pregunta" value="<?= $pregunta; ?>">
                        <input type="hidden" name="respuesta" value="<?= $respuesta; ?>">

                        <h5>??Hola <?= $nombre . ' ' . $apellido; ?></h5>
                        <h6>A continuaci??n podr??s cambiar tu contrase??a</h6>
                        <div class="input-field">
                            <input id="contrasena" type="text" name="contrasena" value="">
                            <label for="contrasena" class="lb">Escribe tu nueva contrase??a</label>
                        </div>
                        <div class="input-field center-align">
                            <h6 style="font-size: 16px;">??</h6>
                            <a class="btn-flat" href="<?= base_url() . 'LoginController/'; ?>">Iniciar sesi??n</a>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btnDynamic">Continuar <i class="material-icons right">send</i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>

</html>