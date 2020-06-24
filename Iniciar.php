<?php session_start();
#SI ya inicio entonces, 
if (isset($_SESSION['usuario'])) {
	header('Location: index.php');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$correo = $_POST['correo'];
	$password = $_POST['password'];
	$password = hash('sha512', $password);
	try{
		$conexion = new PDO('mysql:host=localhost:3307; dbname=login_php' , 'root', '');
	}catch (PDOException $e){
		echo "ERROR: ".$e->getMessage();
	}

	$statement = $conexion -> prepare('SELECT * FROM `usuarios` WHERE correo = :correo AND password = :password');
	$statement->execute(array(':correo'=>$correo,':password'=>$password));
	$resultado = $statement->fetch();

	if($resultado !== false){
		$_SESSION['correo'] = $correo;
		header('Location:index.php');
	}else{
		 $errores .= '<li>Datos incorrectos</li>';
	}
}

require 'vistas/login.view.php';
?>