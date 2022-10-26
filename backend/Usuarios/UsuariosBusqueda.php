<?php 
    include $_SERVER['DOCUMENT_ROOT']."/public_html/shared/_header.php";
?>

<div id="navSiniestros" class="container-fluid">
    <div class="row">
        <div class="col">
            <nav>
                <ul class="nav">
                    <?php
                        $urlPresupuestosNav = "/public_html/backend/Usuarios/UsuariosTodos.php";
                        echo "<li><a href='$urlPresupuestosNav' class='menuLink' style='background: #2f698d'> Todos </a></li>"; 
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
    include $_SERVER['DOCUMENT_ROOT']."/public_html/shared/_footer.php";
?>