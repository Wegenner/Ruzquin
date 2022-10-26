<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>

<div id="navSiniestros" class="container-fluid">
    <div class="row">
        <div class="col">
            <nav>
                <ul class="nav">
                    <?php
                        $urlPresupuestosNav = "/backend/Usuarios/UsuariosTodos.php";
                        echo "<li><a href='$urlPresupuestosNav' class='menuLink' style='background: #2f698d'> Todos </a></li>"; 
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

<!-- Aqui comienza la pagina -->

<div class="container Table-Responsive">
    <br/>
    <table class="table table-striped">
        <thead style="background:#2f393f; color:white">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Rol</th>
            <th scope="col">Detalles</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Edain</td>
            <td>Externa</td>
            <td><button type="button" href="#" class="btn btn-primary" style="padding:5px; margin:0px;"> Detalles</button></td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Alejandro</td>
            <td>Administrador</td>
            <td><button type="button" href="#" class="btn btn-primary" style="padding:5px; margin:0px;"> Detalles</button></td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Bladimir</td>
            <td>Gerente</td>
            <td><button type="button" href="#" class="btn btn-primary" style="padding:5px; margin:0px;"> Detalles</button></td>
            </tr>
        </tbody>
    </table>
</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>