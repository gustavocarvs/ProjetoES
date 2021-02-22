<?php


if ($_SESSION['LogadoCliente'] != true){
	session_destroy();
	header("Location:login.php");
	exit;
}
?>