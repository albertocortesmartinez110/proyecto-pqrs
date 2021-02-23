<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
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
            });

            $("#formulario_ticket input").prop('required',false);


            $("#usuario_afectado").keyup(function(){

                var datos=$("#usuario_afectado").serialize();

               $.ajax({
                 data:datos,
                 url:"../controlador/controlador.php",
                   type:"get",
                 beforeSend:function (){
                     console.log("Se esta procesando tu peticion");
                 }

               })
                .done(function (data){
                    console.log(data);
                    var datos = JSON.parse(data);
                    console.log(datos);


                })


            });

            function procesar_datos(datos_devueltos){

                alert(datos_devueltos);


            }
        });
    </script>
    <title>formulario crear ticket</title>
</head>
<body>
<?php

if(!isset($_SESSION['Perfil_user'])){


    header('location:login.html');

}else{
    ?>
<section class="formulario_ticket">

    <form method="post" action="../controlador/controlador.php" id="formulario_ticket">
        <section class="datos_usuario">
            <div class="row">
                <div class="col"><p>Id usuario</p></div>
                <div class="col"><input type="number" name="id_usuario_afectado" id="usuario_afectado" list="lista" placeholder="ingrese id del usuario" required>
                <datalist id="lista">

                </datalist>
                </div>

                <div class="col"><p>Nombres</p></div>
                <div class="col"><input type="text" name="nombres_usuario" required disabled></div>
            </div>
            <div class="row">

                <div class="col"><p>Apellidos</p></div>
                <div class="col"><input type="text" name="apellidos_usuario" required disabled></div>
                <div class="col"><p>Ciudad</p></div>
                <div class="col"><input type="text" name="ciudad_usuario" required disabled></div>
            </div>
            <div class="row">
                <div class="col"><p>Telefono</p></div>
                <div class="col"><input type="text" name="telefono_usuario" required disabled></div>
                <div class="col"><p>Correo</p></div>
                <div class="col"><input type="text" name="correo_usuario" required disabled></div>
            </div>
        </section>
        <section class="datos_ticket">
        <div class="row">
            <div class="col"><p>Tipo</p></div>
            <div class="col"><select name="tipo" required>
                    <option value="Incidente">Incidente</option>
                    <option value="Requerimiento">Requerimiento</option>
                </select>
            </div>
            <div class="col"><p>Asignar a</p></div>
            <div class="col"><input type="text" name="id_usuario_asignado" placeholder="ingrese agente" required></div>
        </div>
            <div class="row">
                <div class="col"><p>Comentario</p></div>
            </div>
            <div class="row">
                <div class="col"> <textarea type="number" name="comentario" class="observacion" placeholder="ingrese comentario" required></textarea></div>
            </div>
        </section>
        <div class="row">
            <div class="col"><input type="submit" class="enviar" value="registrar"
                                    name="crear_ticket"></div>
        </div>
    </form>

</section>
<?php
}
?>
</body>
</html>