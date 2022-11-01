<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    if($_POST){

        $MesBuscado = $_POST['mes'];  

        $sql = "SELECT ID,siniestroId,siniestroColor, siniestroAnticipo,siniestroEstado FROM siniestromodelo WHERE siniestroFecha BETWEEN '".$MesBuscado."-01 00:00:00' AND '".$MesBuscado."-28 00:00:00'";
    }else{
        $sql = "SELECT ID,siniestroId,siniestroColor, siniestroAnticipo,siniestroEstado FROM siniestromodelo WHERE siniestroFecha BETWEEN '2022-10-01 00:00:00' AND '2022-11-01 00:00:00'";
    }

    $result = $connect->query($sql);
?>

<div id="navSiniestros" class="container-fluid">
    <div class="row">
        <div class="col" sytle="align-items: start">
            <nav>
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
        </div>
        <div class="col" style="text-align:end">
        <form action="/backend/Siniestros/SiniestrosResultados.php" method="POST">   

            <input type="text" name="id" style="border-radius:13px"/>

            <input type="submit" class="btn btn-dark" style="border-radius: 20px !important" value="Buscar">

        </form>
            <button type="button" style="background-color:#687e8c; 
                                            line-height: 1.5;
                                            border-radius: 16px"
                class="btn btn-secondary"> Nuevo </button>
        </div>
    </div>
</div>

<!-- Fin del nav de siniestros e inicio de la pagina -->


