<?php 
require('conexao.php');

$nomeproduto = $_POST['nomeproduto'];
$descricao = $_POST['descricao'];
$estoque = $_POST['estoque'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];
$arquivo = $_FILES['imagem'];
$id_produto = $_POST['id']; 

if($arquivo !== null) {
    preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

    if(!empty($ext)) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "img/produtos/".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo);

        

        $sql = "UPDATE produtos SET nomeproduto='$nomeproduto', estoque='$estoque', preco='$preco', categoria='$categoria', arquivo='$caminho_arquivo' WHERE id='$id_produto'";

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
