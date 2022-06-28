<!DOCTYPE html>
<html>
<head>
	<title>Biblioteca Carlos Corrêa Loyola.</title>
	<meta charset="UTF-8">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/biblioteca.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class="principal">
			<h1>Bem vindo à Biblioteca Carlos Corrêa Loyola.</h1>

			<h4>Para usar o sistema faça o login.</h4>
			<form role="form" action="verificar_usuario.php" method="post" class="form-horizontal">
				<?php
				include 'conecta.php';
				if (isset($_GET['msg'])) {
					switch ($_GET['msg']) {
						case 1: ?>
							<div class="alert alert-danger" role="alert">
								Sua senha está errada!
							</div>
						<?php break;
						case 2: ?>
							<div class="alert alert-danger" role="alert">
								Seu Usuário não cadastrado.
							</div>
				<?php break;
					}
				}
				?>
				<div class="form-group">
					<label for="Login" class="col-sm-2 control-label">Login:</label>
					<div class="col-sm-10">
						<input type="login" class="form-control" id="Login" placeholder="Digite seu login..." name="login">
					</div>
				</div>
				<div class="form-group">
					<label for="Password" class="col-sm-2 control-label">Senha:</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="Password" placeholder="Digite sua senha..." name="senha">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Logar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>