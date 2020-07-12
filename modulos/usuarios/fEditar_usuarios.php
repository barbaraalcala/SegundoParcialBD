<?php
//Conectarse a la BD
require_once '../../conexion.php';

//Recibir datos del formulario
$nombre=$_POST['nombre_usuarios'];
$telefono = $_POST['telefono_usuarios'];
$direccion = $_POST['direccion_usuarios'];
$correo = $_POST['correo_usuarios'];
$contraseña = $_POST['contraseña_usuarios'];
$id = $_POST["id_usuarios"];

//Construir la consulta
$consulta = "UPDATE usuarios SET nombre_usuarios = '$nombre', telefono_usuarios = '$telefono', direccion_usuarios = '$direccion', correo_usuarios = '$correo', contraseña_usuarios = '$contraseña' WHERE id_usuarios = $id"; 

//Ejecutar la consulta
mysqli_query($mysqli, $consulta);

//session_start();
//$nombre_usuario = $_SESSION["nombre"];
//$sp_call = "CALL sp_prueba('usuarios','Se ha editado el registro de la tabla usuarios con el valor $nombre. Editado por $nombre_usuario')";
//mysqli_query($mysqli, $sp_call);
//Regresar al Index
header("Location: index.php");
?>