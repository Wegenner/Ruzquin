if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($row["siniestroEstado"] == "Cancelado"){
                        
}
if($row["siniestroEstado"] == "Pago de daños"){
    
}
if($row["siniestroEstado"] == "Facturación"){
    
}

sqlquery para suma de presupuestos:

SELECT SUM(presupuestoUtilidad) AS 'UtilidadNeta' FROM billingmodel WHERE (siniestroFecha BETWEEN '2021-01-01 00:00:00' AND '2022-01-01 00:00:00');