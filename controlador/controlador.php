<?php
include ("../modelo/manejo_objetos.php");

$id_usuario= $_POST['id_usuario'];

$consulta = manejo_objetos::get_usuario($id_usuario);

///for ($i =0; $i<$consulta->length();$i++){

    ///echo 'nombre';

//}

var_dump($consulta);
echo $consulta->getCiudadUsuario();
?>