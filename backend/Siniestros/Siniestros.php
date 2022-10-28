<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>

<h1 style="text-align: center; padding-top:10px">Detalles - Siniestro random</h1>
<p style="text-align: center"><b>10/11/2022</b> </p>
<hr style="width:70%" />
<div class="container" style="padding-top:10px">
    <div class="row">
        <div class="col">
            <p><b> Nombre: </b> Siniestro Random </p>
        </div>
        <div class="col">
            <p><b>Estado:</b>  Siniestro Random </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p><b>Dirección:</b>  Siniestro Random </p>
        </div>
        <div class="col">
            <p><b>Telefono del afectado:</b>  Siniestro Random </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p><b>Aseguradora:</b>  Siniestro Random </p>
        </div>
        <div class="col">
            <p><b>Proveedor:</b>  Siniestro Random </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p><b>Creador:</b>  Siniestro Random </p>
        </div>
        <div class="col">
            <p><b>Ultima Edición:</b>  Siniestro Random </p>
        </div>
    </div>
    <div class="row">

        <div class="col">
            <p><b>Descripción:</b>  Siniestro Random </p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p><b>Presupuesto Autorizado:</b>  Siniestro Random </p>
        </div>
        <div class="col">
            <p><b>Presupuesto Proveedor:</b>  Siniestro Random </p>
        </div>
    </div>
</div>
        <br />
        <br />

<div class="container">
    <a class="detalles" href="/backend/Siniestros/SiniestrosEditar.php">Editar</a>
    <br />
    <br />
    <a class="detalles">Borrar</a>
    <br />
    <br />
    <a class="detalles">Regresar</a>
</div>
    <br />
    <br />

<div class="container">

    <button type="button" style="
                background-color:green; width: 100%;
                margin-right: 0.625%;
                text-align: center;
                border-radius: 10px;" href="#" class="btn btn-secondary">Crear Presupuesto</button>
    <br />
    <br />

    <h1 style="text-align: center">Presupuesto</h1>

    <hr />
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p><b> PA : </b></p>
            </div>
            <div class="col">
                <p><b>PP :</b> </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><b>Utilidad :</b> </p>
            </div>
        </div>
            <div class="row">
            <div class="col">
                <p><b>Fecha de terminio :</b> </p>
            </div>
        </div>
    </div>
    <br />
            <a class="detalles" asp-action="Edit" asp-controller="Billing" asp-route-id="@Model.siniestroBalance.ID">Editar</a>
    <br />
    <br />

    <h1 style="text-align: center"> Ver: Evidencias y Documentos</h1>

    <hr />

    <a class="detalles" href="#"> Ver / Subir Archivos</a>

    <br /><br />

    <button type="button" style="
                background-color:green; width: 100%;
                margin-right: 0.625%;
                text-align: center;
                border-radius: 10px;
                text-decoration:none" href="#" class="btn btn-secondary">
        Subir Evidencias y Archivos
    </button>

    <br /><br />

    <a class="detalles" asp-action="Delete" asp-route-id="@Model?.ID">Borrar</a>
    <br />

    <br />
    <a class="detalles" href="#">
        <span>Regresar</span>
    </a>
</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>