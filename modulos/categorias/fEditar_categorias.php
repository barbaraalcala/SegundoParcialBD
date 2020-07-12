<?php
//Conectarse a la BD
require_once '../../conexion.php';

//Recibir datos del formulario
$nombre=$_POST['nombre_categoria'];
$status = $_POST['status_categoria'];
$id = $_POST['id'];


//Construir la consulta
$consulta = "UPDATE colores SET nombre_categoria = '$nombre', status_categoria = '$status' WHERE id_categoria = $id";

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