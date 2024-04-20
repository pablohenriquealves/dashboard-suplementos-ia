<?php 
require('conexao.php');

$id_cliente = $_POST['id']; // Supondo que você esteja recebendo o ID do cliente a ser excluído

// Comando DELETE para excluir o cliente
$sql = "DELETE FROM cliente WHERE id='$id_cliente'";

if(mysqli_query($conexao,$sql)){
    echo "Registro excluído com sucesso";
} else {
    echo "Erro ao excluir o cliente: " . mysqli_error($conexao);
}

mysqli_close($conexao);

header("location:formcliente.php");
?>