<?php 
	require_once("cabecalho.php"); 
	require_once("conecta.php");
	require_once("banco-livraria.php");

	$id = $_POST['id'];
	
	removeUsuario($connection, $id);
	header("Location:listUsuario.php?removido=true");
	die();
?>

<?php 
	require_once("rodape.php"); 
?>