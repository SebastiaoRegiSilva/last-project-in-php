<?php
require_once("Cabecalho.php");
require_once("Conecta.php");
require_once("banco-livraria.php");
?>

<?php
if ($niveluser == 'A' or $niveluser == 'C') { ?>
	<h2>Buscar Livros</h2>
	<form action="busca-livro.php" method="post" class="form-horizontal">
		<div class="form-group">
			<label for="inputName" class="col-sm-2 control-label">Nome do livro</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputName" name="nomeLivro" placeholder="Digite o nome do livro que você deseja encontrar.">
			</div>
		</div>
		<br />
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Buscar livro</button>
			</div>
		</div>
	</form>

<?php } else { ?>
	<div class="alert alert-danger" role="alert">Para usar esta funcionalidade você precisa estar cadastrado.</div>
<?php } ?>

<?php require_once("rodape.php"); ?>