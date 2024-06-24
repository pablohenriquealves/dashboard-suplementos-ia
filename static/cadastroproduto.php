<?php
require('conexao.php');

// Recebendo os dados do formul��rio
$nomeproduto = $_POST['nomeproduto'];
$descricao = $_POST['descricao'];
$estoque = $_POST['estoque'];
$cpfcnpj = $_POST['cpfcnpj'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];
$id = $_POST['id'];
$arquivo = $_FILES['imagem'];

// Verifica se um arquivo foi enviado
if ($arquivo['size'] > 0) {
    // Verifica se �� um arquivo de imagem com extens�0�0o permitida (png, jpg, jpeg)
    if (preg_match("/\.(png|jpg|jpeg)$/i", $arquivo["name"])) {
        // Gera um nome ��nico para o arquivo
        $nome_arquivo = md5(uniqid(time())) . "." . pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $caminho_arquivo = "img/produtos/" . $nome_arquivo;

        // Move o arquivo para o diret��rio desejado
        if (move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo)) {
            // Prepara a query SQL com prepared statement para inser�0�4�0�0o dos dados
            $sql = "INSERT INTO produtos (nomeproduto, descricao, estoque, cpfcnpj, preco, categoria, arquivo) VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            // Inicia a declara�0�4�0�0o preparada
            $stmt = $conexao->prepare($sql);

            if ($stmt) {
                // Liga os par�0�9metros �� declara�0�4�0�0o preparada
                $stmt->bind_param("ssssdss", $nomeproduto, $descricao, $estoque, $cpfcnpj, $preco, $categoria, $caminho_arquivo); // "ssssdss" indica tipos de dados (strings e double)

                // Executa a declara�0�4�0�0o preparada
                if ($stmt->execute()) {
                    echo "Registro inserido com sucesso";
                } else {
                    echo "Erro ao cadastrar o produto: " . $stmt->error;
                }

                // Fecha a declara�0�4�0�0o preparada
                $stmt->close();
            } else {
                echo "Erro na prepara�0�4�0�0o da consulta: " . $conexao->error;
            }
        } else {
            echo "Erro ao fazer upload do arquivo.";
        }
    } else {
        echo "Formato de arquivo n�0�0o suportado. Por favor, envie apenas arquivos PNG, JPG ou JPEG.";
    }
} else {
    echo "Por favor, selecione um arquivo para upload.";
}

// Fecha a conex�0�0o com o banco de dados
$conexao->close();
?>

<script>
    // Redireciona ap��s o cadastro bem-sucedido
    document.location = 'formproduto.php';
</script>
