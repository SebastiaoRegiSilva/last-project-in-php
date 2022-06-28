<?php 
	require_once("LogicaUsuario.php"); 
	require_once('C:\xampp\htdocs\last-project-in-php\controller\UsuarioController.php');
		
	var_dump($_SESSION['usuario_logado']);
	if (isset($_SESSION['usuario_logado'])) 
	{
		// Usuário recuperado com pela session.
		$usuario = $_SESSION['usuario_logado'];
		
		$nivelPermissao = $usuario->getPermissao();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/loja.css" rel="stylesheet">
	</head>
	<body>
	<header>
			<ul class="nav nav-tabs">
				<li role="presentation" class="active"><a href="Index.php">Biblioteca Carlos Corrêa Loyola.</a></li>
				<?php
            	if ($nivelPermissao == 'A') 
				{ ?>
					<li role="presentation"><a href="view\cadLivro.php">Cadastrar de Livros.</a></li>
					<li role="presentation"><a href="view\listLivro.php">Lista Livros.</a></li>
					<li role="presentation"><a href="view\cadUsuario.php">Cadastrar de Usuários.</a></li>
					<li role="presentation"><a href="view\listUsuario.php">Lista Usuários.</a></li>
					<li role="presentation"><a href="view\formEmprestimo.php">Empréstimo.</a></li>	
				<?php 
				}
				elseif ($nivelPermissao == 'C') 
				{ ?>
					<li role="presentation"><a href="view\listLivro.php">Lista Livros.</a></li>
					<li role="presentation"><a href="view\formEmprestimo.php">Solicitar Empréstimo.</a></li>
				<?php 
				} ?>
				
				<?php if(usuarioEstaLogado())
				{ ?>
					<li role="presentation"><a href="Logout.php">Deslogar <?=usuarioLogado();?></a><li>
				<?php 
				}?>>
			</ul>
		</header>
