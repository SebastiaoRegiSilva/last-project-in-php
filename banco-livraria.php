<?php
	include "conecta.php";

	function insereLivro($connection, $livro, $autor, $fotoCapa, $editora, $isbm){
		$query = "INSERT into livro (nomeLivro,nomeAutor,fotoCapa,isbm,editora) VALUES ('$livro','$autor','$fotoCapa','$isbm','$editora')";
		return mysqli_query($connection, $query);
	}

	function insereUsuario($connection, $login, $senha, $permissao){
		$query = "INSERT into usuario (login,senha,permissao) values ('$login', '$senha', '$permissao')";
		return mysqli_query($connection, $query);
	}

	function listaLivro($connection){
		$livros = [];
		$query = "SELECT * FROM livro";
		$resultado = mysqli_query($connection, $query);
		while($livro = mysqli_fetch_assoc($resultado)){
			array_push($livros, $livro);
		}

		return $livros;
	}

	function listaUsuario($connection){
		$usuarios = [];
		$query = "SELECT * FROM usuario";
		$resultado = mysqli_query($connection, $query);
		while($usuario = mysqli_fetch_assoc($resultado)){
			array_push($usuarios, $usuario);
		}
		return $usuarios;
	}

	function removeLivro($connection, $id){
		$query = "DELETE FROM livro where id = $id";
		return mysqli_query($connection, $query);
	}

	function removeUsuario($connection, $id){
		$query = "DELETE FROM usuario where id = $id";
		return mysqli_query($connection, $query);
	}

	function buscaLivro($connection, $id){
		$query = "SELECT * FROM livro where id = '$id'";
		$resultado = mysqli_query($connection, $query);
		return mysqli_fetch_assoc($resultado);
	}

	function alteraLivro($connection){
		$id = $_POST['id'];
		$nomeLivro = $_POST['nomeLivro'];
		$nomeAutor = $_POST['nomeAutor'];
		$fotoCapa = $_POST['fotoCapa'];
		$isbm = $_POST['isbm'];
		$editora = $_POST['editora'];
		

		$query = "UPDATE livro SET nomeLivro='$nomeLivro',nomeAutor='$nomeAutor',fotoCapa='$fotoCapa',isbm='$isbm',editora='$editora' where id='$id' ";
		$inserir = mysqli_query($connection,$query);
		$teste = mysqli_affected_rows($connection);
	}
	
	function alterarUsuario($connection, $id, $login, $senha, $permissao)
	{
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$permissao = $_POST['permissao'];
		
		$query = "UPDATE usuario SET login = $login, senha = $senha,permissao = $permissao WHERE id = '$id'";
		$inserir = mysqli_query($connection,$query);
		$teste = mysqli_affected_rows($connection);
	}

	function buscaUsuario($connection, $id){
		$query = "SELECT * FROM usuario where id = {$id}";
		$resultado = mysqli_query($connection, $query);
		return mysqli_fetch_assoc($resultado);
	}

	
	function searchLivro($connection, $nome){
		$livro = [];
		$query = "SELECT * FROM livro where nomeLivro like '{$nome}%'";
		$resultado = mysqli_query($connection, $query);
		while($livros = mysqli_fetch_assoc($resultado)){
			array_push($livro, $livros);
		}
		return $livro;
	}