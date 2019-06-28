<?php

$con = new mysqli("localhost", "root", "", "bdpontocom");

if ($con->connect_error) {
    die("DB Não conectado: " . $con->connect_error);
}

?>