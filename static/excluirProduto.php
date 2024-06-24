<?php
require('conexao.php');

// Verifica se o ID do produto foi enviado via POST
if (isset($_POST['id'])) {
    $id_produto = $_POST['id'];

    // Preparar a query SQL utilizando prepared statement
    $sql = "DELETE FROM produtos WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os parâmetros à declaração preparada
        $stmt->bind_param("i", $id_produto); // "i" indica que $id_produto é um inteiro

        // Executa a declaração preparada
        if ($stmt->execute()) {
            echo "Registro excluído com sucesso";
        } else {
            echo "Erro ao excluir o produto: " . $stmt->error;
        }

        // Fecha a declaração preparada
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conexao->error;
    }
} else {
    echo "ID do produto não foi fornecido";
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

<script>
    // Redireciona ap贸s o cadastro bem-sucedido
    document.location = 'formproduto.php';
</script>
