<?php
require('conexao.php');

// Verifica se o ID do cliente foi enviado via POST
if (isset($_POST['id'])) {
    $id_cliente = $_POST['id'];

    // Preparar a query SQL utilizando prepared statement
    $sql = "DELETE FROM cliente WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os parâmetros à declaração preparada
        $stmt->bind_param("i", $id_cliente); // "i" indica que $id_cliente é um inteiro

        // Executa a declaração preparada
        if ($stmt->execute()) {
            echo "Registro excluído com sucesso";
        } else {
            echo "Erro ao excluir o cliente: " . $stmt->error;
        }

        // Fecha a declaração preparada
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conexao->error;
    }
} else {
    echo "ID do cliente não foi fornecido";
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>


<script>
    // Redireciona após o cadastro bem-sucedido
    document.location = 'formcliente.php';
</script>