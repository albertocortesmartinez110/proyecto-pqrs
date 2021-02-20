<?php
include("../modelo/manejo_objetos.php");

///comprobar que el usuario este registrado///

if (isset($_POST['ingresar'])) {


    $id_user = htmlentities(addslashes($_POST['id_usuario']),ENT_QUOTES);
    $password_user = htmlentities(addslashes($_POST['password']),ENT_QUOTES);

    //llamamos a la funcion estatuca get_usuario que realiza una consulta con el id proporcionada
    $datos_usuario = manejo_objetos::get_usuario($id_user);

    if (password_verify($password_user, $datos_usuario->getContraseñaUsuario())) {

        session_start();
        $_SESSION['Name_user'] = $datos_usuario->getNombresUsuario();
        $_SESSION['Perfil_user'] = $datos_usuario->getPerfilUsuario();
        $_SESSION['Img_user'] = $datos_usuario->getImgUsuario();

        ///verificamos el tipo de perfil del usuario logeado

        switch ($_SESSION['Perfil_user']){
            case 'administrador':
                header("location:../vista/vista_administrador.php");
                break;
            case 'agente':
                header('location:../vista/vista_agente.php');
                break;
            case 'funcionario':
                header('location:../vista/vista_funcionario.php');
        }
    }else{
     ?>
    <script>
        alert('Datos ingresados incorrectos');
        window.location.href="../vista/login.html";
    </script>
    <?php
    }

}
//funcion para cerrar sesion
if(isset($_GET['cerrar_session'])){
    if ($_GET['cerrar_session']==1){
        session_start();
        session_destroy();
        header('location:../vista/login.html');
    }
}


//funcion para crear usuario

if(isset($_POST['registrar'])){

    manejo_objetos::comprobar_imagen();

    $usuario = new objeto_usuario();

    $usuario->setIdUsuario(htmlentities(addslashes($_POST['id_user']),ENT_QUOTES));
    $usuario->setNombresUsuario(htmlentities(addslashes($_POST['name']),ENT_QUOTES));
    $usuario->setApellidosUsuario(htmlentities(addslashes($_POST['apell']),ENT_QUOTES));
    $contraseña=htmlentities(addslashes($_POST['contraseña']),ENT_QUOTES);
    $usuario->setContraseñaUsuario(password_hash($contraseña,PASSWORD_DEFAULT));
    $usuario->setCorreoUsuario(htmlentities(addslashes($_POST['correo']),ENT_QUOTES));
    $usuario->setCiudadUsuario(htmlentities(addslashes($_POST['ciudad']),ENT_QUOTES));
    $usuario->setTelefonoUsuario(htmlentities(addslashes($_POST['telefono']),ENT_QUOTES));
    $usuario->setImgUsuario($_FILES['imagen']['name']);
    $usuario->setPerfilUsuario(htmlentities(addslashes($_POST['perfil']),ENT_QUOTES));

    $usuario_creado = manejo_objetos::set_usuario($usuario);

    ?>

    <script>

        alert('Usuario creado satisfactoriamente con id ' + <?php echo $usuario_creado?> );
        window.location.href="../vista/vista_administrador.php";
    </script>
<?php


}
?>