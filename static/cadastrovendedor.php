<?php
// Obtém os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpfcnpj'];

require('conexao.php');

// Verifica se todos os campos foram preenchidos
if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($cpf)) {
    // Prepara a query SQL com prepared statement
    $sql = "INSERT INTO vendedor (nome, email, telefone, cpfcnpj) VALUES (?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os parâmetros à declaração preparada
        $stmt->bind_param("ssss", $nome, $email, $telefone, $cpf); // "ssss" indica que são quatro strings

        // Executa a declaração preparada
        if ($stmt->execute()) {
            // Mensagem de sucesso pode ser descomentada se necessário
            // echo "Vendedor cadastrado com sucesso";
        } else {
            echo "Erro ao cadastrar o vendedor: " . $stmt->error;
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
    document.location = 'formvendedor.php';
</script>
