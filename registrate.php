<?php session_start();
	if(isset($_SESSION['usuario'])){
		header('Location:index.php');
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//Saneamos el nombre del usuario
		$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
		$correo = $_POST['correo'];
		$password = $_POST['password'];
		$password2 = $_POST['Rpassword'];

		$errores = '';

		if(empty($usuario) or empty($correo) or empty($password) or empty($password2)){
			$errores .= '<li>Faltan llenar campos</li>';
		}else{
			try{
				$conexion = new PDO('mysql:host=localhost:3307; dbname=login_php' , 'root', '');
			}catch(PDOException $e){
					echo "ERROR: ".$e->getMessage();
			}
			#Para que el usuario no se repita: 
			$statement= $conexion->prepare('SELECT * FROM `usuarios` WHERE usuario = :usuario LIMIT 1');
			$statement->execute(array(':usuario' => $usuario));
			//Validamos si el usuario ya existe
			$resultado = $statement->fetch();
			//Si existe entonces:
			if($resultado!=false){
				$errores.='El usuario ya existe';
			}

			//Hashear -> Es encriptar la contraseña del usuario
			//sha512 -> Algoritmo de encriptación	
			$password = hash('sha512', $password);
			$password2 = hash('sha512', $password2);

			if($password != $password2){
				$errores .= '<li>Contraseñas diferentes</li>';
			}
		}

		//Si no existe ningun error, insertamos el usuario a la base de datos
		if($errores == ''){
				$statement = $conexion->prepare('INSERT INTO `usuarios`(`id`, `usuario`, `correo`, `password`) VALUES (NULL,:usuario,:correo,:password)');
				$statement->execute(array(':usuario'=>$usuario,':correo'=>$correo,':password'=>$password));

				header('Location:Iniciar.php');
		}
	}


    require 'vistas/registrate.view.php';
?>
