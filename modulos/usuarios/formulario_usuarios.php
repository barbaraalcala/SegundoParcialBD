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
<?php require_once '../../conexion.php'; ?>

<!--Estetica-->
<div class="container mt-5">
<div class = "row">
<div class ="col-sm-12">
  <form action="agregar_usuarios.php" method="post">

  <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre_usuarios" id="nombre" placeholder="Ingresa tu nombre">    
  </div>

   <div class="form-group">
      <label for="telefono">Telefono</label>
      <input type="tel" name="telefono_usuarios" id="nombre" placeholder="Ingresa tu telefono">    
  </div>

  <div class="form-group">
      <label for="direccion">Direccion</label>
      <input type="text" name="direccion_usuarios" id="nombre" placeholder="Ingresa tu direccion">    
  </div>

   <div class="form-group">
      <label for="correo">Correo electronico</label>
      <input type="email" name="correo_usuarios" id="correo_usuarios" placeholder="Ingresa tu correo">    
  </div>

  <div class="form-group">
      <label for="contraseña">Contraseña</label>
      <input type='contraseña' name="contraseña_usuarios" class="form-control" id="contraseña_usuarios" placeholder="Ingresa tu contraseña">    
  </div>

  <div class="form-group">
      <label for="status">Status</label>
      <input type="text" name="status_usuarios" id="status_usuarios" placeholder="Ingresa tu status">    
  </div>

<div class="form-group">
  <input type="submit"  name="btnEnviar" value ="Registra al usuario" class="btn btn-success">  
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