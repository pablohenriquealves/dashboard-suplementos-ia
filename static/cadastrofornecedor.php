

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


$sql = "INSERT INTO fornecedor (nome, email, 'telefone' cpfcnpj, cep, logradouro, numero, complemento)
 VALUES ('$nome','$email', '$telefone' '$cpfcnpj', '$cep', '$logradouro', '$numero', '$complemento')";

    if(mysqli_query($conexao,$sql)){
        echo "Registro inserido com sucesso";
    }else {
     echo "Erro ao cadastrar o produto".mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header("location:formproduto.php");





?>