<?php 

    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php";

    if(isset($_POST['idsiniestro'])){ 

        $id = $_POST['idsiniestro'];
        $sqlsininfo = "SELECT ID, siniestroId, siniestroNombre FROM siniestromodelo WHERE ID =".$id." LIMIT 1";
        $result = $connect->query($sqlsininfo);
        $result = $result->fetch_assoc();

?>
    <div class="container-fluid">

        <h1 style="text-align:center; margin: 5px"> ¿Estas seguro que deseas eliminar este siniestro? </h1>
        <h2 style="text-align:center; margin: 5px"> <?php echo  $result['siniestroNombre']." - ".$result['siniestroId']; ?> </h2>
        <hr style="width:70%"/>
        <br>

        <div class="row" style="margin-bottom: 50px; text-align:center">

            <form class="justify-content-center" action="/backend/Database/eliminacionitems.php" name="Login" method="post" style="width:100%">
                <input type="text" name="idsiniestro" value="<?php echo $result['ID']; ?>" hidden>
                <input style="width:30%; margin-right:10px" id="login-submit" type="submit"  name="submit" value="Eliminar" class="btn btn-danger">
                <a class="btn btn-primary" style="width:30%" href="/backend/Siniestros/SiniestrosActivos.php"> Regresar </a>
            </form>    

        </div>

    </div>

<?php 

    }

    if(isset($_POST['idusuario'])){ 

        $sqluserinfo = "SELECT ID, UserName, UserEmail FROM usuarios WHERE ID =".filtrodedatos($_POST['idusuario'])." LIMIT 1";
        $result = $connect->query($sqluserinfo);
        $result = $result->fetch_assoc();

?>

    <div class="container-fluid">

        <h1 style="text-align:center; margin: 5px"> ¿Estas seguro que deseas eliminar este usuario? </h1>
        <h2 style="text-align:center; margin: 5px"> <?php echo $result['UserName']; ?></h2>
        <hr style="width:70%"/>
        <br>

        <div class="row" style="margin-bottom: 50px; text-align:center">

            <form class="justify-content-center" action="/backend/Database/eliminacionitems.php" name="Login" method="post" style="width:100%">
                <input type="text" name="idusuario" value="<?php echo $result['ID']; ?>" hidden>
                <input class="btn btn-danger" style="width:30%; margin-right:10px" id="login-submit" type="submit"  name="submit" value="Eliminar">
                <a class="btn btn-primary" style="width:30%" href="/backend/Usuarios/UsuariosTodos.php"> Regresar </a>
            </form>    

        </div>

    </div>
<?php 

    }

    if(isset($_POST['idpresu'])){ 

        $sqlpresupuestos = "SELECT * FROM billingmodel WHERE ID =".filtrodedatos($_POST['idpresu'])." LIMIT 1";
        $result = $connect->query($sqlpresupuestos)->fetch_assoc();

?>

    <div class="container-fluid">

        <h1 style="text-align:center; margin: 5px"> ¿Estas seguro que deseas eliminar este presupuesto? </h1>
        <h2 style="text-align:center; margin: 5px"> <?php  $result = $connect->query($sqlpresupuestos)->fetch_assoc(); echo $result['siniestroId']; ?></h2>
        <hr style="width:70%"/>
        <br>

        <div class="row" style="margin-bottom: 50px; text-align:center">

            <form class="justify-content-center" action="/backend/Database/eliminacionitems.php" name="Login" method="post" style="width:100%">
                <input type="text" name="idpresu" value="<?php echo $result['ID']; ?>" hidden>
                <input class="btn btn-danger" style="width:30%; margin-right:10px" id="login-submit" type="submit"  name="submit" value="Eliminar">
                <a class="btn btn-primary" style="width:30%" href="/backend/Usuarios/UsuariosTodos.php"> Regresar </a>
            </form>    

        </div>

    </div>

<?php 

    }

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
    
?>