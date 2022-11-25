<html>
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Ruzquin </title>

        <style>
            <?php   
                header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
                header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); 
            ?>

        </style>

        <link rel="shortcut icon" href="/root/imagenes/LOGO.ico" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="/root/css/site.css">
        <link rel="stylesheet" href="/root/css/siniestros.css">
        <link rel="stylesheet" href="/root/css/chat-modelo.css">
        <link rel="stylesheet" href="/root/css/archivos.css">
        
    </head>
    
<body>

<div class="container" style="display:flex;align-items:center;flex-direction:column">

    <img  src="/root/imagenes/LOGO.png" style="width: 150px;height:130px; margin-top:15px; margin-bottom: 40px;">
    <h1> Inicia Sesión</h1>
    <hr style="size: 15 !important;">

    <form action="/backend/Database/login.php" name="Login" method="post">
        <div class="form">   
            <input class="form__input" autocomplete="Nombre de Usuario" 
            aria-required="true" type="text" data-val="true" 
            data-val-required="El nombe es requerido." 
            id="Input_Name" name="Name" value="">
                
            <label class="form__label" for="Input_Name">Nombre de usuario</label>
        </div>

        <div class="form">  
            <input class="form__input" autocomplete="Contraseña de Usuario" 
                    aria-required="true" type="password" data-val="true" 
                    data-val-required="La contraseña es requerido." 
                    id="Input_Password" name="Password" value="">

            <label class="form__label" for="Input_Password">Contraseña</label>
        </div>

        <input id="login-submit" type="submit"  name="submit" value="Ingresar" class="btn btn-lg btn-primary" style="width:100%; margin-top:10px; border-radius: 16px">
    </form>

</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/shared/_footer.php";
?>      