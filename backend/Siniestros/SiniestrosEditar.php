<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>

<h1 style="text-align: center; margin: 5px">Editar - Siniestro Random</h1>

<hr style="width: 70%"/>

<div class="container">
    <form asp-action="Edit">
        <div asp-validation-summary="ModelOnly" class="text-danger"></div>
        <input type="hidden" />

        <div class="row">
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">ID Siniestro: </label>
                <input  class="form-control" />
                <span asp-validation-for="siniestroId" class="text-danger"></span>
            </div>
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Fecha del Siniestro:</label>
                <input class="form-control" type="date" />
                <span asp-validation-for="siniestroFecha" class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">Nombre del Siniestro</label>
                
                <input  class="form-control" />
                <span asp-validation-for="siniestroNombre" class="text-danger"></span>
            </div>
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">Dirección</label>

                <input  class="form-control" />
                <span asp-validation-for="siniestroDireccion" class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">Telefono</label>

                <input  class="form-control" />
                <span asp-validation-for="siniestroTelefono" class="text-danger"></span>
            </div>
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">Estado Actual</label>

                <select >
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

                <input  class="form-control" />
                <span class="text-danger"></span>
            </div>
            <div class="col formularios">
                <label  style="margin-bottom: 5px" class="control-label siniestrosLabels">Proveedor</label>

                <select>
                    <option>@item.UserName</option>
                </select>
                <span class="text-danger"></span>
            </div>
            <div class="col-sml">
                <div class="row form-check">
                    <label  style="margin-bottom: 5px" for="defaultCheck1" class="control-label siniestrosLabels">Anticipo</label>
                </div>
                <div class="row form-check" style="text-align:center">
                    <input type="checkbox"value="1" id="defaultCheck1" style="margin-top:20px">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <input type="hidden" value="@User.Identity.Name" class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <input type="hidden" value="@Model.siniestroCreador" class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Estado Secundario: </label>
                <input class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Comentario: </label>
                <textarea class="form-control"></textarea>
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Descripción</label>
                <input class="form-control" />
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Fecha de Envío del presupuesto: </label>
                <input class="form-control" type="date"/>
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Fecha de Autorización del presupuesto: </label>
                <input  class="form-control" type="date" />
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Fecha de Reparación: </label>
                <input class="form-control" type="date" />
                <span class="text-danger"></span>
            </div>
        </div>

        <div class="row">
            <div class="col formularios">
                <label style="margin-bottom: 5px" class="control-label siniestrosLabels">Fecha de Termino: </label>
                <input class="form-control" type="date"/>
                <span class="text-danger"></span>
            </div>
        </div>
        <div class="row">
            <div class="col formularios">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Problemas a notar: </label>
                    <select class="form-control" id="exampleFormControlSelect1">
                    <option value="1">Nada</option>
                    <option value="2">Con queja</option>
                    <option value="3">Mas de 3 meses</option>
                    <option value="4">Problemas con el seguro</option>
                    <option value="5">Necesita factura</option>
                    <option value="6">Pendiente Alejandro</option>
                    </select>
                </div>
            </div>
        </div>

        <br />

        <div class="form-group" style="text-align: right;">
            <input type="submit" value="Save" class="btn btn-primary" style="width:100%; border-radius:7px; padding: 0.5rem 0 0.5rem 0;" />
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
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>