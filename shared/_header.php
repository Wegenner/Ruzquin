<?php 

  session_start();

  if (!isset($_SESSION['rol'])){
    header('Location:/index.php');
  }

?>

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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <?php
        $index = "/backend/Siniestros/SiniestrosActivos.php";
        $urlSiniestrosNav = "/root/imagenes/LOGO.png";
        echo "<a href='$index' style='margin-right:10px'><img src='$urlSiniestrosNav' width='50px'> </a>"; 
    ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <?php
        $urlSiniestrosNav = "/backend/Siniestros/SiniestrosActivos.php";
        echo "<li><a href='$urlSiniestrosNav' class='menuLink'> Siniestros </a></li>"; 

        $urlSiniestrosNav = "/backend/Presupuestos/PresupuestosGraficos.php";
        echo "<li><a href='$urlSiniestrosNav' class='menuLink'> Presupuestos </a></li>"; 

        $urlSiniestrosNav = "/backend/Usuarios/UsuariosTodos.php";
        echo "<li><a href='$urlSiniestrosNav' class='menuLink'> Personal </a></li>"; 

        $urlSiniestrosNav = "/backend/Chat/ChatGeneral.php";
        echo "<li><a href='$urlSiniestrosNav' class='menuLink'> Chat </a></li>"; 

        $urlSiniestrosNav = "/backend/Avisos/AvisosCrear.php";
        echo "<li><a href='$urlSiniestrosNav' class='menuLink'> Avisos </a></li>"; 

        $urlSiniestrosNav = "/backend/Chat/ChatNotificaciones.php";
        echo "<li>
                <a href='$urlSiniestrosNav' class='menuLink notificaciones'> 
                  <span class='label label-pill label-danger count' style='border-radius:50px;'></span> 
                  Notificaciones 
                </a>
              </li>"; 
    ?>
    </ul>
    <form action="/backend/Siniestros/SiniestrosResultados.php" method="POST">   

      <input type="text" name="id" style="border-radius:13px"/>

      <input type="submit" class="btn btn-dark" style="border-radius: 20px !important" value="Buscar">

    </form>

    <a class="btn btn-info" style="margin-left:10px" href="/backend/Sistema/SistemaSingOut.php"><?php echo $_SESSION['nombre'];?></a>
  </div>
</nav>
