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
        $(document).ready(function (){

            $('#sidebar').hover(function () {

                $(this).stop().animate({
                    left:'0px'
                },500,'easeInSine'); ///termina efecto in
            },function (){
                $(this).stop().animate({
                    left: '-198px'
                },800,'easeOutBounce');///termina efecto out
            })

            $("#contraseña2").blur(function (){

                
            })


        });
    </script>
</head>
<body>
<?php

if(!isset($_SESSION['Perfil_user']) || $_SESSION['Perfil_user'] !='administrador'){


    header('location:login.html');

}else{
?>
<section class="formulario_usuario">

    <form method="post" action="../controlador/controlador.php">
        <div class="row">
            <div class="col"><p>Id usuario</p></div>
            <div class="col"><input type="number" name="id_usuario" placeholder="ingrese id del usuario" required></div>
        </div>
        <div class="row">
            <div class="col"><p>Nombres</p></div>
            <div class="col"><input type="text" name="nombres_usuario" placeholder="ingrese nombres del usuario"
                                    required></div>
        </div>
        <div class="row">
            <div class="col"><p>Apellidos</p></div>
            <div class="col"><input type="text" name="apellidos_usuario" placeholder="ingrese apellidos del usuario"
                                    required></div>
        </div>
        <div class="row">
            <div class="col"><p>Ciudad</p></div>
            <div class="col"><input type="text" name="ciudad" placeholder="ingrese ciudad del usuario" required></div>
        </div>
        <div class="row">
            <div class="col"><p>Telefono</p></div>
            <div class="col"><input type="number" name="telefono" placeholder="ingrese telefono del usuario" required>
            </div>
        </div>
        <div class="row">
            <div class="col"><p>Correo</p></div>
            <div class="col"><input type="email" name="correo" placeholder="ingrese correo del usuario" required></div>
        </div>
        <div class="row">
            <div class="col"><p>Contraseña</p></div>
            <div class="col"><input type="password" id="contraseña1" name="contraseña"
                                    placeholder="ingrese contraseña del usuario" required></div>
        </div>
        <div class="row">
            <div class="col"><p>Confirme contraseña</p></div>
            <div class="col"><input type="password" id="contraseña2" name="contraseña1"
                                    placeholder="ingrese confirmacion de la contraseña"
                                    required></div>
        </div>
        <div class="row">
            <div class="col"><p>Perfil del usuario</p></div>
            <div class="col"><input type="number" name="perfil" placeholder="perfil del usuario" required></div>
        </div>
        <div class="row">
            <div class="col"><input type="submit" class="enviar" value="registrar"
                                    name="registrar"></div>
        </div>
    </form>
</section>
<?php
}
?>
?>
</body>
</html>