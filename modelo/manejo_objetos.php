<?php
include('../modelo/conectar.php');
include('clase_usuarios.php');
include('clase_tickets.php');
include('clase_comentarios.php');

class manejo_objetos
{


    // funcion para pedir datos del usuario que se logea
    public static function get_usuario($id_usuario)
    {

        try {

            $pdo = conectar::conexion();
            $query = "select * from usuarios where id_usuario=:id_user";
            $resultado = $pdo->prepare($query);
            $resultado->execute(array(":id_user" => $id_usuario));

            $registro = $resultado->fetch(PDO::FETCH_ASSOC);

            $usuario = new objeto_usuario();

            $usuario->setApellidosUsuario($registro['apellidos']);
            $usuario->setCiudadUsuario($registro['ciudad']);
            $usuario->setContraseñaUsuario($registro['contraseña']);
            $usuario->setCorreoUsuario($registro['correo']);
            $usuario->setIdUsuario($registro['id_usuario']);
            $usuario->setNombresUsuario($registro['nombres']);
            $usuario->setPerfilUsuario($registro['perfil']);
            $usuario->setTelefonoUsuario($registro['telefono']);
            $usuario->setImgUsuario($registro['imagen']);
            return $usuario;
        } catch (Exception $e) {

            die('Error: ' . $e->getMessage() . ' ila del error: ' . $e->getFile());
        }
    }

    //funcion para crear usuario en la base de datos

    /*public static function set_usuario($id_user, $name_user, $apell_user, $contra_user, $correo_user, $perfil_user,$ciu_user,$tel_user,$img_user){

        try {
            $pdo = conectar::conexion();
            $query = "insert into usuarios (id_usuario,nombres,apelidos,contraseña,correo,peril,ciudad,telefono,imagen) values(:id_user,:name_user,:apell_user,:contra_user, :correo_user, :peril_user, :ciu_user,:tel_user,:img_user)";
            $ejecutar = $pdo->prepare($query);
            $ejecutar->execute(array(':id_user' => $id_user, ':name_user' => $name_user, ':apell_user' => $apell_user, ':contra_user' => $contra_user, ':correo_user' => $correo_user, ':perfil_user' => $perfil_user, ':ciu_user' => $ciu_user, ':tel_user' => $tel_user, ':img_user' => $img_user));
            return $id_user;

        }catch (Exception $e){

            die("Error: ".$e->getMessage() . ' fila del error: '.$e->getFile());
        }

    }*/

    public static function set_usuario(Objeto_usuario $objeto_usuario)
    {

        try {
            $pdo = conectar::conexion();
            $query = "insert into usuarios (id_usuario,nombres,apellidos,contraseña,correo,perfil,ciudad,telefono,imagen) values(:id_user,:name_user,:apell_user,:contra_user, :correo_user, :perfil_user, :ciu_user,:tel_user,:img_user)";
            $ejecutar = $pdo->prepare($query);
            $ejecutar->execute(array(':id_user' => $objeto_usuario->getIdUsuario(), ':name_user' => $objeto_usuario->getNombresUsuario(),
                ':apell_user' => $objeto_usuario->getApellidosUsuario(), ':contra_user' => $objeto_usuario->getContraseñaUsuario(),
                ':correo_user' => $objeto_usuario->getCorreoUsuario(), ':perfil_user' => $objeto_usuario->getPerfilUsuario(),
                ':ciu_user' => $objeto_usuario->getCiudadUsuario(), ':tel_user' => $objeto_usuario->getTelefonoUsuario(),
                ':img_user' => $objeto_usuario->getImgUsuario()));

            return $objeto_usuario->getIdUsuario();


        } catch (Exception $e) {

            die("Error: " . $e->getMessage() . ' fila del error : ' . $e->getFile());
        }

    }


    //funcion comprobar subida de imagenes

    public static function comprobar_imagen()
    {

        if ($_FILES['imagen']['error']) {
            switch ($_FILES['imagen']['error']) {

                case 1: //exceso de tamaño
                    echo "El tamaño del archivo excede lo permitido";
                    break;
                case 3: //corupcion de archivo
                    echo "El envio de archivo se interrumpio";
                    break;
                case 4: //No hay fichero
                    echo "No se ha enviado ningun archivo";
                    break;
            }
        } else {

            echo "Entrada subida correctamente </br>";

            if ((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error'] == UPLOAD_ERR_OK))) {

                $destino_de_ruta = $_SERVER['DOCUMENT_ROOT'] . "/curso_php/Proyecto_tickets_final/imagenes/";
                move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta . $_FILES['imagen']['name']);

                echo "El archivo " . $_FILES['imagen']['name'] . " se ha copiado en el directorio de imagenes</br>";

            } else {

                echo "El archivo no se ha podido copiar al directorio de imagenes";
            }

        }
    }

