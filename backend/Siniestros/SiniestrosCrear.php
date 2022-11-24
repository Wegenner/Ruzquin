<?php

    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 
    include $_SERVER['DOCUMENT_ROOT']."/backend/Sistema/SistemaCrearNotificacion.php"; 

    $noti = new Notificacion();

    if($_POST){

        $sqlsiniestrocreado = "INSERT INTO siniestromodelo (siniestroId, siniestroFecha, siniestroNombre, siniestroDireccion, siniestroTelefono, siniestroEstado, siniestroProveedor, siniestroAseguradora, siniestroDescripcion, siniestroCreador, siniestroUltimoEdit) 
                                VALUES ('".$_POST['siniestroId']."','".$_POST['siniestroFecha']."','".$_POST['siniestroNombre']."','".$_POST['siniestroDireccion']."','".$_POST['siniestroTelefono']."','".$_POST['siniestroEstado']."','".$_POST['siniestroProveedor']."','".$_POST['siniestroAseguradora']."','".$_POST['siniestroDescripcion']."','".$_POST['siniestroCreador']."','".$_POST['siniestroCreador']."') ";

        if($result = $connect->query($sqlsiniestrocreado)){

            $id = $connect->query("SELECT ID FROM siniestromodelo ORDER BY ID DESC LIMIT 1 ")->fetch_assoc();

            $noti->notificar($_SESSION['nombre'],"creado", $id['ID']);
            
            header('Location: /backend/Siniestros/SiniestrosActivos.php',true,303);

            die();
        }

    }else{

        $sqlproveedores = "SELECT * FROM usuarios WHERE UserRoles = 5";

        $resultado = $connect->query($sqlproveedores);

?>

<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php
            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosActivos.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' > Siniestros Activos </a></li>"; 

            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosBuscar.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' > Siniestros Buscar </a></li>"; 

            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosCrear.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' style='background: #2f698d'> Nuevo </a></li>"; 
        ?>
        
    </ul>
</nav>

<h1 style="text-align: center; margin: 10px">Registrar Siniestro</h1>

<hr style="width: 70%"/>

<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="container">

                <div class="row">
                    
                        <div class="col form-group">
                            <label for="siniestroId" style="margin-bottom: 5px" class="control-label siniestrosLabels"> ID del siniestro </label>
                            <input name="siniestroId" class="form-control" type="text" />
                            <span class="text-danger"></span>
                        </div>

                        <div class="col form-group">
                            <label for="siniestroFecha"style="margin-bottom: 5px" class="control-label siniestrosLabels"> Fecha de admisión</label>
                            <input name="siniestroFecha" class="form-control" type="date"/>
                            <span class="text-danger"></span>
                        </div>

                </div>

                <div class="row">

                    <div class="col">
                        <label for="siniestroNombre" style="margin-bottom: 5px" class="control-label siniestrosLabels">Nombre</label>
                        <input name="siniestroNombre" class="form-control" type="text"/>
                        <span class="text-danger"></span>
                    </div>

                    <div class="col">
                        <label for="siniestroDireccion" style="margin-bottom: 5px" class="control-label siniestrosLabels">Dirección</label>
                        <input name="siniestroDireccion" class="form-control" />
                        <span class="text-danger"></span>
                    </div>

                </div>
                
                <div class="row">

                    <div class="col form-group">
                        <label for="siniestroTelefono" style="margin-bottom: 5px" class="control-label siniestrosLabels">Telefono</label>
                        <input name="siniestroTelefono" class="form-control" type="phone" />
                        <span class="text-danger"></span>
                    </div>

                    <div class="col form-group">
                        <label for="siniestroEstado" style="margin-bottom: 5px" class="control-label siniestrosLabels">Estado Actual</label>
                        <select name="siniestroEstado">
                            <option >Recepción</option>
                            <option>Visita</option>
                        </select>
                        <span class="text-danger"></span>
                    </div>

                </div>
                <div class="row">

                        <div class="col form-group">
                            <label for="siniestroProveedor" style="margin-bottom: 5px" class="control-label siniestrosLabels">Proveedor</label>
                            <select name="siniestroProveedor">

                                <?php 

                                    $resultado = $connect->query($sqlproveedores);

                                    if ($resultado->num_rows > 0) {
                                        while($row = $resultado->fetch_assoc()){
                                            echo "<option>".$row['UserName']."</option>";
                                        }
                                    }
                                ?>

                            </select>
                            <span class="text-danger"></span>
                        </div>

                        <div class="col form-group">
                            <label for="siniestroAseguradora" style="margin-bottom: 5px" class="control-label siniestrosLabels">Aseguradora</label>
                            <input name="siniestroAseguradora" id="siniestroAseguradora" class="form-control" />
                            <span class="text-danger"></span>
                        </div>

                </div>
                <div class="row">

                    <label for="siniestroDescripcion"style="margin-bottom: 5px" class="control-label siniestrosLabels">Descripción</label>
                    <textarea name="siniestroDescripcion" class="form-control"></textarea>
                    <span class="text-danger"></span>

                </div>

                <br/>
                <br/>

                <div class="row">

                    <div class="form-group">
                        <input type="hidden" name="siniestroCreador" style="margin-bottom: 5px" value="<?php echo $_SESSION['nombre'];?>" class="form-control" />
                        <span class="text-danger"></span>
                    </div>

                    <br />

                    <input type="submit" value="Crear" class="btn btn-primary DetallesSiniestros" style="width:100%" />

                    <br />
            </div>
        </div>
    </form>
</div>

<div class="container">

    <br/>

    <a href="/backend/Siniestros/SiniestrosActivos.php" style="width:100%" class="btn btn-primary">Regresar a la lista</a>

</div>

<?php

    }

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";

?>
