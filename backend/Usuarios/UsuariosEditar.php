<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php";

    if(isset($_POST['idusuario'])){

        $sqlusuario = "SELECT * FROM usuarios WHERE ID =".$_POST['idusuario']." LIMIT 1";

        if($resultado = $connect->query($sqlusuario)){
            $resultado = $resultado->fetch_assoc();
        }

        $sqlRoles = "SELECT * FROM roles WHERE ID =".$resultado['UserRoles']." LIMIT 1";

        if($resrol = $connect->query($sqlRoles)){
            $resrol = $resrol->fetch_assoc();
        }

    
?>


<h1 style="text-align: center">Editar - <?PHP echo $resultado['UserName'];?> </h1>
<hr />

<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="text-danger"></div>
        <input type="hidden" value="<?PHP echo $resultado['ID'];?>" name="id" />
        <div class="row">
            <div class="col formularios">
                <label class="control-label siniestrosLabels">Nombre</label>
            </div>
            <div class="col-auto ">
                <input name="UserName" value="<?PHP echo $resultado['UserName'];?>" class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label class="control-label siniestrosLabels">Correo</label>
            </div>
            <div class="col-auto">
                <input name="UserEmail" value="<?PHP echo $resultado['UserEmail'];?>" class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label class="control-label siniestrosLabels">Rol</label>
            </div>
            <div class="col-auto">
                <select name="UserRoles">
                    <option value="<?PHP echo $resrol['ID'];?>" selected><?PHP echo $resrol['RolName'];?></option>
                    <option value="1">Administrador</option>
                    <option value="2">Gerente</option>
                    <option value="3">Supervisor</option>
                    <option value="4">Oficina</option>
                    <option value="5">Proveedor</option>
                    <option value="6">Desarrollo</option>
                </select>
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label class="control-label siniestrosLabels">Numero</label>
            </div>
            <div class="col-auto">
                <input name="UserPhone" value="<?PHP echo $resultado['UserPhone'];?>" class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>
        <br />
        <div class="form-group" style="text-align: right;">
            <input type="submit" value="Guardar" class="btn btn-primary" style="width:100%; border-radius:7px; padding: 0.5rem 0 0.5rem 0;" />
            <br />
            <br />
            <a class="detalles" href="/backend/Usuarios/UsuariosTodos.php">Regresar a la lista</a>
        </div>
    </form>
</div>

<?php 
    }

    if(isset($_POST['id'])){

        $id = $_POST['id'];

        $sqlupdate = "UPDATE usuarios SET 
        UserName ='".filtrodedatos($_POST['UserName'])."',
        UserPhone ='".filtrodedatos($_POST['UserPhone'])."',
        UserRoles =".$_POST['UserRoles'].",
        UserEmail ='".$_POST['UserEmail']."'
        WHERE ID = ".$id;
        
        echo $sqlupdate;

        if($connect->query($sqlupdate) === TRUE){
            header("Location: /backend/Usuarios/UsuariosTodos.php",true,303);
            die();
        }
    }

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>