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
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
			</main>

			<footer class="footer">
    			<?php include 'footer.php' ?>				
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>