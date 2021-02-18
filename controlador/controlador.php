<?php
include("../modelo/manejo_objetos.php");

///comprobar que el usuario este registrado///

if (isset($_POST['ingresar'])) {


    $id_user = htmlentities(addslashes($_POST['id_usuario']));
    $password_user = htmlentities(addslashes($_POST['password']));

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

if(isset($_GET['cerrar_session'])){
    if ($_GET['cerrar_session']==1){
        session_destroy();
        header('location:../vista/login.html');
    }
}

?>