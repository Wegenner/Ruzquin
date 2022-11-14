<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>


<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php
            $urlPresupuestosNav = "/backend/Usuarios/UsuariosTodos.php";
            echo "<li><a href='$urlPresupuestosNav' class='menuLink' style='background: #2f698d'> Todos </a></li>"; 
        ?>
    </ul>
</nav>


<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>