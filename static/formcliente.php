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
				<form action="cadastrocliente.php" method="post">
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
								placeholder="mail@mail.com.br"/>
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
								type="cpfcnpj" 
								class="form-control"
								name="cpfcnpj"
								id="cpfcnpj"
								placeholder="CPF do cliente"/>
							</div>

							<div class="mb-3 col-4">
								<label for="cep" class="form-label">CEP</label>
								<input 
								type="cep" 
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
								placeholder="Complemento"/>
							</div>
						</div>

						

					</div>
				</form>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="https://adminkit.io/"
									target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted"
									href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin
										Template</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>