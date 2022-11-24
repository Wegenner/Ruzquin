<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 
    include $_SERVER['DOCUMENT_ROOT']."/backend/Sistema/SistemaCrearNotificacion.php"; 

    $noti = new Notificacion();

    $id = $_POST['id'];

    $sqlsiniestro = "SELECT * FROM siniestromodelo WHERE ID ='".$id."' LIMIT 1";

    $siniestro = $connect->query($sqlsiniestro)->fetch_assoc();

    $fecha = date("d-m-Y", strtotime($siniestro['siniestroFecha']));

    $carpeta = $_SERVER['DOCUMENT_ROOT']."/root/Archivos/".$siniestro['ID']."_".$fecha."_".$siniestro['ID'];

    $toopenfile = "/root/Archivos/".$siniestro['ID']."_".$fecha."_".$siniestro['ID']; 

    if(isset($_POST['borraritem'])){
        unlink($carpeta."/".$_POST['borraritem']);
        $noti->notificar($_SESSION['nombre'],"elimino archivos", $id);

    }

    if(isset($_POST['waaagh']) && !isset($_POST['borraritem'])){

        if(!is_dir($carpeta)){        
            if(!mkdir($carpeta, 0777)){
                echo "No se pudo :c";
            }
        }

        $archivos = array_filter($_FILES['archivos']['name']);

        $cantidad = count($_FILES['archivos']['name']);

        for($i=0 ;$i < $cantidad ; $i++){
            $direcciontemporal = $_FILES['archivos']['tmp_name'][$i];
            if($direcciontemporal != ""){
                $nuevadireccion = $carpeta."/".pathinfo($_FILES['archivos']['name'][$i],PATHINFO_FILENAME)."_".$siniestro['siniestroId']."_".$fecha.".".strtolower(pathinfo($_FILES['archivos']['name'][$i],PATHINFO_EXTENSION));
                move_uploaded_file($direcciontemporal, $nuevadireccion);
            }
        }
        
        $noti->notificar($_SESSION['nombre'],"subió archivos", $id);
    }

    if($_POST){

        $sqlsini = "SELECT * FROM siniestromodelo WHERE ID = '".$id."' LIMIT 1";
        
        $resultsiniestro = $connect->query($sqlsini);

        $siniestroCodigo = $resultsiniestro->fetch_assoc();
        $siniestroCodigo = $siniestroCodigo['siniestroId'];

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
                <input class='menuLink' type='submit' value='Presupuesto'>
                <input hidden type='number' name='id' value='".$id."'>
            </form></li>"; 

            $urlSiniestrosNav = "/backend/Archivos/ArchivosVer.php";
            echo "<li><form action='$urlSiniestrosNav' method='POST'> 
                <input class='menuLink' type='submit' value='Archivos' style='background: #2f698d'>
                <input hidden type='number' name='id' value='".$id."'>
            </form></li>"; 
        ?>
        
    </ul>
</nav>

<!-- Comienza la pagina-->

<h1 style="text-align:center; margin-top:20px"> Archivos - <?php echo $siniestroCodigo;?></h1>

<hr />
<br />

<?php 


    if(is_dir($carpeta)){

        $archivos = scandir($carpeta."/");

        if(count($archivos) > 2){

       
        ?>
<!-- Si si tenemos archivos -->

<div class="container">
    <div class="row">
        <!-- Area de documentos -->
            <div class="container">
                
                    <h3 style="text-align:center"> Documentos</h3>
                    <hr class="hr hr-blurry" />
                    <br/>

                <!-- Elemento "documento" -->
    <?php         
            foreach($archivos as $file){

                $filetypes = strtolower(pathinfo($file,PATHINFO_EXTENSION));
                     
                if($filetypes == 'pdf' || $filetypes == 'doc' || $filetypes == 'docx' || $filetypes == 'csv' || $filetypes == 'xls' || $filetypes == 'xlsm' || $filetypes == 'xml'){
                 
                    echo   "<div class='row'>
                        <div class='col'>

                            <a href='".$toopenfile."/".$file."' target='_blank'> ".$file." </a>

                        </div>
                        <div class='col' style='text-align: end'>
                            <form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>
                                <input hidden name='borraritem' type='text' value='".$file."'>
                                <input hidden name='id' type='number' value='".$id."'>
                                <input class='eliminarArchivos' type='submit' name='borrar' value='Eliminar'>
                            </form>

                        </div>
                    </div>
                    <br/>";
                }
            } 
        }

        if(count($archivos) > 2){
    ?>
            </div>
    </div>

    <div class="container">
            <!-- Carga cuando si hay imagenes en la carpeta del siniestro -->
            <div>
                <h3 style="text-align:center"> Imagenes</h3>
                <hr class="hr hr-blurry" />
                <br/>
                <div class="container">
                    <div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
                        
                    <!-- Cada elemento de imagen para el while -->
        <?php

            foreach($archivos as $file){

                $filetypes = strtolower(pathinfo($file,PATHINFO_EXTENSION));
                     
                if($filetypes == 'jpg' || $filetypes == 'jpeg' || $filetypes == 'png' ){
                 
                    echo "<div class='col-12 col-md-6 col-lg-3' style='text-align:center'>
                    <a href='".$toopenfile."/".$file."' target='_blank'>
                        <img src='".$toopenfile."/".$file."' style='width:230px; height:300px; margin: 10px 0 10px 0' data-target='#indicators' alt='' />
                    </a>
                    <form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>
                        <input hidden name='borraritem' type='text' value='".$file."'>
                        <input hidden name='id' type='number' value='".$id."'>
                        <input class='eliminarArchivos' type='submit' name='borrar' value='Eliminar'>
                    </form>
                    </div>";
                }
            }
        }
         
        ?>

                        
                    </div>
                </div>
            </div>
    </div>
</div>

<br/>
<br/>

<?php } ?>

<div class="container">
    <div class="row">
        <div class="col">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">

                <input name="id" value="<?php echo $id;?>" readonly />
                <br /><br />
                <div>
                    <label for="formFileMultiple">Seleccione sus archivos</label>
                    <input class="form-control-file" style="background: #a2b0b8; border-radius: 5px" type="file" id="formFileMultiple" name="archivos[]" multiple required>
                </div>

                <div>
                    <br />
                    <input type="submit" value="Subir" name="waaagh" class="btn btn-primary detalles" style="margin:2px" />
                </div>

            </form>
            <br />
            <a class="detalles" href="/backend/Siniestros/Siniestros.php">Regresar</a>
        </div>
    </div>
</div>

<br>

<?php 
        
    }

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>