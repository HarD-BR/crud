<?php 
	include "conn.php";
	include "lg_chk.php";

$pswatual	= $_POST["pswatual_txt"];
$pswnova	= $_POST["pswnova_txt"];
$usuario	= $_SESSION['usuarioNome'];

$sql= "SELECT senha FROM usuario WHERE usuario='$usuario'";
$sql2 = "UPDATE usuario SET senha='$pswnova' WHERE usuario='$usuario'";

$result = $con->query($sql);
$dados	= mysqli_fetch_object($result);

if ($pswatual == $dados->senha) {
    if ($con->query($sql2) === TRUE) {
    	$_SESSION['updateConfirmado'] = "true";
        header('Location: ../perfil.php');
    }else{
    	$_SESSION['updateNegado'] = "true";
    	header('Location: ../perfil.php');
    }  
}else {
	$_SESSION['senhaDiferente'] = "true";
    header('Location: ../perfil.php');
}

$con->close();
?>