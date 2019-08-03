<?php

    $bd = 'mysql:host=localhost;dbname=bdcrud;charset=utf8';
    $un = 'cruduser';
    $pw = 'crudlog1337';

    try {
        $con = new PDO($bd, $un, $pw);
    } catch (PDOException $erro) {
        echo 'DB Não conectado. Erro:' + $erro->getMessage();
    }
