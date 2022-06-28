
	<?php
		require_once 'C:\xampp\htdocs\last-project-in-php\Cabecalho.php';
		
		if (!isset($_SESSION['userLogin'])) {
			unset($_SESSION['Login.php']);
			header('Location: Login.php');
		}
		
		$logado = $_SESSION['userLogin'];
		
		if ($logado->getPermissao() == 'A') 
		{ ?>
			<div class="container-fluid mt--7">
				<div class="row">
					<div class="col">
						<div class="card shadow">
							<div class="card-header border-1">
								<h3 class="mb-0">Cadastro de Usuário.</h3>
							</div>

							<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
							<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

							<div class="container" style="margin-top: 10px;">
								<form name="cadUsuario" action="" method="POST">
									<div class="col-md-5">
										<form name="cadUsuario" action="" method="POST">
										<!-- Login. -->
											<input type="text" name="id" id="id" value="<?php echo isset($usuario) ? $usuario->getId() : '' ?>" hidden="" />
											<div class="mb-3">
												<label class="form-label">Login:</label>
												<input type="text" class="form-control" name="login" value="" ?>
											</div>
											<br>
											<!-- Senha. -->
											<div class="mb-3">
                       						 <label class="form-label">Senha:</label>
                        						<input type="password" class="form-control" name="senha1" value=""?>
                   							 </div>
											<br>
											<!-- Confirmar Senha. -->
											<div class="mb-3">
												<label class="form-label">Confirmar senha:</label>
												<input type="password" class="form-control" name="senha2">
											</div>
											<br>
											<!-- Permissão. -->
											<div class="mb-3">
												<label class="form-label">Permissão:</label>
												<select class="form-select" name="permissao">
													<option value="A" <?php echo isset($usuario) && $usuario->getPermissao() == 'A' ? 'seleted' : '' ?>>Administrador</option>
													<option value="C" <?php echo isset($usuario) && $usuario->getPermissao() == 'C' ? 'seleted' : '' ?>>Comum</option>
												</select>
											</div>
											<br>
										</div>
									<div class="card-footer py-4">
										<div style="text-align: left">
											<button type="submit" name="btnSalvar" class="btn btn-primary">Cadastrar</button>
										</div>
									</div>
								</form>
								<br>
								<?php
									if(isset($_POST['btnSalvar'])){
									$salvar = call_user_func(array('UsuarioController', 'salvar'));
										if($salvar)
										{
								?>
											<div class="alert alert-success" role="alert">
												Usuário cadastrado com sucesso!!!
											</div>
									<?php 
										}
										else
										{
									?>
										<div class="alert alert-danger" role="alert">
												Senhas não são iguais!
											</div>
									<?php
										}
									}   
									?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			
			<?php
			if ($logado->getPermissao() != 'A') 
			{ ?>
				<h3 class="mb-0">HAHA, VOCÊ NÃO PODE FICA AQUI VOLTE!</h3>
			<?php
				// Redireciona para a index.
				header('Location: Index.php');
			} 
	?>
</body>
</html>