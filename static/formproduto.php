<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include 'header.php' ?>
</head>

<body>
	<div class="wrapper">
		<?php include 'menu.php' ?>

		<div class="main">
			<?php include 'topo.php' ?>

			<main class="content">
				<form action="cadastroproduto.php" method="post"  enctype="multipart/form-data">
					<div class="container">

						<h1 class="h3 mb-3">Cadastro de Produtos</h1>

						<div class="row">
							<div class="mb-3 col-6">
								<label for="nomeproduto" class="form-label">Nome do Produto</label>
								<input type="text" class="form-control" name="nomeproduto" id="nomeproduto" placeholder="Nome do produto">
							</div>
							<div class="mb-3 col-6">
								<label for="categoria" class="form-label">Categoria</label>
								<select class="form-select" name="categoria" id="categoria" aria-label="Default select example">
									<option selected> </option>
									
									<?php
									require ('conexao.php');
									$sql = "SELECT * FROM categorias";
									$resultado = mysqli_query($conexao, $sql);
									while ($row = mysqli_fetch_assoc($resultado)) {
										echo "<option value='{$row['categoria']}'>{$row['categoria']}</option>";
									}
									?>
									</select>
								</div>
							
						</div>
						<div class="row">
							<div class="mb-3 col-6">
								<label for="estoque" class="form-label">Quantidade em Estoque</label>
								<input type="Integer" class="form-control" name="estoque" id="estoque"placeholder="Quantidade em estoque">
							</div>
							
							<div class="mb-3 col-6">
								<label for="cnpjfornecedor" class="form-label">CNPJ do Fornecedor</label>
								<input type="text" class="form-control" name="cpfcnpj" id="cpfcnpj" placeholder="Digite o CNPJ do fornecedor" />
							</div>
					
						</div>

						<div class="row">
						<div class="mb-3 col-6">
								<label for="descricao" class="form-label">Descrição</label>
								<input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição do produto">
							</div>
						   
							<div class="mb-3 col-6">
								<label for="preco" class="form-label">Preço</label>
								<input type="Integer" class="form-control" name="preco" id="preco" placeholder="Digite o preco do produto">
							</div>
											
						</div>
						<div class="mb-3 col-4">
							<label for="imagem" class="form-label">Logo/Imagem Pessoal</label>
							<input
								type="file"
								class="form-control"
								name="imagem"
								id="imagem"
								placeholder="Insira a imagem do produto"/>
						</div>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>

			

				<div class="main">
				<div
					class="table-responsive"
				>
					<table
						class="table table-bordered"
					>
						<thead>
							<tr><th colspan="7" style="text-align: center;">Produtos Cadastrados</th></tr>
							<tr class="text-center">
							<th scope="col">Foto</th>
								<th scope="col">ID do Produto</th>
								<th scope="col">Produto</th>
								<th scope="col">Preço</th>
								<th scope="col">Estoque</th>
								<th scope="col">Categoria</th>
								<th scope="col">AÇÕES</th>
							</tr>
						</thead>
						<tbody>
							<?php include 'conexao.php';

							$sql = "SELECT * FROM produto";
							$busca = mysqli_query($conexao, $sql);

							while ($dados = mysqli_fetch_array($busca)){
								$id = $dados['id'];
								$imagem = $dados['arquivo'];
								$produto = $dados['nomeproduto'];
								$preco = $dados['preco'];
								$estoque = $dados['estoque'];
								$categoria = $dados['categoria'];
							
							?>

								<tr class="text-center">
								<td><img src="<?php echo $imagem ?>" width="100px" height="100%"></td>
									<td><?php echo $id ?></td>
									<td><?php echo $produto ?></td>
									<td><?php echo $preco ?></td>
									<td><?php echo $estoque ?></td>
									<td><?php echo $categoria ?></td>
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
																	Editar Cadastro do Produto 
																	 <?php echo $produto ?>
																</h5>
																<button
																	type="button"
																	class="btn-close"
																	data-bs-dismiss="modal"
																	aria-label="Close"></button>
															</div>

															<div class="modal-body">
																<form action="atualizarProduto.php" method="POST">
                                                                    
																	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
																<div class="container-fluid p-0">

					<h3 class="h3 mb-3">Dados do Produto</h3>

					<div class="row">
						<div class="mb-3 col-12">
						<label for="imagem" class="form-label">Imagem do Produto</label>
							<input
								type="file"
								class="form-control"
								name="imagem"
								id="imagem"
								placeholder="Insira a imagem do produto"/>
						</div>
						<div class="mb-3 col-12">
							<label for="email" class="form-label">Nome do Produto</label>
							<input
								type="text"
								class="form-control"
								name="nomeproduto"
								id="nomeproduto"
								placeholder="Digite nome do produto"/>
						</div>
						
						
					</div>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="preco" class="form-label">Preço</label>
							<input
								type="Integer"
								class="form-control"
								name="preco"
								id="preco"
								placeholder="Digite o preço do produto"/>
						</div>
						<div class="mb-3 col-12">
							<label for="estoque" class="form-label">Estoque</label>
							<input
								type="text"
								class="form-control"
								name="estoque"
								id="estoque"
								placeholder="Digite o estoque disponível" required/>
						</div>
						<div class="mb-3 col-12">
							<label for="categoria" class="form-label">Categoria</label>
							<select class="form-select" name="categoria" id="categoria" aria-label="Default select example">
									<option selected> </option>
									
									<?php
									require ('conexao.php');
									$sql = "SELECT * FROM categorias";
									$resultado = mysqli_query($conexao, $sql);
									while ($row = mysqli_fetch_assoc($resultado)) {
										echo "<option value='{$row['categoria']}'>{$row['categoria']}</option>";
									}
									?>
									</select>
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
	<form action="excluirProduto.php" method="POST">
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
																	Excluir dados de <?php echo $produto ?>
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