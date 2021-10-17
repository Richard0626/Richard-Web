<?php
session_start();
if ($_SESSION['autenticado']!='1') {
	header("Location: index.php");
	exit();
}
?>