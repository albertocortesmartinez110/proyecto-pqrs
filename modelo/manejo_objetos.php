<?php
include ('../modelo/conectar.php');
include ('clase_usuarios.php');

class manejo_objetos{


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
        }catch (Exception $e){

            die('Error: '.$e->getMessage().' ila del error: '.$e->getFile());
        }
    }

    //funcion para crear usuario en la base de datos

    public static function set_usuario($id_user, $name_user, $apell_user, $contra_user, $correo_user, $perfil_user,$ciu_user,$tel_user,$img_user){

        try {
            $pdo = conectar::conexion();
            $query = "insert into usuarios (id_usuario,nombres,apelidos,contraseña,correo,peril,ciudad,telefono,imagen) values(:id_user,:name_user,:apell_user,:contra_user, :correo_user, :peril_user, :ciu_user,:tel_user,:img_user)";
            $ejecutar = $pdo->prepare($query);
            $ejecutar->execute(array(':id_user' => $id_user, ':name_user' => $name_user, ':apell_user' => $apell_user, ':contra_user' => $contra_user, ':correo_user' => $correo_user, ':perfil_user' => $perfil_user, ':ciu_user' => $ciu_user, ':tel_user' => $tel_user, ':img_user' => $img_user));
            return $id_user;

        }catch (Exception $e){

            die("Error: ".$e->getMessage() . ' fila del error: '.$e->getFile());
        }

    }
}


?>