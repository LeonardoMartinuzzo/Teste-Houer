<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '080423Leo*';
    $dbName = 'Testehouer';

    $conexao = new MySQLi($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }
?>
