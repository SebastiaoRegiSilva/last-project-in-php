<?php
	require_once("Cabecalho.php");
	require_once("Conecta.php");
	require_once("banco-livraria.php");
	include 'script/password.php';

	$id = $_POST['id'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$permissao = $_POST['permissao'];
?>

<!DOCTYPE html>
<html>
<?php
if ($permissao == 'A') { ?>
	<body>
		<div class="container-fluid mt--7">
			<div class="row">
				<div class="col">
					<div class="card shadow">
						<div class="card-header border-1">
							<h3 class="mb-0">STATUS USUÁRIO </h3>
						</div>
						<div class="container" style="margin-top: 10px">
							<?php
							include 'conecta.php';
							var_dump($login);
							var_dump($senha);
							var_dump($permissao);
							$atualizar = "UPDATE usuario SET login='$login',senha='$senha',permissao='$permissao' WHERE id='$id' ";
							$inserir = mysqli_query($connection, $atualizar);
							$testeAlteracao = mysqli_affected_rows($connection);
							if ($testeAlteracao == 1) { ?>
								<center>
									<div id='aprovado' style="width: 200px; height: 200px"></div>
									<h4>Aprovado</h4>
									<a href="listUsuario.php" role='button' class="btn btn-primary"> Voltar </a>
								</center>
							<?php	} else { ?>
								<center>
									<div id='erro' style="width: 200px; height: 200px"></div>
									<h4>Reprovado</h4>
									<a href="listaUsuario.php" role='button' class="btn btn-primary"> Voltar </a>
								</center>
							<?php }
							?>
						</div>
						<div class="card-footer py-4">
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
		<script src="animacoes/bodymovin.js"></script>
		<script type="text/javascript">
			var svgContainer = document.getElementById('erro');
			var animItem = bodymovin.loadAnimation({
				wrapper: svgContainer,
				animType: 'svg',
				loop: true,
				autoplay: true,
				path: 'animacoes/error2.json'
			});
		</script>
		<script type="text/javascript">
			var svgContainer = document.getElementById('aprovado');
			var animItem = bodymovin.loadAnimation({
				wrapper: svgContainer,
				animType: 'svg',
				loop: true,
				autoplay: true,
				path: 'animacoes/aprovado2.json'
			});
		</script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>