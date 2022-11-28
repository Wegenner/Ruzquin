<?php 

    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";

?>


<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php
            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosActivos.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' style='background: #2f698d'> Siniestros Activos </a></li>"; 

            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosBuscar.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' > Siniestros Buscar </a></li>"; 

            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosCrear.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' > Nuevo </a></li>"; 
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

    <h2 style="text-align : center" id='totalsiniestros'>Total : </h2>

    <div class="rounded container-fluid align-items-center">

        <div class="row justify-content-center rounded" style="width: 100%;">

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center;">

                <div class="titulosEstados">
                    <p style="margin-bottom:1rem;">Recepción</p>
                </div>

                    <ul class="siniestrosIds" id="sinrecepcion">
                    </ul>

            </div>
            <div class='col-auto align-items-center columnasSiniestros' style='padding:0;width:15%;text-align:center'>
                <div class='titulosEstados'> 
                    <p>Visita</p>
                </div>

                <ul class="siniestrosIds" id="sinvisita">
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Presupuesto</p>
                </div>

                <ul class="siniestrosIds" id="sinpresupuesto">
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Autorizado</p>
                </div>

                <ul class="siniestrosIds" id="sinautorizado">
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>Espera</p>
                </div>

                <ul class="siniestrosIds" id="sinespera">
                </ul>

            </div>

            <div class="col-auto align-items-center columnasSiniestros" style="padding:0;width:15%;text-align:center">
                <div class="titulosEstados"> 
                    <p>E. E.</p>
                </div>

                <ul class="siniestrosIds" id="sinevidencias">  
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


<br>

<footer class="border-top footer text-muted">
    <div class="container">
        &copy; 2022 - Ruzquin - <a action="Privacy">Privacy</a>
    </div>
</footer>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous">
</script>
<script src="/root/js/chat_notificaciones.js"></script>
<script src="/root/js/chat_siniestro.js"></script>

</html>