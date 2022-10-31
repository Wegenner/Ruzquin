<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>


<h1 style="text-align: center">Editar - Usuario Random </h1>
<hr />

<div class="container">
    <form action="EditarUsuario">
        <div class="text-danger"></div>
        <input type="hidden" value="@usuario.Id" name="id" />
        <div class="row">
            <div class="col formularios">
                <label class="control-label siniestrosLabels">Nombre</label>
            </div>
            <div class="col-auto ">
                <input value="@usuario.UserName" class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label class="control-label siniestrosLabels">Correo</label>
            </div>
            <div class="col-auto">
                <input value="@usuario.Email" class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label class="control-label siniestrosLabels">Rol</label>
            </div>
            <div class="col-auto">
                <select value="@rolUsuario">
                    <option selected></option>
                    <option value="1">Admin</option>
                    <option value="2">Gerente</option>
                    <option value="3">Supervisor</option>
                    <option value="4">Oficina</option>
                    <option value="5">Proveedores</option>
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
                <input value="@usuario.PhoneNumber" class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>
        <br />
        <div class="form-group" style="text-align: right;">
            <input type="submit" value="Guardar" class="btn btn-primary" style="width:100%; border-radius:7px; padding: 0.5rem 0 0.5rem 0;" />
            <br />
            <br />
            <a class="detalles">Regresar a la lista</a>
        </div>
    </form>
</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>