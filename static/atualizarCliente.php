<?php 
require('conexao.php');

$id_cliente = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpfcnpj = $_POST['cpfcnpj'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$arquivo = $_FILES['imagem'];

// Verifica se há um arquivo enviado
if($arquivo !== null) {
    preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

    if(!empty($ext)) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "img/clientes/".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo);

        // Comando UPDATE para atualizar os dados do cliente
        $sql = "UPDATE cliente SET 
                    nome='$nome', 
                    email='$email', 
                    telefone='$telefone', 
                    cpfcnpj='$cpfcnpj', 
                    cep='$cep', 
                                    WHERE id='$id_cliente'";

        if(mysqli_query($conexao,$sql)){
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro ao atualizar o cliente: " . mysqli_error($conexao);
        }

        mysqli_close($conexao);
    } else {
        echo "Erro: Formato de arquivo inválido.";
    }
} else {
    echo "Erro: Nenhum arquivo enviado.";
}

header("location:formcliente.php");

?>
