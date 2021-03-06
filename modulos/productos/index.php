<?php
require_once('../../conexion.php');
session_start();

if (!isset($_SESSION["id"]) && !isset($_SESSION["nombre"]) && !isset($_SESSION["status"])) {
    header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid text-center">
    <div class="col-sm-12" style="padding: 30px;">
    <a href='formulario_productos.php' class ="btn btn-primary float-right mb-2">NUEVO</a>  
  </div>
        <div class="col-md-12 row">
            <?php

            //TABLA PRODUCTOS
            $consulta = "SELECT * FROM productos";
            $resultado = mysqli_query($mysqli, $consulta);
            while ($fila = mysqli_fetch_array($resultado)) {
            ?>

                <div class="card col-md-3" style="width: 18rem;margin:20px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fila["nombre_producto"]; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">$ <?php echo $fila["precio_producto"]; ?></h6>
                        <p class="card-text"><?php echo $fila["descripcion_producto"]; ?></p>
                        <p class="card-text">
                        <?php 
                          $consulta_colores = "SELECT * FROM colores WHERE id_colores=".$fila["id_colores"];
                          $resultado_colores= mysqli_query($mysqli, $consulta_colores);
                          $resultadoMinColores = mysqli_fetch_array($resultado_colores);
                          echo $resultadoMinColores["nombre_colores"];
                        ?>
                        </p>
                        <p class="card-text">PRODUCTOS DISPONIBLES: <?php echo $fila["stock_producto"]; ?></p>
                        <a href="fEdicion_productos.php?id=<?php echo $fila['id_producto']; ?>" class="card-link">Editar</a>
                        <a href="eliminar_productos.php?id=<?php echo $fila['id_producto']; ?>" class="card-link">Eliminar</a>
                        <?php
                        if($fila["stock_producto"] > 0){
                        ?>
                        <a href="../compras/insertar_compra.php?id=<?php echo $fila['id_producto']; ?>" class="card-link">Comprar</a>
                        <?php
                        }else{
                            ?>
                            <p>No disponible</p>
                            <?php
                        }
                        ?>
                    </div>
                </div>

            <?php }  ?>

        </div>
    </div>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>