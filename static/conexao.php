<?php
// conexao.php

require_once('config.php');

// Criando a conex���o
$conexao = new mysqli($config['servername'], $config['username'], $config['password'], $config['database']);

// Verificando a conex���o
if ($conexao->connect_error) {
    die("Falha na conex���o: " . $conexao->connect_error);
}

// Definir o charset para UTF-8
$conexao->set_charset("utf8");

// Retornar a conex���o
return $conexao;
?>
