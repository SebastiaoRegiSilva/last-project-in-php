<?php
    $server_name = "localhost:3306";
    $db_username = "root";
    $db_password = "HORTETEC_115";
    $db_name = "biblioteca";
    
    $connection = mysqli_connect($server_name,$db_username,$db_password,$db_name) or die ('Desconnect');
    $dbconfig = mysqli_select_db($connection,$db_name);
?>