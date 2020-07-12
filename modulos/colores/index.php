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
    <title>COLORES</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid text-center">
        <div class="col-sm-12" style="padding: 30px;">
            <a href='formulario_colores.php' class="btn btn-primary float-right mb-2">NUEVO</a>
        </div>
        <div class="col-md-12 row">
            <?php

            //TABLA COLORES
            $consulta = "SELECT * FROM colores";
            $resultado = mysqli_query($mysqli, $consulta);
            while ($fila = mysqli_fetch_array($resultado)) {
            ?>

                <div class="card col-md-3" style="width: 18rem;margin:20px;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fila["nombre_colores"]; ?></h5>
                        <a href="fEdicion_colores.php?id=<?php echo $fila['id_colores']; ?>" class="card-link">Editar</a>
                        <a href="eliminar_colores.php?id=<?php echo $fila['id_colores']; ?>" class="card-link">Eliminar</a>

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