    //funcion crear ticket

    public static function set_tickets(Objeto_ticket $objeto_ticket)
    {

        switch ($objeto_ticket->getTipo()) {

            case 'Incidente':

                try {
                    $pdo = conectar::conexion();
                    $query = "insert into incidentes (id_usuario_afectado,fecha_creado,id_agente_asignado,id_creado_por,estado) values(:id_usuario_afectado,:fecha_creado,:id_agente_asignado,:id_creado_por, :estado)";
                    $ejecutar = $pdo->prepare($query);
                    $ejecutar->execute(array(':id_usuario_afectado' => $objeto_ticket->getIdUsuarioAfectado(),
                        ':fecha_creado' => $objeto_ticket->getFechaCreado(), ':id_agente_asignado' => $objeto_ticket->getIdAgenteAsignado(),
                        ':id_creado_por' => $objeto_ticket->getIdCreadoPor(), ':estado' => $objeto_ticket->getEstado()));

                } catch (Exception $e) {

                    die("Error: " . $e->getMessage() . 'en  la fila: ' . $e->getFile());

                }

                break;
            case 'Requerimiento':

                try {
                    $pdo = conectar::conexion();
                    $pdo->beginTransaction();
                    $query = "insert into requerimientos (id_usuario_afectado,fecha_creado,id_agente_asignado,id_creado_por,estado) values(:id_usuario_afectado,:fecha_creado, :id_agente_asignado, :id_creado_por, :estado)";
                    $ejecutar = $pdo->prepare($query);
                    $ejecutar->execute(array(':id_usuario_afectado' => $objeto_ticket->getIdUsuarioAfectado(),
                        ':fecha_creado' => $objeto_ticket->getFechaCreado(), ':id_agente_asignado' => $objeto_ticket->getIdAgenteAsignado(),
                        ':id_creado_por' => $objeto_ticket->getIdCreadoPor(), ':estado' => $objeto_ticket->getEstado()));
                    $last_inser = $pdo->lastInsertId();
                    $pdo->commit();
                    $ejecutar->closeCursor();
                    return $last_inser;
                } catch (Exception $e) {
                    $pdo->rollBack();

                    die("Error " . $e->getMessage() . 'en la fila ' . $e->getFile());


                }

                break;
        }
        return $pdo->lastInsertId();

    }

    public static function set_comentarios(Objeto_comentario $objeto_comentario)
    {


        try {
            $pdo = conectar::conexion();
            $query = "insert into comentarios (id_ticket, id_usuario, comentario, fecha_comentario) 
                 values (:id_ticket, :id_usuario,:comentario,:fecha_comentario)";
            $ejecutar = $pdo->prepare($query);
            $ejecutar->execute(array(':id_ticket' => $objeto_comentario->getIdTicket(), ':id_usuario' => $objeto_comentario->getIdUsuario(),
                ':comentario' => $objeto_comentario->getComentario(), ':fecha_comentario' => $objeto_comentario->getFechaComentario()));
        } catch (Exception $e) {

            die("Error: " . $e->getMessage() . ' en la fila :' . $e->getFile());
        }
    }
    public static function get_usuarios_id(Objeto_usuario $objeto_usuario){

        $pdo = conectar::conexion();
        $query = "select id_usuario from usuarios where id_usuario like :id_usuario";
        $usuarios = array();
        $contador = 0;
        $ejecutar= $pdo->prepare($query);
        $ejecutar->execute(array(':id_usuario'=>$objeto_usuario->getIdUsuario()));

        //pasar los datos a objeto inecesario mejor pasarlo a array
        /*while ($resultado = $ejecutar->fetch(PDO::FETCH_ASSOC)) {
        $usuario = new $objeto_usuario;
        $usuario->setIdUsuario($resultado['id_usuario']);
        $usuarios[$contador]=$usuario;
        $contador++;
        }*/


        //leer los datos en un areglo


        $data = $ejecutar->fetchAll(PDO::FETCH_ASSOC);
        return $data;
        //var_dump($data);
        ///return $usuarios;
    }

}


?>