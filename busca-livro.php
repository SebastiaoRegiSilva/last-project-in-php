<?php 
	require_once("Cabecalho.php"); 
	require_once("Conecta.php");
	require_once("banco-livraria.php");

	$resultado = searchLivro($connection, $nome = "");
	
	if($resultado){ ?>
		<h2>Livros para empréstimo.</h2>
		<h4>Seja o primeiro a solicitar o empréstimo de um livro que gostou!</h4>
		<table class="table table-striped table-bordered">
		<tr>
			<td><b>Nome do livro.</b></td>
			<td><b>Nome do autor.</b></td>
			<?php if ($niveluser == 'C'){ ?><td><b>Solicitar empréstimo.</b></td><?php } ?>
		</tr>

<?php
	
	foreach($resultado as $l)
	{ ?>
		<tr>
			<td><?=$l['nomeLivro']; ?></td>
			<td><?=$l['nomeAutor']; ?></td>
			<td>
			<?php
			if ($niveluser == 'C') { ?>
				<form action="adiciona-emprestimo.php" method="post">
					<input type="hidden" value="<?=$l['id']?>" name="id">
					<!-- // Session para usar no adiciona empréstimo. -->
					<?php $_SESSION['idLivro'] = $l['id'] ?>
					<button type="submit" class="btn btn-default">Solicitar</button>
				</form>
		<?php } ?>
			</td>
		</tr>
	<?php } ?>
	</table>

	<?php }
	else 
	{ ?>
		<div class="alert alert-danger" role="alert">Não foi encontrado nenhum livro.</div>
	<?php } ?>

<?php require_once("rodape.php"); ?>