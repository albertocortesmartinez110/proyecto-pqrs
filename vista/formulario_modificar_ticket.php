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


            $("#id_ticket").keyup(function () {

                var datos = {tipo: $("#tipo").val(), id_ticket: $("#id_ticket").val()};
                console.log(datos);
                $.ajax({
                    data: datos,
                    url: "../controlador/controlador.php",
                    type: "get",
                    beforeSend: function () {
                        console.log("se esta procesando la peticion");
                    }
                })
                    .done(function (data) {
                        console.log(data);
                        var datos = JSON.parse(data);
                        console.log(datos);
                        var tamaño_array= datos.length-1;

                        console.log(tamaño_array);
                        $("#id_usuario").val(datos[0]['id_usuario']);
                        $("#nombres_usuario").val(datos[0]['nombres']);
                        $("#apellidos_usuario").val(datos[0]['apellidos']);
                        $("#ciudad_usuario").val(datos[0]['ciudad']);
                        $("#telefono_usuario").val(datos[0]['telefono']);
                        $("#correo_usuario").val(datos[0]['correo']);
                        $("#estado").val(datos[tamaño_array]['estado']);
                        
                    })
            });


        });
    </script>
    <title>Modificar tiket</title>
</head>
<body>
<?php
if (($_SESSION['Perfil_user'] != 'administrador') && ($_SESSION['Perfil_user'] != 'agente')) {

    header('location:login.html');

} else {
    ?>
    <section class="formulario_ticket">
        <form method="post" action="">
            <section class="datos_ticket_1">
                <div class="row">
                    <div class="col"><p>Tipo</p></div>
                    <div class="col"><select name="tipo" id="tipo" required>
                            <option value="Requerimiento">Requerimiento</option>
                            <option value="Incidente">Incidente</option>
                        </select>
                    </div>
                    <div class="col"><p>Numero</p></div>
                    <div class="col"><input type="number" name="id_ticket" id="id_ticket" required
                                            list="lista_id_tick_mod">
                        <datalist id="lista_id_tick_mod">
                        </datalist>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><p>Id usuario</p></div>
                    <div class="col"><input type="number" name="id_usuario" id="id_usuario" disabled required></div>
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
                    <div class="col"><input type="text" name="telefono_usuario" id="telefono_usuario" disabled></div>
                    <div class="col"><p>Correo</p></div>
                    <div class="col"><input type="text" name="correo_usuario" id="correo_usuario" disabled></div>
                </div>
                <div class="row">
                    <div class="col"><p>Estado</p></div>
                    <div class="col"><input type="text" name="estado" id="estado" disabled></div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>

            </section>

            <section class="datos_ticket_2">
                <div class="row">
                    <div class="col"><p>Creado por</p></div>
                    <div class="col"><input type="text" name="ciudad" disabled></div>
                    <div class="col"><p>Asignado a</p></div>
                    <div class="col"><input type="text" name="ciudad" disabled></div>
                    <div class="col"><p>Fecha</p></div>
                    <div class="col"><input type="text" name="ciudad" disabled></div>

                </div>
                <div class="row">
                    <div class="col"><p id="observacionp">Observacion</p></div>
                </div>
                <div class="row">
                    <div class="col"><textarea type="number" disabled name="telefono" class="observacion"></textarea>
                    </div>
                </div>

            </section>
            <section class="datos_ticket">
                <div class="row">
                    <div class="col"><p>¿Reasignar a?</p></div>
                    <div class="col"><input type="number" name="reasignar" placeholder="Opcional"></div>
                    <div class="col"><p>¿Cambiar estado?</p></div>
                    <div class="col">
                        <select name="cambiar_estado">
                            <option value="Abierto">Abierto</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Cerrado">Cerrado</option>
                        </select></div>
                </div>
                <div class="row">
                    <div class="col"><p>Observacion</p></div>
                </div>
                <div class="row">
                    <div class="col"><textarea type="number" name="telefono" class="observacion"
                                               placeholder="ingrese observacion" required></textarea></div>
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