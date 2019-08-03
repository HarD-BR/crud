<?php
include 'conn.php';
include 'lg_chk.php';

$sql = 'SELECT senha FROM usuario WHERE usuario= :USUARIO';
$sql2 = 'UPDATE usuario SET senha= :SENHA WHERE usuario= :USUARIO';

$stmt = $con->prepare($sql);
$stmt2 = $con->prepare($sql2);

$stmt->bindParam(':USUARIO', $usuario);
$stmt2->bindParam(':USUARIO', $usuario);
$stmt2->bindParam(':SENHA', $pswnova);

$pswatual = $_POST['pswatual_txt'];
$pswnova = $_POST['pswnova_txt'];
$usuario = $_SESSION['usuarioNome'];

$stmt->execute();
$dados = $stmt->fetch();

if ($pswatual == $dados['senha']) {
    if (true === $stmt2->execute()) {
        $_SESSION['updateConfirmado'] = 'true';
        header('Location: ../perfil.php');
    } else {
        $_SESSION['updateNegado'] = 'true';
        header('Location: ../perfil.php');
    }
} else {
    $_SESSION['senhaDiferente'] = 'true';
    header('Location: ../perfil.php');
}

$con - null;
