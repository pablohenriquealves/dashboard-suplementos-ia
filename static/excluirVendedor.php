<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpfcnpj'];
$id = $_POST['id'];

// Incluir o arquivo de conexão
require('conexao.php');

// Preparar a query SQL utilizando prepared statement
$sql = "DELETE FROM vendedor WHERE id = ?";

$stmt = $conexao->prepare($sql);

if ($stmt) {
    // Liga os parâmetros à declaração preparada
    $stmt->bind_param("i", $id); // "i" indica que $id é um inteiro

    // Executa a declaração preparada
    if ($stmt->execute()) {
        echo "Vendedor deletado com sucesso";
    } else {
        echo "Erro ao deletar vendedor: " . $stmt->error;
    }

    // Fecha a declaração preparada
    $stmt->close();
} else {
    echo "Erro na preparação da consulta: " . $conexao->error;
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

<script>
    // Redireciona ap贸s o cadastro bem-sucedido
    document.location = 'formvendedor.php';
</script>
