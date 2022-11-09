<?php 

    $host = "191.96.56.103";
    $user = "u682385574_Wegenner";
    $password = "Wegenner1$";
    $db = "u682385574_Ruzquin";
    $connect;

    $connect = new mysqli($host,$user,$password,$db);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }


?>