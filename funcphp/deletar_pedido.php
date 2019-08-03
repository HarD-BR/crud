<?php 
	include "conn.php";

    $sql = "UPDATE pedidos SET status='Inativo' WHERE id= :CODIGO";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(':CODIGO', $codigo);
    $codigo	= $_POST["bt_del"];
    
    if ($stmt->execute() === TRUE) {
        $_SESSION['pedidodesativado'] = "true";
        header("Location: ../menu_search.php");
    } else {
        $error = $stmt->errorInfo();
        echo 'Error: ' . $sql . '<br>' . $error[2];
    }

$con = null;
