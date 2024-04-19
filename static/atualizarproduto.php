<?php 
require('conexao.php');

$nomeproduto = $_POST['nomeproduto'];
$descricao = $_POST['descricao'];
$estoque = $_POST['estoque'];
$cpfcnpj = $_POST['cpfcnpj'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];
$arquivo = $_FILES['imagem'];
$id = $_POST['id'];

if($arquivo !== null) {
    preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

    if(!empty($ext)) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "img/produtos/".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo);

        // Supondo que você tenha um campo para identificar o produto que será atualizado, chamado de 'id_produto'
        $id_produto = $_POST['id'];

        $sql = "UPDATE produto SET nomeproduto='$nomeproduto', descricao='$descricao', estoque='$estoque', cpfcnpj='$cpfcnpj', preco='$preco', categoria='$categoria', arquivo='$caminho_arquivo' WHERE id='$id_produto'";

        if(mysqli_query($conexao,$sql)){
            echo "Registro atualizado com sucesso";
        }else {
            echo "Erro ao atualizar o produto".mysqli_error($conexao);
        }
        
        mysqli_close($conexao);
    }
}

header("location:formproduto.php");
?>
