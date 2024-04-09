

<?php 
require('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpfcnpj = $_POST['cpfcnpj'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$arquivo = $_FILES['imagem'];
$arquivo = $_FILES['imagem'];

if($arquivo !== null) {
    preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

    if(!empty($ext)) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "img/photos/".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo);

        $sql = "INSERT INTO cliente (nome, email, telefone, cpfcnpj, cep, logradouro, numero, complemento, arquivo) VALUES ('$nome','$email', '$telefone', '$cpfcnpj', '$cep', '$logradouro', '$numero', '$complemento', '$caminho_arquivo')";



if(mysqli_query($conexao,$sql)){
    echo "Registro inserido com sucesso";
}else {
 echo "Erro ao cadastrar o produto".mysqli_error($conexao);
}

mysqli_close($conexao);

}
}

header("location:formcliente.php");

?>