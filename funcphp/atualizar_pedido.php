<?php 
	include "conn.php";
	include "lg_chk.php";

$pedidoid = $_POST['id_txt'];
$cliente = $_POST['cliente_txt'];
$maquina = $_POST['maquina_txt'];
$data_ent = $_POST['ent_dt'];
$data_sai = $_POST['sai_dt'];
$valor = $_POST['valor_txt'];
$status = $_POST['dd_txt'];
$situacao = $_POST['st_txt'];
$usuario = $_POST['usuario_txt'];
$problemas = $_POST['problemas_txt'];
$solucao = $_POST['solucao_txt'];
$pecas = $_POST['pecas_txt'];

$sql="UPDATE pedidos SET nm_cliente='$cliente', nm_maq='$maquina', dt_ent='$data_ent', dt_sai='$data_sai', vl_serv='$valor', status='$status', situacao='$situacao', problemas='$problemas', solucoes='$solucao', pecas='$pecas' WHERE id='$pedidoid'";

if ($con->query($sql) === TRUE) {
    $_SESSION['pedidoatualizado'] = "true";
    header("Location: ../menu_search.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>