<?php
// Obt��m os dados do formul��rio
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
        // Liga os par�0�9metros �� declara�0�4�0�0o preparada
        $stmt->bind_param("ssss", $nome, $email, $telefone, $cpf); // "ssss" indica que s�0�0o quatro strings

        // Executa a declara�0�4�0�0o preparada
        if ($stmt->execute()) {
            // Mensagem de sucesso pode ser descomentada se necess��rio
            // echo "Vendedor cadastrado com sucesso";
        } else {
            echo "Erro ao cadastrar o vendedor: " . $stmt->error;
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
    document.location = 'formvendedor.php';
</script>
