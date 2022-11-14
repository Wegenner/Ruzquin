<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php"; 

    if($_POST){

        $IdBuscado = filtrodedatos($_POST['id']);  

        $sql = "SELECT * FROM siniestromodelo WHERE siniestroId = ".$IdBuscado;
    }

    $result = $connect->query($sql);
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



<!-- Fin del nav de siniestros e inicio de la pagina -->


<div class="container">
    <div class="container">

        <div class="row">
            <div class="col" style="text-align:center">

                <h1 style="margin-top:15px">Siniestros</h1>
                
            </div>
        </div>

        <div class="row justify-content-center">
            <form action="/backend/Siniestros/SiniestrosBuscar.php" method="post">
                <div style="align-content:flex-end; display:flex; ">

                    <label for="mes" style="margin-top:13px"> Desde: </label>
                    <input type="month" name="mes" id="mes" class="form-control" style="margin:9px" required/>

                    <label for="segundomes" style="margin-top:13px"> Hasta: </label>
                    <input type="month" name="segundomes" id="segundomes" class="form-control" style="margin:9px" required/>

                    <input type="submit" style="width: 120px; line-height: 1.5; border-radius: 3px;margin-top:10px" value="Buscar" class="btn btn-primary DetallesSiniestros" /> 
            
                </div>
            </form>
            
        </div>

    </div>

    <hr />


    <h2 style="text-align : center">Total : <?php echo $result->num_rows ?></h2>

    <div class="align-items-center" style="display:flex">

        <div style="width: 100%;">

            <div class="titulosEstados">
                <p style="margin-bottom:1rem;">Siniestros</p>

                <?php 

                    while($row = $result->fetch_assoc()){
                        echo botonsiniestro($row);
                    }

                ?>
            </div>
        
        </div>

    </div>
</div>



<?php 

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>