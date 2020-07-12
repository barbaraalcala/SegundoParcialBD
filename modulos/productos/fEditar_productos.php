<?php
//Conectarse a la BD
require_once '../../conexion.php';

//Recibir datos del formulario
$nombre=$_POST['nombre_producto'];
$descripcion = $_POST['descripcion_producto'];
$precio = $_POST['precio_producto'];
$stock = $_POST['stock_producto'];
$id = $_POST['id'];


//Construir la consulta
$consulta = "UPDATE productos SET nombre_producto = '$nombre', descripcion_producto = '$descripcion', precio_producto = '$precio', stock_producto = '$stock' WHERE id_producto = $id";

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