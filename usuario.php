<?php
    include_once('conecta.php');

    include 'script/password.php';

    $login = filter_input(INPUT_POST, 'login');
    $permissao = filter_input(INPUT_POST, 'permissao');
    $senha = filter_input(INPUT_POST, 'password');


    $query = "INSERT INTO usuario (login,senha,permissao) VALUES ('$login','$senha','$permissao')";
    $query_run = mysqli_query($connection, $query);
    $teste = mysqli_affected_rows($connection);
?>