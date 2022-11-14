<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>


<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php
            $urlPresupuestosNav = "/backend/Presupuestos/PresupuestosTodos.php";
            echo "<li><a href='$urlPresupuestosNav' class='menuLink'> Todos </a></li>"; 
        ?>
        <?php
            $urlPresupuestosNav = "/backend/Presupuestos/PresupuestosGraficos.php";
            echo "<li><a href='$urlPresupuestosNav' class='menuLink'> Dashboard </a></li>"; 
        ?>
        <?php
            $urlPresupuestosNav = "/backend/Presupuestos/PresupuestosBusqueda.php";
            echo "<li><a href='$urlPresupuestosNav' class='menuLink' style='background: #2f698d'> Buscar </a></li>"; 
        ?>
    </ul>
</nav>


<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>