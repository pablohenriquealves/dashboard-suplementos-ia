<?php
// Recebendo os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpfcnpj = $_POST['cpfcnpj'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];

require('conexao.php');

// Validando se todos os campos obrigatórios foram preenchidos
if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($cpfcnpj) && !empty($cep) && !empty($logradouro) && !empty($numero)) {

    // Prepara a query SQL com prepared statement para inserir os dados
    $sql = "INSERT INTO fornecedor (nome, email, telefone, cpfcnpj, cep, logradouro, numero, complemento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Inicia a declaração preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os parâmetros à declaração preparada
        $stmt->bind_param("ssssssis", $nome, $email, $telefone, $cpfcnpj, $cep, $logradouro, $numero, $complemento); // "ssssssis" indica tipos de dados (strings e inteiros)

        // Executa a declaração preparada
        if ($stmt->execute()) {
            echo "Registro inserido com sucesso";
        } else {
            echo "Erro ao cadastrar o fornecedor: " . $stmt->error;
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
    // Redireciona após o cadastro bem-sucedido
    document.location = 'formfornecedor.php';
</script>
