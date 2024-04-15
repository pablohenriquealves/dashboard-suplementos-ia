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
                <form action="cadastrovendedor.php" method="post">
                    <div class="container-fluid p-0">

                        <h1 class="h3 mb-3">Cadastro do Vendedor</h1>

                        <!-- Formulário de cadastro -->
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="nome" class="form-label">Nome completo:</label>
                                <input 
                                    type="text" 
                                    class="form-control"
                                    name="nome"
                                    id="nome"
                                    placeholder="Nome do vendedor" required>
                            </div>
                
                            <div class="mb-3 col-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input 
                                    type="email" 
                                    class="form-control"
                                    name="email"
                                    id="email"
                                    placeholder="cliente@mail.com.br" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-4">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input 
                                    type="text" 
                                    class="form-control"
                                    name="telefone"
                                    id="telefone"
                                    placeholder="(99) 9 9999-9999" required>
                            </div>
                
                            <div class="mb-3 col-4">
                                <label for="cpf" class="form-label">CPF</label>
                                <input 
                                    type="text" 
                                    class="form-control"
                                    name="cpf"
                                    id="cpf"
                                    placeholder="CPF do vendedor" required/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>

                
			<div class="main">
				<div
					class="table-responsive"
				>
					<table
						class="table table-bordered"
					>
						<thead>
                        <tr><th colspan="7" style="text-align: center;">Vendedores cadastrados</th></tr>
							<tr class="text-center">
								<th scope="col">Nome</th>
								<th scope="col">Email</th>
								<th scope="col">Telefone</th>
								<th scope="col">CPF</th>
								<th scope="col">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php include 'conexao.php';

							$sql = "SELECT * FROM vendedor";
							$busca = mysqli_query($conexao, $sql);

							while ($dados = mysqli_fetch_array($busca)){
								$id = $dados['id'];
								$nome = $dados['nome'];
								$email = $dados['email'];
								$telefone = $dados['telefone'];
								$cpf = $dados['cpf'];
						
							?>

								<tr class="text-center">
									<td><?php echo $nome ?></td>
									<td><?php echo $email ?></td>
									<td><?php echo $telefone ?></td>
									<td><?php echo $cpf ?></td>
									<td>
												<!-- Modal trigger button -->
												<button
													type="button"
													class="btn btn-warning btn-lg"
													data-bs-toggle="modal"
													data-bs-target="#modaleditar"
													data-id="<?php echo $id ?>"
												>
												<i class="fa-solid fa-file-pen"></i>												</button>
												
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
																	Editar cadastro vendedor 
																	 <?php echo $nome ?>
																</h5>
																<button
																	type="button"
																	class="btn-close"
																	data-bs-dismiss="modal"
																	aria-label="Close"></button>
															</div>

															<div class="modal-body">
																<form action="atualizarvendedor.php" method="POST">
                                                                    
																	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
																<div class="container-fluid p-0">

					<h3 class="h3 mb-3">Dados do vendedor</h3>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="nome" class="form-label">Nome</label>
							<input
								type="text"
								class="form-control"
								name="nome"
								id="nome"
								placeholder="Digite o nome do vendedor"/>
						</div>
						<div class="mb-3 col-12">
							<label for="email" class="form-label">E-mail</label>
							<input
								type="email"
								class="form-control"
								name="email"
								id="email"
								placeholder="Digite o E-mail"/>
						</div>
						
						
					</div>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="telefone" class="form-label">Telefone</label>
							<input
								type="int"
								class="form-control"
								name="telefone"
								id="telefone"
								placeholder="Digite o telefone"/>
						</div>
						<div class="mb-3 col-12">
							<label for="cpf" class="form-label">CPF</label>
							<input
								type="text"
								class="form-control"
								name="cpf"
								id="cpf"
								placeholder="Digite o CPF" required/>
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
																<button type="button" class="btn btn-danger">Excluir</button>
															</div>
														</div>
													</div>
												</div>
												
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