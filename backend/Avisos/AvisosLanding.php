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

        </style>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
                integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="/root/css/site.css">
        <link rel="stylesheet" href="/root/css/siniestros.css">
        <link rel="stylesheet" href="/root/css/chat-modelo.css">

    </head>
    
<body>

    <div class="container" style="display:flex;align-items:center;flex-direction:column; margin-top:5%">

        <h1 style="margin-bottom: 20px"> Avisos </h1>

        <!-- Pondre hasta los ultimos 3 avisos con enfasís en el ultimo subido basado en fecha -->
        <?php
            
            include $_SERVER['DOCUMENT_ROOT']."/backend/Database/connection.php";

            $sqlavisos = "SELECT * FROM avisosmodel ORDER BY fechaaviso DESC LIMIT 3";

            $aux = 0;

            if($lista = $connect->query($sqlavisos)){
                while($row = $lista->fetch_assoc()){
                    
                    $date = date("d-m-Y", strtotime($row['fechaaviso']));

                    if($aux == 0){
                        
                        
                        ?>
                            <div class="row time">
                                <span> <?php echo $date;?> </span>
                            </div>

                            <div class="row mensaje">

                                <p style='font-size:large'> <?php echo $row['aviso'];?> </p>
                                
                            </div>

                            <div class="row att" style="margin-bottom: 30px">
                                <span> Att: Alejandro </span>
                            </div>
                        
                        <?php
                    
                    }

                    if($aux == 1){

                    
                        ?>
                            <div class="row time">
                                <span> <?php echo $date;?> </span>
                            </div>

                            <div class="row mensaje" style="width: 90%">
                                <p style="font-size:small"> <?php echo $row['aviso'];?> </p>
                            </div>

                            <div class="row att">
                                <span> Att: Alejandro </span>
                            </div>
                        <?php

                    }

                    if($aux == 2){

                    
                        ?>
                        
                        <div class="row time">
                            <span> <?php echo $date;?> </span>
                        </div>

                        <div class="row mensaje" style="width: 90%">
                            <p style="font-size:small"> <?php echo $row['aviso'];?> </p>
                        </div>

                        <div class="row att">
                            <span> Att: Alejandro </span>
                        </div>
                        
                        <?php

                    }

                    $aux += 1;
            
        ?>

<?php
        }
    }

?>

        <form action="/backend/Siniestros/SiniestrosActivos.php" name="Login" method="post">

            <input name="check" type="number" value="1" readonly hidden>

            <input id="login-submit" type="submit"  name="submit" value="Enterado" class="btn btn-lg btn-primary" style="width:100%; margin-top:10px; border-radius: 16px">

        </form>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
crossorigin="anonymous"></script>

</html>
 