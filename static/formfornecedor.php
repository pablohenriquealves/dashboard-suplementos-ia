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
				<form action="cadastrofornecedor.php" method="post">
					<div class="container-fluid p-0">

						<h1 class="h3 mb-3">Cadastro de Fornecedor</h1>

						<div class="row">
							<div class="mb-3 col-6">
								<label for="nome" class="form-label">Nome</label>
								<input 
								type="text" 
								class="form-control"
								name="nome"
								id="nome"
								placeholder="Nome do Fornecedor">
							</div>
				
							<div class="mb-3 col-6">
								<label for="email" class="form-label">E-mail</label>
								<input 
								type="email" 
								class="form-control"
								name="email"
								id="email"
								placeholder="fornecedor@mail.com.br"/>
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-4">
								<label for="telefone" class="form-label">Telefone</label>
								<input maxlength="16"
								type="text" 
								class="form-control"
								name="telefone"
								id="telefone"
								placeholder="(85) 9 9999-9999">
							</div>
				
							<div class="mb-3 col-4">
								<label for="cpfcnpj" class="form-label">CNPJ</label>
								<input maxlength="18"
								type="cpfcnpj" 
								class="form-control"
								name="cpfcnpj"
								id="cpfcnpj"
								placeholder="CNPJ do Fornecedor"/>
							</div>

							<div class="mb-3 col-4">
								<label for="cep" class="form-label">CEP</label>
								<input maxlength="9"
								type="cep" 
								class="form-control"
								name="cep"
								id="cep"
								placeholder="Insira o CEP"/>
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
								placeholder="Endereço do Fornecedor">
							</div>
				
							<div class="mb-3 col-4">
								<label for="numero" class="form-label">Nº</label>
								<input 
								type="numero" 
								class="form-control"
								name="numero"
								id="numero"
								placeholder="Número"/>
							</div>

							<div class="mb-3 col-4">
								<label for="complemento" class="form-label">Complemento</label>
								<input 
								type="complemento" 
								class="form-control"
								name="complemento"
								id="complemento"
								placeholder=""/>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</div>
				</form>
					<br>
				

				
			<div class="main">
				<div
					class="table-responsive overflow-auto"
				>
					<table
						class="table table-bordered"
					>
						<thead>
						<tr><th colspan="7" style="text-align: center;">Fornecedores Cadastrados</th></tr>
							<tr class="text-center">
								<th class="col-2" scope="col">Nome</th>
								<th  class="col-2" colspanscope="col">E-mail</th>
								<th scope="col">Telefone</th>
								<th scope="col">CNPJ</th>
								<th scope="col">CEP</th>
								<th scope="col">Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php include 'conexao.php';

							$sql = "SELECT * FROM fornecedor";
							$busca = mysqli_query($conexao, $sql);

							while ($dados = mysqli_fetch_array($busca)){
								$nome = $dados['nome'];
								$email = $dados['email'];
								$telefone = $dados['telefone'];
								$cpfcnpj = $dados['cpfcnpj'];
								$cep = $dados['cep'];
								$id = $dados['id'];
						
							?>

								<tr class="text-center">
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
																	Editar Cadastro do Fornecedor 
																	 <?php echo $nome ?>
																</h5>
																<button
																	type="button"
																	class="btn-close"
																	data-bs-dismiss="modal"
																	aria-label="Close"></button>
															</div>

															<div class="modal-body">
																<form action="atualizarFornecedor.php" method="POST">
                                                                    
																	<input type="hidden" name="id" value="<?php echo $id; ?>">
																<div class="container-fluid p-0">

					<h3 class="h3 mb-3">Dados do Fornecedor</h3>

					<div class="row">
						<div class="mb-3 col-12">
							<label for="nome" class="form-label">Nome</label>
							<input
								type="text"
								class="form-control"
								name="nome"
								id="nome"
								placeholder="Digite o nome do fornecedor"/>
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
							<input maxlength="16"
								type="text"
								class="form-control"
								name="telefone"
								id="telefone"
								placeholder="Digite o telefone"/>
						</div>
						<div class="mb-3 col-12">
							<label for="cpfcnpj" class="form-label">CNPJ</label>
							<input	maxlength="18"
								type="text"
								class="form-control"
								name="cpfcnpj"
								id="cpfcnpj"
								placeholder="Digite o CNPJ" required/>
						</div>
						<div class="mb-3 col-12">
							<label for="cep" class="form-label">CEP</label>
							<input
								type="text"
								class="form-control"
								name="cep"
								id="cep"
								placeholder="Digite o CEP" required/>
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
	<form action="excluirFornecedor.php" method="POST">
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
																<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
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

// Formata o CEP
const cepInput = document.getElementById('cep');
cepInput.addEventListener('input', function (event) {
const cep = event.target.value.replace(/\D/g, '');
let cepFormatado = '';
if (cep.length > 0) {
    cepFormatado = cep.substring(0, 5);
    if (cep.length > 5) {
        cepFormatado += '-' + cep.substring(5, 8);
    }
}
event.target.value = cepFormatado;
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