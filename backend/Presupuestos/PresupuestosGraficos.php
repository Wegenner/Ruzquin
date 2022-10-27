<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>

<div id="navSiniestros" class="container-fluid">
    <div class="row">
        <div class="col">
            <nav>
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
        </div>
        <div class="col" style="text-align:end">
            <input type="text" style="border-radius:13px;"/>

            <button type="button" class="btn btn-dark" style="border-radius: 20px !important"> Buscar </button>
        </div>
    </div>
</div>

<!-- Inicio de los graficos -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container">
        <div class="row justify-content-center">

            <div class="col">
                <h1 style="text-align: center">Balance - 05 / 2022</h1>
            </div>

        </div>
        <br/>
    </div>

    <div class="container">
        <div class="row">
            <div class="col" style="width: 50%">
                <form action="BalanceMes.php" style="text-align:center">

                    <h3>Busqueda por mes:</h3>

                    <input type="month" name="mes" class="form-control" />

                    <br/>

                    <input type="submit" style="width: 120px; line-height: 1.5; border-radius: 3px; margin-top: -12px" value="Buscar" class="btn btn-primary DetallesSiniestros" /> 

                </form>
            </div>
            <div class="col" style="width: 50%">
                <form action="BalanceAnual.php" style="text-align:center">

                    <h3>Busqueda por año:</h3>
                
                    <input type="year" name="ano" class="form-control" />

                    <br/>

                    <input type="submit" style="width: 120px; line-height: 1.5; border-radius: 3px; margin-top: -12px" value="Buscar" class="btn btn-primary DetallesSiniestros" /> 

                </form>
            </div>
        </div>
    </div>

    <hr/>
    <br/>

        <div class="container">
            <div class="row">
                <div class="col"> 

                    <h2 style="text-align:center"> Siniestros </h2>

                    <br/>

                    <p>Totales:  600</p>
                    <p>Cancelados:  150</p>
                    <p>Facturados:  150</p>
                    <p>Pago de daños:  150</p>
                    <P>Otros:  150</p> <br>
                    <P style="text-align:center; font-size: 30px">Margen de Utilidad: </p>
                    <p style="text-align: center; font-size: 30px">$ 1,000,000.00</p>

                </div>
                <div class="col" style="height:500px">

                    <canvas id="myChart"></canvas>

                </div>
            </div>

        </div>

<!-- Sección Chart.js -->

<script>
    const labels = [
        'Cancelados',
        'Facturados',
        'Pago de daños',
        'Otros',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            data: [150, 150, 150,150],
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