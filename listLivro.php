<?php 
	require_once("Cabecalho.php"); 
	require_once("conecta.php");
	require_once("banco-livraria.php");
?>

	<?php if ($niveluser == 'A' or $niveluser == 'C') { ?>
<?php 
	if(array_key_exists("removido", $_GET) && $_GET == true){ ?>
		<div class="alert alert-success" role="alert">Livro Removido com sucesso.</div>
	<?php } ?>
	<table class="table table-striped table-bordered">
		<tr>
			<td><b>Nome do Livro</b></td>
			<td><b>Nome do Autor</b></td>
			<td><b>Foto da Capa</b></td>
			<td><b>Editora</b></td>
			<td><b>ISBM</b></td>
			<?php if ($niveluser == 'A') { ?>
			<td><b>Alterar</b></td>
			<td><b>Deletar</b></td>
			<?php } ?>
			<?php
            	if ($niveluser == 3) { ?>
			<td>Alterar</td>
			<?php } ?>
			<?php
            	if ($niveluser == 3) { ?>
			<td>Deletar</td>
			<?php } ?>
		</tr>
<?php
	$livro = listaLivro($connection);
	foreach($livro as $l){ ?>
	
		<tr>
			<td><?=$l['nomeLivro']; ?></td>
			<td><?=$l['nomeAutor']; ?></td>
			<td><?=$l['fotoCapa']; ?></td>
			<td><?=$l['editora']; ?></td>
			<td><?=$l['ISBM']; ?></td>
			<?php
            	if ($niveluser == 'A') { ?>
			<td><a class="btn btn-default" href="altera-livro-formulario.php?id=<?=$l['id']?>">Alterar</a></td>
			<?php } ?>
			<?php
            	if ($niveluser == 'A') { ?>
			<td>
				<form action="remove-livro.php" method="post" >
					<input type="hidden" name="id" value="<?=$l['id']?>">
					<button type="submit" class="btn btn-danger">Deletar</button>
				</form>
			</td>
			<?php } ?>
		</tr>
	<?php } ?>
</table>

<?php }else{ ?>
 		<div class="alert alert-danger" role="alert">Para usar esta funcionalidade você precisa estar logado.</div>
 	<?php } ?>

<?php require_once("rodape.php"); ?>
