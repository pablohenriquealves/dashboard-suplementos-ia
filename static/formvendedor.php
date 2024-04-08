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
                                    placeholder="Nome do vendedor">
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
                                <label for="cpfcnpj" class="form-label">CPF</label>
                                <input 
                                    type="text" 
                                    class="form-control"
                                    name="cpf"
                                    id="cpf"
                                    placeholder="CPF do vendedor"/>
                            </div>
                        </div>
                    </div>
                    <!-- Botão para cadastrar -->
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
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