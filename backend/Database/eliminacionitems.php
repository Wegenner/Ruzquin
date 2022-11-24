<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Sistema/SistemaCrearNotificacion.php"; 

    $noti = new Notificacion();

    // Eliminacion de elementos dependiendo del id de ingreso, primero para eliminacion de siniestros incluyendo destrucción de su carpeta con contenido y su presupuesto asignado

    if(isset($_POST['idsiniestro'])){

        $id = $_POST['idsiniestro'];

        $sqlsiniestro = "SELECT * FROM siniestromodelo WHERE ID ='".$id."' LIMIT 1";

        $siniestro = $connect->query($sqlsiniestro)->fetch_assoc();

        $fecha = date("d-m-Y", strtotime($siniestro['siniestroFecha']));

        $carpeta = $_SERVER['DOCUMENT_ROOT']."/root/Archivos/".$siniestro['ID']."_".$fecha."_".$siniestro['ID'];

        deleteDirectory($carpeta);

        $sqlsiniestro = "DELETE FROM siniestromodelo WHERE ID =".filtrodedatos($_POST['idsiniestro']);
        $sqlpresupuesto = "DELETE FROM billingmodel WHERE IDdbsiniestro =".filtrodedatos($_POST['idsiniestro']);
        
        if($resultado = $connect->query($sqlsiniestro) & $resultado = $connect->query($sqlpresupuesto)){
            $noti->notificar($_SESSION['nombre'],"eliminado", $_POST['idsiniestro']);
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

        $id = "SELECT IDdbsiniestro FROM billingmodel WHERE ID =".filtrodedatos($_POST['idpresu']);
        $idfinal = $connect->query($id)->fetch_assoc();
        $sqlusuario = "DELETE FROM billingmodel WHERE ID =".filtrodedatos($_POST['idpresu']);

        if($resultado = $connect->query($sqlusuario)){
            $noti->notificar($_SESSION['nombre'],"eliminado el presupuesto", $idfinal['IDdbsiniestro']);
            header("Location: /backend/Presupuestos/PresupuestosTodos.php",true,303);
            die();
        } else {
            echo "error";
        }
    }


    function deleteDirectory($dir) {
        if(!$dh = @opendir($dir)) return;
        while (false !== ($current = readdir($dh))) {
            if($current != '.' && $current != '..') {

                if (!@unlink($dir.'/'.$current)) 
                    deleteDirectory($dir.'/'.$current);
            }       
        }
        closedir($dh);

        @rmdir($dir);
    }
?>