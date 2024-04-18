<?php 
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpfcnpj = $_POST['cpfcnpj'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];

require('conexao.php');

// Supondo que você tenha um campo para identificar o fornecedor que será atualizado, chamado de 'id_fornecedor'
$id_fornecedor = $_POST['id'];

$sql = "UPDATE fornecedor SET nome='$nome', email='$email', telefone='$telefone', cpfcnpj='$cpfcnpj', cep='$cep', logradouro='$logradouro', numero='$numero', complemento='$complemento' WHERE id='$id_fornecedor'";

if(mysqli_query($conexao, $sql)){
    echo "Registro atualizado com sucesso";
} else {
    echo "Erro ao atualizar o fornecedor: " . mysqli_error($conexao);
}

mysqli_close($conexao);
header("location:formfornecedor.php");
?>
