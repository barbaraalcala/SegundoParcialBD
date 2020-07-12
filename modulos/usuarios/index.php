<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<?php 
require_once '../../conexion.php'; 
?>

<!--Estetica-->
<div class="container mt-5">
<div class = "row">
  <div class="col-sm-12">
    <a href='formulario_usuarios.php' class ="btn btn-primary float-right mb-2">NUEVO</a>  
  </div>
<div class ="col-sm-12">
  <div class="table-reponsive">
    <div class="col-sm-12">
    <table class="table table-stripped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Correo</th>
        <th>Contraseña</th>
        <th>Status</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php 

      //TABLA USUARIOS
      $consulta = "SELECT * FROM usuarios";
      $resultado = mysqli_query($mysqli, $consulta);
      while($fila = mysqli_fetch_array($resultado)){
      ?>
      <tr>
        <td><?php echo $fila["id_usuarios"]; ?></td>
        <td><?php echo $fila["nombre_usuarios"]; ?></td>
        <td><?php echo $fila["telefono_usuarios"]; ?></td>
        <td><?php echo $fila["direccion_usuarios"]; ?></td>
        <td><?php echo $fila["correo_usuarios"]; ?></td>
        <td><?php echo $fila["contraseña_usuarios"]; ?></td>
        <td><?php echo $fila["status_usuarios"]; ?></td>
        <td>
        <a href="fEdicion_usuarios.php?id=<?php echo $fila['id_usuarios']; ?>">Editar</a>
        <a href="eliminar_usuarios.php?id=<?php echo $fila['id_usuarios']; ?>">Eliminar</a>
      </td>
      </tr>
      <?php }  ?>
    </tbody>
    </table>
  </div>
  </div>
</div>
  </div>
</div>
  <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>