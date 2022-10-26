<?php 
    include $_SERVER['DOCUMENT_ROOT']."/Ruzquin/shared/_header.php";
?>

<div id="navSiniestros" class="container-fluid">
    <div class="row">
        <div class="col">
            <nav>
                <ul class="nav">
                    <?php
                        $urlSiniestrosNav = "/Ruzquin/backend/Siniestros/SiniestrosActivos.php";
                        echo "<li><a href='$urlSiniestrosNav' class='menuLink' style='background: #2f698d'> Siniestros Activos </a></li>"; 
                    ?>
                    <?php
                        $urlSiniestrosNav = "/Ruzquin/backend/Siniestros/SiniestrosBuscar.php";
                        echo "<li><a href='$urlSiniestrosNav' class='menuLink' > Siniestros Buscar </a></li>"; 
                    ?>
                </ul>
            </nav>
        </div>
        <div class="col" style="text-align:end">
            <input type="text" style="border-radius:13px;"/>

            <button type="button" class="btn btn-dark" style="border-radius: 20px !important"> Buscar </button>

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

    </div>

    <hr />

    <h2 style="text-align : center">Total : @Model.Count()</h2>

    <div class="rounded container-fluid align-items-center">

        <div class="row justify-content-center rounded" style="width: 100%;">

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center;">

                <div class="titulosEstados">
                    <p style="margin-bottom:1rem;">Recepción</p>
                </div>

                    <ul id="siniestrosIds">
                        
                        <a class="LigaSiniestros" id="conqueja" href="#" >@sini</a>
                        <a class="LigaSiniestros" id="conmasde3meses" href="#" >@sini2</a>
                        <a class="LigaSiniestros" id="problemaconseguro" href="#" >@sini3</a>
                        <a class="LigaSiniestros" id="necesitafactura" href="#" >@sini4</a>
                        <a class="LigaSiniestros" id="conanticipoaproveedor" href="#" >@sini5</a>
                        <a class="LigaSiniestros" id="pendientedeale" href="#" >@sini6</a>
                    
                    </ul>

            </div>
            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Visita</p>
                </div>

                <ul class="siniestrosIds">
                    
                        <a class="LigaSiniestros" href="#">@sini</a>
                
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Presupuesto</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>

                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Autorizado</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Espera</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>
                    
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>E. E.</p>
                </div>

                <ul class="siniestrosIds">
                    
                    <a class="LigaSiniestros" href="#">@sini</a>
                
                </ul>

            </div>

        </div>

    </div>
</div>
<div class="container">

</div>


<?php 
    include $_SERVER['DOCUMENT_ROOT']."/Ruzquin/shared/_footer.php";
?>