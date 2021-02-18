<?php
include ('../modelo/conectar.php');
include ('clase_usuarios.php');

class manejo_objetos{

    public static function get_usuario($id_usuario)
    {

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

        return $usuario;

    }
}


?>