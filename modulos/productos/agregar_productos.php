<?php
//Conectarse a la BD
require_once '../../conexion.php';

//Recibir datos del formulario
$nombre=$_POST['nombre_producto'];
$descripcion = $_POST['descripcion_producto'];
$precio = $_POST['precio_producto'];
$stock = $_POST['stock_producto'];
$color = $_POST['id_color'];
$categoria = $_POST['id_categoria'];

//Construir la consulta
//INSERT INTO (campos1, campo2, campo3) VALUES (valor1, valor2, valor3);
$consulta ="INSERT INTO productos (nombre_producto, descripcion_producto, precio_producto, stock_producto, id_categoria, id_colores) 
	VALUES ('$nombre', '$descripcion', '$precio',$stock, $categoria, $color)";
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