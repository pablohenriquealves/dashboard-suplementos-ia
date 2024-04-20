<?php 
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpfcnpj'];
$id = $_POST['id'];

require('conexao.php');

// Verifica se todos os campos foram preenchidos
if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($cpf)) {
    // Prepara a query SQL para inserir os dados na tabela de vendedores
    $sql = "UPDATE vendedor SET nome='$nome', email='$email', telefone='$telefone', cpfcnpj='$cpf' WHERE id='$id'";

    // Executa a query
    if (mysqli_query($conexao, $sql)) {
        echo "Vendedor alterado com sucesso";
    } else {
        echo "Erro ao alterar cadastro do vendedor: " . mysqli_error($conexao);
    }
} else {
    echo "Todos os campos são obrigatórios.";
}

// Fecha a conexão
mysqli_close($conexao);

// Redireciona de volta para o formulário
header("Location: formvendedor.php");
?>