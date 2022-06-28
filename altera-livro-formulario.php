<?php
require_once("cabecalho.php");
require_once("conecta.php");
require_once("banco-livraria.php");

$id = $_GET['id'];
$livro = buscaLivro($connection, $id);
?>

<form action="altera-livro.php" method="POST" class="form-horizontal">
<div class="container" style="margin-top: 10px;">
	<div class="form-group">
		<label for="inputName" class="col-sm-2 control-label">Nome do livro</label>
		<div class="col-sm-10">
			<?php

			include('conecta.php');
			$query = "SELECT * FROM livro WHERE id= $id ";
			$buscar = mysqli_query($connection, $query);
			while ($dados = mysqli_fetch_array($buscar)) {

				$id = $dados['id'];
				$nomeLivro = $dados['nomeLivro'];
				$nomeAutor = $dados['nomeAutor'];
				$fotoCapa = $dados['fotoCapa'];
				$editora = $dados['editora'];
				$isbm = $dados['ISBM'];
			}

			?>
			<input type="hidden" name="nome" ">
			<input type=" text" class="form-control" id="inputName" name="nomeLivro" placeholder="Nome do Livro" value="<?php echo $nomeLivro ?>">
		</div>
	</div>

	<div class="form-group">
		<input type="hidden">
		<div class="col-sm-10">
			<input type="hidden" class="form-control" id="inputId" name="id" placeholder="ID" value="<?php echo $id ?>">
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<input type="hidden" id="id">
				<label for="inputName" class="col-sm-2 control-label">Nome do Autor</label>
				<input type="text" class="form-control" id="inputName" name="nomeAutor" placeholder="Nome do Livro" value="<?php echo $nomeAutor ?>">
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for="inputName" class="col-sm-2 control-label">ISBM</label>
		<div class="col-sm-10">

			<input type="text" class="form-control" id="inputName" name="ISBM" placeholder="Número do ISBM" value="<?php echo $isbm ?>">
		</div>
	</div>

	<div class="form-group">
		<label for="inputName" class="col-sm-2 control-label">Editora</label>
		<div class="col-sm-10">

			<input type="text" class="form-control" id="inputName" name="editora" placeholder="Nome do Livro" value="<?php echo $editora ?>">
		</div>
	</div>

	<div class="row">
		<div class="mb-3">
			<label class="form-label">Foto da Capa</label>
			<input type="file" class="form-control" name="fotoCapa">
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Alterar livro</button>
		</div>
	</div>
</form>
<?php require_once("rodape.php"); ?>