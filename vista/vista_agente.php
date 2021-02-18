<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
    <title>tickets</title>
    <link rel="stylesheet" href="../css/estilos.css">
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
                    left: '-203px'
                },800,'easeOutBounce');///termina efecto out
            });
        });
    </script>
    <title>vista_administrador</title>
</head>
<body>
<?php
session_start();
?>
<section class="sidebar" id="sidebar">
    <ul>
        <li id="menu"><h3>Menu </h3></li>
        <li id="nam_user_li"> <a><?php echo $_SESSION['Name_user']?></a></li>
        <li id="img_user_li"><img src="/curso_php/Proyecto_tickets_final/imagenes/<?php echo $_SESSION['Img_user'] ?>"></img></li>
        <li><a href="?accion=crear_ticket">Crear ticket</a></li>
        <li><a href="?accion=consultar_ticket">Consultar ticket</a></li>
        <li><a>Consultar usuario</a></li>
        <li><a href="../controlador/controlador.php?cerrar_session=1">Cerrar Sesion</a></li>
    </ul>
</section>
<?php
// validamos que opcion seleccciona el usuario

if(isset($_GET['accion'])){
    switch ($_GET['accion']) {
        case 'crear_ticket';
            include_once('formulario_crear_ticket.php');
            break;
    }
}

?>

</body>
</html>