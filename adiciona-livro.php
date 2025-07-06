<?php 
	require_once("Cabecalho.php");
	require_once("conecta.php");
	require_once("banco-livraria.php");

	$livro = $_POST['nomeLivro'];
	$autor = $_POST['nomeAutor'];
	$fotoCapa = $_POST['fotoCapa'];
	$editora = $_POST['editora'];
	$isbm = $_POST['isbm'];

	if (insereLivro($connection, $livro, $autor, $fotoCapa, $editora, $isbm)){ ?>
		<div class="alert alert-success" role="alert">Livro <?=$livro;?> foi cadastrado com sucesso.</div>
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
		<div class="alert alert-danger" role="alert">Livro <?=$livro;?> não foi cadastrado <?=$msg;?>.</div>
		<form action="index.php" method="POST"> 
				<div class="card-footer py-0">
					<button type="submit" name="index_btn" class="btn btn-danger">Voltar</button>
				</div>
				</form>
		<?php } ?>

<?php require_once("rodape.php"); ?>
