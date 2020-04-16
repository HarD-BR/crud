<?php
session_start();
include 'conn.php';

if ((isset($_POST['user_txt'])) && (isset($_POST['pass_txt']))) {
    $sql_query = 'SELECT * FROM usuario WHERE usuario = :USUARIO && senha = :SENHA';

    $stmt = $con->prepare($sql_query);
    $stmt->bindParam(':USUARIO', $usuario);
    $stmt->bindParam(':SENHA', $senha);

    $usuario = $_POST['user_txt'];
    $senha = $_POST['pass_txt'];

    $stmt->execute();
    $resultado = $stmt->fetch();

    if (isset($resultado)) {
        $_SESSION['usuarioId'] = $resultado['id_usuario'];
        $_SESSION['usuarioNome'] = $resultado['usuario'];
        $_SESSION['usuarioEmail'] = $resultado['email'];
        header('Location: ../index.php');
    } else {
        $_SESSION['nao_login'] = '1';
        header('Location: ../login.php');
    }
}
