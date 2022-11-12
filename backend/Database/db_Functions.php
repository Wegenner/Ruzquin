<?php 

function botonsiniestro($row){

    $colorines = "style=''";

    /* Funcion creadora de los botones de siniestros filtrando para el color del boton */
    if($row["siniestroAnticipo"] == "1"){
        $colorines = "style='color:#21FF13'";
    }    

    if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' type='submit' ".$colorines." value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 1 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='conqueja' type='submit' ".$colorines." value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 2 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='conmasde3meses' type='submit' ".$colorines." value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 3 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='problemaconseguro' type='submit' ".$colorines." value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 4 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='nnecesitafacturaormal' type='submit' ".$colorines." value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 5 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='conanticipoaproveedor' type='submit' ".$colorines." value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 6 ){
        
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='pendientedeale' type='submit' ".$colorines." value='".$row['siniestroId']."' >
            </form>";
    }
}

?>