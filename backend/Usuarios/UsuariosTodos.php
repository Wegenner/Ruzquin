<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";

    $sqlusuarios = "SELECT * FROM usuarios";

    $lista = $connect->query($sqlusuarios);
?>


<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php
            $urlPresupuestosNav = "/backend/Usuarios/UsuariosTodos.php";
            echo "<li><a href='$urlPresupuestosNav' class='menuLink' style='background: #2f698d'> Todos </a></li>"; 
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
            <th scope="col">Nombre</th>
            <th scope="col">Rol</th>
            <th scope="col" style="text-align:center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $lugar = 0;
                while($row = $lista->fetch_assoc()){
            ?>
                <tr>
                    <th scope="row"> <?php echo $lugar; $lugar += 1; ?></th>
                    <td style="display:inline-block"><?php echo $row['UserName'];?></td>
                    <td><?php echo $row['UserRoles'];?></td>
                    <td>
                    <form style="display:inline-block" action='/backend/Usuarios/UsuariosEditar.php' method='POST'>
                        <input class='detalles' type='number' hidden name='idusuario' value="<?PHP echo $row['ID']; ?>" >
                        <input class='btn btn-primary' value="Detalles" type='submit'>
                    </form>
                    <form style="display:inline-block" action='/backend/Database/preguntaprevia.php' method='POST'>
                        <input class='detalles' type='number' hidden name='idusuario' value="<?PHP echo $row['ID']; ?>" >
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