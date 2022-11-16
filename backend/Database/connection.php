<?php 

    $host = "191.96.56.103";
    $user = "u682385574_Wegenner";
    $password = "Wegenner1$";
    $db = "u682385574_Ruzquin";
    $connect;

    $host1 = "localhost";
    $user1 = "root";
    $password1 = "Wegenner1$";
    $db1 = "ruzquinmysql";

    $connect = new mysqli($host1,$user1,$password1,$db1);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

?>