
<?php 
	require_once("cabecalho.php");
	require_once("conecta.php");
	require_once("banco-livraria.php");
	
	$idUsuario = $_SESSION['idUsuario'];
	$idLivro = $_SESSION['idLivro'];
		
	if (insereEmprestimo($connection, $idLivro, $idUsuario)){ ?>
		<div class="alert alert-success" role="alert">Empréstimo enviado para validação.</div>
		<form action="index.php" method="POST"> 
				<div class="card-footer py-0">
					<button type="submit" name="index_btn" class="btn btn-success">Voltar</button>
				</div>
				</form>
<?php } 
	else 
	{
		$msg = mysqli_error($connection);
	?> 
		<div class="alert alert-danger" role="alert">Erro no envio de solicitação de empréstimo.</div>
		<form action="index.php" method="POST"> 
				<div class="card-footer py-0">
					<button type="submit" name="index_btn" class="btn btn-danger">Voltar</button>
				</div>
				</form>
		<?php } ?>

<?php 
    require_once("rodape.php"); ?>
?>