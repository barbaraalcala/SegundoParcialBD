<?php

require_once('../../conexion.php');

$id_compra = $_POST["id_compra"];
$cantidad = $_POST["seleccion_cantidad"];


$consulta = "UPDATE compras set cantidad = $cantidad WHERE id_compras = $id_compra";
$resultado = mysqli_query($mysqli, $consulta);

header("Location: index.php");
?>