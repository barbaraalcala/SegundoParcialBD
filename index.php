<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios</title>
        <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<?php
 //isset valida que la variable no este nula
if(isset($_GET["error"])){
    //Si no esta nula entra
    ?>
    
    <p><?php echo  $_GET["error"]; ?></p>
<?php
}
?>

<body>

  <div class="row" style="display: flex;flex-direction: column;justify-content: center; align-items: center;">
    <div class="col-md-6 login-form-1">
        <h3>Login for Form</h3>
        <form action="acciones.php" method="POST" class="my-5">
             <div class="form-group">
                <input type="usuario" class="form-control" placeholder="Your user" name="usuario" id="usuario">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Your password" name="password" id="password">
            </div>
            <div class="form-group">
                <input type="submit" class="btnSubmit" value="Login"/>
            </div>
            
        </form>
        
    </div>
      
  </div>
    

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>