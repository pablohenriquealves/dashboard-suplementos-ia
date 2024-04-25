
<div class="main">
			

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Dashboard</strong> de Análise</h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Vendas</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">2.382</h1>
												<div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
													<span class="text-muted">Desde a semana passada</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Visitantes</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">14.212</h1>
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
													<span class="text-muted">Desde a semana passada</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Lucros</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">R$21.300</h1>
												<div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
													<span class="text-muted">Desde a semana passada</span>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Pedidos</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">64</h1>
												<div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
													<span class="text-muted">Desde a semana passada</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
    <div class="card flex-fill w-100">
        <div class="card-header">
            <h5 class="card-title mb-0">Vendas Recentes</h5>
        </div>

        <div class="card-body py-3">
		<div class="overflow-auto" style="max-height: 300px;">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th class="col-4" scope="col">Nome do Cliente</th>
                                <th scope="col">Nº Pedido</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php include 'conexao.php';

							$sql = "SELECT p.id_pedidos, c.nome AS nomeCliente, p.produto, p.valor, pr.nomeproduto, pr.id
							FROM pedidos p
							INNER JOIN cliente c ON p.nomeCliente = c.id
							INNER JOIN produtos pr ON p.produto = pr.id";							
							$busca = mysqli_query($conexao, $sql);
							
														while ($dados = mysqli_fetch_array($busca)){
															$id = $dados['id_pedidos'];
															$nome = $dados['nomeCliente'];
															$produto = $dados['nomeproduto'];
															$valor = $dados['valor'];
													
														?>

                                <tr class="text-center">
                                    <td><?php echo $nome ?></td>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $valor ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
					
                </div>
			</div>
			<div class="card-footer mt-auto">
    <a href="formpedidos.php" style="text-decoration: none; color: white; display: block;">
        <button class="btn btn-primary w-100" type="button">Ver todas as vendas</button>
    </a>
</div>
		</div>
</div>

					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex align-items-stretch"> <!-- Adicionei a classe "align-items-stretch" aqui -->
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Últimos Produtos Cadastrados</h5>
            </div>
            <div class="overflow-auto" style="max-height: 350px;">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col"></th>
                            <th scope="col">Nome</th>
                            <th scope="col">Estoque</th>
                            <th scope="col">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'conexao.php';
                        $sql = "SELECT * FROM produtos";
                        $busca = mysqli_query($conexao, $sql);

                        while ($dados = mysqli_fetch_array($busca)) {
                            $id = $dados['id'];
                            $imagem = $dados['arquivo'];
                            $nome = $dados['nomeproduto'];
                            $estoque = $dados['estoque'];
                            $preco = $dados['preco'];

                        ?>
                            <tr class="text-center">
                                <td><img src="<?php echo $imagem ?>" width="40px" height="100%"></td>
                                <td><?php echo $nome ?></td>
                                <td><?php echo $estoque ?></td>
                                <td><?php echo $preco ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
			<div class="card-footer mt-auto">
    <a href="formproduto.php" style="text-decoration: none; color: white; display: block;">
        <button class="btn btn-primary w-100" type="button">Ver todos os produtos</button>
    </a>
</div>
        </div>
    </div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<h5 class="card-title mb-0">Vendedores do Mês</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
									<div class="overflow-auto" style="max-height: 350px;">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'conexao.php';
                        $sql = "SELECT * FROM vendedor";
                        $busca = mysqli_query($conexao, $sql);

                        while ($dados = mysqli_fetch_array($busca)) {
                            $id = $dados['id'];
                            $nome = $dados['nome'];                   

                        ?>
                            <tr class="text-center">
                                <td><?php echo $nome ?></td>
                                               </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>













									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>