<?php
require('conexao.php');

// Recebendo os dados do formulário
$nomeproduto = $_POST['nomeproduto'];
$descricao = $_POST['descricao'];
$estoque = $_POST['estoque'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];
$arquivo = $_FILES['imagem'];
$id_produto = $_POST['id']; 

// Verificando se foi enviado um arquivo e se é uma imagem válida
if ($arquivo['size'] > 0) {
    preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

    if (!empty($ext)) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "img/produtos/".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo);
    } else {
        echo "Erro: Apenas arquivos PNG, JPG ou JPEG são permitidos.";
        exit; // Encerra a execução se o arquivo não for uma imagem válida
    }
}

// Verifica se todos os campos obrigatórios estão preenchidos
if (!empty($nomeproduto) && !empty($estoque) && !empty($preco) && !empty($categoria)) {

    // Prepara a query SQL com prepared statement para atualizar os dados
    $sql = "UPDATE produtos SET nomeproduto=?, descricao=?, estoque=?, preco=?, categoria=?, arquivo=? WHERE id=?";

    // Inicia a declaração preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os parâmetros à declaração preparada
        $stmt->bind_param("ssdsssi", $nomeproduto, $descricao, $estoque, $preco, $categoria, $caminho_arquivo, $id_produto); // "ssdsssi" indica tipos de dados (strings e inteiro)

        // Executa a declaração preparada
        if ($stmt->execute()) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro ao atualizar o produto: " . $stmt->error;
        }

        // Fecha a declaração preparada
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conexao->error;
    }
} else {
    echo "Todos os campos são obrigatórios.";
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

<script>
    // Redireciona após a atualização bem-sucedida
    document.location = 'formproduto.php';
</script>
