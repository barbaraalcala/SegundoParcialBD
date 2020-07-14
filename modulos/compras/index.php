<?php
require_once('../../conexion.php');
session_start();

if (!isset($_SESSION["id"]) && !isset($_SESSION["nombre"]) && !isset($_SESSION["status"])) {
    header("Location: ../../index.php");
}
$id_usuario = $_SESSION["id"];

$consulta_compras = "SELECT * FROM compras where id_usuario = $id_usuario";
$resultado_compras = mysqli_query($mysqli, $consulta_compras);

$consulta_usuario = "SELECT * FROM usuarios where id_usuarios = $id_usuario";
$resultado_usuario = mysqli_query($mysqli, $consulta_usuario);

?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid text-center">
        <div class="col-md-12">
            <hr />
            <h1>Productos seleccionados</h1>
            <hr />
        </div>
        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre producto</th>
                    <th scope="col">Fecha compra</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Comprado por:</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Accciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
        while($usuario = mysqli_fetch_array($resultado_usuario)){ 
            $global_usuario = $usuario["nombre_usuarios"];
        }
                $i = 0;
                while ($fila = mysqli_fetch_array($resultado_compras)) {
                    $i++;
                ?>
                    <tr>
                        <th scope="row"><?php echo $i ?></th>
                        <td><?php echo $fila["nombre_producto"] ?></td>
                        <td><?php echo $fila["fecha"] ?></td>
                        <td>$<?php echo $fila["precio_unidad"] ?></td>
                        
                        <td><?php echo $global_usuario; ?></td>
               
                        <td><?php echo $fila["cantidad"] ?></td>
                        <td>
                            <a href="eliminar_compra.php?id=<?php echo $fila["id_compras"]; ?>" class="btn btn-danger">Eliminar compra</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>

    </script>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>