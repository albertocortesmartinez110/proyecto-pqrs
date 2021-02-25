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


    <?php
    if($_SESSION['Perfil_user'] =='administrador'){


    ?>

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
            $("#formulario_usuario input").prop('disabled', false);
            $("#formulario_usuario select").prop('disabled',false),
            $("#modificar").append("<input type='submit' class='enviar' value='modificar' name='modificar_usuario'>");

            $("#id_usuario").keyup(function (){

                var datos = {usuario_dat: $("#id_usuario").val()};
                console.log(datos);

                $.ajax({
                    data:datos,
                    url:"../controlador/controlador.php",
                    type:"get",
                    beforeSend:function (){
                        console.log("enviando peticion");
                    }
                })
                .done(function (data){
                    $("#lista_usuarios option").remove();
                    console.log("recibi info");
                    console.log(data);
                    var datos = JSON.parse(data);
                    console.log(datos);

                    for (var i=0; i<datos.length; i++){
                       $("#lista_usuarios").append("<option value="+ datos[i]['id_usuario']+"></option>");
                    }

                });

            });

            $("#id_usuario").blur(function (){

                var datos ={usuario_mod:$("#id_usuario").val()};
                console.log(datos);
                $.ajax({
                    data: datos,
                    url: "../controlador/controlador.php",
                    type:"get",
                    beforeSend:function (){
                        console.log("se esta procesando la peticion")
                    }
                })
                .done(function (data){

                    console.log("recibiendo la informacion");
                    console.log(data);
                    var datos = JSON.parse(data);
                    console.log(datos);

                    var perfil=datos[0]['perfil'];

                    $("#perfil_usuario option").each(function (){

                        var value= $(this).val();
                        if (value == perfil){

                            $(this).prop('selected',true);
                        }
                    });

                    $("#formulario_usuario #nombres_usuario").val(datos[0]['nombres']);
                    $("#formulario_usuario #apellidos_usuario").val(datos[0]['apellidos']);
                    $("#formulario_usuario #ciudad_usuario").val(datos[0]['ciudad']);
                    $("#formulario_usuario #telefono_usuario").val(datos[0]['telefono']);
                    $("#formulario_usuario #correo_usuario").val(datos[0]['correo']);
                    $("#formulario_usuario #perfil_usuario").val(datos[0]['perfil']);
                    $("#formulario_usuario #imagen").val(datos[0]['imagen']);


                });

            });


            $("#contraseña2").blur(function (){

                var contra1 = $("#contraseña1").val();
                var contra2 = $("#contraseña2").val();

                if (contra1 != contra2){

                    alert("las contraseñas no coinciden")

                    $("#contraseña2").val('');
                    $("#contraseña2").focus();
                }
            })

            $("#contraseña1").blur(function (){
                var contra1 = $("#contraseña1").val();
                var contra2 = $("#contraseña2").val();

                if(contra2 !=''){

                    if(contra1 != contra2){

                        alert("las contraseñas no coinciden")

                        $("#contraseña1").val('');
                    }
                }
            });

        });

    </script>
    <?php
    }else{
    ?>
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


                $("#id_usuario").keyup(function (){

                    var datos = {usuario_dat: $("#id_usuario").val()};
                    console.log(datos);

                    $.ajax({
                        data:datos,
                        url:"../controlador/controlador.php",
                        type:"get",
                        beforeSend:function (){
                            console.log("enviando peticion");
                        }
                    })
                        .done(function (data){
                            $("#lista_usuarios option").remove();
                            console.log("recibi info");
                            console.log(data);
                            var datos = JSON.parse(data);
                            console.log(datos);

                            for (var i=0; i<datos.length; i++){
                                $("#lista_usuarios").append("<option value="+ datos[i]['id_usuario']+"></option>");
                            }

                        });

                });

                $("#id_usuario").blur(function (){

                    var datos ={usuario_mod:$("#id_usuario").val()};
                    console.log(datos);
                    $.ajax({
                        data: datos,
                        url: "../controlador/controlador.php",
                        type:"get",
                        beforeSend:function (){
                            console.log("se esta procesando la peticion")
                        }
                    })
                        .done(function (data){

                            console.log("recibiendo la informacion");
                            console.log(data);
                            var datos = JSON.parse(data);
                            console.log(datos);



                            $("#formulario_usuario #nombres_usuario").val(datos[0]['nombres']);
                            $("#formulario_usuario #apellidos_usuario").val(datos[0]['apellidos']);
                            $("#formulario_usuario #ciudad_usuario").val(datos[0]['ciudad']);
                            $("#formulario_usuario #telefono_usuario").val(datos[0]['telefono']);
                            $("#formulario_usuario #correo_usuario").val(datos[0]['correo']);
                            $("#formulario_usuario #perfil_usuario").val(datos[0]['perfil']);

                        });
                });

                $("#contraseña2").blur(function (){

                    var contra1 = $("#contraseña1").val();
                    var contra2 = $("#contraseña2").val();

                    if (contra1 != contra2){

                        alert("las contraseñas no coinciden")

                        $("#contraseña2").val('');
                        $("#contraseña2").focus();
                    }
                })

                $("#contraseña1").blur(function (){
                    var contra1 = $("#contraseña1").val();
                    var contra2 = $("#contraseña2").val();

                    if(contra2 !=''){

                        if(contra1 != contra2){

                            alert("las contraseñas no coinciden")

                            $("#contraseña1").val('');
                        }
                    }
                });
            });
        </script>


    <?php
    }
    ?>
