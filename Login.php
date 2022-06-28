<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/loja.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Biblioteca Carlos Corrêa Loyola.</title>
</head>

<body>
	<div class="container">
		<div class="principal">
			<h1>Sejam bem-vindos à Biblioteca Carlos Corrêa Loyola.</h1>

			<h4>Confira todos os nossos exemplares cadastrados e venha para o clube da leitura!.</h4>
			<form role="form" action="LogicaUsuario.php" method="post" class="form-horizontal">
				<?php
				include 'Conexao.php';
				if (isset($_GET['msg'])) 
				{
					switch ($_GET['msg']) 
					{
						case 1: ?>
							<div class="alert alert-danger" role="alert">
								Senha incorreta, por favor digite novamente!
							</div>
						<?php break;
						case 2: ?>
							<div class="alert alert-danger" role="alert">
								Usuário não encontrado!
							</div>
				<?php break;
					}
				}
				?>
				<div class="form-group">
					<label for="Login" class="col-sm-2 control-label">Login:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="Login" placeholder="Digite seu login:" name="login">
					</div>
				</div>
				<div class="form-group">
					<label for="Password" class="col-sm-2 control-label">Senha</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="Password" placeholder="Digite sua senha" name="senha">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Logar</button>
					</div>
				</div>
			</form>
</body>
</html>