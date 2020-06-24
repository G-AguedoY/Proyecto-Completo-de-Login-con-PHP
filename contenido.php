<?php session_start();
	if(isset($_SESSION['correo'])){
		require 'vistas/contenido.view.php';	
	}else{
		header('Location: Iniciar.php');
	}
?>