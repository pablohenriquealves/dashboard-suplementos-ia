<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpfcnpj'];
$id = $_POST['id'];

// Incluir o arquivo de conex�0�0o
require('conexao.php');

// Preparar a query SQL utilizando prepared statement
$sql = "DELETE FROM vendedor WHERE id = ?";

$stmt = $conexao->prepare($sql);

if ($stmt) {
    // Liga os par�0�9metros �� declara�0�4�0�0o preparada
    $stmt->bind_param("i", $id); // "i" indica que $id �� um inteiro

    // Executa a declara�0�4�0�0o preparada
    if ($stmt->execute()) {
        echo "Vendedor deletado com sucesso";
    } else {
        echo "Erro ao deletar vendedor: " . $stmt->error;
    }

    // Fecha a declara�0�4�0�0o preparada
    $stmt->close();
} else {
    echo "Erro na prepara�0�4�0�0o da consulta: " . $conexao->error;
}

// Fecha a conex�0�0o com o banco de dados
$conexao->close();
?>

<script>
    // Redireciona após o cadastro bem-sucedido
    document.location = 'formvendedor.php';
</script>
