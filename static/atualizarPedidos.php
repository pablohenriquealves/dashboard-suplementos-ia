<?php
// Recebendo os dados do formul��rio
$nomeCliente = $_POST['nomeCliente'];
$produto = $_POST['produto'];
$observacoes = $_POST['observacoes'];
$valor = $_POST['valor'];
$vendedor = $_POST['vendedor'];
$id_pedido = $_POST['id'];

require('conexao.php');

// Verifica se todos os campos obrigat��rios est�0�0o preenchidos
if (!empty($nomeCliente) && !empty($produto) && !empty($valor) && !empty($vendedor)) {

    // Prepara a query SQL com prepared statement para atualizar os dados
    $sql = "UPDATE pedidos SET nomeCliente=?, produto=?, observacoes=?, valor=?, vendedor=? WHERE id_pedidos=?";

    // Inicia a declara�0�4�0�0o preparada
    $stmt = $conexao->prepare($sql);

    if ($stmt) {
        // Liga os par�0�9metros �� declara�0�4�0�0o preparada
        $stmt->bind_param("sssssi", $nomeCliente, $produto, $observacoes, $valor, $vendedor, $id_pedido); // "sssssi" indica tipos de dados (strings e inteiro)

        // Executa a declara�0�4�0�0o preparada
        if ($stmt->execute()) {
            echo "Registro atualizado com sucesso";
        } else {
            echo "Erro ao atualizar o pedido: " . $stmt->error;
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
    document.location = 'formpedidos.php';
</script>
