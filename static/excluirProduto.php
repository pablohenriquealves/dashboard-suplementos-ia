<?php 
require('conexao.php');

$id_produto = $_POST['id'];

$sql = "DELETE FROM produto WHERE id='$id_produto'";

if(mysqli_query($conexao, $sql)){
    echo "Registro excluído com sucesso";
} else {
    echo "Erro ao excluir o produto: " . mysqli_error($conexao);
}

mysqli_close($conexao);
header("location:formproduto.php");
?>
