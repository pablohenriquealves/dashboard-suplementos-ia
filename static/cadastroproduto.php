<?php
require('conexao.php');

// Recebendo os dados do formulário
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
    // Verifica se é um arquivo de imagem com extensão permitida (png, jpg, jpeg)
    if (preg_match("/\.(png|jpg|jpeg)$/i", $arquivo["name"])) {
        // Gera um nome único para o arquivo
        $nome_arquivo = md5(uniqid(time())) . "." . pathinfo($arquivo['name'], PATHINFO_EXTENSION);
        $caminho_arquivo = "img/produtos/" . $nome_arquivo;

        // Move o arquivo para o diretório desejado
        if (move_uploaded_file($arquivo['tmp_name'], $caminho_arquivo)) {
            // Prepara a query SQL com prepared statement para inserção dos dados
            $sql = "INSERT INTO produtos (nomeproduto, descricao, estoque, cpfcnpj, preco, categoria, arquivo) VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            // Inicia a declaração preparada
            $stmt = $conexao->prepare($sql);

            if ($stmt) {
                // Liga os parâmetros à declaração preparada
                $stmt->bind_param("ssssdss", $nomeproduto, $descricao, $estoque, $cpfcnpj, $preco, $categoria, $caminho_arquivo); // "ssssdss" indica tipos de dados (strings e double)

                // Executa a declaração preparada
                if ($stmt->execute()) {
                    echo "Registro inserido com sucesso";
                } else {
                    echo "Erro ao cadastrar o produto: " . $stmt->error;
                }

                // Fecha a declaração preparada
                $stmt->close();
            } else {
                echo "Erro na preparação da consulta: " . $conexao->error;
            }
        } else {
            echo "Erro ao fazer upload do arquivo.";
        }
    } else {
        echo "Formato de arquivo não suportado. Por favor, envie apenas arquivos PNG, JPG ou JPEG.";
    }
} else {
    echo "Por favor, selecione um arquivo para upload.";
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

<script>
    // Redireciona após o cadastro bem-sucedido
    document.location = 'formproduto.php';
</script>
