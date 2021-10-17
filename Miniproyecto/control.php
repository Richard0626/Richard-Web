<?php 
require_once 'db.php';
session_start();
$user = $_POST['usuario'];
$pass = $_POST['clave'];
$query = mysqli_query($MySQLiconn, "SELECT * FROM usuario WHERE nombre='$user' AND clave='$pass'");
$nro = mysqli_num_rows($query);

if ($nro == 1) {
	$_SESSION['autenticado']='1';
	$_SESSION['user']=$_POST['usuario'];
	$tipo = mysqli_query($MySQLiconn,"SELECT * FROM usuario WHERE nombre='$user' AND clave='$pass' AND tipo='Administrador'");
	$result = mysqli_num_rows($tipo);

	//Niveles de usuarios
	if ($result==1) {
		header("location: admin.php");
	}else{
		header("location: general.php");
	}

}else{
	header("Location: index.php?errorusuario=si");
}

?>