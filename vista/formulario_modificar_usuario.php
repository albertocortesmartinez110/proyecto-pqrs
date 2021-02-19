<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
    <title>tickets</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script>
        $(document).ready(function () {

            $('#sidebar').hover(function () {

                $(this).stop().animate({
                    left: '0px'
                }, 500, 'easeInSine'); ///termina efecto in
            }, function () {
                $(this).stop().animate({
                    left: '-198px'
                }, 800, 'easeOutBounce');///termina efecto out
            });

            <?php
            if(1>2){
                ?>
                $("#formulario_usuario input").prop('disabled', false);
                <?php
            }
            ?>
        });








    </script>
</head>
<body>
<?php

/*if (!isset($_SESSION['Perfil_user']) || $_SESSION['Perfil_user'] != 'administrador') {


    header('location:login.html');

} else {*/
?>
<section class="formulario_usuario">

    <form method="post" action="" id="formulario_usuario">
        <div class="row">
            <div class="col"><p>Id usuario</p></div>
            <div class="col"><input type="number" name="id_usuario" placeholder="ingrese id del usuario" required>
            </div>
        </div>
        <div class="row">
            <div class="col"><p>Nombres</p></div>
            <div class="col"><input type="text" name="nombres_usuario" placeholder="ingrese nombres del usuario"
                                    disabled required></div>
        </div>
        <div class="row">
            <div class="col"><p>Apellidos</p></div>
            <div class="col"><input type="text" name="apellidos_usuario" placeholder="ingrese apellidos del usuario"
                                    disabled required></div>
        </div>
        <div class="row">
            <div class="col"><p>Ciudad</p></div>
            <div class="col"><input type="text" name="ciudad" placeholder="ingrese ciudad del usuario" required
                                    disabled>
            </div>
        </div>
        <div class="row">
            <div class="col"><p>Telefono</p></div>
            <div class="col"><input type="number" name="telefono" placeholder="ingrese telefono del usuario" disabled
                                    required>
            </div>
        </div>
        <div class="row">
            <div class="col"><p>Correo</p></div>
            <div class="col"><input type="email" name="correo" placeholder="ingrese correo del usuario" required
                                    disabled>
            </div>
        </div>
        <div class="row">
            <div class="col"><p>Contraseña</p></div>
            <div class="col"><input type="password" id="contraseña1" name="contraseña" disabled
                                    placeholder="ingrese contraseña del usuario" required></div>
        </div>
        <div class="row">
            <div class="col"><p>Confirme contraseña</p></div>
            <div class="col"><input type="password" id="contraseña2" name="contraseña1"
                                    placeholder="ingrese confirmacion de la contraseña"
                                    onChange="calcularpassword()"
                                    required disabled></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col"><input type="number" name="perfil" placeholder="perfil del usuario" disabled></div>
        </div>
        <div class="row">
            <div class="col" id="modificar"><!---<input type="submit" class="enviar" value="modificar"
                                        name="modificar">--></div>
        </div>
    </form>
</section>
<?php
//}
?>

</body>
</html>