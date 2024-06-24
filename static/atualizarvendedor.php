<?php
// Recebendo os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpfcnpj'];
$id = $_POST['id'];

require('conexao.php');

// Verifica se todos os campos obrigatórios estão preenchidos
if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($cpf)) {

    // Prepara a query SQL com prepared statement para atualizar os dados
    $sql = "UPDATE vendedor SET nome=?, email=?, telefone=?, cpfcnpj=? WHERE id=?";

    // Inicia a declaração preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os parâmetros à declaração preparada
        $stmt->bind_param("ssssi", $nome, $email, $telefone, $cpf, $id); // "ssssi" indica tipos de dados (strings e inteiro)

        // Executa a declaração preparada
        if ($stmt->execute()) {
            echo "Vendedor alterado com sucesso";
        } else {
            echo "Erro ao alterar cadastro do vendedor: " . $stmt->error;
        }

        // Fecha a declaração preparada
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conexao->error;
    }
} else {
    echo "Todos os campos são obrigatórios.";
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

<script>
    // Redireciona após a atualização bem-sucedida
    document.location = 'formvendedor.php';
</script>
