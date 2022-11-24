<?php 

    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php";

    if($_POST){
        session_destroy();
        header("Location: /backend/Siniestros/SiniestrosActivos.php");
        die();
    }

?>



    <div class="container-fluid">

        <h1 style="text-align:center; margin: 5px"> ¿Estas seguro que deseas terminar esta sesión? </h1>
        <hr style="width:70%"/>
        <br>

        <div class="row" style="margin-bottom: 50px; text-align:center">

            <form class="justify-content-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="Login" method="post" style="width:100%">
                <input class="btn btn-info" style="width:30%; margin-right:10px" id="login-out" type="submit"  name="submit" value="Salir">
                <a class="btn btn-primary" style="width:30%" href="/backend/Siniestros/SiniestrosActivos.php"> Regresar </a>
            </form>    

        </div>

    </div>

<?php 

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
    
?>