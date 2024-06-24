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
$id_fornecedor = $_POST['id'];

require('conexao.php');

// Verifica se todos os campos obrigatórios estão preenchidos (opcional)
if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($cpfcnpj) && !empty($cep) && !empty($logradouro) && !empty($numero)) {

    // Prepara a query SQL com prepared statement para atualizar os dados
    $sql = "UPDATE fornecedor SET nome=?, email=?, telefone=?, cpfcnpj=?, cep=?, logradouro=?, numero=?, complemento=? WHERE id=?";

    // Inicia a declaração preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os parâmetros à declaração preparada
        $stmt->bind_param("ssssssssi", $nome, $email, $telefone, $cpfcnpj, $cep, $logradouro, $numero, $complemento, $id_fornecedor); // "ssssssssi" indica tipos de dados (strings e inteiro)

        // Executa a declaração preparada
        if ($stmt->execute()) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro ao atualizar o fornecedor: " . $stmt->error;
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
