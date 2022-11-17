<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_header.php";
    include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";

    if($_POST){
    
        date_default_timezone_set("America/Mexico_City");

        $hoy = date_create("now")->format('Y-m-d H:i:s');

        $SQLaviso = "INSERT INTO avisosmodel (aviso, fechaaviso) VALUES ('".$_POST['aviso']."', '".$hoy."')";

        echo $SQLaviso;

        if($resultado = $connect->query($SQLaviso)){
            header("Location: /backend/Avisos/AvisosLanding.php", true, 303);
            die();
        }

    }
?>

<div class="container" style="display:flex;align-items:center;flex-direction:column">

    <h1 style="margin-top:80px;"> Avisos </h1>

    <hr class="line"/>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

        <div class="form">   

            <input class="form__input" autocomplete="Nombre de Usuario" 
            aria-required="true" type="text" data-val="true" 
            data-val-required="El nombe es requerido." 
            id="Input_Name" name="aviso" value="">
                
            <label class="form__label" for="Input_Name">Aviso</label>

        </div>

        <input id="login-submit" type="submit"  name="submit" value="Enviar" class="btn btn-lg btn-primary" style="width:100%; margin-top:10px; border-radius: 16px">

    </form>

</div>
<br/>
<br/>
<br/>
<br/>
<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>    