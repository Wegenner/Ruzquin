<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php";

    $sqlbilling = "SELECT * FROM billingmodel ORDER BY siniestroFecha DESC LIMIT 15";

    $lista = $connect->query($sqlbilling);
?>

<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
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

<!-- Aqui comienza la pagina -->

<div class="container Table-Responsive">
    <br/>
    <table class="table table-striped">
        <thead style="background:#2f393f; color:white">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Siniestro</th>
            <th scope="col">Utilidad</th>
            <th scope="col" style="text-align:center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $lugar = 1;
                while($row = $lista->fetch_assoc()){
            ?>
                <tr>
                    <th scope="row"> <?php echo $lugar; $lugar += 1; ?></th>
                    <td style="display:inline-block"><?php echo $row['siniestroId'];?></td>
                    <td><?php echo $row['presupuestoUtilidad'];?></td>
                    <td>
                    <form style="display:inline-block" action='/backend/Presupuestos/PresupuestosEditar.php' method='POST'>
                        <input class='detalles' type='number' hidden name='getid' value="<?PHP echo $row['IDdbsiniestro']; ?>" >
                        <input class='btn btn-primary' value="Detalles" type='submit'>
                    </form>
                    <form style="display:inline-block" action='/backend/Database/preguntaprevia.php' method='POST'>
                        <input class='detalles' type='number' hidden name='idpresu' value="<?PHP echo $row['ID']; ?>" >
                        <input class='btn btn-danger' value="Eliminar" type='submit'>
                    </form>
                    </td>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</div>



<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>