<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    if($_POST){
        
        $id = $_POST['id'];

        $sqlpres = "SELECT * FROM billingmodel WHERE IDdbsiniestro = ".$id;

        $resultpresupuesto = $connect->query($sqlpres);

        $sqlsini = "SELECT * FROM siniestromodelo WHERE ID = ".$id;
        
        $resultsiniestro = $connect->query($sqlsini);

?>

<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php

            $urlSiniestrosNav = "/backend/Siniestros/Siniestros.php";
            echo "<li><form action='$urlSiniestrosNav' method='POST'> 
                <input class='menuLink' type='submit' value='Datos'>
                <input hidden type='number' name='id' value='".$id."'>
            </form></li>"; 

            $urlSiniestrosNav = "/backend/Presupuestos/Presupuestos.php";
            echo "<li><form action='$urlSiniestrosNav' method='POST'> 
                <input class='menuLink' type='submit' value='Presupuesto' style='background: #2f698d'>
                <input hidden type='number' name='id' value='".$id."'>
            </form></li>"; 

            $urlSiniestrosNav = "/backend/Archivos/ArchivosVer.php";
            echo "<li><form action='$urlSiniestrosNav' method='POST'> 
                <input class='menuLink' type='submit' value='Archivos'>
                <input hidden type='number' name='id' value='".$id."'>
            </form></li>"; 
        ?>
        
    </ul>
</nav>

<h1 style="text-align: center; padding-top:10px">Detalles - <?php while ($row = $resultsiniestro->fetch_assoc()){ echo $row['siniestroId']; } ?></h1>
<p style="text-align: center"><b><?php $resultsiniestro = $connect->query($sqlsini); while ($row = $resultsiniestro->fetch_assoc()){ echo date("d-m-Y", strtotime($row['siniestroFecha']));} ?></b> </p>
<hr style="width:70%" />
<div class="container">

    <?php 

        $resultpresupuesto = $connect->query($sqlpres);
        
        if($resultpresupuesto->num_rows <= 0 || is_null($resultpresupuesto)){

            $resultsiniestro = $connect->query($sqlsini);

            while ($row = $resultsiniestro->fetch_assoc()){
                echo "<form action='/backend/Presupuestos/PresupuestosCrear.php' method='POST'>
                <input class='detalles' type='number' hidden name='id' value='".$row['ID']."' >
                <input class='btn btn-info' style='width:100%' value='Crear Presupuesto' type='submit'></form>
                <br />
                <br />";
            }
        }else{
            while ($row = $resultpresupuesto->fetch_assoc()){
            echo "
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
                    <div class='col'>
                    <p><b>Anticipo : ".$row['presupuestoAnticipoProveedor']."</b> </p>
                </div>
                </div>
                    <div class='row'>
                    <div class='col'>
                        <p><b>Fecha de terminio : ".$row['siniestroFechaTermino']."</b> </p>
                    </div>
                </div>
            </div>
            <br />
                <form action='/backend/Presupuestos/PresupuestosEditar.php' method='POST'>
                <input class='detalles' type='number' hidden name='getid' value='".$row['IDdbsiniestro']."' >
                <input class='btn btn-info' style='width:100%' value='Editar Presupuesto' type='submit'></form>
            <br />
            <br />";
            }
        }


    ?>

<?php 
    }
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>