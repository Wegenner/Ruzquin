<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    if($_POST){
        
        $id = $_POST['id'];

        $sqlsini = "SELECT * FROM siniestromodelo WHERE ID = ".$id;
        
        $resultsiniestro = $connect->query($sqlsini);

        $sqlpres = "SELECT * FROM billingmodel WHERE IDdbsiniestro = ".$id;

        $resultpresupuesto = $connect->query($sqlpres);

?>

<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php

            $urlSiniestrosNav = "/backend/Siniestros/Siniestros.php";
            echo "<li><form action='$urlSiniestrosNav' method='POST'> 
                <input hidden type='number' name='id' value='".$id."'>
                <input class='menuLink' type='submit' value='Datos' style='background: #2f698d'>
            </form></li>"; 

            $urlSiniestrosNav = "/backend/Presupuestos/Presupuestos.php";
            echo "<li><form action='$urlSiniestrosNav' method='POST'> 
                <input hidden type='number' name='id' value='".$id."'>
                <input class='menuLink' type='submit' value='Presupuesto'>
            </form></li>"; 

            $urlSiniestrosNav = "/backend/Archivos/ArchivosVer.php";
            echo "<li><form action='$urlSiniestrosNav' method='POST'> 
                <input hidden type='number' name='id' value='".$id."'>
                <input class='menuLink' type='submit' value='Archivos'>
            </form></li>"; 
        ?>
        
    </ul>
</nav>

<h1 style="text-align: center; padding-top:10px">Detalles - <?php while ($row = $resultsiniestro->fetch_assoc()){ echo $row['siniestroId']; } ?></h1>
<p style="text-align: center"><b><?php $resultsiniestro = $connect->query($sqlsini); while ($row = $resultsiniestro->fetch_assoc()){ echo date("d-m-Y", strtotime($row['siniestroFecha']));} ?></b> </p>
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
                <input class='detalles' type='number' hidden name='getid' value='".$row['ID']."' >
                <input class='detalles' type='submit' value='Editar'>
            </form>
            <br />
            <form action='/backend/Database/preguntaprevia.php' method='POST'>
                <input class='detalles' type='number' hidden name='idsiniestro' value='".$row['ID']."' >
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

<?php 
    }
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>