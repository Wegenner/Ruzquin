<!-- Creamos una funcion iterativa que genere entradas a todas las tablas de notificaciones
    de los usuarios y genere una push notification para js/ajax de manera que sean avisados -->

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
	include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";

    $sqlNoti = "";
?>

<div id="navSiniestros" class="container-fluid">
    <div class="row">
        <div class="col">
            <nav>
                <ul class="nav">
                    <?php
                        $urlPresupuestosNav = "/backend/Chat/ChatGeneral.php";
                        echo "<li><a href='$urlPresupuestosNav' class='menuLink' > Chat General </a></li>"; 
                    ?>
                    <?php
                        $urlPresupuestosNav = "/backend/Chat/ChatGeneral.php";
                        echo "<li><a href='#' class='menuLink' style='background: #2f698d'> Historial de Notificaciones </a></li>"; 
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Inicio de las notificaciones -->

<div class="container generalnot">

</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>

