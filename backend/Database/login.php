<?php 
    if($_POST){

        $Nombre = $_POST["Name"];
        $Password = $_POST["Password"];

        $redirect = $_SERVER['DOCUMENT_ROOT']."/backend/Siniestros/SiniestrosActivos.php";

        header("Location: /backend/Avisos/AvisosLanding.php",true,303);
        die();

    }else{

       echo "Hola jeje algo salio mal";

    }
    
?>