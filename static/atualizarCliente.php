<?php 
require('conexao.php');

// Verifica se todas as variáveis foram recebidas do formulário
if(isset($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['cpfcnpj'], $_POST['cep'])) {
    // Recebe e filtra os dados do formulário
    $id_cliente = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpfcnpj = $_POST['cpfcnpj'];
    $cep = $_POST['cep'];

    // Prepara a consulta SQL com prepared statement
    $sql = "UPDATE cliente SET 
                nome=?, 
                email=?, 
                telefone=?, 
                cpfcnpj=?, 
                cep=? 
            WHERE id=?";

    // Inicializa a declaração preparada
    $stmt = mysqli_prepare($conexao, $sql);

    // Verifica se a preparação da consulta foi bem-sucedida
    if($stmt) {
        // Liga os parâmetros à declaração preparada
        mysqli_stmt_bind_param($stmt, "sssssi", $nome, $email, $telefone, $cpfcnpj, $cep, $id_cliente);

        // Executa a declaração preparada
        if(mysqli_stmt_execute($stmt)) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro ao atualizar o cliente: " . mysqli_stmt_error($stmt);
        }

        // Fecha a declaração preparada
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($conexao);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
} else {
    echo "Dados insuficientes para atualizar o cliente";
}
?>


<script>
    // Redireciona ap贸s o cadastro bem-sucedido
    document.location = 'formcliente.php';
</script>