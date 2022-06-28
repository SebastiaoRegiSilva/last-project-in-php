<?php
require_once("cabecalho.php");
require_once("conecta.php");
require_once("banco-livraria.php");

$id = $_GET['id'];
$usuario = buscaUsuario($connection, $id);
?>

<form action="alterar-user.php" method="post" class="form-horizontal">

	<div class="form-group">
		<label for="inputLogin" class="col-sm-2 control-label">Login do Usuário</label>
		<div class="col-sm-10">
			<?php
			include('conecta.php');
			$query = "SELECT * FROM usuario WHERE id= $id ";
			$buscar = mysqli_query($connection, $query);
			while ($dados = mysqli_fetch_array($buscar)) {

				$id = $dados['id'];
				$login = $dados['login'];
				$senha = $dados['senha'];
				$permissao = $dados['permissao'];
			}

			?>
			<input type="text" class="form-control" id="inputLogin" name="login" placeholder="Login do usuário" value="<?php echo $login ?>">
		</div>
	</div>

	<div class="form-group">
		<input type="hidden">
		<div class="col-sm-10">
			<input type="hidden" class="form-control" id="inputId" name="id" placeholder="ID" value="<?php echo $id ?>">
		</div>
	</div>

	<div class="form-group">
		<label for="inputName" class="col-sm-2 control-label">Senha do Usuário</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="inputName" name="senha" placeholder="Senha" value="<?php echo $senha ?>">
		</div>
	</div>

	<div class="form-group">
		<div class="form-group">
			<label for="inputName">Permissão Usuário:</label>
			<br>
			<select class="form-control" name="permissao" required="" id="exampleFormControlSelect1">
			<br>
				<option>A</option>
				<option>C</option>
			</select>
        </div>
			<!-- <input type="text" class="form-control" id="inputName" name="nivel" placeholder="Permissão" value="<?php echo $permissao ?>"> -->
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Alterar Usuário</button>
		</div>
	</div>
</form>


<?php require_once("rodape.php"); ?>