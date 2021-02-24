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
        });
    </script>
    <title>Modificar tiket</title>
</head>
<body>
<?php
if(($_SESSION['Perfil_user'] !='administrador') && ($_SESSION['Perfil_user'] !='agente')){

    header('location:login.html');

}else{
?>
<section class="formulario_ticket">
    <form method="post" action="">
        <section class="datos_ticket_1">
            <div class="row">
                <div class="col"><p>Tipo</p></div>
                <div class="col"><input type="number" name="id_usuario" placeholder="seleccione tipo" required></div>
                <div class="col"><p>Numero</p></div>
                <div class="col"><input type="text" name="nombres_usuario" required ></div>
            </div>
            <div class="row">
                <div class="col"><p>Id usuario</p></div>
                <div class="col"><input type="number" name="id_usuario" disabled required></div>
                <div class="col"><p>Nombres</p></div>
                <div class="col"><input type="text" name="nombres_usuario" required disabled></div>
            </div>
            <div class="row">

                <div class="col"><p>Apellidos</p></div>
                <div class="col"><input type="text" name="nombres_usuario" required disabled></div>
                <div class="col"><p>Ciudad</p></div>
                <div class="col"><input type="text" name="nombres_usuario" required disabled></div>
            </div>
            <div class="row">
                <div class="col"><p>Telefono</p></div>
                <div class="col"><input type="text" name="apellidos_usuario" required disabled></div>
                <div class="col"><p>Correo</p></div>
                <div class="col"><input type="text" name="apellidos_usuario" required disabled></div>
            </div>
        </section>
        <section class="datos_ticket_2">
            <div class="row">
                <div class="col"><p>Creado por</p></div>
                <div class="col"><input type="text" name="ciudad" placeholder="ingrese tipo" required></div>
                <div class="col"><p>Asignado a</p></div>
                <div class="col"><input type="text" name="ciudad" placeholder="ingrese agente" required></div>
                <div class="col"><p>Fecha</p></div>
                <div class="col"><input type="text" name="ciudad" placeholder="ingrese agente" required></div>
                <div class="col"><p>Hora</p></div>
                <div class="col"><input type="text" name="ciudad" placeholder="ingrese agente" required></div>
                <div class="col"><p>Estado</p></div>
                <div class="col"><input type="text" name="ciudad" placeholder="ingrese agente" required></div>
            </div>
            <div class="row">
                <div class="col"><p id="observacionp">Observacion</p></div>
            </div>
            <div class="row">
                <div class="col"> <textarea type="number" name="telefono" class="observacion" placeholder="ingrese observacion" required></textarea></div>
            </div>

        </section>
        <section class="datos_ticket">
            <div class="row">
                <div class="col"><p>¿Reasignar a?</p></div>
                <div class="col"><input type="text" name="ciudad" placeholder="Opcional"></div>
            </div>
            <div class="row">
                <div class="col"><p>Observacion</p></div>
            </div>
            <div class="row">
                <div class="col"> <textarea type="number" name="telefono" class="observacion" placeholder="ingrese observacion" required></textarea></div>
            </div>
        </section>
        <div class="row">
            <div class="col"><input type="submit" class="enviar" value="registrar"
                                    name="registrar"></div>
        </div>
    </form>

</section>
<?php
}
?>
</body>
</html>