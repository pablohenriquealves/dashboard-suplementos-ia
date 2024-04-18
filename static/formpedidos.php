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
        <h2 class="mt-4 mb-4">Pedidos</h2>
        
        <div class="row">
    <div class="col-md-6">
        <h3>Novo Pedido</h3>
        <form method="post" action="cadastropedidos.php">
            <div class="form-group">
                <label for="">Selecione o Cliente</label>
				<select name="nomeCliente" id="nomeCliente">
				<?php
                require ('conexao.php');
                $sql = "SELECT * FROM cliente";
                $resultado = mysqli_query($conexao, $sql);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
            ?>




				</select>

			</div>
            <div class="form-group">
                <label for="produto">Selecione os Produtos</label>
				<select name="produto" id="produto">
				<?php
                require ('conexao.php');
                $sql = "SELECT * FROM produto";
                $resultado = mysqli_query($conexao, $sql);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='{$row['id']}'>{$row['nomeproduto']}</option>";
                }
            ?>
				</select>

			</div>
            <button type="submit" class="btn btn-primary">Enviar Pedido</button>
        </form><br>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="observacoes">Observações</label>
            <textarea class="form-control"  rows = "1"id="observacoes" name="observacoes"></textarea>
        </div>
        <div class="form-group">
                <label for="valor">Valor dos Produtos</label>
                <input type="number" class="form-control" id="valor" name="valor" step="0.01" required>
            </div>
    </div>
</div>
                
<div class="main">
				<div
					class="table-responsive"
				>
					<table
						class="table table-bordered"
					>
						<thead>
                        <tr><th colspan="7" style="text-align: center;">Pedidos Cadastrados</th></tr>
							<tr class="text-center">
								<th scope="col">Cliente</th>
								<th scope="col">Produtos</th>
								<th scope="col">Valor</th>
								<th scope="col">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php include 'conexao.php';

							$sql = "SELECT * FROM pedidos";
							$busca = mysqli_query($conexao, $sql);

							while ($dados = mysqli_fetch_array($busca)){
								$id = $dados['id'];
								$nome = $dados['nomeCliente'];
								$produto = $dados['produto'];
								$valor = $dados['valor'];
						
							?>

								<tr class="text-center">
									<td><?php echo $nome ?></td>
									<td><?php echo $produto ?></td>
									<td><?php echo $valor ?></td>
									<td>
												<!-- Modal trigger button -->
												<button
													type="button"
													class="btn btn-warning btn-lg"
													data-bs-toggle="modal"
													data-bs-target="#modaleditar"
													data-id="<?php echo $id ?>"
												>
												<i class="fa-solid fa-file-pen"></i></button>
												
												<!-- Modal Body -->
												<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
												<div
													class="modal fade"
													id="modaleditar"
													tabindex="-1"
													data-bs-backdrop="static"
													data-bs-keyboard="false"
													
													role="dialog"
													aria-labelledby="modalTitleId"
													aria-hidden="true"
												>
													<div
														class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
														role="document"													>
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="modalTitleId">
																	Editar Pedido de  
																	 <?php echo $nome ?>
																</h5>
																<button
																	type="button"
																	class="btn-close"
																	data-bs-dismiss="modal"
																	aria-label="Close"></button>
															</div>

															<div class="modal-body">
																<form action="atualizarPedidos.php" method="POST">
                                                                    
																	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
																<div class="container-fluid p-0">

					<h3 class="h3 mb-3">Dados do Pedido</h3>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="nome" class="form-label">Cliente</label>
							<select name="nomeCliente" id="nomeCliente">
				<?php
                require ('conexao.php');
                $sql = "SELECT * FROM cliente";
                $resultado = mysqli_query($conexao, $sql);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
            ?>




				</select>
						</div>
						<div class="mb-3 col-12">
							<label for="produto" class="form-label">Produtos</label>
				<select name="produto" id="produto">
				<?php
                require ('conexao.php');
                $sql = "SELECT * FROM produto";
                $resultado = mysqli_query($conexao, $sql);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='{$row['id']}'>{$row['nomeproduto']}</option>";
                }
            ?>
				</select>

			</div>
						</div>
						
						
					</div>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="valor" class="form-label">Valor</label>
							<input
								type="text"
								class="form-control"
								name="valor"
								id="valor"
								placeholder="Digite o valor"/>
						</div>
												
						
					</div>
					<div class="modal-footer">
						<button
						type="button"
						class="btn btn-secondary"
						data-bs-dismiss="modal">
						Voltar
					</button>
					<button type="submit" class="btn btn-primary">Salvar</button>
				</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
												
											
	<!-- Modal trigger button -->
	<button
	type="button"
	class="btn btn-danger btn-lg"
	data-bs-toggle="modal"
	data-bs-target="#modalexcluir"
	>
	<i class="fa-solid fa-trash-can"></i></button>
	<!-- Modal Body -->
	<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
	<form action="excluirPedidos.php" method="POST">
												<div
													class="modal fade"
													id="modalexcluir"
													tabindex="-1"
													data-bs-backdrop="static"
													data-bs-keyboard="false"
													
													role="dialog"
													aria-labelledby="modalTitleId"
													aria-hidden="true">
													<div
														class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
														role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="modalTitleId">
																	Excluir dados do vendedor <?php echo $nome ?>
																</h5>
																<button
																	type="button"
																	class="btn-close"
																	data-bs-dismiss="modal"
																	aria-label="Close"
																></button>
															</div>
															<div class="modal-body">Deseja excluir todos os dados?</div>
															<div class="modal-footer">
																<button
																	type="button"
																	class="btn btn-secondary"
																	data-bs-dismiss="modal">
																	Voltar
																</button>
																<input type="hidden" name="id" value="<?php echo $id; ?>">
																<button type="submit" class="btn btn-danger">Excluir</button>
															</div>
														</div>
													</div>
												</div> 
											</form>
													
												<!-- Optional: Place to the bottom of scripts -->
												
												<script>
													const myModal = new bootstrap.Modal(
														document.getElementById("modalId"),
														options,
													);
													
													document.addEventListener('DOMContentLoaded', function() {
														// Formata o CPF
														const cpfInput = document.getElementById('cpf');
														cpfInput.addEventListener('input', function (event) {
            const cpf = event.target.value.replace(/\D/g, '');
            let cpfFormatado = '';
            if (cpf.length > 0) {
				cpfFormatado = cpf.substring(0, 3);
                if (cpf.length > 3) {
					cpfFormatado += '.' + cpf.substring(3, 6);
                    if (cpf.length > 6) {
						cpfFormatado += '.' + cpf.substring(6, 9);
                        if (cpf.length > 9) {
							cpfFormatado += '-' + cpf.substring(9, 11);
                        }
                    }
                }
            }
            event.target.value = cpfFormatado;
        });
    });
	
	</script>
	</td>
								</tr>

							<?php } ?>

						</tbody>
					</table>
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