
<!-- <script>
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
</script> -->

<script src="js/bootstrap-multiselect.js"></script>

<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								<a class="text-muted" href="index.php" target="_blank"><strong>SuplementosIA</strong></a> - <a class="text-muted" href="index.php" target="_blank"><strong>Todos os direitos reservados</strong></a>								&copy;
							</p>
						</div>
						<div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Suporte</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Centro de Ajuda</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacidade</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Termos</a>
								</li>
							</ul>
						</div>
					</div>
				</div>