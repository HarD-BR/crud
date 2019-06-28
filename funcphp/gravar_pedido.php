<?php
	session_start();
	include "conn.php";
	include "lg_chk.php";

$cliente = $_POST['cliente_txt'];
$maquina = $_POST['maquina_txt'];
$data_ent = $_POST['ent_dt'];
$data_sai = $_POST['sai_dt'];
$valor = $_POST['valor_txt'];
$status = $_POST['dd_txt'];
$situacao = $_POST['st_txt'];
$usuarioId = $_SESSION['usuarioId'];


$sql="INSERT INTO pedidos (fk_id_usuario, nm_cliente, nm_maq, dt_ent, dt_sai, vl_serv, status, situacao) VALUES ('$usuarioId' , '$cliente' , '$maquina' , '$data_ent' , '$data_sai' , '$valor' , '$status' , '$situacao')";

if ($con->query($sql) === TRUE) {
    header("Location: ../menu_search.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>