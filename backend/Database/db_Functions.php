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
                    <input class='LigaSiniestros' id='necesitafactura' type='submit' ".$colorines." value='".$row['siniestroId']."' >
            </form>";
    }
    if($row["siniestroColor"] == 5 ){
        return "<form action='/backend/Siniestros/Siniestros.php' method='POST'>
                <input class='LigaSiniestros' type='number' hidden name='id' value='".$row['ID']."' >
                <input class='LigaSiniestros' id='pendientedeale' type='submit' ".$colorines." value='".$row['siniestroId']."' >
            </form>";
    }
}

function selectproblema($row){
        if($row["siniestroColor"] == "null" || $row["siniestroColor"] == 0 ){
                return "<option value='0'selected>Nada</option>
                        <option value='1'>Con queja</option>
                        <option value='2'>Mas de 3 meses</option>
                        <option value='3'>Problemas con el seguro</option>
                        <option value='4'>Necesita factura</option>
                        <option value='5'>Pendiente Alejandro</option>";
            }
            if($row["siniestroColor"] == 1 ){
                return "<option value='0'>Nada</option>
                        <option value='1'selected>Con queja</option>
                        <option value='2'>Mas de 3 meses</option>
                        <option value='3'>Problemas con el seguro</option>
                        <option value='4'>Necesita factura</option>
                        <option value='5'>Pendiente Alejandro</option>";
            }
            if($row["siniestroColor"] == 2 ){
                return "<option value='0'>Nada</option>
                        <option value='1' >Con queja</option>
                        <option value='2'selected>Mas de 3 meses</option>
                        <option value='3'>Problemas con el seguro</option>
                        <option value='4'>Necesita factura</option>
                        <option value='5'>Pendiente Alejandro</option>";
            }
            if($row["siniestroColor"] == 3 ){
                return "<option value='0'>Nada</option>
                        <option value='1'>Con queja</option>
                        <option value='2'>Mas de 3 meses</option>
                        <option value='3'selected>Problemas con el seguro</option>
                        <option value='4'>Necesita factura</option>
                        <option value='5'>Pendiente Alejandro</option>";
            }
            if($row["siniestroColor"] == 4 ){
                return "<option value='0'>Nada</option>
                        <option value='1'>Con queja</option>
                        <option value='2'>Mas de 3 meses</option>
                        <option value='3'>Problemas con el seguro</option>
                        <option value='4'selected>Necesita factura</option>
                        <option value='5'>Pendiente Alejandro</option>";
            }
            if($row["siniestroColor"] == 5 ){
                return "<option value='0'>Nada</option>
                        <option value='1'>Con queja</option>
                        <option value='2'>Mas de 3 meses</option>
                        <option value='3'>Problemas con el seguro</option>
                        <option value='4'>Necesita factura</option>
                        <option value='5'selected>Pendiente Alejandro</option>";
            }

}

