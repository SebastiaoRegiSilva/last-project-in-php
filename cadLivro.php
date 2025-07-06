<?php
include_once('conecta.php');
require_once('Cabecalho.php');
?>

<?php
if ($niveluser == 'A') { ?>
	<form action="adiciona-livro.php" method="post" class="form-horizontal">

		<div class="container" style="margin-top: 10px;">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nome do livro</label>
						<input type="text" class="form-control form-control-alternative" placeholder="Nome do livro..." name="nomeLivro" required="yes" autocomplete="off">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Nome do autor</label>
						<input type="text" class="form-control form-control-alternative" placeholder="Nome do autor..." name="nomeAutor" required="yes" autocomplete="off">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Editora</label>
						<input name="editora" class="form-control" placeholder="Digite o nome da editora.." require="yes"></input>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>ISBM</label>
						<input name="isbm" class="form-control" placeholder="Digite o ISBM do livro..."></input>
					</div>
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
					<div style="text-align: left">
						<button type="submit" class="btn btn-default">Cadastrar livro</button>
					</div>
				</div>
			</div>
	</form>
	</div>

<?php } ?>

<?php
if ($niveluser != 'A') { ?>
	<div class="alert alert-danger" role="alert">Para usar esta funcionalidade você precisa ser administrador.</div>
<?php } ?>

<?php require_once("rodape.php"); ?>
