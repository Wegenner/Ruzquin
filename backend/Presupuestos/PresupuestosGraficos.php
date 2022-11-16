<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    $MesFin = date_create("today");
    $MesInicio = date_create("today")->modify("-1 month");

    $MesFin = $MesFin->format('Y-m-d');
    $MesInicio = $MesInicio->format('Y-m-d');

    if($_POST){

        $MesInicio = $_POST['mes'];  
        $MesFin = $_POST['segundomes'];  

        $sqlUtilidad = "SELECT SUM(presupuestoUtilidad) AS 'UtilidadNeta' FROM billingmodel WHERE (siniestroFecha BETWEEN '".$MesInicio."-01' AND '".$MesFin."-01')";
        $sqlTotales = "SELECT COUNT(ID) AS 'totales' FROM siniestromodelo WHERE (siniestroFecha BETWEEN '".$MesInicio."-01' AND '".$MesFin."-01')"; 
        $sqlCancelados = "SELECT COUNT(ID) AS 'Cancelados' FROM siniestromodelo WHERE siniestroEstado LIKE '%cance%' AND (siniestroFecha BETWEEN '".$MesInicio."-01' AND '".$MesFin."-01')";
        $sqlFacturados = "SELECT COUNT(ID) AS 'Facturados' FROM siniestromodelo WHERE siniestroEstado LIKE '%Factura%' AND (siniestroFecha BETWEEN '".$MesInicio."-01' AND '".$MesFin."-01')";
        $sqlPagodedaños = "SELECT COUNT(ID) AS 'Daños' FROM siniestromodelo WHERE siniestroEstado LIKE '%Pago%' AND (siniestroFecha BETWEEN '".$MesInicio."-01' AND '".$MesFin."-01')";

        $resultUtilidad = $connect->query($sqlUtilidad)->fetch_assoc();
        $resultTotales = $connect->query($sqlTotales)->fetch_assoc();
        $resultCancelados = $connect->query($sqlCancelados)->fetch_assoc();
        $resultFacturados = $connect->query($sqlFacturados)->fetch_assoc();
        $resultPagoDaños = $connect->query($sqlPagodedaños)->fetch_assoc();

    }else{

        $sqlUtilidad = "SELECT SUM(presupuestoUtilidad) AS 'UtilidadNeta' FROM billingmodel WHERE (siniestroFecha BETWEEN '".$MesInicio."-01' AND '".$MesFin."-01')";
        $sqlTotales = "SELECT COUNT(ID) AS 'totales' FROM siniestromodelo WHERE (siniestroFecha BETWEEN '".$MesInicio." -01' AND '".$MesFin." -01')"; 
        $sqlCancelados = "SELECT COUNT(ID) AS 'Cancelados' FROM siniestromodelo WHERE siniestroEstado LIKE '%cance%' AND (siniestroFecha BETWEEN '".$MesInicio." -01' AND '".$MesFin." -01')";
        $sqlFacturados = "SELECT COUNT(ID) AS 'Facturados' FROM siniestromodelo WHERE siniestroEstado LIKE '%Factura%' AND (siniestroFecha BETWEEN '".$MesInicio." -01' AND '".$MesFin." -01')";
        $sqlPagodedaños = "SELECT COUNT(ID) AS 'Daños' FROM siniestromodelo WHERE siniestroEstado LIKE '%Pago%' AND (siniestroFecha BETWEEN '".$MesInicio." -01' AND '".$MesFin." -01')";

        $resultUtilidad = $connect->query($sqlUtilidad)->fetch_assoc();
        $resultTotales = $connect->query($sqlTotales)->fetch_assoc();
        $resultCancelados = $connect->query($sqlCancelados)->fetch_assoc();
        $resultFacturados = $connect->query($sqlFacturados)->fetch_assoc();
        $resultPagoDaños = $connect->query($sqlPagodedaños)->fetch_assoc();

    }

    $fmt = new NumberFormatter( 'es_MX', NumberFormatter::CURRENCY );
?>


<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php
            $urlPresupuestosNav = "/backend/Presupuestos/PresupuestosTodos.php";
            echo "<li><a href='$urlPresupuestosNav' class='menuLink'> Todos </a></li>"; 
        ?>
        <?php
            $urlPresupuestosNav = "/backend/Presupuestos/PresupuestosGraficos.php";
            echo "<li><a href='$urlPresupuestosNav' class='menuLink' style='background: #2f698d'> Dashboard </a></li>"; 
        ?>
        <?php
            $urlPresupuestosNav = "/backend/Presupuestos/PresupuestosBusqueda.php";
            echo "<li><a href='$urlPresupuestosNav' class='menuLink'> Buscar </a></li>"; 
        ?>
    </ul>
</nav>




<!-- Inicio de los graficos -->

<div class="container">
    <div class="row justify-content-center">

        <div class="col">
            <h1 style="text-align: center">Balance: <?PHP echo $MesInicio." a ".$MesFin;?></h1>
        </div>

    </div>
    <br/>
</div>

<div class="container">
    <div class="container">
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

<hr/>
<br/>

<div class="container">
    <div class="row">
        <div class="col"> 

            <h2 style="text-align:center"> Siniestros </h2>

            <br/>

            <p>Totales:<input type="number" id="totales" value="<?php echo $resultTotales['totales']; ?>" readonly style="border: none;"/> </p>
            <p>Cancelados:  <input type="number" id="cancelados" value="<?php echo $resultCancelados['Cancelados']; ?>" readonly style="border: none;"/></p>
            <p>Facturados:  <input type="number" id="facturados" value="<?php echo $resultFacturados['Facturados']; ?>" readonly style="border: none;"/></p>
            <p>Pago de daños:  <input type="number" id="daños" value="<?php echo $resultPagoDaños['Daños']; ?>" readonly style="border: none;"/></p>
            <P>Activos:  <input type="number" id="activos" value="<?php echo $resultTotales['totales'] - $resultCancelados['Cancelados'] - $resultFacturados['Facturados'] - $resultPagoDaños['Daños']; ?>" readonly style="border: none;"/></p> <br>
            <P style="text-align:center; font-size: 30px">Margen de Utilidad: </p>
            <p style="text-align: center; font-size: 30px"><?php echo $fmt->formatCurrency(floatval($resultUtilidad['UtilidadNeta']), "MXN"); ?></p>

        </div>
        <div class="col" style="height:500px">

            <canvas id="myChart"></canvas>

        </div>
    </div>

</div>

<!-- Sección Chart.js -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const labels = [
        'Cancelados',
        'Facturados',
        'Pago de daños',
        'Activos',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            data: [document.getElementById('cancelados').value, document.getElementById('facturados').value,document.getElementById('daños').value,document.getElementById('activos').value],
            backgroundColor: [
                'rgb(255, 51, 51)',
                'rgb(51, 63, 255)',
                'rgb(255, 51, 255)',
                'rgb(9, 169, 75)'
            ],
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    };

</script>

<script>
    const myChart = new Chart(
    document.getElementById('myChart'),
    config
    );
</script>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>