function selectestado($row){
        if(str_contains($row["siniestroEstado"], "Recepción")){
                return "<option selected>Recepción</option>
                        <option>Visita</option>
                        <option>Presupuesto</option>
                        <option>Autorizado</option>
                        <option>En espera</option>
                        <option>Envio de Evidencia</option>
                        <option>Cancelado</option>
                        <option>Pago de daños</option>
                        <option>Facturación</option>";
            }
            if(str_contains($row["siniestroEstado"], "Visita")){
                return "<option >Recepción</option>
                        <option selected>Visita</option>
                        <option>Presupuesto</option>
                        <option>Autorizado</option>
                        <option>En espera</option>
                        <option>Envio de Evidencia</option>
                        <option>Cancelado</option>
                        <option>Pago de daños</option>
                        <option>Facturación</option>";
            }
            if(str_contains($row["siniestroEstado"], "Presupuesto")){
                return "<option >Recepción</option>
                        <option>Visita</option>
                        <option selected>Presupuesto</option>
                        <option>Autorizado</option>
                        <option>En espera</option>
                        <option>Envio de Evidencia</option>
                        <option>Cancelado</option>
                        <option>Pago de daños</option>
                        <option>Facturación</option>";
            }
            if(str_contains($row["siniestroEstado"], "Autorizado")){
                return "<option >Recepción</option>
                        <option>Visita</option>
                        <option>Presupuesto</option>
                        <option selected>Autorizado</option>
                        <option>En espera</option>
                        <option>Envio de Evidencia</option>
                        <option>Cancelado</option>
                        <option>Pago de daños</option>
                        <option>Facturación</option>";
            }
            if(str_contains($row["siniestroEstado"], "espera")){
                return "<option >Recepción</option>
                        <option>Visita</option>
                        <option>Presupuesto</option>
                        <option>Autorizado</option>
                        <option selected>En espera</option>
                        <option>Envio de Evidencia</option>
                        <option>Cancelado</option>
                        <option>Pago de daños</option>
                        <option>Facturación</option>";
            }
            if(str_contains($row["siniestroEstado"], "evidencia")){
                return "<option >Recepción</option>
                        <option>Visita</option>
                        <option>Presupuesto</option>
                        <option>Autorizado</option>
                        <option>En espera</option>
                        <option selected>Envio de Evidencia</option>
                        <option>Cancelado</option>
                        <option>Pago de daños</option>
                        <option>Facturación</option>";
            }
            if(str_contains($row["siniestroEstado"], "Cancelado")){
                return "<option >Recepción</option>
                        <option>Visita</option>
                        <option>Presupuesto</option>
                        <option>Autorizado</option>
                        <option>En espera</option>
                        <option >Envio de Evidencia</option>
                        <option selected>Cancelado</option>
                        <option>Pago de daños</option>
                        <option>Facturación</option>";
            }
            if(str_contains($row["siniestroEstado"], "pago")){
                return "<option >Recepción</option>
                        <option>Visita</option>
                        <option>Presupuesto</option>
                        <option>Autorizado</option>
                        <option>En espera</option>
                        <option >Envio de Evidencia</option>
                        <option>Cancelado</option>
                        <option selected>Pago de daños</option>
                        <option>Facturación</option>";
            }
            if(str_contains($row["siniestroEstado"], "factura")){
                return "<option >Recepción</option>
                        <option>Visita</option>
                        <option>Presupuesto</option>
                        <option>Autorizado</option>
                        <option>En espera</option>
                        <option >Envio de Evidencia</option>
                        <option>Cancelado</option>
                        <option>Pago de daños</option>
                        <option selected>Facturación</option>";
            }

}

function selectUsuario($row){

        include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php"; 

        $sql = "SELECT * FROM usuarios";

        $resultado = $connect->query($sql);

        echo "<option>".$row['siniestroProveedor']."</option>";

        while($rows = $resultado->fetch_assoc()){
                echo "<option>".$rows['UserName']."</option>";
        }

}

function redireccionPost($dest)
{
   $url = $params = '';
   if( strpos($dest,'?') ) { list($url,$params) = explode('?',$dest,2); }
   else { $url = $dest; }
   echo "<form id='the-form' 
      method='post' 
      enctype='multipart/form-data' 
      action='$url'>\n";
   foreach( explode('&',$params) as $kv )
   {
      if( strpos($kv,'=') === false ) { continue; }
      list($k,$v) = explode('=',$kv,2);
      echo "<input type='hidden' name='$k' value='$v'>\n";
   }
   echo <<<ENDOFFORM
        <p id="the-button" style="display:none;">
        Click the button if page doesn't redirect within 3 seconds.
        <br><input type="submit" value="Click this button">
        </p>
        </form>
        <script type="text/javascript">
        function DisplayButton()
        {
        document.getElementById("the-button").style.display="block";
        }
        setTimeout(DisplayButton,1200);
        document.getElementById("the-form").submit();
        </script>
        ENDOFFORM;
}

function filtrodedatos($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

function rol($number){
        if($number == "1"){
                return "Administrador";
        }
        if($number == "2"){
                return "Gerente";
        }
        if($number == "3"){
                return "Supervisor";
        }
        if($number == "4"){
                return "Oficina";
        }
        if($number == "5"){
                return "Proveedor";
        }
        if($number == "6"){
                return "Desarrollo";
        }
}

?>