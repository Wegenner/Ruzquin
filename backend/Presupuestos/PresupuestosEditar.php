<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Sistema/SistemaCrearNotificacion.php"; 

    $noti = new Notificacion();

    if(isset($_POST['id'])){

        $id = $_POST['id'];

        if(!isset($_POST['siniestroFechaTermino']) || $_POST['siniestroFechaTermino'] == "" || $_POST['siniestroFechaTermino'] == "1970-01-01"){
            $_POST['siniestroFechaTermino'] = "null";
        }else{
            $_POST['siniestroFechaTermino'] = "'".$_POST['siniestroFechaTermino'] ."'";
        }
        
        $sqlupdate = "UPDATE billingmodel SET 
        siniestroId ='".filtrodedatos($_POST['siniestroId'])."',
        presupuesto ='".filtrodedatos($_POST['presupuesto'])."',
        presupuestoPrecioAutorizado =".$_POST['presupuestoPrecioAutorizado'].",
        presupuestoPrecioProveedor ='".$_POST['presupuestoPrecioProveedor']."',
        presupuestoUtilidad =".$_POST['presupuestoUtilidad'].",
        siniestroFechaTermino = ".$_POST['siniestroFechaTermino'].",
        presupuestoAnticipoProveedor ='".$_POST['presupuestoAnticipoProveedor']."'
        WHERE ID = ".$id;

        if($result = $connect->query($sqlupdate)){
            $noti->notificar($_SESSION['nombre'],"editado el presupuesto de",$_POST['id']);
            header('location: /backend/Presupuestos/PresupuestosGraficos.php',true,303);
            die();
        }

    }

    $id = $_POST['getid'];

    $sqlsini = "SELECT * FROM siniestromodelo WHERE ID = '".$id."' LIMIT 1";

    $sqlpres = "SELECT * FROM billingmodel WHERE IDdbsiniestro = '".$id."' LIMIT 1";

    $resultpresupuesto = $connect->query($sqlpres)->fetch_assoc();

    $resultsiniestro = $connect->query($sqlsini)->fetch_assoc();

?>

<div class="container">

    <h4 style="text-align:center; margin-top:20px">Presupuesto  -  <?php echo $resultsiniestro['siniestroId']; ?></h4>

    <hr />

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

        <input readonly name="id" value="<?php echo $resultpresupuesto['ID']; ?>" class="form-control" />

        <br/>

        <div class="row" style="margin-bottom: 10px">
                <div class="text-danger"></div>
                <input type="hidden"  />

                <div class="col form-group">
                    <label  class="control-label">ID</label>
                </div>
                <div class="col">
                    <input name="siniestroId" value="<?php echo $resultpresupuesto['siniestroId']; ?>" readonly class="form-control" />
                    <span class="text-danger"></span>
                </div>
                <div class="col form-group">
                    <label class="control-label">Presupuesto</label>
                </div>
                <div class="col">
                    <input name="presupuesto" value="<?php echo $resultpresupuesto['presupuesto']; ?>" class="form-control" type="text" />
                    <span class="text-danger"></span>
                </div>
        </div>
        <div class="row" style="margin-bottom: 10px"> 
                <div class="col form-group">
                    <label class="control-label">Presupuesto Autorizado</label>
                </div>
                <div class="col">
                    <input name="presupuestoPrecioAutorizado" value="<?php echo $resultpresupuesto['presupuestoPrecioAutorizado']; ?>" class="form-control" type="text" />
                    <span class="text-danger"></span>
                </div>
                <div class="col form-group">
                    <label class="control-label">Precio Proveedor</label>
                </div>
                <div class="col">
                    <input name="presupuestoPrecioProveedor" class="form-control" value="<?php echo $resultpresupuesto['presupuestoPrecioProveedor']; ?>" type="text" />
                    <span class="text-danger"></span>
                </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
                <div class="col form-group">
                    <label  class="control-label">Proveedor</label>
                </div>
                <div class="col">
                    <input name="siniestroProveedor" value="<?php echo $resultpresupuesto['siniestroProveedor']; ?>" readonly class="form-control" type="text" />
                    <span class="text-danger"></span>
                </div>

                <div class="col form-group">
                    <label class="control-label">Utilidad</label>
                </div>
                <div class="col">
                    <input name="presupuestoUtilidad" value="<?php echo $resultpresupuesto['presupuestoUtilidad']; ?>" class="form-control" type="text" />
                    <span class="text-danger"></span>
                </div>
        </div>
        <div class="row" style="margin-bottom: 10px">
                <div class="col form-group">
                    <label class="control-label">Fecha Termino</label>
                </div>
                <div class="col">
                    <input name="siniestroFechaTermino" value="<?php echo $resultpresupuesto['siniestroFechaTermino']; ?>" class="form-control" type="date" />
                    <span class="text-danger"></span>
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
        <input class='detalles' value="Guardar" type='submit'>

    </form>
</div>


<div class="container">
    <br/>
    <a class="detalles" href="/backend/Presupuestos/PresupuestosTodos.php">Regresar</a>
    <br/>
    <br/>
    <a class="detalles" href="/backend/Presupuestos/PresupuestosGraficos.php">Presupuestos</a>
</div>