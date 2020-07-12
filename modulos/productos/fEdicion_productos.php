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
    <title>PRODUCTOS</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <?php require_once '../../conexion.php';
    $id = $_GET["id"];
    $consulta = "SELECT * FROM productos prt INNER JOIN categorias cat ON cat.id_categoria = prt.id_categoria INNER JOiN colores col ON col.id_colores = prt.id_colores WHERE prt.id_producto = $id";
    $resultado = mysqli_query($mysqli, $consulta);
    while ($fila = mysqli_fetch_array($resultado)) {
    ?>


        <!--Estetica-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12">
                    <form action="fEditar_productos.php" method="post">

                        <div class="form-group">
                            <label for="nombre">Nombre del producto</label>
                            <input type="text" name="nombre_producto" id="nombre_producto" value="<?php echo $fila["nombre_producto"]; ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Descripcion del producto</label>
                            <input type="text" name="descripcion_producto" id="descripcion_producto" value="<?php echo $fila["descripcion_producto"]; ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Precio</label>
                            <input type="text" name="precio_producto" id="precio_producto" value="<?php echo $fila["precio_producto"]; ?>">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Stock</label>
                            <input type="text" name="stock_producto" id="stock_producto" value="<?php echo $fila["stock_producto"]; ?>">
                        </div>





                        <div class="form-group">
                            <label for="nombre">Color</label>
                            <select name="productos" id="id_producto">
                                <?php
                                $consulta_colores = "SELECT * FROM colores";
                                $resultado_colores = mysqli_query($mysqli, $consulta_colores);
                                while ($fila_cat = mysqli_fetch_array($resultado_colores)) {
                                ?>
                                    <option value="<?php echo $fila_cat["id_colores"]; ?>" <?php if ($fila_cat["id_colores"] == $fila["id_colores"]) echo 'selected' ?>><?php echo $fila_cat["nombre_colores"]; ?></option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Categorias</label>
                            <select name="productos" id="id_producto">
                                <?php
                                $consulta_categorias = "SELECT * FROM categorias";
                                $resultado_categorias = mysqli_query($mysqli, $consulta_categorias);
                                while ($fila_cate = mysqli_fetch_array($resultado_categorias)) {
                                ?>
                                    <option value="<?php echo $fila_cate["id_categoria"]; ?>" <?php if ($fila_cate["id_categoria"] == $fila["id_categoria"]) echo 'selected' ?>><?php echo $fila_cate["nombre_categoria"]; ?></option>

                                <?php
                                }
                                ?>
                            </select>
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