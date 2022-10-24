<html>
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            <?php   
                header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
                header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); 
            ?>

            <?php include $_SERVER['DOCUMENT_ROOT']."/Ruzquin/root/css/site.css" ?>
            <?php include $_SERVER['DOCUMENT_ROOT']."/Ruzquin/root/css/siniestros.css" ?>
        </style>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    
<body>

<header>
    <a href="#"> 
        <?php
            $urlSiniestrosNav = "/Ruzquin/root/imagenes/LOGO.png";
            echo "<img src='$urlSiniestrosNav' width='50px'> </a>"; 
        ?>
    <nav>
        <ul class="nav">
            <?php
                $urlSiniestrosNav = "/Ruzquin/backend/Siniestros/SiniestrosNav.php";
                echo "<li><a href='$urlSiniestrosNav' class='menuLink'> Siniestros </a></li>"; 
            ?>
            <li><a href="#" class="menuLink"> Presupuestos </a></li>
            <li><a href="#" class="menuLink"> Personal </a></li>
            <li><a href="#" class="menuLink"> Chat </a></li>
        </ul>
    </nav>
    <a href="#" class="LoginLink"> Iniciar Sesión </a>
</header>