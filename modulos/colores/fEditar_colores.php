<?php
//Conectarse a la BD
require_once '../../conexion.php';

//Recibir datos del formulario
$nombre=$_POST['nombre_colores'];
//$status = $_POST['status_colores'];
$id = $_POST['id'];


//Construir la consulta
$consulta = "UPDATE colores SET nombre_colores = '$nombre' WHERE id_colores = $id";

// echo $consulta;

//Ejecutar la consulta
mysqli_query($mysqli, $consulta);

//session_start();
//$nombre_usuario = $_SESSION["nombre"];
//$sp_call = "CALL sp_prueba('blog','Se ha editado el registro de la tabla blog con el valor $id. Editado por $nombre_usuario')";
//mysqli_query($mysqli, $sp_call);

//Regresar al Index
header("Location: index.php")





?>