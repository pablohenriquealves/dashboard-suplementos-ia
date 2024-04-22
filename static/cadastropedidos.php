
<?php 
$nomeCliente = $_POST['nomeCliente'];
$produto = $_POST['nomeproduto'];
$observacoes = $_POST['observacoes'];
$valor = $_POST['valor'];
$vendedor = $_POST['vendedor'];

require('conexao.php');


$sql = "INSERT INTO pedidos (nomeCliente, produto, observacoes, valor, vendedor) VALUES ('$nomeCliente','$produto', '$observacoes', '$valor', '$vendedor')";

    if(mysqli_query($conexao,$sql)){
        echo "Registro inserido com sucesso";
    }else {
     echo "Erro ao cadastrar o produto".mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header("location:formpedidos.php");


?>