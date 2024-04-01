
<?php 
$nome = $_POST['nomeproduto'];
$descricao = $_POST['descricao'];
$estoque = $_POST['estoque'];
$fornecedor = $_POST['fornecedor'];
$cnpjfornecedor = $_POST['cnpjfornecedor'];
$preco = $_POST['preco'];

require('conexao.php');


$sql = "INSERT INTO produto (nome, descricao, estoque, fornecedor, cnpjfornecedor, preco) VALUES ('$nome','$descricao', '$estoque', '$fornecedor', '$cnpjfornecedor', '$preco')";

    if(mysqli_query($conexao,$sql)){
        echo "Registro inserido com sucesso";
    }else {
     echo "Erro ao cadastrar o produto".mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header("location:formproduto.php");





?>