<?php
// Recebendo os dados do formulário
$nomeCliente = $_POST['nomeCliente'];
$produto = $_POST['nomeproduto'];
$observacoes = $_POST['observacoes'];
$valor = $_POST['valor'];
$vendedor = $_POST['vendedor'];

require('conexao.php');

// Validando se todos os campos obrigatórios foram preenchidos
if (!empty($nomeCliente) && !empty($produto) && !empty($valor) && !empty($vendedor)) {

    // Prepara a query SQL com prepared statement para inserir os dados
    $sql = "INSERT INTO pedidos (nomeCliente, produto, observacoes, valor, vendedor) VALUES (?, ?, ?, ?, ?)";
    
    // Inicia a declaração preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os parâmetros à declaração preparada
        $stmt->bind_param("ssdsi", $nomeCliente, $produto, $observacoes, $valor, $vendedor); // "ssdsi" indica tipos de dados (strings, double, integer)

        // Executa a declaração preparada
        if ($stmt->execute()) {
            echo "Registro inserido com sucesso";
        } else {
            echo "Erro ao cadastrar o pedido: " . $stmt->error;
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
    // Redireciona após o cadastro bem-sucedido
    document.location = 'formpedidos.php';
</script>
