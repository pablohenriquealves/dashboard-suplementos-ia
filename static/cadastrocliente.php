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

// Verifica se todos os campos foram recebidos do formul��rio
if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($cpfcnpj) && !empty($cep) && !empty($logradouro) && !empty($numero) && !empty($arquivo)) {
    
    // Verifica se foi enviado um arquivo v��lido
    if ($arquivo['error'] === UPLOAD_ERR_OK) {
        $nome_temporario = $arquivo['tmp_name'];
        $nome_arquivo = basename($arquivo['name']);
        $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

        // Verifica a extens�0�0o do arquivo
        $extensoes_permitidas = array('png', 'jpg', 'jpeg');
        if (in_array($extensao, $extensoes_permitidas)) {
            // Gera um nome ��nico para o arquivo
            $nome_arquivo_final = md5(uniqid(time())) . "." . $extensao;
            $caminho_arquivo = "img/clientes/" . $nome_arquivo_final;

            // Move o arquivo para o diret��rio desejado
            if (move_uploaded_file($nome_temporario, $caminho_arquivo)) {
                // Prepara a consulta SQL com prepared statement
                $sql = "INSERT INTO cliente (nome, email, telefone, cpfcnpj, cep, logradouro, numero, complemento, arquivo) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = mysqli_prepare($conexao, $sql);

                if ($stmt) {
                    // Liga os par�0�9metros �� declara�0�4�0�0o preparada
                    mysqli_stmt_bind_param($stmt, "sssssssss", $nome, $email, $telefone, $cpfcnpj, $cep, $logradouro, $numero, $complemento, $caminho_arquivo);

                    // Executa a declara�0�4�0�0o preparada
                    if (mysqli_stmt_execute($stmt)) {
                        echo "Registro inserido com sucesso";
                    } else {
                        echo "Erro ao cadastrar o cliente: " . mysqli_stmt_error($stmt);
                    }

                    // Fecha a declara�0�4�0�0o preparada
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Erro na prepara�0�4�0�0o da consulta: " . mysqli_error($conexao);
                }
            } else {
                echo "Erro ao mover o arquivo para o diret��rio desejado";
            }
        } else {
            echo "Extens�0�0o de arquivo n�0�0o permitida. Por favor, envie um arquivo PNG, JPG ou JPEG.";
        }
    } else {
        echo "Erro no envio do arquivo: " . $arquivo['error'];
    }
} else {
    echo "Por favor, preencha todos os campos do formul��rio.";
}

// Fecha a conex�0�0o com o banco de dados
mysqli_close($conexao);
?>
<script>
    // Redireciona ap��s o cadastro bem-sucedido
    document.location = 'formcliente.php';
</script>
