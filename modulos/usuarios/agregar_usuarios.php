<?php
//Conectarse a la BD
require_once '../../conexion.php';

//Recibir datos del formulario
$nombre=$_POST['nombre_usuarios'];
$telefono = $_POST['telefono_usuarios'];
$direccion = $_POST['direccion_usuarios'];
$correo = $_POST['correo_usuarios'];
$contraseña = $_POST['contraseña_usuarios'];
$status = $_POST['status_usuarios'];

//Construir la consulta
//INSERT INTO (campos1, campo2, campo3) VALUES (valor1, valor2, valor3);
$consulta ="INSERT INTO usuarios (nombre_usuarios, telefono_usuarios, direccion_usuarios, correo_usuarios, contraseña_usuarios, status_usuarios) 
	VALUES ('$nombre', '$telefono', '$direccion','$correo', '$contraseña' , '$status')";

//session_start();
//$nombre_usuario = $_SESSION["nombre"];
//$sp_call = "CALL sp_prueba('usuarios','Se ha agregado un nuevo registro en la tabla usuarios. Agregado por $nombre_usuario')";
//mysqli_query($mysqli, $sp_call);
//Ejecutar la consulta
mysqli_query($mysqli, $consulta);
//Regresar al Index
header("Location: index.php")





?>