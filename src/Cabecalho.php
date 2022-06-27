<?php 
	include_once('C:\xampp\htdocs\last-project-in-php\src\controller\UsuarioController.php');
	
	session_start();
	// Usuário recuperado com pela session.
	$usuario = $_SESSION['userLogin'];
    
    $nivelPermissao = $usuario->getPermissao();
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
				<li role="presentation" class="active"><a href="../src\Index.php">Biblioteca Carlos Corrêa Loyola.</a></li>
				<?php
            	if ($nivelPermissao == 'A') 
				{ ?>
					<li role="presentation"><a href="../src\view\cadLivro.php">Cadastrar de Livros.</a></li>
					<li role="presentation"><a href="../src\view\listLivro.php">Lista Livros.</a></li>
					<li role="presentation"><a href="../src\view\cadUsuario.php">Cadastrar de Usuários.</a></li>
					<li role="presentation"><a href="../src\view\listUsuario.php">Lista Usuários.</a></li>
					<li role="presentation"><a href="../src\view\formEmprestimo.php">Empréstimo.</a></li>	
				<?php 
				}
				elseif ($nivelPermissao == 'C') 
				{ ?>
					<li role="presentation"><a href="../src\view\listLivro.php">Lista Livros.</a></li>
					<li role="presentation"><a href="../src\view\formEmprestimo.php">Solicitar Empréstimo.</a></li>
				<?php 
				} ?>
				
				<form action="../Logout.php" method="POST"> 
				<div class="card-footer py-0">
					<button type="submit" name="logout_btn" class="btn btn-danger">Deslogar</button>
				</div>
				</form>
				
			</ul>
		</header>
		<div class="container">
			<div class="principal">
			</div>
		</div>
	</body>
</html>