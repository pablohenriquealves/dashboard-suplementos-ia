<?php 
require('conexao.php');

// Supondo que você tenha um campo para identificar o fornecedor que será excluído, chamado de 'id_fornecedor'
$id_fornecedor = $_POST['id'];

$sql = "DELETE FROM fornecedor WHERE id='$id_fornecedor'";

if(mysqli_query($conexao, $sql)){
    echo "Registro excluído com sucesso";
} else {
    echo "Erro ao excluir o fornecedor: " . mysqli_error($conexao);
}

mysqli_close($conexao);
header("location:formfornecedor.php");
?>
