<?php

class Notificacion{

	Public function notificar(string $autor, string $mensaje,?int $IDobject){

		include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";

		date_default_timezone_set("America/Mexico_City");

		$fecha = date_create("now")->format('Y-m-d H:i:s');

		if(isset($IDobject) && $IDobject != null){
			$nombreobjeto = $connect->query("SELECT siniestroId FROM siniestromodelo WHERE ID =".$IDobject)->fetch_assoc();
			$nombreobjeto = $nombreobjeto['siniestroId'];
		}else{
			$IDobject = $connect->query("SELECT ID FROM siniestromodelo ORDER BY siniestroFecha DESC LIMIT 1")->fetch_assoc();
			$nombreobjeto = $connect->query("SELECT siniestroId FROM siniestromodelo WHERE ID =".$IDobject['ID']);
		}

		$sqlNoti = "INSERT INTO notificaciones (autor,mensaje,fecha, idObjeto, nombreObjeto,estado) VALUES ('" . $autor . "','" . $mensaje . "','" . $fecha . "','" . $IDobject . "','" . $nombreobjeto . "',0)";

		$sqlUserNoti = "UPDATE usuarios SET UserNotifications = UserNotifications + 1";

		$connect->query($sqlNoti);
		$connect->query($sqlUserNoti);
	}
}

?>
