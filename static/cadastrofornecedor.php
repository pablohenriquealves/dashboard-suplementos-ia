<?php
// Recebendo os dados do formul��rio
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpfcnpj = $_POST['cpfcnpj'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];

require('conexao.php');

// Validando se todos os campos obrigat��rios foram preenchidos
if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($cpfcnpj) && !empty($cep) && !empty($logradouro) && !empty($numero)) {

    // Prepara a query SQL com prepared statement para inserir os dados
    $sql = "INSERT INTO fornecedor (nome, email, telefone, cpfcnpj, cep, logradouro, numero, complemento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Inicia a declara�0�4�0�0o preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os par�0�9metros �� declara�0�4�0�0o preparada
        $stmt->bind_param("ssssssis", $nome, $email, $telefone, $cpfcnpj, $cep, $logradouro, $numero, $complemento); // "ssssssis" indica tipos de dados (strings e inteiros)

        // Executa a declara�0�4�0�0o preparada
        if ($stmt->execute()) {
            echo "Registro inserido com sucesso";
        } else {
            echo "Erro ao cadastrar o fornecedor: " . $stmt->error;
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
    // Redireciona ap��s o cadastro bem-sucedido
    document.location = 'formfornecedor.php';
</script>
