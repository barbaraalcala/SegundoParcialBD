<?php
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
    <title>CATEGORIAS</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <?php require_once '../../conexion.php';
    $id = $_GET["id"];
    $consulta = "SELECT * FROM categorias WHERE id_categoria = $id";
    $resultado = mysqli_query($mysqli, $consulta);
    while ($fila = mysqli_fetch_array($resultado)) {
    ?>


        <!--Estetica-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <form action="fEditar_categorias.php" method="post">

                        <div class="form-group">
                            <label for="nombre">Nombre de la categoria<label>
                            <input type="text" name="nombre_categoria" id="nombre_categoria" value="<?php echo $fila["nombre_categoria"]; ?>">
                        </div>

                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <input type="submit" name="btnEnviar" value="Edita tu producto" class="btn btn-success">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <?php } ?>


    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>