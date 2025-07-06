<?php
	include_once('conecta.php');
		
	session_start();
	if(!isset($_SESSION['login']) == true)
	{
		unset($_SESSION['Login.php']);

		header('Location: Login.php');
	}

	$logado = $_SESSION['login'];

	$sql = "SELECT * FROM usuario WHERE login = '$logado'";
	$buscar = mysqli_query($connection, $sql);
	$dados = mysqli_fetch_array($buscar);

	$id = $dados['id'];
	$usuario = $dados['login'];
	$senha = $dados['senha'];
	$niveluser = $dados['permissao'];
	
	// Session para uso no adiciona emprestimo.
	$_SESSION['idUsuario'] = $id;
	
	?>
	<!DOCTYPE html>
	<html>
	<title>Biblioteca Carlos Corrêa Loyola.</title>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/loja.css" rel="stylesheet">
	</head>

	<body>
		<header>

			<ul class="nav nav-tabs">
				<li role="presentation" class="active"><a href="Index.php">Biblioteca Carlos Corrêa Loyola.</a></li>
				<STYLE TYPE="text/css">
					BODY {background-image: url(fotoBackground.jpg); background-repeat: no-repeat; }
				</STYLE>
				<?php
				if ($niveluser == 'A') { ?>
						<li role="presentation"><a href="cadLivro.php">Cadastrar livros.</a></li>
						<li role="presentation"><a href="listLivro.php">Lista  de livros.</a></li>
						<li role="presentation"><a href="cadUsuario.php">Cadastrar usuários.</a></li>
						<li role="presentation"><a href="listUsuario.php">Lista de usuários.</a></li>
						<li role="presentation"><a href="busca-livro.php">Buscar livros.</a></li>
						<?php } ?>
				<?php
				if ($niveluser == 'C') { ?>
					<li role="presentation"><a href="listLivro.php">Lista de livros.</a></li>
					<li role="presentation"><a href="busca-livro.php">Buscar livros.</a></li>
				<?php } ?>
				
				<form action="Logout.php" method="POST">
					<div class="card-footer py-0">
						<button type="submit" name="logout_btn" class="btn btn-danger">Deslogar</button>
					</div>
				</form>
			</ul>
		</header>
		<div class="container">
			<div class="principal">
