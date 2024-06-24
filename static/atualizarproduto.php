<?php
require('conexao.php');

// Recebendo os dados do formul��rio
$nomeproduto = $_POST['nomeproduto'];
$descricao = $_POST['descricao'];
$estoque = $_POST['estoque'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];
$arquivo = $_FILES['imagem'];
$id_produto = $_POST['id']; 

// Verificando se foi enviado um arquivo e se �� uma imagem v��lida
if ($arquivo['size'] > 0) {
    preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

    if (!empty($ext)) {
        $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
        $caminho_arquivo = "img/produtos/".$nome_arquivo;
        move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo);
    } else {
        echo "Erro: Apenas arquivos PNG, JPG ou JPEG s�0�0o permitidos.";
        exit; // Encerra a execu�0�4�0�0o se o arquivo n�0�0o for uma imagem v��lida
    }
}

// Verifica se todos os campos obrigat��rios est�0�0o preenchidos
if (!empty($nomeproduto) && !empty($estoque) && !empty($preco) && !empty($categoria)) {

    // Prepara a query SQL com prepared statement para atualizar os dados
    $sql = "UPDATE produtos SET nomeproduto=?, descricao=?, estoque=?, preco=?, categoria=?, arquivo=? WHERE id=?";

    // Inicia a declara�0�4�0�0o preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os par�0�9metros �� declara�0�4�0�0o preparada
        $stmt->bind_param("ssdsssi", $nomeproduto, $descricao, $estoque, $preco, $categoria, $caminho_arquivo, $id_produto); // "ssdsssi" indica tipos de dados (strings e inteiro)

        // Executa a declara�0�4�0�0o preparada
        if ($stmt->execute()) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro ao atualizar o produto: " . $stmt->error;
        }

        // Fecha a declara�0�4�0�0o preparada
        $stmt->close();
    } else {
        echo "Erro na prepara�0�4�0�0o da consulta: " . $conexao->error;
    }
} else {
    echo "Todos os campos s�0�0o obrigat��rios.";
}

// Fecha a conex�0�0o com o banco de dados
$conexao->close();
?>

<script>
    // Redireciona ap��s a atualiza�0�4�0�0o bem-sucedida
    document.location = 'formproduto.php';
</script>
