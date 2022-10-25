<!-- Creamos una funcion iterativa que genere entradas a todas las tablas de notificaciones
    de los usuarios y genere una push notification para js/ajax de manera que sean avisados -->

    <?php 
    include $_SERVER['DOCUMENT_ROOT']."/Ruzquin/shared/_header.php";
?>

<div id="navSiniestros" class="container-fluid">
    <div class="row">
        <div class="col">
            <nav>
                <ul class="nav">
                    <?php
                        $urlPresupuestosNav = "/Ruzquin/backend/Chat/ChatGeneral.php";
                        echo "<li><a href='$urlPresupuestosNav' class='menuLink' > Chat General </a></li>"; 
                    ?>
                    <?php
                        $urlPresupuestosNav = "/Ruzquin/backend/Chat/ChatGeneral.php";
                        echo "<li><a href='#' class='menuLink' style='background: #2f698d'> Historial de Notificaciones </a></li>"; 
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

<!-- Inicio de las notificaciones -->

<div class="container">
    
    

</div>


<?php 
    include $_SERVER['DOCUMENT_ROOT']."/Ruzquin/shared/_footer.php";
?>