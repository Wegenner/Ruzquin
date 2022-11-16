<?php 

    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    if(isset($_POST['siniestroId'])){

        if(!isset($_POST['siniestroFechaTermino']) || $_POST['siniestroFechaTermino'] == "" || $_POST['siniestroFechaTermino'] == "1970-01-01"){
            $_POST['siniestroFechaTermino'] = "null";
        }else{
            $_POST['siniestroFechaTermino'] = "'".$_POST['siniestroFechaTermino'] ."'";
        }

        $sqlpresupuestocreado = "INSERT INTO billingmodel (siniestroId, siniestroFecha, IDdbsiniestro, presupuesto, presupuestoPrecioAutorizado, presupuestoPrecioProveedor, siniestroProveedor, presupuestoUtilidad, siniestroFechaTermino, presupuestoAnticipoProveedor) 
                                VALUES ('".$_POST['siniestroId']."','".$_POST['siniestroFecha']."','".$_POST['IDdbsiniestro']."','".$_POST['presupuesto']."','".$_POST['presupuestoPrecioAutorizado']."','".$_POST['presupuestoPrecioProveedor']."','".$_POST['siniestroProveedor']."','".$_POST['presupuestoUtilidad']."',".$_POST['siniestroFechaTermino'].",'".$_POST['presupuestoAnticipoProveedor']."') ";

        echo $sqlpresupuestocreado;

        if($result = $connect->query($sqlpresupuestocreado)){
            header('Location: /backend/Siniestros/SiniestrosActivos.php',true,303);
            die();
        }

    }

    $siniestroId = $_POST['id'];

    $sqlsini = "SELECT * FROM siniestromodelo WHERE ID = '".$siniestroId."' LIMIT 1";
        
    $resultsiniestro = $connect->query($sqlsini)->fetch_assoc();

?>

<h4 style="text-align:center; margin-top:20px"> Presupuesto  -  <?php echo $resultsiniestro['siniestroId']; ?></h4>

<hr />

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

    <br/>
    <div class="container">
            <input name="IDdbsiniestro" readonly hidden value="<?php echo $siniestroId;?>" class="form-control" />
            <input name="siniestroFecha" readonly hidden value="<?php echo $resultsiniestro['siniestroFecha'];?>" class="form-control" />

        <div class="row" style="margin-bottom: 10px">
                <div class="col form-group">
                    <label for="siniestroId" class="control-label">ID de siniestro: </label>
                </div>
                <div class="col">
                    <input name="siniestroId" readonly value="<?php echo $resultsiniestro['siniestroId'];?>" class="form-control" />
                    <span for="siniestroId" class="text-danger"></span>
                </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
                <div class="col form-group">
                    <label for="presupuesto" class="control-label">Presupuesto: </label>
                </div>
                <div class="col">
                    <input name="presupuesto" type="text" class="form-control" />
                    <span for="presupuesto" class="text-danger"></span>
                </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
                <div class="col form-group">
                    <label for="presupuestoPrecioAutorizado" class="control-label">Precio Autorizado: </label>
                </div>
                <div class="col">
                    <input name="presupuestoPrecioAutorizado" class="form-control" />
                    <span for="presupuestoPrecioAutorizado" class="text-danger"></span>
                </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
                <div class="col form-group">
                    <label for="presupuestoPrecioProveedor" class="control-label">Precio a proveedor: </label>
                </div>
                <div class="col">
                    <input name="presupuestoPrecioProveedor" class="form-control" />
                    <span for="presupuestoPrecioProveedor" class="text-danger"></span>
                </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
                <div class="col form-group">
                    <label for="siniestroProveedor" class="control-label">Proveedor asignado: </label>
                </div>
                <div class="col">
                    <input name="siniestroProveedor" readonly value="<?php echo $resultsiniestro['siniestroProveedor'];?>" class="form-control" />
                    <span for="siniestroProveedor" class="text-danger"></span>
                </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
                <div class=" col form-group">
                    <label for="presupuestoUtilidad" class="control-label">Utilidad: </label>
                </div>
                <div class="col">
                    <input name="presupuestoUtilidad" class="form-control" />
                    <span for="presupuestoUtilidad" class="text-danger"></span>
                </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col form-group">
                <label class="control-label">Anticipo Proveedor</label>
            </div>
            <div class="col">
                <input name="presupuestoAnticipoProveedor" value="<?php echo $resultpresupuesto['presupuestoAnticipoProveedor']; ?>" class="form-control" type="number" />
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
                <div class="col form-group">
                    <label for="siniestroFechaTermino" class="control-label">  Fecha de Termino del siniestro: </label>
                </div>
                <div class="col">
                    <input name="siniestroFechaTermino" type="date" class="form-control" />
                    <span for="siniestroFechaTermino" class="text-danger"></span>
                </div>
        </div>
        <br/>
        <div class="row" style="margin-bottom: 2px; margin-top: 5px">
                <div class="container">
                    <input type="submit" value="Guardar" class="btn btn-primary" style="width:100%" />  
                </div>
        </div>
    </div>
</form>

<div class="container">
<button type="button" style="
                    background-color:#687e8c; 
                    width: 100%;
                    margin: 10px 0 10px 0;
                    text-align: center;
                    border-radius: 10px;" href="/backend/Siniestros/SiniestrosActivos.php" class="btn btn-secondary">
        Regresar
    </button>
</div>

<?php 

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";

?>