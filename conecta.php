<?php
    $server_name = "localhost:3306";
    $db_username = "northtale";
    $db_password = "*KingOfYourIllusion12";
    $db_name = "biblioteca";
    
    $connection = mysqli_connect($server_name,$db_username,$db_password,$db_name) or die ('Desconnect');
    $dbconfig = mysqli_select_db($connection,$db_name);
?>
