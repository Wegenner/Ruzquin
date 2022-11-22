<?php 
    session_start();

    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";

    $sqlUsuario = "SELECT * FROM usuarios WHERE UserName = '".$_POST['Name']."'";

    $result = $connect->query($sqlUsuario);

    if($result->num_rows >= 1){
        $result = $result->fetch_assoc();
        
        if(password_verify($_POST['Password'],$result["UserPassword"])){

            $_SESSION['id'] = $result["ID"];
            $_SESSION['rol'] = $result["UserRoles"];
            $_SESSION['nombre'] = $result["UserName"];
    
            $redirect = "/backend/Siniestros/SiniestrosActivos.php";
    
            header("Location: ".$redirect,true,303);

            die();
        }
    

    }else{

       echo "No hay un usuario con estos datos, revise y vuelva a intentar.";

    }
    
?>