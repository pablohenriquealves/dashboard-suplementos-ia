<?php
require('conexao.php');

// Verifica se o ID do produto foi enviado via POST
if (isset($_POST['id'])) {
    $id_produto = $_POST['id'];

    // Preparar a query SQL utilizando prepared statement
    $sql = "DELETE FROM produtos WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os par�0�9metros �� declara�0�4�0�0o preparada
        $stmt->bind_param("i", $id_produto); // "i" indica que $id_produto �� um inteiro

        // Executa a declara�0�4�0�0o preparada
        if ($stmt->execute()) {
            echo "Registro exclu��do com sucesso";
        } else {
            echo "Erro ao excluir o produto: " . $stmt->error;
        }

        // Fecha a declara�0�4�0�0o preparada
        $stmt->close();
    } else {
        echo "Erro na prepara�0�4�0�0o da consulta: " . $conexao->error;
    }
} else {
    echo "ID do produto n�0�0o foi fornecido";
}

// Fecha a conex�0�0o com o banco de dados
$conexao->close();
?>

<script>
    // Redireciona após o cadastro bem-sucedido
    document.location = 'formproduto.php';
</script>
