<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
?>

<div class="container-fluid">

    <h1 style="text-align:center; margin: 5px"> ¿Estas seguro que deseas eliminar este presupuesto? </h1>
    <h2 style="text-align:center; margin: 5px"> Siniestro Random </h2>
    <hr style="width:70%"/>
    <br>

    <div class="row justify-content-center" style="margin-bottom: 50px">
            
        <a class="btn btn-danger" style="width:30%;margin-right:40px" href="/backend/Presupuestos/PresupuestosEditar.php"> Borrar </a>
        <a class="btn btn-primary" style="width:30%" href="/backend/Presupuestos/PresupuestosEditar.php"> Regresar </a>

    </div>

</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>