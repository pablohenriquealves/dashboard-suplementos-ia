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
				<form action="cadastroproduto.php" method="post">
					<div class="container">

						<h1 class="h3 mb-3">Cadastro do Produto</h1>

						<div class="row">
							<div class="mb-3 col-6">
								<label for="nomeproduto" class="form-label">Nome do Produto</label>
								<input type="text" class="form-control" name="nomeproduto" id="nomeproduto" placeholder="Nome do produto">
							</div>

							<div class="mb-3 col-6">
								<label for="descricao" class="form-label">Descrição</label>
								<input type="descricao" class="form-control" name="descricao" id="descricao" placeholder="Descrição do produto">
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-6">
								<label for="estoque" class="form-label">Quantidade em Estoque</label>
								<input type="number" class="form-control" name="estoque" id="estoque"placeholder="Quantidade em estoque">
							</div>

							<div class="mb-3 col-6">
								<label for="fornecedor" class="form-label">Fornecedor</label>
								<input type="text" class="form-control" name="fornecedor" id="fornecedor" placeholder="Nome do Fornecedor" />
							</div>
					
						</div>

						<div class="row">
						    <div class="mb-3 col-6">
								<label for="cnpjfornecedor" class="form-label">CNPJ do Fornecedor</label>
								<input type="cep" class="form-control" name="cnpjfornecedor" id="cnpjfornecedor" placeholder="Digite o CNPJ do fornecedor" />
							</div>
							<div class="mb-3 col-6">
								<label for="preco" class="form-label">Preço</label>
								<input type="text" class="form-control" name="preco" id="preco" placeholder="Digite o preco do produto">
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