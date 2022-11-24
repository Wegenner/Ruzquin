<?php 
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

    if(isset($_POST['waaagh'])){

        if(!is_dir($carpeta)){        
            if(!mkdir($carpeta, 0777)){
                echo "no se pudo";
            }
        }

        $archivos = array_filter($_FILES['archivos']['name']);

        $cantidad = count($_FILES['archivos']['name']);

        for($i=0 ;$i < $cantidad ; $i++){
            $direcciontemporal = $_FILES['archivos']['name'][$i];
            if($direcciontemporal != ""){
                $nuevadireccion = $carpeta.$_FILES['archivos']['name'][$i];
                move_uploaded_file($direcciontemporal, $nuevadireccion);
            }
        }

    }
?>



<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>