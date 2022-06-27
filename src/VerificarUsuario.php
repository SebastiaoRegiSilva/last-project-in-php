<?php
    session_start();
    require_once('controller/UsuarioController.php');
    require_once('Conexao.php');

    $login = $_POST ['login'];
    $senha = $_POST ['senha'];

    $usuarioRecuperado = call_user_func(array('UsuarioController', 'buscarPorLogin'), $login);
    
    if($usuarioRecuperado == false)
        header('Location: Login.php?msg=2');
    else
    {
        //Validar se a senha informada está correta com a senha do banco de dados.
        if($usuarioRecuperado->getSenha() == $senha)
        {
            $_SESSION['userLogin'] = $usuarioRecuperado;
            header("Location: Index.php");
        } 
        else
            header('Location: Login.php?msg=1');
    }
?>