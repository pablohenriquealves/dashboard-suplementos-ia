
<?php 
$nomeCliente = $_POST['nomeCliente'];
$pedido = $_POST['pedido'];
$observacoes = $_POST['observacoes'];

require('conexao.php');


$sql = "INSERT INTO pedidos (nomeCliente, pedido, observacoes) VALUES ('$nome_cliente','$pedido', '$observacoes')";

    if(mysqli_query($conexao,$sql)){
        echo "Registro inserido com sucesso";
    }else {
     echo "Erro ao cadastrar o produto".mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header("location:formpedidos.php");





?>