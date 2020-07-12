<?php
//Recibir los valores
//Que exista el usuario en la BD
//Que el password coincida con la BD
//Inicar sesión
//Redireccionar
require_once 'conexion.php'; 


$usuario = $_POST["usuario"];
$password = $_POST["password"];
$respuesta = '';

$consulta = "SELECT * FROM usuarios where correo_usuarios = '$usuario'";
$resultado = mysqli_query($mysqli, $consulta);
$fila = mysqli_fetch_array($resultado);

if(is_array($fila) && sizeof($fila) > 0){ //Ejecutar el tamañano
	if($fila["contraseña_usuarios"] == $password){
		session_start();
		$_SESSION["id"] = $fila["id_usuarios"];
        $_SESSION["nombre"] = $fila["nombre_usuarios"];
        $_SESSION["status"] = $fila["status_usuarios"];
        
		
		header("Location: modulos/productos/");
	}
	else{
		header("Location: index.php?error=La contraseña no coincide con el usuario");
		// header("Location: index.php");
	
	}
} 
else {

	//error es una variable por request
	//Esto sirve para mandar variables
	header("Location:index.php?error=Usuario no encontrado");

	// "Usuario no encontrado";
}
// } else{
// 	$respuesta = 'Usuario no encontrado';




?>

