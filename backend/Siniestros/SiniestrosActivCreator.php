<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/db_Functions.php"; 

        $MesFin = date_create("today");
        $MesInicio = date_create("today")->modify("-3 month");

        $MesFin = $MesFin->format('Y-m-d');
        $MesInicio = $MesInicio->format('Y-m-d');

        $sql = "SELECT ID,siniestroId,siniestroColor, siniestroAnticipo,siniestroEstado FROM siniestromodelo WHERE (siniestroEstado != 'Cancelado')AND(siniestroEstado != 'Facturación')AND(siniestroEstado != 'Facturación ')AND(siniestroEstado != 'Facturacion')AND(siniestroEstado != 'Pago de daños')AND(siniestroFecha BETWEEN '".$MesInicio." 00:00:00' AND '".$MesFin." 00:00:00')";

        $result = $connect->query($sql);

        $total = $result->num_rows; 
                    
        $result = $connect->query($sql);

        $recepcion = "";

        $visita = "";

        $presupuesto = "";

        $autorizado = "";

        $espera = "";

        $envio = "";

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        
                if(str_contains($row["siniestroEstado"], "Recepción")){
                    $recepcion = $recepcion." ".botonsiniestro($row);
                }
                if(str_contains($row["siniestroEstado"], "Visita")){
                    $visita = $visita.botonsiniestro($row);
                }
                if(str_contains($row["siniestroEstado"], "Presupuesto")){
                    $presupuesto = $presupuesto.botonsiniestro($row);
                }
                if(str_contains($row["siniestroEstado"], "Autorizado")){
                    $autorizado = $autorizado.botonsiniestro($row);
                }
                if(str_contains($row["siniestroEstado"], "espera")){
                    $espera = $espera.botonsiniestro($row);
                }
                if(str_contains($row["siniestroEstado"], "Evidencia") || str_contains($row["siniestroEstado"], "Envío")){
                    $envio = $envio.botonsiniestro($row);
                }

            }
        }

        $data = array(
            'rec' => $recepcion,
            'vis' => $visita,
            'pres' => $presupuesto,
            'aut' => $autorizado,
            'esp' => $espera,
            'env' => $envio,
            'total' => $total
        );

        echo json_encode($data);

?>