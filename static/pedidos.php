<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<?php include 'header.php' ?>
</head>

<body>
	<div class="wrapper">
		<?php include 'menu.php' ?>

		<div class="main">
			<?php include 'topo.php' ?>

			<main class="content">
            <div class="container">
        <!-- Título principal -->
        <h2 class="mt-4 mb-4">Pedidos</h2>
        
        <div class="row">
    <div class="col-md-6">
        <!-- Subtitulo 01: Fazer Novo Pedido -->
        <h3>Novo Pedido</h3>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="nome_cliente">Nome do Cliente:</label>
                <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" required>
            </div>
            <div class="form-group">
                <label for="pedido">Pedido:</label>
                <input type="text" class="form-control" id="pedido" name="pedido" required>
            </div>
            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea class="form-control" id="observacoes" name="observacoes"></textarea>
            </div></p>
            <button type="submit" class="btn btn-primary">Enviar Pedido</button>
        </form>
    </div>
    <div class="col-md-6">
        <!-- Subtitulo 02: Buscar Pedidos do Cliente -->
        <h3>Buscar Pedidos</h3>
        <form method="get" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="buscar_cliente">Buscar por Nome do Cliente:</label>
                <input type="text" class="form-control" id="buscar_cliente" name="buscar_cliente">
            </div></p>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
</div>

        <!-- Resumo dos Pedidos -->
        <div class="mt-4">
            <h3>Resumo dos Pedidos</h3>
            <?php
            // Verifica se foi realizada uma busca por cliente
            if (isset($_GET["buscar_cliente"])) {
                $cliente_busca = $_GET["buscar_cliente"];
                buscarPedidosPorCliente($cliente_busca);
            } else {
                // Exibe todos os pedidos
                exibirPedidos();
            }
            ?>
        </div>
    </div>
			</main>

			<footer class="footer">
    			<?php include 'footer.php' ?>				
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>
</html>
<?php
// Função para buscar pedidos por cliente
function buscarPedidosPorCliente($cliente_busca) {
    // Verifica se o arquivo de pedidos existe
    if (file_exists("pedidos.txt")) {
        // Lê o arquivo e exibe os pedidos correspondentes ao cliente
        $linhas = file("pedidos.txt");
        echo "<table class='table table-bordered'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Nome do Cliente</th>
                        <th>Pedido</th>
                        <th>Observações</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($linhas as $linha) {
            $dados = explode("|", $linha);
            if (trim($dados[0]) === $cliente_busca) {
                echo "<tr>
                        <td>$dados[0]</td>
                        <td>$dados[1]</td>
                        <td>$dados[2]</td>
                        <td>$dados[3]</td>
                      </tr>";
            }
        }
        echo "</tbody>
              </table>";
    } else {
        echo "Ainda não há pedidos.";
    }
}

// Função para exibir todos os pedidos
function exibirPedidos() {
    // Verifica se o arquivo de pedidos existe
    if (file_exists("pedidos.txt")) {
        // Lê o arquivo e exibe todos os pedidos
        $linhas = file("pedidos.txt");
        echo "<table class='table table-bordered'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Nome do Cliente</th>
                        <th>Pedido</th>
                        <th>Observações</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($linhas as $linha) {
            $dados = explode("|", $linha);
            echo "<tr>
                    <td>$dados[0]</td>
                    <td>$dados[1]</td>
                    <td>$dados[2]</td>
                    <td>$dados[3]</td>
                  </tr>";
        }
        echo "</tbody>
              </table>";
    } else {
        echo "Ainda não há pedidos.";
    }
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos estão preenchidos
    if (isset($_POST["nome_cliente"]) && isset($_POST["pedido"]) && isset($_POST["observacoes"])) {
        // Salva o nome do cliente, o pedido e observações em variáveis
        $nome_cliente = $_POST["nome_cliente"];
        $pedido = $_POST["pedido"];
        $observacoes = $_POST["observacoes"];
        
        // Define o status como pendente
        $status = "Pendente";
        
        // Salva os dados em um arquivo de texto (ou em um banco de dados, se preferir)
        $dados = "$nome_cliente|$pedido|$observacoes|$status\n";
        file_put_contents("pedidos.txt", $dados, FILE_APPEND);
    }
}
?>