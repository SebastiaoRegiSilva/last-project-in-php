<?php
	require_once("cabecalho.php");
	require_once("conecta.php");
	require_once("banco-livraria.php");

	$nome = $_POST['nome'];
	$senha = $_POST['senha'];
	$nivel = $_POST['nivel'];
	$telefone = $_POST['telefone'];

	if(alterarUsuario($connection, $id, $nome, $senha, $nivel, $telefone)){ ?>
		<div class="alert alert-success" role="alert">Usuário <?=$nome;?> cadastrado com sucesso.</div>

	<?php }else { 
		$msg = mysqli_error($connection);
	?>
		<div class="alert alert-danger" role="alert">Usuário <?=$nome;?> não foi cadastrado <?=$msg;?>.</div>
	<?php } ?>


<?php require_once("rodape.php"); ?>