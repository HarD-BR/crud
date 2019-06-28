<?php
    session_start();     
    include "conn.php";    

    if((isset($_POST['user_txt'])) && (isset($_POST['pass_txt']))){

        $usuario = mysqli_real_escape_string($con, $_POST['user_txt']); 
        $senha = mysqli_real_escape_string($con, $_POST['pass_txt']);

            
        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' && senha = '$senha'";
        $resultado_usuario = mysqli_query($con, $sql);
        $resultado = mysqli_fetch_assoc($resultado_usuario);

        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id_usuario'];
            $_SESSION['usuarioNome'] = $resultado['usuario'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
                header('Location: ../menu_search.php');
        }else{
            $_SESSION['nao_login'] = '1';    
            header('Location: ../index.php');
        }
    }
?>