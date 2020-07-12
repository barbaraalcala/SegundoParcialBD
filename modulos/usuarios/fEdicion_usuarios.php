<?php
session_start();

if(!isset($_SESSION["id"]) && !isset($_SESSION["nombre"]) && !isset($_SESSION["status"])){
  header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>USUARIOS</title>
  <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<?php require_once '../../conexion.php'; 
  $id = $_GET["id"];
  $consulta  = "SELECT * FROM usuarios where id_usuarios = $id";
  $resultado = mysqli_query($mysqli, $consulta);
  $fila = mysqli_fetch_array($resultado);
?>

<!--Estetica-->
<div class="container mt-5">
<div class = "row">
<div class ="col-sm-12">
  <form action="fEditar_usuarios.php" method="post">

  <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" id="nombre" value="<?php echo $fila["nombre_usuarios"]; ?>">    
  </div>

   <div class="form-group">
      <label for="telefono">Telefono</label>
      <input type="tel" name="telefono" id="nombre" value="<?php echo $fila["telefono_usuarios"]; ?>">    
  </div>

  <div class="form-group">
      <label for="direccion">Direccion</label>
      <input type="text" name="direccion" id="nombre" value="<?php echo $fila["direccion_usuarios"];?>">    
  </div>

   <div class="form-group">
      <label for="correo">Correo electronico</label>
      <input type="email" name="correo" id="nombre" value="<?php echo $fila["correo_usuarios"];?>">    
  </div>

  <div class="form-group">
      <label for="password">Contraseña</label>
      <input type='password' name="password" class="form-control" id="nombre" value="<?php echo $fila["contraseña_usuarios"]; ?>">    
  </div>

  <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

<div class="form-group">
  <input type="submit"  name="btnEnviar" value ="Registra a tu usuario" class="btn btn-success">  
</div>
</form>

  </div>
  </div>
  </div>
  <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>