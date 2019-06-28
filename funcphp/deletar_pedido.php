<?php 
	include "conn.php";


$codigo	= $_POST["bt_del"];

$sql = "UPDATE pedidos SET status='Inativo' WHERE id='$codigo'";

if ($con->query($sql) === TRUE) {
   $_SESSION['pedidodeletado'] = "true";
    header("Location: ../menu_search.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>