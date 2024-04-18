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
				<form action="cadastrocliente.php" method="post"  enctype="multipart/form-data">
					<div class="container-fluid p-0">

						<h1 class="h3 mb-3">Cadastro do Cliente</h1>

						<div class="row">
							<div class="mb-3 col-6">
								<label for="nome" class="form-label">Nome</label>
								<input 
								type="text" 
								class="form-control"
								name="nome"
								id="nome"
								placeholder="Nome do cliente">
							</div>
				
							<div class="mb-3 col-6">
								<label for="email" class="form-label">E-mail</label>
								<input 
								type="email" 
								class="form-control"
								name="email"
								id="email"
								placeholder="cliente@mail.com.br"/>
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
								placeholder="(99) 9 9999-9999">
							</div>
				
							<div class="mb-3 col-4">
								<label for="cpfcnpj" class="form-label">CPF/CNPJ</label>
								<input 
								type="text" 
								class="form-control"
								name="cpfcnpj"
								id="cpfcnpj"
								placeholder="CPF do cliente"/>
							</div>

							<div class="mb-3 col-4">
								<label for="cep" class="form-label">CEP</label>
								<input 
								type="text" 
								class="form-control"
								name="cep"
								id="cep"
								placeholder="CEP"/>
							</div>
						</div>

						<div class="row">
							<div class="mb-3 col-4">
								<label for="logradouro" class="form-label">Logradouro</label>
								<input 
								type="text" 
								class="form-control"
								name="logradouro"
								id="logradouro"
								placeholder="Endereço do cliente">
							</div>
				
							<div class="mb-3 col-4">
								<label for="numero" class="form-label">Nº</label>
								<input 
								type="text" 
								class="form-control"
								name="numero"
								id="numero"
								placeholder="Número"/>
							</div>

							<div class="mb-3 col-4">
								<label for="complemento" class="form-label">Complemento</label>
								<input 
								type="text" 
								class="form-control"
								name="complemento"
								id="complemento"
								placeholder="Complemento"/>
							</div>
							
						</div>
						<div class="mb-3 col-4">
							<label for="imagem" class="form-label">Logo/Imagem pessoal</label>
							<input
								type="file"
								class="form-control"
								name="imagem"
								id="imagem"
								placeholder="Insira sua imagem"/>
						</div>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
				

			<div class="main">
				<div
					class="table-responsive"
				>
					<table class="table table-bordered">
						<thead>
							<tr><th colspan="7" style="text-align: center;">Clientes cadastrados</th></tr>
							<tr class="text-center">
							<th scope="col">Foto</th>
								<th scope="col">Nome do cliente</th>
								<th scope="col">Email</th>
								<th scope="col">Telefone</th>
								<th scope="col">CPF / CNPJ</th>
								<th scope="col">CEP</th>
								<th scope="col">Editar</th>
							</tr>
						</thead>
						<tbody>
							<?php include 'conexao.php';

							$sql = "SELECT * FROM cliente";
							$busca = mysqli_query($conexao, $sql);

							while ($dados = mysqli_fetch_array($busca)){
								$id = $dados['id'];
								$imagem = $dados['arquivo'];
								$nome = $dados['nome'];
								$email = $dados['email'];
								$telefone = $dados['telefone'];
								$cpfcnpj = $dados['cpfcnpj'];
								$cep = $dados['cep'];
							
							?>

								<tr class="text-center">
								<td><img src="<?php echo $imagem ?>" width="100px" height="100%" class="rounded-circle"></td>
									<td><?php echo $nome ?></td>
									<td><?php echo $email ?></td>
									<td><?php echo $telefone ?></td>
									<td><?php echo $cpfcnpj ?></td>
									<td><?php echo $cep ?></td>
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
								type="text"
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
	<form action="excluirVendedor.php" method="POST">
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