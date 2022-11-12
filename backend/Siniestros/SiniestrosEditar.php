<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";

    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    if(isset($_POST['id'])){
        
        $id = $_POST['id'];

        $sqlupdate = "UPDATE siniestromodelo SET 
        siniestroId =".$_POST['siniestroId'].",
        siniestroIdSecundario =".$_POST['siniestroIdSecundario'].",
        SiniestroFechaEnvioPresupuesto =".$_POST['SiniestroFechaEnvioPresupuesto'].",
        siniestroFecha =".$_POST['siniestroFecha'].",
        SiniestroFechaPresupuestoAutorizado =".$_POST['SiniestroFechaPresupuestoAutorizado'].",
        SiniestroFechaReparacion = ".$_POST['SiniestroFechaReparacion'].",
        siniestroFechaTermino = ".$_POST['siniestroFechaTermino'].",
        siniestroNombre = ".$_POST['siniestroNombre'].",
        siniestroDireccion = ".$_POST['siniestroDireccion'].",
        siniestroTelefono = ".$_POST['siniestroTelefono'].",
        siniestroEstado = ".$_POST['siniestroEstado'].",
        siniestroEstadoSecundario = ".$_POST['siniestroEstadoSecundario'].",
        siniestroDescripcion = ".$_POST['siniestroDescripcion'].",
        siniestroProveedor = ".$_POST['siniestroProveedor'].",
        siniestroAseguradora = ".$_POST['siniestroAseguradora'].",
        siniestroComentarioGeneral = ".$_POST['siniestroComentarioGeneral'].",
        siniestroCreador = ".$_POST['siniestroCreador'].",
        siniestroUltimoEdit = ".$_POST['siniestroUltimoEdit'].",
        siniestroNumeroFactura = ".$_POST['siniestroNumeroFactura'].",
        siniestrosArchivos =".$_POST['siniestrosArchivos'].",
        siniestroColor =".$_POST['siniestroColor'].",
        siniestroAnticipo =".$_POST['siniestroAnticipo'].",
        WHERE ID = ".$id;
        

        if($connect->query($sqlupdate) === TRUE){
            header("Location: /backend/Siniestros/SiniestrosEditar.php?getid=".$_POST['siniestroId']."",true,303);
            die();
        }


    }

    if(isset($_POST['getid'])){

        $id = $_POST['getid'];

        $Sqlquery = "SELECT * FROM siniestromodelo WHERE ID = ".$id." LIMIT 1";

        $resultado = $connect->query($Sqlquery);

        if($resultado == TRUE){

            $resultado = $resultado->fetch_assoc();

            $newDate = date("Y-m-d", strtotime($resultado['siniestroFecha'])); 

?>

<h1 style="text-align: center; margin: 5px">Editar - <?php echo $resultado['siniestroId']; ?></h1>

<hr style="width: 70%"/>

<div class="container">
    <form action='/backend/Siniestros/Siniestros.php' method='POST'>
        <div asp-validation-summary="ModelOnly" class="text-danger"></div>
        <input type="hidden" />

        <div class="row">
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">ID Siniestro: </label>
                <input  class="form-control" name="siniestroId" value="<?php echo $resultado['siniestroId']; ?>" />
                <span for="siniestroId" class="text-danger"></span>
            </div>
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">ID Secundario: </label>
                <input  class="form-control" id="siniestroIdSecundario" value="<?php echo $resultado['siniestroIdSecundario']; ?>" name="siniestroIdSecundario" />
                <span for="siniestroIdSecundario" class="text-danger"></span>
            </div>
            <div class="col formularios">
                <label style="margin-bottom: 5px" for="siniestroFecha" class="control-label siniestrosLabels">Fecha del Siniestro:</label>
                <input class="form-control" type="date" <?php echo "value='".$newDate."'"; ?> id="siniestroFecha" name="siniestroFecha"/>
                <span for="siniestroFecha" class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">Nombre del Siniestro</label>
                
                <input  class="form-control" value="<?php echo $resultado['siniestroNombre']; ?>" name="siniestroNombre" />
                <span asp-validation-for="siniestroNombre" class="text-danger"></span>
            </div>
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">Dirección</label>

                <input  class="form-control" value="<?php echo $resultado['siniestroDireccion']; ?>" name="siniestroDireccion" />
                <span asp-validation-for="siniestroDireccion" class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">Telefono</label>

                <input  class="form-control" value="<?php echo $resultado['siniestroTelefono']; ?>" name="siniestroTelefono" />
                <span asp-validation-for="siniestroTelefono" class="text-danger"></span>
            </div>
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">Estado Actual</label>

                <select name="siniestroEstado" value="<?php echo $resultado['siniestroEstado']; ?>">
                    <option>Recepción</option>
                    <option>Visita</option>
                    <option>Presupuesto</option>
                    <option>Autorizado</option>
                    <option>En espera</option>
                    <option>Envio de Evidencia</option>
                    <option>Cancelado</option>
                    <option>Pago de daños</option>
                    <option>Facturación</option>

                </select>
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Aseguradora</label>

                <input  class="form-control" value="<?php echo $resultado['siniestroAseguradora']; ?>" name="siniestroAseguradora" />
                <span class="text-danger"></span>
            </div>
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">Proveedor</label>

                <select name="siniestroProveedor" value="<?php echo $resultado['siniestroProveedor']; ?>">
                    <option>@item.UserName</option>
                </select>
                <span class="text-danger"></span>
            </div>
            <div class="col-md">
                <div class="row form-check">
                    <label for="anticipprov" style="margin: 0; margin-top:10px" class="control-label" >Anticipo a proveedor</label>
                </div>
                <div class="row form-check" style="text-align:center">
                    <input type="checkbox" value="1" id="anticipprov" name="siniestroAnticipo" style="margin-top:20px" value="<?php echo $resultado['siniestroAnticipo']; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <input type="hidden" value="<?php echo $resultado['siniestroUltimoEdit']; ?>" name="siniestroUltimoEdit" class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <input type="hidden" value="<?php echo $resultado['siniestroCreador']; ?>" name="siniestroCreador" class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Estado Secundario: </label>
                <input class="form-control" value="<?php echo $resultado['siniestroEstadoSecundario']; ?>"  name="siniestroEstadoSecundario" />
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Comentario: </label>
                <textarea class="form-control" value="<?php echo $resultado['siniestroComentarioGeneral']; ?>" name="siniestroComentarioGeneral"></textarea>
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Problemas a notar: </label>
                    <select class="form-control" id="exampleFormControlSelect1" default_value="<?php echo $resultado['siniestroColor']; ?>" name="siniestroColor">
                        <option value="0">Nada</option>
                        <option value="1">Con queja</option>
                        <option value="2">Mas de 3 meses</option>
                        <option value="3">Problemas con el seguro</option>
                        <option value="4">Necesita factura</option>
                        <option value="5">Pendiente Alejandro</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Descripción</label>
                <input class="form-control" value="<?php echo $resultado['siniestroDescripcion']; ?>" name="siniestroDescripcion"/>
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Fecha de Envío del presupuesto: </label>
                <input class="form-control" type="date" value="<?php echo date("Y-m-d", strtotime($resultado['SiniestroFechaEnvioPresupuesto'])); ?>" name="SiniestroFechaEnvioPresupuesto"/>
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Fecha de Autorización del presupuesto: </label>
                <input  class="form-control" type="date" name="SiniestroFechaPresupuestoAutorizado" value="<?php echo date("Y-m-d", strtotime($resultado['SiniestroFechaPresupuestoAutorizado'])); ?>" />
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Fecha de Reparación: </label>
                <input class="form-control" type="date" value="<?php echo date("Y-m-d", strtotime($resultado['SiniestroFechaReparacion'])); ?>" name="SiniestroFechaReparacion" />
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Fecha de Termino: </label>
                <input class="form-control" type="date" value="<?php echo date("Y-m-d", strtotime($resultado['siniestroFechaTermino'])); ?>" name="siniestroFechaTermino"/>
                <span class="text-danger"></span>
            </div>
        </div>

        <br />

        <div class="form-group" style="text-align: right;">
            <form action='/backend/Siniestros/SiniestrosEditar.php' method='POST'>
                <input class='detalles' type='number' hidden name='id' value="<?PHP echo $POST['getid'] ?>" >
                <input class='detalles' value="Guardar" type='submit'>
            </form>

            <br />
            <br />
            <a class="detalles" href="/backend/Siniestros/Siniestros.php">Regresar</a>
            <br />
            <br />
            <a class="detalles" href="#">Borrar</a>
        </div>

    </form>
</div>

<?php 
        }else{
            echo "Error de conección";
        }
    }
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>