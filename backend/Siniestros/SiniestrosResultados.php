<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    if($_POST){

        $IdBuscado = $_POST['id'];  

        $sql = "SELECT ID,siniestroId,siniestroColor, siniestroAnticipo,siniestroEstado, siniestroFecha FROM siniestromodelo WHERE siniestroId = ".$IdBuscado;
    }

    $result = $connect->query($sql);

    while($row = $result->fetch_assoc()){
        echo "ID: ".$row['ID']."Siniestro: ".$row['siniestroId'];
    }
?>

<?php 

    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>