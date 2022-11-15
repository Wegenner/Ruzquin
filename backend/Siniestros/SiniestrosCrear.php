<?php

    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    $sqlproveedores = "SELECT * FROM usuarios WHERE UserRoles = 5";

?>

<nav class="navbar navbar-light justify-content-between" style="background-color: #7f8e9d;">
    <ul class="nav">
        <?php
            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosActivos.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' > Siniestros Activos </a></li>"; 

            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosBuscar.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' > Siniestros Buscar </a></li>"; 

            $urlSiniestrosNav = "/backend/Siniestros/SiniestrosCrear.php";
            echo "<li><a href='$urlSiniestrosNav' class='menuLink' style='background: #2f698d'> Nuevo </a></li>"; 
        ?>
        
    </ul>
</nav>

<h1 style="text-align: center; margin: 10px">Registrar Siniestro</h1>

<hr style="width: 70%"/>

<div class="container">
    <form action="Create" method="POST">
        <div class="container">
                <div class="row">
                    
                        <div class="col form-group">
                            <label for="siniestroId" style="margin-bottom: 5px" class="control-label siniestrosLabels"> ID del siniestro </label>
                            <input for="siniestroId" class="form-control" type="number" />
                            <span validation-for="siniestroId" class="text-danger"></span>
                        </div>
                        <div class="col form-group">
                            <label for="siniestroFecha"style="margin-bottom: 5px" class="control-label siniestrosLabels"> Fecha de admisión</label>
                            <input for="siniestroFecha" class="form-control" type="date"/>
                            <span validation-for="siniestroFecha" class="text-danger"></span>
                        </div>
                </div>
                <div class="row">
                        <div class="col">
                            <label for="siniestroNombre" style="margin-bottom: 5px" class="control-label siniestrosLabels">Nombre</label>
                            <input for="siniestroNombre" class="form-control" type="text"/>
                            <span validation-for="siniestroNombre" class="text-danger"></span>
                        </div>
                        <div class="col">
                            <label for="siniestroDireccion" style="margin-bottom: 5px" class="control-label siniestrosLabels">Dirección</label>
                            <input for="siniestroDireccion" class="form-control" />
                            <span validation-for="siniestroDireccion" class="text-danger"></span>
                        </div>
                </div>
                <div class="row">
                        <div class="col form-group">
                            <label for="siniestroTelefono" style="margin-bottom: 5px" class="control-label siniestrosLabels">Telefono</label>
                            <input for="siniestroTelefono" class="form-control" type="phone" />
                            <span validation-for="siniestroTelefono" class="text-danger"></span>
                        </div>
                        <div class="col form-group">
                            <label for="siniestroEstado" style="margin-bottom: 5px" class="control-label siniestrosLabels">Estado Actual</label>
                            <select for="siniestroEstado">
                                <option >Recepción</option>
                                <option>Visita</option>
                            </select>
                            <span validation-for="siniestroEstado" class="text-danger"></span>
                        </div>
                </div>
                <div class="row">
                        <div class="col form-group">
                            <label for="siniestroProveedor" style="margin-bottom: 5px" class="control-label siniestrosLabels">Proveedor</label>
                            <select for="siniestroProveedor">

                                <?php 

                                    $restultado = $connect->query($sqlproveedores);
                                    if ($resultado->num_rows > 0) {
                                        while($row = $resultado->fetch_assoc()){
                                            echo "<option>".$row['UserName']."</option>";
                                        }
                                    }
                                ?>

                            </select>
                            <span validation-for="siniestroProveedor" class="text-danger"></span>
                        </div>

                        <div class="col form-group">
                            <label for="siniestroAseguradora" style="margin-bottom: 5px" class="control-label siniestrosLabels">Aseguradora</label>
                            <input for="siniestroAseguradora" class="form-control" />
                            <span validation-for="siniestroAseguradora" class="text-danger"></span>
                        </div>

                </div>
                <div class="row">
                    <label for="siniestroDescripcion"style="margin-bottom: 5px" class="control-label siniestrosLabels">Descripción</label>
                    <textarea for="siniestroDescripcion" class="form-control"></textarea>
                    <span validation-for="siniestroDescripcion" class="text-danger"></span>
                </div>
                <br/>
                <br/>
                <div class="row">
                        <div class="form-group">
                            <input type="hidden" for="siniestroUltimoEdit" style="margin-bottom: 5px" value="@User.Identity.Name" class="form-control" />
                            <span validation-for="siniestroUltimoEdit" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <input type="hidden" for="siniestroCreador" style="margin-bottom: 5px" value="@User.Identity.Name" class="form-control" />
                            <span validation-for="siniestroCreador" class="text-danger"></span>
                        </div>
                        <br />

                        <input type="submit" value="Crear" class="btn btn-primary DetallesSiniestros" style="width:100%" />

                        <br />
                </div>
        </div>
    </form>
 </div>
<div class="container">
    <br/>
    <a href="/backend/Siniestros/SiniestrosActivos.php" style="width:100%" class="btn btn-primary">Regresar a la lista</a>
</div>

<?php

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";

?>
