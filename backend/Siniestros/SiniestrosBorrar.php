<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";

    if($_POST){ 
        $mensaje = $_POST['id'];
        echo "funciona ".$mensaje;
    } else { 
?>

<div class="container-fluid">

    <h1 style="text-align:center; margin: 5px"> ¿Estas seguro que deseas eliminar este siniestro? </h1>
    <h2 style="text-align:center; margin: 5px"> Siniestro Random </h2>
    <hr style="width:70%"/>
    <br>

    <div class="row" style="margin-bottom: 50px;text-align:center">
        <form action="/backend/Siniestros/SiniestrosBorrar.php" name="Login" method="post" style="width:100%">
            <input type="text" name="id" value="Holaaaaa" hidden>
            <input style="width:30%; margin-right:10px" id="login-submit" type="submit"  name="submit" value="Eliminar" class="btn btn-danger">
            <a class="btn btn-primary" style="width:30%" href="/backend/Siniestros/Siniestros.php"> Regresar </a>
        </form>     
    </div>

</div>

<?php 
    }

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>