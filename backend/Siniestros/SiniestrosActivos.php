<?php 

    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php"; 

    $sql = "SELECT ID,siniestroId,siniestroColor, siniestroAnticipo,siniestroEstado FROM siniestromodelo WHERE (siniestroEstado != 'Cancelado')AND(siniestroEstado != 'Facturación')AND(siniestroEstado != 'Facturación ')AND(siniestroEstado != 'Facturacion')AND(siniestroEstado != 'Pago de daños')AND(siniestroFecha BETWEEN '2022-05-01 00:00:00' AND '2022-11-01 00:00:00')";

    $result = $connect->query($sql);

?>


<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php
            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosActivos.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' style='background: #2f698d'> Siniestros Activos </a></li>"; 
        ?>
        <?php
            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosBuscar.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' > Siniestros Buscar </a></li>"; 
        ?>
        
    </ul>
</nav>


<!-- Fin del nav de siniestros e inicio de la pagina -->

<div class="container">
    <div class="container">

        <div class="row">
            <div class="col" style="text-align:center">

                <h1 style="margin-top:15px">Siniestros Activos (3 Meses)</h1>
                
            </div>
        </div>

    </div>

    <hr />

    <h2 style="text-align : center">Total : <?php echo $result->num_rows ?></h2>

    <div class="rounded container-fluid align-items-center">

        <div class="row justify-content-center rounded" style="width: 100%;">

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center;">

                <div class="titulosEstados">
                    <p style="margin-bottom:1rem;">Recepción</p>
                </div>

                    <ul id="siniestrosIds">
                        
                        <?php 
                        
                            $result = $connect->query($sql);

                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                        
                                if(str_contains($row["siniestroEstado"], "Recepción")){
                                    echo botonsiniestro($row);
                                }

                            }
                    ?>


</ul>

    </div>
    <div class='col-auto align-items-center columnasSiniestros' style='padding:0;width:15%;text-align:center'>
        <div class='titulosEstados'> 
            <p>Visita</p>
        </div>

        <ul class='siniestrosIds'>

                        <?php

                        $result = $connect->query($sql);

                        while($row=$result->fetch_assoc()) {

                            if(str_contains($row["siniestroEstado"], "Visita")){
                                echo botonsiniestro($row);
                            }
                        }

                        }

                        ?>
                
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Presupuesto</p>
                </div>

                <ul class="siniestrosIds">
                        <?php  
                        
                        $result = $connect->query($sql);
                        
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {

                            if(str_contains($row["siniestroEstado"], "Presupuesto")){
                                echo botonsiniestro($row);
                            }
                            }
                        }
                        ?>

                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Autorizado</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <?php     

                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        if(str_contains($row["siniestroEstado"], "Autorizado")){
                            echo botonsiniestro($row);
                        }
                        }
                    }
                    ?>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Espera</p>
                </div>

                <ul class="siniestrosIds">

                    <?php   
                    
                        $result = $connect->query($sql);
                    
                        if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        if(str_contains($row["siniestroEstado"], "espera")){
                            echo botonsiniestro($row);
                        }
                        }
                    }
                    ?>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>E. E.</p>
                </div>

                <ul class="siniestrosIds">

                    <?php  

                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {   
                            while($row = $result->fetch_assoc()) {
                                if(str_contains($row["siniestroEstado"], "evidencia")){
                                    echo botonsiniestro($row);
                                }

                            }
                        }

                    ?>
                
                </ul>

            </div>

        </div>

    </div>
</div>
<div class="container">
    <br />
    <h2 style="text-align:center"> Acotaciones</h2>
    <hr />
    <br />
    <a class="LigaSiniestros" id="conqueja" href="#" > Siniestro con queja </a>
    <a class="LigaSiniestros" id="conmasde3meses" href="#" >Siniestro con mas de 3 meses</a>
    <a class="LigaSiniestros" id="problemaconseguro" href="#" >Siniestro problemas con el seguro</a>
    <a class="LigaSiniestros" id="necesitafactura" href="#" >Siniestro necesita factura</a>
    <a class="LigaSiniestros" id="conanticipoaproveedor" href="#" >Siniestro con anticipo proveedor</a>
    <a class="LigaSiniestros" id="pendientedeale" href="#" >Siniestro pendiente Alejandro</a>
</div>
<br />

<?php

    $connect->close();
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";

?>