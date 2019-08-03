<?php
    session_start();
    include 'conn.php';
    include 'lg_chk.php';

    $sql = 'INSERT INTO pedidos (fk_id_usuario, nm_cliente, nm_maq, dt_ent, dt_sai, vl_serv, status, situacao) VALUES (:uID , :CLIENTE , :MAQUINA , :DATA_ENT , :DATA_SAI , :VALOR , :STATUS , :SIT)';

    $stmt = $con->prepare($sql);

    $stmt->bindParam(':uID', $usuarioId);
    $stmt->bindParam(':CLIENTE', $cliente);
    $stmt->bindParam(':MAQUINA', $maquina);
    $stmt->bindParam(':DATA_ENT', $data_ent);
    $stmt->bindParam(':DATA_SAI', $data_sai);
    $stmt->bindParam(':VALOR', $valor);
    $stmt->bindParam(':STATUS', $status);
    $stmt->bindParam(':SIT', $situacao);

    $usuarioId = $_SESSION['usuarioId'];
    $cliente = $_POST['cliente_txt'];
    $maquina = $_POST['maquina_txt'];
    $data_ent = $_POST['ent_dt'];
    $data_sai = $_POST['sai_dt'];
    $valor = $_POST['valor_txt'];
    $status = $_POST['dd_txt'];
    $situacao = $_POST['st_txt'];

    if (true == $stmt->execute()) {
        $_SESSION['pedidocriado'] = 'true';
        header('Location: ../menu_search.php');
    } else {
        $error = $stmt->errorInfo();
        echo 'Error: '.$sql.'<br>'.$error[2];
    }

$con = null;
