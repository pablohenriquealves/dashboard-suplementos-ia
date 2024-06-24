<?php
// Recebendo os dados do formul��rio
$nomeCliente = $_POST['nomeCliente'];
$produto = $_POST['nomeproduto'];
$observacoes = $_POST['observacoes'];
$valor = $_POST['valor'];
$vendedor = $_POST['vendedor'];

require('conexao.php');

// Validando se todos os campos obrigat��rios foram preenchidos
if (!empty($nomeCliente) && !empty($produto) && !empty($valor) && !empty($vendedor)) {

    // Prepara a query SQL com prepared statement para inserir os dados
    $sql = "INSERT INTO pedidos (nomeCliente, produto, observacoes, valor, vendedor) VALUES (?, ?, ?, ?, ?)";
    
    // Inicia a declara�0�4�0�0o preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os par�0�9metros �� declara�0�4�0�0o preparada
        $stmt->bind_param("ssdsi", $nomeCliente, $produto, $observacoes, $valor, $vendedor); // "ssdsi" indica tipos de dados (strings, double, integer)

        // Executa a declara�0�4�0�0o preparada
        if ($stmt->execute()) {
            echo "Registro inserido com sucesso";
        } else {
            echo "Erro ao cadastrar o pedido: " . $stmt->error;
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
    // Redireciona ap��s o cadastro bem-sucedido
    document.location = 'formpedidos.php';
</script>
