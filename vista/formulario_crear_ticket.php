<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimun-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <title>formulario crear ticket</title>
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

            $("#formulario_ticket input").prop('required', false);


            $("#usuario_afectado").keyup(function () {

                //var datos=$("#usuario_afectado").serialize();
                //alert(datos);
                var datos = {usuario: $("#usuario_afectado").val()};

                $.ajax({
                    data: datos,
                    url: "../controlador/controlador.php",
                    type: "get",
                    beforeSend: function () {
                        console.log("Se esta procesando tu peticion");
                    }

                })
                    .done(function (data) {
                            console.log(data),
                                $("#lista option").remove();// remover las etiquetas que se crean con cada pulsacion del teclado
                            var datos = JSON.parse(data);
                            console.log(datos);
                            for (var i = 0; i < datos.length; i++) {

                                $("#lista").append("<option value=" + datos[i]['id_usuario'] + "></option>");
                            }

                        }
                    )


            });


            /// funcion traer datos usuario ajax

            $("#usuario_afectado").blur(function () {

                var datos1 = {usuario_afectado: $("#usuario_afectado").val()};

                console.log(datos1);

                $.ajax({
                    data: datos1,
                    url: "../controlador/controlador.php",
                    type: "get",
                    beforeSend: function () {
                        console.log("Se esta procesando tu peticion 2");
                    }

                })
                    .done(function (data) {

                        console.log(data);
                        var datos = JSON.parse(data);
                        console.log(datos);

                        var nombre = datos[0]['nombres'];

                        console.log(nombre);

                        $("#formulario_ticket #nombres_usuario").val(datos[0]['nombres']);
                        $("#formulario_ticket #apellidos_usuario").val(datos[0]['apellidos']);
                        $("#formulario_ticket #ciudad_usuario").val(datos[0]['ciudad']);
                        $("#formulario_ticket #telefono_usuario").val(datos[0]['telefono']);
                        $("#formulario_ticket #corre_usuario").val(datos[0]['correo']);

                    });


            });

            $("#usuario_asignado").keyup(function (){

                var datos ={usuario_asignado:$("#usuario_asignado").val()};

                console.log(datos);

                $.ajax({
                   data: datos,
                   url:"../controlador/controlador.php",
                   type:"get",
                   beforeSend:function (){

                       console.log("Se esta procesando la tercer peticion");
                   }
                })
                .done(function (data){
                    $("#lista_agentes option").remove();
                    console.log(data);
                    var datos = JSON.parse(data);
                    console.log(datos);
                    for (var i=0; i<datos.length;i++){
                        $("#lista_agentes").append("<option value="+    datos[i]['id_usuario'] +"></option>");
                    }
                });
            });
        });
    </script>
</head>
<body>
<?php

if (!isset($_SESSION['Perfil_user'])) {


    header('location:login.html');

} else {
    ?>
    <section class="formulario_ticket">

        <form method="post" action="../controlador/controlador.php" id="formulario_ticket">
            <section class="datos_usuario">
                <div class="row">
                    <div class="col"><p>Id usuario</p></div>
                    <div class="col"><input type="number" name="id_usuario_afectado" id="usuario_afectado" list="lista"
                                            placeholder="ingrese id del usuario" required>
                        <datalist id="lista">

                        </datalist>
                    </div>

                    <div class="col"><p>Nombres</p></div>
                    <div class="col"><input type="text" name="nombres_usuario" id="nombres_usuario" required disabled>
                    </div>
                </div>
                <div class="row">

                    <div class="col"><p>Apellidos</p></div>
                    <div class="col"><input type="text" name="apellidos_usuario" id="apellidos_usuario" required
                                            disabled></div>
                    <div class="col"><p>Ciudad</p></div>
                    <div class="col"><input type="text" name="ciudad_usuario" id="ciudad_usuario" required disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><p>Telefono</p></div>
                    <div class="col"><input type="text" name="telefono_usuario" id="telefono_usuario" required disabled>
                    </div>
                    <div class="col"><p>Correo</p></div>
                    <div class="col"><input type="text" name="correo_usuario" id="corre_usuario" required disabled>
                    </div>
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
                    <div class="col"><input type="number" id="usuario_asignado" name="id_usuario_asignado"
                                            placeholder="ingrese agente" list="lista_agentes" required>
                    <datalist id="lista_agentes">

                    </datalist>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><p>Comentario</p></div>
                </div>
                <div class="row">
                    <div class="col"><textarea type="number" name="comentario" class="observacion"
                                               placeholder="ingrese comentario" required></textarea></div>
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