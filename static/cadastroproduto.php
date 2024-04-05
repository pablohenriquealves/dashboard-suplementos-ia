
<?php 
$nome = $_POST['nomeproduto'];
$descricao = $_POST['descricao'];
$estoque = $_POST['estoque'];
$cnpjfornecedor = $_POST['cnpjfornecedor'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];
$arquivo = $_FILES['imagem'];


require('conexao.php');


if($arquivo !== null) {
    preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"],$ext);

    if($ext == true) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "imagens/".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'],$caminho_arquivo);

        $sql = "INSERT INTO produto (nome, descricao, estoque, fornecedor, cnpjfornecedor, preco, categoria, arquivo) VALUES ('$nome','$descricao', '$estoque', '$fornecedor', '$cnpjfornecedor', '$preco', '$categoria', '$arquivo')";

        $inserir = mysqli_query($conexao,$sql);


    }
}
    if(mysqli_query($conexao,$sql)){
        echo "Registro inserido com sucesso";
    }else {
     echo "Erro ao cadastrar o produto".mysqli_error($conexao);
    }

    mysqli_close($conexao);

    header("location:formproduto.php");





?>