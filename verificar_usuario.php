<?php
    session_start();
    include_once('conecta.php');
    include ('script/password.php');
    
    $login = $_POST ['login'];
    $senha = $_POST ['senha'];

    $query = "SELECT * FROM usuario WHERE login = '$login'";
    $buscar = mysqli_query($connection,$query) or die( mysqli_error($connection));
    
    var_dump($query);
    // Verifica se existe o email no banco
    $linha = mysqli_affected_rows($connection);

    if($linha == 1){

        if($senhabd == $senhaverificada){
            $_SESSION['login'] = $login;
            header("Location: Index.php");
        }   
        else {
             header('Location: Login.php?msg=1');
        }

    } else {
        header('Location: Login.php?msg=2');
    }
?>


