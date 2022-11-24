<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";

	if(isset($_POST['view'])){

		if($_POST['view'] != ''){
			$sql = "UPDATE notificaciones SET estado = 1 WHERE estado = 0";	
			$result = $connect->query($sql);

			$sqlusr = "UPDATE usuarios SET UserNotifications = 0 WHERE ID=".$_SESSION['id'];
			$result = $connect->query($sqlusr);
		}

	
	
	$sql = "SELECT * FROM notificaciones ORDER BY ID DESC limit 10";
	$result = $connect->query($sql);;
	
	$responsebig='';
	$responselite='';

	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()) {

			/* Formate fecha */
			$fechaOriginal = $row["fecha"];
			$fechaFormateada = date("d/m/Y H:i", strtotime($fechaOriginal));

			if(str_contains($row["mensaje"], "eliminado")){
				$responsebig = $responsebig . "<form action='/backend/Siniestros/SiniestrosActivos.php' id='noificaciongeneral' method='POST'>
				<button id='btn-sinnoti' type='submit'>
				<div class='row notificaciongeneral'>" .
				"<div class='notification-subject' ><span>". $fechaFormateada . " </span> : <b>". $row["autor"] . "</b>  </div>" . 
				"<div class='notification-comment'> &nbsp; ha " . $row["mensaje"]  . " del siniestro: ".$row["nombreObjeto"]."</div>" .
				"<input type='number' hidden name='id' value='".$row['idObjeto']."' >
				</div></button></form>";
	
				$responselite = $responselite . "<div class='row notificacionmini'>" .
				"<div class='notification-subject'>". $row["autor"] . " - <span>". $fechaFormateada . " </span> </div>" . 
				"<div class='notification-comment'> Ha " . $row["mensaje"]  . " del siniestro: ".$row["nombreObjeto"]."</div>" .
				"</div>";
			}else{

			$responsebig = $responsebig . "<form action='/backend/Siniestros/Siniestros.php' id='noificaciongeneral' method='POST'>
			<button id='btn-sinnoti' type='submit'>
			<div class='row notificaciongeneral'>" .
			"<div class='notification-subject' ><span>". $fechaFormateada . " </span> : <b>". $row["autor"] . "</b>  </div>" . 
			"<div class='notification-comment'> &nbsp; ha " . $row["mensaje"]  . " del siniestro: ".$row["nombreObjeto"]."</div>" .
			"<input type='number' hidden name='id' value='".$row['idObjeto']."' >
			</div></button></form>";

			$responselite = $responselite . "<div class='row notificacionmini'>" .
			"<div class='notification-subject'>". $row["autor"] . " - <span>". $fechaFormateada . " </span> </div>" . 
			"<div class='notification-comment'> Ha " . $row["mensaje"]  . " del siniestro: ".$row["nombreObjeto"]."</div>" .
			"</div>";
			}

		}
	}else{
		$responsebig = "<p> Ninguna notificacion fue encontrada. <p/>";

		$responselite = "<p> Ninguna notificacion fue encontrada. <p/>";
	}
	
	/* Creando burbuja de notificacion nueva */
	$sqlnotinueva = "SELECT * FROM notificaciones WHERE estado='0' LIMIT 1";
	$result_notinueva = $connect->query($sqlnotinueva);

	if($result_notinueva->num_rows > 0){
		$result_notinueva = $result_notinueva->fetch_assoc();
		
		$floatnoti = "<form action='/backend/Siniestros/Siniestros.php' id='noificaciongeneral' method='POST'>
		<button id='btn-sinnoti' type='submit'>
		<div class='row notificacionflotante'>" .
		"<div class='notification-subject' ><b>". $result_notinueva["autor"] . "</b>  </div>" . 
		"<div class='notification-comment'> &nbsp; ha " . $result_notinueva["mensaje"]  . " del siniestro: ".$result_notinueva["nombreObjeto"]."</div>" .
		"<input type='number' hidden name='id' value='".$result_notinueva['idObjeto']."' >
		</div></button></form>";
	}

	$floatnoti = '';
	 
	$status_query = "SELECT UserNotifications FROM usuarios WHERE ID=".$_SESSION['id'];
	$result_query = $connect->query($status_query)->fetch_assoc();
	$count = $result_query['UserNotifications'];
		
	$data = array(
		'notification' => $responselite,
		'notificaciongrande' => $responsebig,
		'unseen_notification'  => $count,
		'floatnoti' => $floatnoti
	);
		
	echo json_encode($data);
	}
?>
