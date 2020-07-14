<?php
require_once('../../conexion.php');
$id_compra = $_GET["id"];

$consulta = "DELETE FROM compras where id_compras = $id_compra";
mysqli_query($mysqli, $consulta);
header("Location: index.php");

?>