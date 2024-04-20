<?php 
$nomeCliente = $_POST['nomeCliente'];
$produto = $_POST['produto'];
$observacoes = $_POST['observacoes'];
$valor = $_POST['valor'];

require('conexao.php');

$id_pedido = $_POST['id'];

$sql = "UPDATE pedidos SET nomeCliente='$nomeCliente', produto='$produto', observacoes='$observacoes', valor='$valor' WHERE id_pedidos='$id_pedido'";

if(mysqli_query($conexao, $sql)){
    echo "Registro atualizado com sucesso";
} else {
    echo "Erro ao atualizar o pedido: " . mysqli_error($conexao);
}

mysqli_close($conexao);
header("location:formpedidos.php");
?>