<?php 
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php";

    // Eliminacion de elementos dependiendo del id de ingreso, primero para eliminacion de siniestros incluyendo destrucción de su carpeta con contenido y su presupuesto asignado

    if(isset($_POST['idsiniestro'])){
        $sqlsiniestro = "DELETE FROM siniestromodelo WHERE ID =".filtrodedatos($_POST['idsiniestro']);
        $sqlpresupuesto = "DELETE FROM billingmodel WHERE IDdbsiniestro =".filtrodedatos($_POST['idsiniestro']);
        
        if($resultado = $connect->query($sqlsiniestro) & $resultado = $connect->query($sqlpresupuesto)){
            header("Location: /backend/Siniestros/SiniestrosActivos.php",true,303);
            die();
        } else {
            echo "error";
        }
    }

    if(isset($_POST['idusuario'])){

        $sqlusuario = "DELETE FROM usuarios WHERE ID =".filtrodedatos($_POST['idusuario']);

        if($resultado = $connect->query($sqlusuario)){
            header("Location: /backend/Usuarios/UsuariosTodos.php",true,303);
            die();
        } else {
            echo "error";
        }
    }

    if(isset($_POST['idpresu'])){

        $sqlusuario = "DELETE FROM billingmodel WHERE ID =".filtrodedatos($_POST['idpresu']);

        if($resultado = $connect->query($sqlusuario)){
            header("Location: /backend/Presupuestos/PresupuestosTodos.php",true,303);
            die();
        } else {
            echo "error";
        }
    }

?>