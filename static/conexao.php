<?php
// conexao.php

require_once('config.php');

// Criando a conex«ªo
$conexao = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);

// Verificando a conex«ªo
if ($conexao->connect_error) {
    die("Falha na conex«ªo: " . $conexao->connect_error);
}

// Definir o charset para UTF-8
$conexao->set_charset("utf8");

// Retornar a conex«ªo
return $conexao;
?>
