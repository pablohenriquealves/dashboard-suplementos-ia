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
			<form action="cadastropedidos.php" method="post"  enctype="multipart/form-data">
					<div class="container">

						<h1 class="h3 mb-3">Novo Pedido</h1>

						<div class="row">
						<div class="form-group col-md-6">
									<label for="">Selecione o Cliente</label>
									<select class="form-select" name="nomeCliente" id="nomeCliente" aria-label="Default select example">
										<option selected></option>
										
										<?php
                require ('conexao.php');
                $sql = "SELECT * FROM cliente";
                $resultado = mysqli_query($conexao, $sql);
                while ($row = mysqli_fetch_assoc($resultado)) {
					echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                }
				?>	</select></div>
							<div class="col-md-6">
								<div class="form-group">
							<label for="observacoes">Observações</label>
								<textarea class="form-control"  rows="1" id="observacoes" name="observacoes"></textarea>
							</div>
							
						</div>



						<div class="row">
    <div class="form-group col-md-6 mt-3">
        <label for="produto">Selecione o Produto</label>
        <select class="form-select" name="nomeproduto" id="nomeproduto" aria-label="Default select example" required>
            <option selected>Abrir seleção de produtos</option>
            <?php
            require('conexao.php');
            $sql = "SELECT * FROM produtos";
            $resultado = mysqli_query($conexao, $sql);
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<option value='{$row['id']}' data-preco='{$row['preco']}'>{$row['nomeproduto']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group col-md-6 mt-3">
        <label for="valor" class="ps-3">Valor do Produto</label>
        <div class="input-group mb-3 ps-3">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input type="text" class="form-control" id="valor" name="valor" aria-label="Quantia" readonly>
            <div class="input-group-append">
                <span class="input-group-text">.00</span>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('nomeproduto').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var preco = selectedOption.getAttribute('data-preco');
        document.getElementById('valor').value = preco;
    });
</script>


<br>


<div class="row">
	<div class="form-group col-md-6 mt-5"><button type="submit" class="btn btn-primary">Enviar Pedido</button></div>	

    <div class="form-group col-md-6 mt-3 ps-4">
        <label for="produto">Selecione o Vendedor</label>
        <select class="form-select" name="vendedor" id="vendedor" aria-label="Default select example" required>
			<option selected>Abrir seleção de vendedores</option>
            <?php
            require('conexao.php');
            $sql = "SELECT * FROM vendedor";
            $resultado = mysqli_query($conexao, $sql);
            while ($row = mysqli_fetch_assoc($resultado)) {
				echo "<option value='{$row['id']}'>{$row['nome']}</option>";
            }
            ?>
        </select>
    </div>
	

</div>
					</div>
				</form><br>

                
<div class="main">
				<div
				class="overflow-auto" style="max-height: 600px;"				>
					<table
						class="table table-bordered"
					>
						<thead>
                        <tr><th colspan="7" style="text-align: center;">Pedidos Cadastrados</th></tr>
							<tr class="text-center">
								<th scope="col">Cliente</th>
								<th scope="col">Produtos</th>
								<th scope="col">Valor</th>
								<th scope="col">Vendedor</th>
								<th class="col-2" scope="col">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php include 'conexao.php';

$sql = "SELECT p.id_pedidos,p.vendedor,v.nome AS nomeVendedor, c.nome AS nomeCliente, p.produto, p.valor, pr.nomeproduto, pr.id
FROM pedidos p
INNER JOIN cliente c ON p.nomeCliente = c.id
INNER JOIN produtos pr ON p.produto = pr.id							
INNER JOIN vendedor v ON p.vendedor = v.id";							
$busca = mysqli_query($conexao, $sql);

							while ($dados = mysqli_fetch_array($busca)){
								$id = $dados['id_pedidos'];
								$nome = $dados['nomeCliente'];
								$produto = $dados['nomeproduto'];
								$valor = $dados['valor'];
								$vendedor = $dados['nomeVendedor'];
						
							?>

								<tr class="text-center">
									<td><?php echo $nome ?></td>
									<td><?php echo $produto ?></td>
									<td><?php echo $valor ?></td>
									<td><?php echo $vendedor ?></td>
									<td>
												<!-- Modal trigger button -->
												<button
													type="button"
													class="btn btn-warning btn-lg"
													data-bs-toggle="modal"
													data-bs-target="#modaleditar_<?php echo $id ?>"
												>
												<i class="fa-solid fa-file-pen"></i></button>
												
												<!-- Modal Body -->
												<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
												<div
													class="modal fade"
													id="modaleditar_<?php echo $id ?>"
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
                                                                    
																	<input type="hidden" name="id" value="<?php echo $id; ?>">
																<div class="container-fluid p-0">

					<h3 class="h3 mb-3">Dados do Pedido</h3>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="nomeCliente" class="form-label">Cliente</label>
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
                $sql = "SELECT * FROM produtos";
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
					<input type="hidden" name="id" value="<?php echo $id; ?>">
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
	data-bs-target="#modalexcluir_<?php echo $id ?>"
	>
	<i class="fa-solid fa-trash-can"></i></button>
	<!-- Modal Body -->
	<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
	<form action="excluirPedidos.php" method="POST">
												<div
													class="modal fade"
													id="modalexcluir_<?php echo $id ?>"
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
																	Excluir pedido de <?php echo $nome ?>
																</h5>
																<button
																	type="button"
																	class="btn-close"
																	data-bs-dismiss="modal"
																	aria-label="Close"
																></button>
															</div>
															<div class="modal-body">Deseja excluir o pedido?</div>
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