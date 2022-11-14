<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    if($_POST){
        
        $id = $_POST['id'];

        $sqlsini = "SELECT * FROM siniestromodelo WHERE ID = ".$id;
        
        $resultsiniestro = $connect->query($sqlsini);

        $sqlpres = "SELECT * FROM billingmodel WHERE ID = ".$id;

        $resultpresupuesto = $connect->query($sqlpres);

?>

<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php
            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosActivos.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink'> Siniestros Activos </a></li>"; 
        ?>
        <?php
            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosBuscar.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' style='background: #2f698d'> Siniestros Buscar </a></li>"; 
        ?>
        
    </ul>
</nav>

<h1 style="text-align: center; padding-top:10px">Detalles - <?php while ($row = $resultsiniestro->fetch_assoc()){ echo $row['siniestroId']; } ?></h1>
<p style="text-align: center"><b>10/11/2022</b> </p>
<hr style="width:70%" />
<div class="container" style="padding-top:10px">

<?php 
    $resultsiniestro = $connect->query($sqlsini);
    while ($row = $resultsiniestro->fetch_assoc()){
        echo "
        <div class='row'>
        <div class='col'>
            <p><b> Nombre: </b> ".$row['siniestroNombre']." </p>
        </div>
        <div class='col'>
            <p><b>Estado:</b>  ".$row['siniestroEstado']." </p>
        </div>
        </div>
        <div class='row'>
        <div class='col'>
            <p><b>Dirección:</b>  ".$row['siniestroDireccion']." </p>
        </div>
        <div class='col'>
            <p><b>Telefono del afectado:</b>  ".$row['siniestroTelefono']." </p>
        </div>
        </div>
        <div class='row'>
        <div class='col'>
            <p><b>Aseguradora:</b>  ".$row['siniestroAseguradora']." </p>
        </div>
        <div class='col'>
            <p><b>Proveedor:</b>  ".$row['siniestroProveedor']." </p>
        </div>
        </div>
        <div class='row'>
        <div class='col'>
            <p><b>Creador:</b>  ".$row['siniestroCreador']." </p>
        </div>
        <div class='col'>
            <p><b>Ultima Edición:</b>  ".$row['siniestroUltimoEdit']." </p>
        </div>
        </div>
        <div class='row'>
        
        <div class='col'>
            <p><b>Descripción:</b>  ".$row['siniestroDescripcion']." </p>
        </div>
        </div>
        </div>
        <br />
        <br />
        
        <div class='container'>
            <form action='/backend/Siniestros/SiniestrosEditar.php' method='POST'>
                <input class='detalles' type='number' hidden name='getid' value='".$_POST['id']."' >
                <input class='detalles' type='submit' value='Editar'>
            </form>
            <br />
            <form action='/backend/Database/preguntaprevia.php' method='POST'>
                <input class='detalles' type='number' hidden name='idsiniestro' value='".$_POST['id']."' >
                <input class='detalles' value='Eliminar' type='submit'>
            </form>
            <br />
            <a class='detalles' href='/backend/Siniestros/SiniestrosActivos.php'>Regresar</a>
        </div>
        <br />
        <br />";    
    }

?>
</div>
<div class="container">

    <?php 

        if($resultpresupuesto->num_rows <= 0 || is_null($resultpresupuesto)){

            echo "<button type='button' style='
            background-color:green; width: 100%;
            margin-right: 0.625%;
            text-align: center;
            border-radius: 10px;' href='#' class='btn btn-secondary'>Crear Presupuesto</button>
            <br />
            <br />";

        }else{
            while ($row = $resultpresupuesto->fetch_assoc()){
            echo "
            <h1 style='text-align: center'>Presupuesto</h1>
        
            <hr />
            <div class='container-fluid'>
                <div class='row'>
                    <div class='col'>
                        <p><b> PA :".$row['presupuestoPrecioAutorizado']." </b></p>
                    </div>
                    <div class='col'>
                        <p><b>PP : ".$row['presupuestoPrecioProveedor']."</b> </p>
                    </div>
                </div>
                <div class='row'>
                    <div class='col'>
                        <p><b>Utilidad : ".$row['presupuestoUtilidad']."</b> </p>
                    </div>
                </div>
                    <div class='row'>
                    <div class='col'>
                        <p><b>Fecha de terminio : ".$row['siniestroFechaTermino']."</b> </p>
                    </div>
                </div>
            </div>
            <br />
                    <a class='detalles' href='/backend/Presupuestos/PresupuestosEditar.php'>Editar</a>
            <br />
            <br />";
            }
        }


    ?>


    <h1 style="text-align: center"> Ver: Evidencias y Documentos</h1>

    <hr />

    <a class="detalles" href="/backend/Archivos/ArchivosVer.php"> Ver / Subir Archivos</a>

    <br /><br />

    <button type="button" style="
                background-color:green; width: 100%;
                margin-right: 0.625%;
                text-align: center;
                border-radius: 10px;
                text-decoration:none" href="#" class="btn btn-secondary">
        Subir Evidencias y Archivos
    </button>

    <br /><br />

    <a class="detalles">Borrar</a>
    <br />

    <br />
    <a class="detalles" href="#">
        <span>Regresar</span>
    </a>
</div>

<?php 
    }
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>