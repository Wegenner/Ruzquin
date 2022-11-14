<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php"; 

    if($_POST){

        $MesInicio = $_POST['mes'];  
        $MesFin = $_POST['segundomes'];  

        $sql = "SELECT ID,siniestroId,siniestroColor, siniestroAnticipo,siniestroEstado FROM siniestromodelo WHERE siniestroFecha BETWEEN '".$MesInicio."-01 00:00:00' AND '".$MesFin."-01 00:00:00'";
    }else{
        $sql = "SELECT ID,siniestroId,siniestroColor, siniestroAnticipo,siniestroEstado FROM siniestromodelo WHERE siniestroFecha BETWEEN '2022-10-01 00:00:00' AND '2022-11-01 00:00:00'";
    }

    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
                <p style="margin-bottom:1rem;">Recepción</p>
 
                    <?php 
                        if ($result->num_rows > 0) {
                            
                        while($row = $result->fetch_assoc()) {
                    
                            if(str_contains($row["siniestroEstado"], "Recepción")){
                                echo botonsiniestro($row);
                            }

                        }
                    ?>
            </div>

            <div class="titulosEstados"> 
                <p>Visita</p>

                    
                <?php

                    while($row = $result->fetch_assoc()) {

                        if(str_contains($row["siniestroEstado"], "Visita")){
                            echo botonsiniestro($row);
                        }
                    }


                ?>

            </div>

            <div class="titulosEstados"> 
                <p>Presupuesto</p>

                    
                <?php

                    $result = $connect->query($sql);

                    while($row = $result->fetch_assoc()) {

                        if(str_contains($row["siniestroEstado"], "Presupuesto")){
                            echo botonsiniestro($row);
                        }
                    }


                    ?>

            </div>

            <div class="titulosEstados"> 
                <p>Autorizado</p>

                <?php

                $result = $connect->query($sql);

                while($row=$result->fetch_assoc()) {

                    if(str_contains($row["siniestroEstado"], "autori")){
                        echo botonsiniestro($row);
                    }
                }


                ?>


            </div>

            <div class="titulosEstados"> 
                <p>Espera</p>
                <?php

                    $result = $connect->query($sql);

                    while($row=$result->fetch_assoc()) {

                        if(str_contains($row["siniestroEstado"], "espera")){
                            echo botonsiniestro($row);
                        }
                    }


                ?>            

            </div>

            <div class="titulosEstados"> 
                <p>E. E.</p>
                
                <?php

                    $result = $connect->query($sql);

                    while($row=$result->fetch_assoc()) {

                        if(str_contains($row["siniestroEstado"], "evidencia")){
                            echo botonsiniestro($row);
                        }
                    }


                ?>

            </div>

            <div class="titulosEstados"> 
                <p>Cancelado</p>
                    
                <?php

                    $result = $connect->query($sql);

                    while($row=$result->fetch_assoc()) {

                        if(str_contains($row["siniestroEstado"], "Cancelado")){
                            echo botonsiniestro($row);
                        }
                    }


                ?>

            </div>

            <div class="titulosEstados"> 
                <p>P. D.</p>

                <?php

                    $result = $connect->query($sql);

                    while($row=$result->fetch_assoc()) {

                        if(str_contains($row["siniestroEstado"], "Pago")){
                            echo botonsiniestro($row);
                        }
                    }


                ?>

            </div>
            
            <div class="titulosEstados"> 
                <p>Facturación</p>

                <?php

                    $result = $connect->query($sql);

                    while($row=$result->fetch_assoc()) {

                        if(str_contains($row["siniestroEstado"], "Facturación")){
                            echo botonsiniestro($row);
                        }
                    }


                ?>

            </div>

        </div>

    </div>
</div>


<?php 

    }
    
    $connect->close();
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>