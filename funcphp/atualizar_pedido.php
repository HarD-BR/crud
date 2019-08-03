<?php

    include 'conn.php';
    include 'lg_chk.php';

    $sql = "UPDATE pedidos SET nm_cliente= :CLIENTE, nm_maq= :MAQUINA, dt_ent= :DATA_ENT, dt_sai= :DATA_SAI, vl_serv= :VALOR', status= :STATUS, situacao= :SIT, problemas= :PROBLEMAS, solucoes= :SOLUCOES, pecas= :PECAS WHERE id= :PEDIDOID";

    $stmt = $con->prepare($sql);

    $stmt->bindParam(':CLIENTE', $cliente);
    $stmt->bindParam(':MAQUINA', $maquina);
    $stmt->bindParam(':DATA_ENT', $data_ent);
    $stmt->bindParam(':DATA_SAI', $data_sai);
    $stmt->bindParam(':VALOR', $valor);
    $stmt->bindParam(':STATUS', $status);
    $stmt->bindParam(':SIT', $situacao);
    $stmt->bindParam(':PROBLEMAS', $problemas);
    $stmt->bindParam(':SOLUCOES', $solucao);
    $stmt->bindParam(':PECAS', $pecas);
    $stmt->bindParam(':PEDIDOID', $pedidoid);

    $cliente = $_POST['cliente_txt'];
    $maquina = $_POST['maquina_txt'];
    $data_ent = $_POST['ent_dt'];
    $data_sai = $_POST['sai_dt'];
    $valor = $_POST['valor_txt'];
    $status = $_POST['dd_txt'];
    $situacao = $_POST['st_txt'];
    $problemas = $_POST['problemas_txt'];
    $solucao = $_POST['solucao_txt'];
    $pecas = $_POST['pecas_txt'];
    $pedidoid = $_POST['id_txt'];

    if (true == $stmt->execute()) {
        $_SESSION['pedidoatualizado'] = 'true';
        header('Location: ../menu_search.php');
    } else {
        $error = $stmt->errorInfo();
        echo 'Error: '.$sql.'<br>'.$error[2];
    }

$con = null;
