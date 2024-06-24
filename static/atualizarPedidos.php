<?php
// Recebendo os dados do formulário
$nomeCliente = $_POST['nomeCliente'];
$produto = $_POST['produto'];
$observacoes = $_POST['observacoes'];
$valor = $_POST['valor'];
$vendedor = $_POST['vendedor'];
$id_pedido = $_POST['id'];

require('conexao.php');

// Verifica se todos os campos obrigatórios estão preenchidos
if (!empty($nomeCliente) && !empty($produto) && !empty($valor) && !empty($vendedor)) {

    // Prepara a query SQL com prepared statement para atualizar os dados
    $sql = "UPDATE pedidos SET nomeCliente=?, produto=?, observacoes=?, valor=?, vendedor=? WHERE id_pedidos=?";

    // Inicia a declaração preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os parâmetros à declaração preparada
        $stmt->bind_param("sssssi", $nomeCliente, $produto, $observacoes, $valor, $vendedor, $id_pedido); // "sssssi" indica tipos de dados (strings e inteiro)

        // Executa a declaração preparada
        if ($stmt->execute()) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro ao atualizar o pedido: " . $stmt->error;
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
    document.location = 'formpedidos.php';
</script>
