<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script language="JavaScript" type="text/javascript" src="funcs.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.js"></script>
</head>
<section class="vh-100 gradient-custom">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col-12 col-md-8 col-lg-6 col-xl-5">
				<div class="card text-white" style="border-radius: 1rem;">
					<div class="card-body text-center">
						<form method="post" name="form" AUTOCOMPLETE='ON' onSubmit="return valida()">
							<img src="/wp-content/themes/generatepress/assets/img/img_assinatura.png"
								alt="imagem prefeitura" class="naoselecionar">
							<p class="texto-ass font-weight-bold mb-5 pt-4">Assinatura de E-mail</p>
							<div class="form-group mb-4">
								<span style="display: none;" id="erro_login">Seu login ou senha estão incorretos</span>
							</div>
							<div class="form-group mb-4">
								<label for="usuario">Usuário de rede:</label>
								<input type="text" name="usuario" id="usuario" class="form-control form-control-lg" required/>
							</div>

							<div class="form-outline form-white mb-4">
								<label class="form-label" for="typePasswordX">Senha de rede:</label>
								<input type="password" name="senha" id="senha" maxlength="30"
									class="form-control form-control-lg" required/>
							</div>
							<button class="btn btn-primary btn-lg px-5" id="bnt_entrar" name="bnt_entrar"
								type="submit">Entrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">

	const inputUsuario = document.getElementById('user');
	const inputSenha = document.getElementById('pass');
	const bntEntrar = document.getElementById('bnt_entrar');

	document.addEventListener('input', () => {
		const tamanhoInputUser = inputUsuario.value.length;
		const tamanhoInputSenha = inputSenha.value.length;

		const inputValidoUser = tamanhoInputUser > 5;
		const inputValidoSenha = tamanhoInputSenha > 5;

		if (inputValidoUser && inputValidoSenha) {
			bntEntrar.removeAttribute('disabled');
			bntEntrar.removeAttribute('data-tooltip');
			return;
		}

		bntEntrar.setAttribute('disabled', true);
	});

	$(document).ready(function () {
		const inputUsuario = document.getElementById('user');
		const inputSenha = document.getElementById('pass');
		const bntEntrar = document.getElementById('bnt_entrar');

		const tamanhoInputUser = inputUsuario.value.length;
		const tamanhoInputSenha = inputSenha.value.length;

		const inputValidoUser = tamanhoInputUser > 5;
		const inputValidoSenha = tamanhoInputSenha > 5;

		if (inputValidoUser && inputValidoSenha) {
			bntEntrar.setAttribute('disabled', false);
		} else {
			bntEntrar.setAttribute('disabled', true);
		}
	});
</script>

</body>

</html>