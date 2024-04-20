<?php 
require('conexao.php');

// Supondo que você tenha um campo para identificar o pedido que será excluído, chamado de 'id_pedido'
$id_pedido = $_POST['id'];

$sql = "DELETE FROM pedidos WHERE id_pedidos='$id_pedido'";

if(mysqli_query($conexao, $sql)){
    echo "Registro excluído com sucesso";
} else {
    echo "Erro ao excluir o pedido: " . mysqli_error($conexao);
}

mysqli_close($conexao);
header("location:formpedidos.php");
?>