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
                                <label for="nome" class="form-label">Nome Completo</label>
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
                                    placeholder="vendedor@mail.com.br" required/>
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
                                <label for="cpfcnpj" class="form-label">CPF</label>
                                <input  maxlength="18"
                                    type="text" 
                                    class="form-control"
                                    name="cpfcnpj"
                                    id="cpfcnpj"
                                    placeholder="CPF do Vendedor" required/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button></form><br>
					
					<div class="main">
						<div
					class="table-responsive overflow-auto"
				>
					<table
						class="table table-bordered"
					>
						<thead>
                        <tr><th colspan="7" style="text-align: center;">Vendedores Cadastrados</th></tr>
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
								$cpf = $dados['cpfcnpj'];
						
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
							<input pattern="[A-Za-z]+"
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
							<input	maxlength="16"
								type="text"
								class="form-control"
								name="telefone"
								id="telefone"
								placeholder="Digite o telefone"/>
						</div>
						<div class="mb-3 col-12">
							<label for="cpfcnpj" class="form-label">CPF</label>
							<input 	maxlength="18"
								type="text"
								class="form-control"
								name="cpfcnpj"
								id="cpfcnpj"
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
	data-bs-target="#modalexcluir_<?php echo $id ?>"
				
	>
	<i class="fa-solid fa-trash-can"></i></button>
	<!-- Modal Body -->
	<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
	<form action="excluirVendedor.php" method="POST">
												<div
													class="modal fade"
													id="modalexcluir_<?php echo $id ?>"
"
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

	<script>
								// Formata o número de telefone
								const telefoneInput = document.getElementById('telefone');
								telefoneInput.addEventListener('input', function (event) {
								const numero = event.target.value.replace(/\D/g, '');
								let telefoneFormatado = '';
								if (numero.length > 0) {
								telefoneFormatado = '(' + numero.substring(0, 2) + ') ';
								if (numero.length > 2) {
								telefoneFormatado += numero.charAt(2) + ' ';
								telefoneFormatado += numero.substring(3, 7);
								if (numero.length > 7) {
								telefoneFormatado += '-' + numero.substring(7, 11);
								}
								}
								}
								event.target.value = telefoneFormatado;
								});
								
								// Formata o CPF ou CNPJ com base no tamanho do número inserido
								const cpfcnpjInput = document.getElementById('cpfcnpj');
								cpfcnpjInput.addEventListener('input', function (event) {
								const numero = event.target.value.replace(/\D/g, '');
								let numeroFormatado = '';
								if (numero.length <= 11) { // CPF
								numeroFormatado = numero.substring(0, 3);
								if (numero.length > 3) {
								numeroFormatado += '.' + numero.substring(3, 6);
								if (numero.length > 6) {
								numeroFormatado += '.' + numero.substring(6, 9);
								if (numero.length > 9) {
									numeroFormatado += '-' + numero.substring(9, 11);
								}
								}
								}
								} else { // CNPJ
								numeroFormatado = numero.substring(0, 2);
								if (numero.length > 2) {
								numeroFormatado += '.' + numero.substring(2, 5);
								if (numero.length > 5) {
								numeroFormatado += '.' + numero.substring(5, 8);
								if (numero.length > 8) {
									numeroFormatado += '/' + numero.substring(8, 12);
									if (numero.length > 12) {
										numeroFormatado += '-' + numero.substring(12, 14);
									}
								}
								}
								}
								}
								event.target.value = numeroFormatado;
								});
								</script>

</body>

</html>