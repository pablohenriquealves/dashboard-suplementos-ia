<?php 
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$id = $_POST['id'];

require('conexao.php');


    $sql = "DELETE FROM vendedor WHERE id='$id'";

    // Executa a query
    if (mysqli_query($conexao, $sql)) {
        echo "Vendedor alterado com sucesso";
    } else {
        echo "Erro ao alterar cadastro do vendedor: " . mysqli_error($conexao);
    }

// Fecha a conexão
mysqli_close($conexao);

// Redireciona de volta para o formulário
header("Location: formvendedor.php");
?>