<div class="container">
    <div class="container">

        <div class="row">
            <div class="col" style="text-align:center">

                <h1 style="margin-top:15px">Siniestros</h1>
                
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col">

                <button type="button" style="background-color:#687e8c; 
                                            margin-top: 10px;
                                            width: 120px;
                                            line-height: 1.5;
                                            border-radius: 3px"
                class="btn btn-secondary"> Nuevo </button>

            </div>
            <form action="/backend/Siniestros/SiniestrosBuscar.php" method="post">
                <div class="col" style="align-content:flex-end">

                    <input type="month" name="mes" class="form-control" style="margin-top:10px" />

                </div>

                <div class="col" style="text-align:end">

                    <input type="submit" style="width: 120px; line-height: 1.5; border-radius: 3px;margin-top:10px" value="Buscar" class="btn btn-primary DetallesSiniestros" /> 
            
                </div>
            </form>
            
        </div>

    </div>

    <hr />

    <h2 style="text-align : center">Total : <?php echo $result->num_rows ?></h2>

    <div class="rounded container-fluid align-items-center">

        <div class="row justify-content-center rounded" style="width: 100%;">

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">

                <div class="titulosEstados">
                    <p style="margin-bottom:1rem;">Recepción</p>
                </div>

                    <ul id="siniestrosIds">
                        
                      
                        <?php 
                            $result = $connect->query($sql);
                                if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                            
                                    if(str_contains($row["siniestroEstado"], "Recepción")){
                                        if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
                                            echo "<a class='LigaSiniestros' id='normal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                        }
                                        if($row["siniestroColor"] == 1 ){
                                            echo "<a class='LigaSiniestros' id='conqueja' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                        }
                                        if($row["siniestroColor"] == 2 ){
                                            echo "<a class='LigaSiniestros' id='conmasde3meses' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                        }
                                        if($row["siniestroColor"] == 3 ){
                                            echo "<a class='LigaSiniestros' id='problemaconseguro' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                        }
                                        if($row["siniestroColor"] == 4 ){
                                            echo "<a class='LigaSiniestros' id='nnecesitafacturaormal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                        }
                                        if($row["siniestroColor"] == 5 ){
                                            echo "<a class='LigaSiniestros' id='conanticipoaproveedor' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                        }
                                        if($row["siniestroColor"] == 6 ){
                                            echo "<a class='LigaSiniestros' id='pendientedeale' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                        }
                                    }

                                }
                        ?>
                    
                    </ul>

            </div>
            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Visita</p>
                </div>

                <ul class="siniestrosIds">
                        
                    <?php

                        $result = $connect->query($sql);

                        while($row=$result->fetch_assoc()) {

                            if(str_contains($row["siniestroEstado"], "Visita")){
                                if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
                                    echo "<a class='LigaSiniestros' id='normal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 1 ){
                                    echo "<a class='LigaSiniestros' id='conqueja' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 2 ){
                                    echo "<a class='LigaSiniestros' id='conmasde3meses' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 3 ){
                                    echo "<a class='LigaSiniestros' id='problemaconseguro' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 4 ){
                                    echo "<a class='LigaSiniestros' id='nnecesitafacturaormal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 5 ){
                                    echo "<a class='LigaSiniestros' id='conanticipoaproveedor' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 6 ){
                                    echo "<a class='LigaSiniestros' id='pendientedeale' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
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

                        while($row=$result->fetch_assoc()) {

                            if(str_contains($row["siniestroEstado"], "Presupuesto")){
                                if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
                                    echo "<a class='LigaSiniestros' id='normal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 1 ){
                                    echo "<a class='LigaSiniestros' id='conqueja' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 2 ){
                                    echo "<a class='LigaSiniestros' id='conmasde3meses' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 3 ){
                                    echo "<a class='LigaSiniestros' id='problemaconseguro' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 4 ){
                                    echo "<a class='LigaSiniestros' id='nnecesitafacturaormal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 5 ){
                                    echo "<a class='LigaSiniestros' id='conanticipoaproveedor' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 6 ){
                                    echo "<a class='LigaSiniestros' id='pendientedeale' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
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

                    while($row=$result->fetch_assoc()) {

                        if(str_contains($row["siniestroEstado"], "autori")){
                            if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
                                echo "<a class='LigaSiniestros' id='normal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                            }
                            if($row["siniestroColor"] == 1 ){
                                echo "<a class='LigaSiniestros' id='conqueja' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                            }
                            if($row["siniestroColor"] == 2 ){
                                echo "<a class='LigaSiniestros' id='conmasde3meses' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                            }
                            if($row["siniestroColor"] == 3 ){
                                echo "<a class='LigaSiniestros' id='problemaconseguro' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                            }
                            if($row["siniestroColor"] == 4 ){
                                echo "<a class='LigaSiniestros' id='nnecesitafacturaormal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                            }
                            if($row["siniestroColor"] == 5 ){
                                echo "<a class='LigaSiniestros' id='conanticipoaproveedor' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                            }
                            if($row["siniestroColor"] == 6 ){
                                echo "<a class='LigaSiniestros' id='pendientedeale' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
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

                        while($row=$result->fetch_assoc()) {

                            if(str_contains($row["siniestroEstado"], "espera")){
                                if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
                                    echo "<a class='LigaSiniestros' id='normal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 1 ){
                                    echo "<a class='LigaSiniestros' id='conqueja' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 2 ){
                                    echo "<a class='LigaSiniestros' id='conmasde3meses' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 3 ){
                                    echo "<a class='LigaSiniestros' id='problemaconseguro' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 4 ){
                                    echo "<a class='LigaSiniestros' id='nnecesitafacturaormal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 5 ){
                                    echo "<a class='LigaSiniestros' id='conanticipoaproveedor' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 6 ){
                                    echo "<a class='LigaSiniestros' id='pendientedeale' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
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

                        while($row=$result->fetch_assoc()) {

                            if(str_contains($row["siniestroEstado"], "evidencia")){
                                if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
                                    echo "<a class='LigaSiniestros' id='normal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 1 ){
                                    echo "<a class='LigaSiniestros' id='conqueja' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 2 ){
                                    echo "<a class='LigaSiniestros' id='conmasde3meses' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 3 ){
                                    echo "<a class='LigaSiniestros' id='problemaconseguro' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 4 ){
                                    echo "<a class='LigaSiniestros' id='nnecesitafacturaormal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 5 ){
                                    echo "<a class='LigaSiniestros' id='conanticipoaproveedor' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 6 ){
                                    echo "<a class='LigaSiniestros' id='pendientedeale' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                            }
                        }


                    ?>
                
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Cancelado</p>
                </div>

                <ul class="siniestrosIds">
                        
                    <?php

                        $result = $connect->query($sql);

                        while($row=$result->fetch_assoc()) {

                            if(str_contains($row["siniestroEstado"], "Cancelado")){
                                if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
                                    echo "<a class='LigaSiniestros' id='normal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 1 ){
                                    echo "<a class='LigaSiniestros' id='conqueja' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 2 ){
                                    echo "<a class='LigaSiniestros' id='conmasde3meses' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 3 ){
                                    echo "<a class='LigaSiniestros' id='problemaconseguro' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 4 ){
                                    echo "<a class='LigaSiniestros' id='nnecesitafacturaormal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 5 ){
                                    echo "<a class='LigaSiniestros' id='conanticipoaproveedor' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 6 ){
                                    echo "<a class='LigaSiniestros' id='pendientedeale' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                            }
                        }


                    ?>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>P. D.</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <?php

                        $result = $connect->query($sql);

                        while($row=$result->fetch_assoc()) {

                            if(str_contains($row["siniestroEstado"], "Pago")){
                                if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
                                    echo "<a class='LigaSiniestros' id='normal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 1 ){
                                    echo "<a class='LigaSiniestros' id='conqueja' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 2 ){
                                    echo "<a class='LigaSiniestros' id='conmasde3meses' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 3 ){
                                    echo "<a class='LigaSiniestros' id='problemaconseguro' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 4 ){
                                    echo "<a class='LigaSiniestros' id='nnecesitafacturaormal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 5 ){
                                    echo "<a class='LigaSiniestros' id='conanticipoaproveedor' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 6 ){
                                    echo "<a class='LigaSiniestros' id='pendientedeale' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                            }
                        }


                    ?>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
            
                <div class="titulosEstados"> 
                    <p>Facturación</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <?php

                        $result = $connect->query($sql);

                        while($row=$result->fetch_assoc()) {

                            if(str_contains($row["siniestroEstado"], "Facturación")){
                                if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
                                    echo "<a class='LigaSiniestros' id='normal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 1 ){
                                    echo "<a class='LigaSiniestros' id='conqueja' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 2 ){
                                    echo "<a class='LigaSiniestros' id='conmasde3meses' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 3 ){
                                    echo "<a class='LigaSiniestros' id='problemaconseguro' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 4 ){
                                    echo "<a class='LigaSiniestros' id='nnecesitafacturaormal' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 5 ){
                                    echo "<a class='LigaSiniestros' id='conanticipoaproveedor' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                                if($row["siniestroColor"] == 6 ){
                                    echo "<a class='LigaSiniestros' id='pendientedeale' href='/backend/Siniestros/Siniestros.php' >".$row['siniestroId']."</a>";
                                }
                            }
                        }


                    ?>
                    
                </ul>

            </div>

        </div>

    </div>
</div>


<?php 

    }
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>