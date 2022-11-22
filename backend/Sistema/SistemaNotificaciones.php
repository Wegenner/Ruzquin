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
	
	$response='';

	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()) {

			/* Formate fecha */
			$fechaOriginal = $row["fecha"];
			$fechaFormateada = date("d-m-Y", strtotime($fechaOriginal));
			$response = $response . "<div class='notification-item'>" .
			"<div class='notification-subject'>". $row["autor"] . " - <span>". $fechaFormateada . "</span> </div>" . 
			"<div class='notification-comment'>" . $row["mensaje"]  . "</div>" .
			"</div>";

		}
	}else{
		$response = "<p> Ninguna notificacion fue encontrada. <p/>";
	}
	
	
		 
	$status_query = "SELECT * FROM notificaciones WHERE estado=0";
	$result_query = $connect->query($status_query);
	$count = $result_query->num_rows;
		
	$data = array(
		'notification' => $response,
		'unseen_notification'  => $count
	);
		
	echo json_encode($data);
	}
?>
