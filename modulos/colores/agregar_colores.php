<?php
//Conectarse a la BD
require_once '../../conexion.php';

//Recibir datos del formulario
$nombre =$_POST['nombre_colores'];
$colores = $_POST['id_colores'];

//Construir la consulta
//INSERT INTO (campos1, campo2, campo3) VALUES (valor1, valor2, valor3);
$consulta ="INSERT INTO colores (nombre_colores, id_colores) 
	VALUES ('$nombre, $colores)";
// echo $consulta;
//session_start();
//$nombre_usuario = $_SESSION["nombre"];
//$sp_call = "CALL sp_prueba('usuarios','Se ha agregado un nuevo registro en la tabla usuarios. Agregado por $nombre_usuario')";
//mysqli_query($mysqli, $sp_call);
//Ejecutar la consulta
mysqli_query($mysqli, $consulta);
//Regresar al Index
header("Location: index.php")





?>