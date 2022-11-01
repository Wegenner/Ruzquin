<?php 

    $host = "127.0.0.1";
    $user = "root";
    $password = "Wegenner1$";
    $db = "ruzquinmysql";
    $connect;

    $connect = new mysqli($host,$user,$password,$db);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }


?>