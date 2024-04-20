<?php 
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpfcnpj'];

require('conexao.php');

// Verifica se todos os campos foram preenchidos
if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($cpf)) {
    // Prepara a query SQL para inserir os dados na tabela de vendedores
    $sql = "INSERT INTO vendedor (nome, email, telefone, cpfcnpj) VALUES ('$nome', '$email', '$telefone', '$cpf')";

    // Executa a query
    if (mysqli_query($conexao, $sql)) {
        echo "Vendedor cadastrado com sucesso";
    } else {
        echo "Erro ao cadastrar o vendedor: " . mysqli_error($conexao);
    }
} else {
    echo "Todos os campos são obrigatórios.";
}

// Fecha a conexão
mysqli_close($conexao);

// Redireciona de volta para o formulário
header("Location: formvendedor.php");
?>