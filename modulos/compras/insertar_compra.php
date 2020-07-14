<?php
require_once('../../conexion.php');
session_start();

if (!isset($_SESSION["id"]) && !isset($_SESSION["nombre"]) && !isset($_SESSION["status"])) {
    header("Location: ../../index.php");
}
session_start();

print_r($_SESSION);
$id_producto = $_GET["id"];
$id_usuario = $_SESSION["id"];


$consulta_producto = "SELECT * FROM productos WHERE id_producto = $id_producto";

$resultado_producto = mysqli_query($mysqli, $consulta_producto);
    while ($fila = mysqli_fetch_array($resultado_producto)) {
       $nombre_producto = $fila["nombre_producto"];
       $precio = $fila["precio_producto"];
       $nombre_usuario = $_SESSION["nombre"];
       $consulta = "INSERT INTO compras(id_producto,id_usuario,nombre_producto,nombre_usuario,cantidad,precio_unidad) 
       VALUES($id_producto,$id_usuario,'$nombre_producto','$nombre_usuario',1,$precio)";
       mysqli_query($mysqli, $consulta);
    }

	header("Location: index.php");
?>