</head>
<body>



<?php

if (!isset($_SESSION['Perfil_user'])) {


    header('location:login.html');

} else {
?>
<section class="formulario_usuario">

    <form method="post" action="../controlador/controlador.php" id="formulario_usuario">
        <div class="row">
            <div class="col"><p>Id usuario</p></div>
            <div class="col"><input type="number" list="lista_usuarios" id="id_usuario" autocomplete="off" name="id_usuario" placeholder="ingrese id del usuario" required>
                <datalist id="lista_usuarios">

                </datalist>
            </div>
        </div>
        <div class="row">
            <div class="col"><p>Nombres</p></div>
            <div class="col"><input type="text" name="nombres_usuario" id="nombres_usuario" placeholder="ingrese nombres del usuario"
                                    disabled required></div>
        </div>
        <div class="row">
            <div class="col"><p>Apellidos</p></div>
            <div class="col"><input type="text" name="apellidos_usuario" id="apellidos_usuario" placeholder="ingrese apellidos del usuario"
                                    disabled required></div>
        </div>
        <div class="row">
            <div class="col"><p>Ciudad</p></div>
            <div class="col"><input type="text" name="ciudad" id="ciudad_usuario" placeholder="ingrese ciudad del usuario" required
                                    disabled>
            </div>
        </div>
        <div class="row">
            <div class="col"><p>Telefono</p></div>
            <div class="col"><input type="number" name="telefono" id="telefono_usuario" placeholder="ingrese telefono del usuario" disabled
                                    required>
            </div>
        </div>
        <div class="row">
            <div class="col"><p>Correo</p></div>
            <div class="col"><input type="email" name="correo" id="correo_usuario" placeholder="ingrese correo del usuario" required
                                    disabled>
            </div>
        </div>
        <div class="row">
            <div class="col"><p>Contraseña</p></div>
            <div class="col"><input type="password" id="contraseña1" name="contraseña" disabled
                                    placeholder="ingrese contraseña del usuario" ></div>
        </div>
        <div class="row">
            <div class="col"><p>Confirme contraseña</p></div>
            <div class="col"><input type="password" id="contraseña2" name="contraseña1"
                                    placeholder="ingrese confirmacion de la contraseña" disabled></div>
        </div>
        <div class="row">
            <div class="col"><p>Imagen</p></div>
            <div class="col"><input type="text" id="imagen" name="imagen"
                                    placeholder="ingrese una imagen"
                                    required disabled></div>
        </div>

        <div class="row">
            <div class="col"><p>Perfil del usuario</p></div>
            <div class="col" id="div_perf">
                <select type="text" name="perfil" id="perfil_usuario" disabled required>
                    <option value="funcionario" >Funcionario</option>
                    <option value="agente" >Agente</option>
                    <option value="administrador">Administrador</option>
                </select>
            </div>

        </div>
        <div class="row">
            <div class="col" id="modificar"><!---<input type="submit" class="enviar" value="modificar"
                                        name="modificar">--></div>
        </div>
    </form>
</section>
<?php
}
?>

</body>
</html>