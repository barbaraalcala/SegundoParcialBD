<?php
require_once('../../conexion.php');
session_start();

if (!isset($_SESSION["id"]) && !isset($_SESSION["nombre"]) && !isset($_SESSION["status"])) {
    header("Location: ../../index.php");
}
$id_usuario = $_SESSION["id"];
$id_compra = $_GET["id_compra"];

// $consulta_compras = "SELECT * FROM compras where id_usuario = $id_usuario";
// $resultado_compras = mysqli_query($mysqli, $consulta_compras);

// $consulta_usuario = "SELECT * FROM usuarios where id_usuarios = $id_usuario";
// $resultado_usuario = mysqli_query($mysqli, $consulta_usuario);
$consulta_compra = "SELECT * FROM compras WHERE id_compras = $id_compra";
// echo $consulta_compra;
$resultado_compra = mysqli_query($mysqli, $consulta_compra);
$filaCompra = mysqli_fetch_array($resultado_compra);
$consulta_producto = "SELECT * FROM productos WHERE id_producto=".$filaCompra["id_producto"];
// echo $consulta_producto;
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPRAS</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid text-center">
        <form method="POST" action="editar_compra.php">
            <label>Cantidad</label>
            <select name="seleccion_cantidad" id="seleccion_cantidad">
               <?php 
             
                $resultado_producto = mysqli_query($mysqli, $consulta_producto);
                $fila = mysqli_fetch_array($resultado_producto);
                for($x = 1; $x <= $fila["stock_producto"] +1; $x++) {
               ?>
                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
               <?php
               }
               ?>
            </select>
            <input name="id_compra" id="id_compra" value="<?php echo $id_compra; ?>" type="hidden"/>
            <input type="submit" value="Enviar"/>
        </form>
    </div>

    <script>

    </script>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>