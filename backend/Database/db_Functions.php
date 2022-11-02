<?php 

function botonsiniestro($row){

    /* Funcion creadora de los botones de siniestros filtrando para el color del boton */

    if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' type='submit' value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 1 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' class='conqueja' type='submit' value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 2 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='conmasde3meses' type='submit' value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 3 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='problemaconseguro' type='submit' value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 4 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='nnecesitafacturaormal' type='submit' value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 5 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='conanticipoaproveedor' type='submit' value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 6 ){
        
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                    <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                    <input class='LigaSiniestros' id='pendientedeale' type='submit' value='".$row['siniestroId']."' >
            </form>";
    }
}

?>