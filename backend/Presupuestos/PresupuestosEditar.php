<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>

<div class="container">

    <h4 style="text-align:center; margin-top:20px">Presupuesto  -  Siniestro Random</h4>

    <hr />

    <form action="Edit">

    <input readonly value="Aquí va el ID de base de datos del siniestro." class="form-control" />

    <br/>

    <div class="row" style="margin-bottom: 10px">
            <div class="text-danger"></div>
            <input type="hidden"  />

            <div class="col form-group">
                <label  class="control-label">ID</label>
            </div>
            <div class="col">
                <input  readonly class="form-control" />
                <span class="text-danger"></span>
            </div>
            <div class="col form-group">
                <label class="control-label">Presupuesto</label>
            </div>
            <div class="col">
                <input class="form-control" />
                <span class="text-danger"></span>
            </div>
    </div>
    <div class="row" style="margin-bottom: 10px"> 
            <div class="col form-group">
                <label class="control-label">PA</label>
            </div>
            <div class="col">
                <input class="form-control" />
                <span class="text-danger"></span>
            </div>
            <div class="col form-group">
                <label class="control-label">PP</label>
            </div>
            <div class="col">
                <input class="form-control" />
                <span class="text-danger"></span>
            </div>
    </div>
    <div class="row" style="margin-bottom: 10px">
            <div class="col form-group">
                <label  class="control-label">Proveedor</label>
            </div>
            <div class="col">
                <input readonly class="form-control" />
                <span class="text-danger"></span>
            </div>

            <div class="col form-group">
                <label class="control-label">Utilidad</label>
            </div>
            <div class="col">
                <input class="form-control" />
                <span class="text-danger"></span>
            </div>
    </div>
    <div class="row" style="margin-bottom: 10px">
            <div class="col form-group">
                <label class="control-label">Fecha Termino</label>
            </div>
            <div class="col">
                <input class="form-control" />
                <span class="text-danger"></span>
            </div>
    </div>

</div>

<div class="container">
    <br/>
    <a class="detalles" href="#">Guardar</a>
    <br/>
    <br/>
    <a class="detalles" href="/backend/Presupuestos/PresupuestosBorrar.php">Borrar</a>
    <br/>
    <br/>
    <a class="detalles" href="/backend/Siniestros/Siniestros.php">Regresar</a>
    <br/>
    <br/>
    <a class="detalles" href="/backend/Presupuestos/PresupuestosTodos.php">Ir a la lista</a>
</div>