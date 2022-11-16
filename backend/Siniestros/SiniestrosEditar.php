<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";

    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php";

    if(isset($_POST['id'])){
        
        $id = $_POST['id'];

        if(!isset($_POST['siniestroAnticipo'])){
            $_POST['siniestroAnticipo'] = 0;
        }else{
            $_POST['siniestroAnticipo'] = 1;
        }
        if(!isset($_POST['SiniestroFechaEnvioPresupuesto']) || $_POST['SiniestroFechaEnvioPresupuesto'] == "" || $_POST['SiniestroFechaEnvioPresupuesto'] == "1970-01-01"){
            $_POST['SiniestroFechaEnvioPresupuesto'] = "null";
        }else{
            $_POST['SiniestroFechaEnvioPresupuesto'] = "'".$_POST['SiniestroFechaEnvioPresupuesto'] ."'";
        }
        if(!isset($_POST['SiniestroFechaPresupuestoAutorizado'])|| $_POST['SiniestroFechaPresupuestoAutorizado'] == "" || $_POST['SiniestroFechaPresupuestoAutorizado'] == "1970-01-01"){
            $_POST['SiniestroFechaPresupuestoAutorizado'] = "null";
        }else{
            $_POST['SiniestroFechaPresupuestoAutorizado'] = "'".$_POST['SiniestroFechaPresupuestoAutorizado'] ."'";
        }
        if(!isset($_POST['SiniestroFechaReparacion'])|| $_POST['SiniestroFechaReparacion'] == "" || $_POST['SiniestroFechaReparacion'] == "1970-01-01"){
            $_POST['SiniestroFechaReparacion'] = "null";
        }else{
            $_POST['SiniestroFechaReparacion'] = "'".$_POST['SiniestroFechaReparacion'] ."'";
        }
        if(!isset($_POST['siniestroFechaTermino'])|| $_POST['siniestroFechaTermino'] == "" || $_POST['siniestroFechaTermino'] == "1970-01-01"){
            $_POST['siniestroFechaTermino'] = "null";
        }else{
            $_POST['siniestroFechaTermino'] = "'".$_POST['siniestroFechaTermino'] ."'";
        }

        $sqlupdate = "UPDATE siniestromodelo SET 
        siniestroId ='".filtrodedatos($_POST['siniestroId'])."',
        siniestroIdSecundario ='".filtrodedatos($_POST['siniestroIdSecundario'])."',
        SiniestroFechaEnvioPresupuesto =".$_POST['SiniestroFechaEnvioPresupuesto'].",
        siniestroFecha ='".$_POST['siniestroFecha']."',
        SiniestroFechaPresupuestoAutorizado =".$_POST['SiniestroFechaPresupuestoAutorizado'].",
        SiniestroFechaReparacion = ".$_POST['SiniestroFechaReparacion'].",
        siniestroFechaTermino =".$_POST['siniestroFechaTermino'].",
        siniestroNombre = '".filtrodedatos($_POST['siniestroNombre'])."',
        siniestroDireccion = '".filtrodedatos($_POST['siniestroDireccion'])."',
        siniestroTelefono = ".filtrodedatos($_POST['siniestroTelefono']).",
        siniestroEstado = '".filtrodedatos($_POST['siniestroEstado'])."',
        siniestroEstadoSecundario = '".filtrodedatos($_POST['siniestroEstadoSecundario'])."',
        siniestroDescripcion = '".filtrodedatos($_POST['siniestroDescripcion'])."',
        siniestroProveedor = '".filtrodedatos($_POST['siniestroProveedor'])."',
        siniestroAseguradora = '".filtrodedatos($_POST['siniestroAseguradora'])."',
        siniestroComentarioGeneral = '".filtrodedatos($_POST['siniestroComentarioGeneral'])."',
        siniestroCreador = '".filtrodedatos($_POST['siniestroCreador'])."',
        siniestroUltimoEdit = '".filtrodedatos($_POST['siniestroUltimoEdit'])."',
        siniestroColor =".filtrodedatos($_POST['siniestroColor']).",
        siniestroAnticipo =".filtrodedatos($_POST['siniestroAnticipo'])."
        WHERE ID = ".$id;

        if($connect->query($sqlupdate) === TRUE){
            header("Location: /backend/Siniestros/SiniestrosEditar.php?getid=".$id,true,303);
            die();
        }


    }

    if(isset($_POST['getid'])){

        $id = filtrodedatos($_POST['getid']);

        $Sqlquery = "SELECT * FROM siniestromodelo WHERE ID = ".$id." LIMIT 1";

        $resultado = $connect->query($Sqlquery);

        if($resultado == TRUE){

            $resultado = $resultado->fetch_assoc();

            $newDate = date("Y-m-d", strtotime($resultado['siniestroFecha'])); 

?>

<h1 style="text-align: center; margin: 5px">Editar - <?php echo $resultado['siniestroId']; ?></h1>

<hr style="width: 70%"/>

<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

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
                
                    <?php echo selectestado($resultado); ?>

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
                    <?php echo selectUsuario($resultado); ?>
                </select>
                <span class="text-danger"></span>
            </div>
            <div class="col-md">
                <div class="row form-check">
                    <label for="anticipprov" style="margin: 0; margin-top:10px" class="control-label" >Anticipo a proveedor</label>
                </div>
                <div class="row form-check" style="text-align:center">
                    <input type="checkbox" value="1" id="anticipprov" name="siniestroAnticipo" style="margin-top:20px" value="<?php if($resultado['siniestroAnticipo'] == 1){ echo "checked"; }; ?>" <?php if($resultado['siniestroAnticipo'] == 1){ echo "checked"; } else { echo "uncheked";}; ?>>
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

                        <?php echo selectproblema($resultado); ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Descripción</label>
                <textarea class="form-control" name="siniestroDescripcion"> <?php echo $resultado['siniestroDescripcion']; ?> </textarea> 
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

        <input class='detalles' type='number' hidden name='id' value="<?PHP echo $_POST['getid']; ?>" >
        <input class='detalles' value="Guardar" type='submit'>

    </form>
</div>
<div class="container form-group" style="text-align: right;">

    <br />
    <br />
    <form action='/backend/Siniestros/Siniestros.php' method='POST'>
        <input class='detalles' type='number' hidden name='id' value="<?PHP echo $_POST['getid']; ?>" >
        <input class='detalles' value="Regresar" type='submit'>
    </form>
    <br />
    <br />
    <form action='/backend/Database/preguntaprevia.php' method='POST'>
        <input class='detalles' type='number' hidden name='idsiniestro' value="<?PHP echo $_POST['getid']; ?>" >
        <input class='btn btn-danger' style="width:100%" value="Eliminar" type='submit'>
    </form>

</div>

<?php 
        }else{
            echo "Error de conección";
        }
    }

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>