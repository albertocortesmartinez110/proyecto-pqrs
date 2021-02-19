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

    $id=htmlentities(addslashes($_POST['id_user']));
    $nombres=htmlentities(addslashes($_POST['name']));
    $apellidos=htmlentities(addslashes($_POST['apell']));
    $contraseña=htmlentities(addslashes($_POST['contraseña']));
    $contraseña_cif=password_hash($contraseña,PASSWORD_DEFAULT);
    $correo=htmlentities(addslashes($_POST['correo']));
    $ciudad=htmlentities(addslashes($_POST['ciudad']));
    $telefono=htmlentities(addslashes($_POST['telefono']));
    $imagen=htmlentities(addslashes($_POST['imagen']));
    $perfil=htmlentities(addslashes($_POST['perfil']));

    $usuario_creado = manejo_objetos::set_usuario($id,$nombres,$apellidos,$contraseña_cif,$correo,$ciudad,$telefono,$imagen,$perfil);

    ?>

    <script>

        alert('Usuario creado satisfactoriamente con id ' + <?php echo $usuario_creado?> );
        window.location.href="../vista/vista_administrador.php";
    </script>
<?php


}
?>