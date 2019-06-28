<?php
	session_start();

if(!$_SESSION['usuarioNome']) {
	header('Location: index.php');
	exit();
}

?>