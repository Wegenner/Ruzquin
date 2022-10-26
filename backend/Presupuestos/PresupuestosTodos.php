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
                        echo "<li><a href='$urlPresupuestosNav' class='menuLink' style='background: #2f698d'> Todos </a></li>"; 
                    ?>
                    <?php
                        $urlPresupuestosNav = "/backend/Presupuestos/PresupuestosGraficos.php";
                        echo "<li><a href='$urlPresupuestosNav' class='menuLink' > Dashboard </a></li>"; 
                    ?>
                    <?php
                        $urlPresupuestosNav = "/backend/Presupuestos/PresupuestosBusqueda.php";
                        echo "<li><a href='$urlPresupuestosNav' class='menuLink' > Buscar </a></li>"; 
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

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>