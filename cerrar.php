<?php session_start();
session_destroy(); //Cerramos la sesión
$_SESSION = array(); //Limpiamos la sesion
header('Location: Iniciar.php');
?>