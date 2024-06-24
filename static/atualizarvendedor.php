<?php
// Recebendo os dados do formul��rio
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpfcnpj'];
$id = $_POST['id'];

require('conexao.php');

// Verifica se todos os campos obrigat��rios est�0�0o preenchidos
if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($cpf)) {

    // Prepara a query SQL com prepared statement para atualizar os dados
    $sql = "UPDATE vendedor SET nome=?, email=?, telefone=?, cpfcnpj=? WHERE id=?";

    // Inicia a declara�0�4�0�0o preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os par�0�9metros �� declara�0�4�0�0o preparada
        $stmt->bind_param("ssssi", $nome, $email, $telefone, $cpf, $id); // "ssssi" indica tipos de dados (strings e inteiro)

        // Executa a declara�0�4�0�0o preparada
        if ($stmt->execute()) {
            echo "Vendedor alterado com sucesso";
        } else {
            echo "Erro ao alterar cadastro do vendedor: " . $stmt->error;
        }

        // Fecha a declara�0�4�0�0o preparada
        $stmt->close();
    } else {
        echo "Erro na prepara�0�4�0�0o da consulta: " . $conexao->error;
    }
} else {
    echo "Todos os campos s�0�0o obrigat��rios.";
}

// Fecha a conex�0�0o com o banco de dados
$conexao->close();
?>

<script>
    // Redireciona ap��s a atualiza�0�4�0�0o bem-sucedida
    document.location = 'formvendedor.php';
</script>
