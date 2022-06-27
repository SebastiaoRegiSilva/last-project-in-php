<?php
	session_start();

	/**
    * Função que verifica se o usuário está logado.
    */ 
	function usuarioEstaLogado() 
	{
		return isset($_SESSION['usuario_logado']);
	}

	/**
    * Função que verifica o nível de permissão do usuário para acesso as funcionalidades.
    */ 
	function verificaUsuario() 
	{
		if(!usuarioEstaLogado()) 
		{
			$_SESSION['danger'] = "Você não tem acesso à essa funcionalidade!";
			header("Location: index.php");
			die();
		}
	}

	/**
    * Função responsável por manter o usuário logado.
    */ 
	function usuarioLogado() 
	{
		return $_SESSION['usuario_logado'];
	}

	/**
    * Função responsável por logar um usuário com base em seu email cadastrado.
    * @param mixed $email Email cadastrado na base de dadps para login.
	*/ 
	function logaUsuario($email) 
	{
		$_SESSION['usuario_logado'] = $email;
	}

	/**
    * Função responsável por deslogar um usuário logado.
    */ 
	function logout() 
	{
		session_destroy();
		session_start();
	}
?>