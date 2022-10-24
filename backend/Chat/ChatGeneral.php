<?php 
    include $_SERVER['DOCUMENT_ROOT']."/Ruzquin/shared/_header.php";
?>

<div id="navSiniestros" class="container-fluid">
    <div class="row">
        <div class="col">
            <nav>
                <ul class="nav">
                    <?php
                        $urlPresupuestosNav = "/Ruzquin/backend/Chat/ChatGeneral.php";
                        echo "<li><a href='$urlPresupuestosNav' class='menuLink' style='background: #2f698d'> Chat General </a></li>"; 
                    ?>
                    <?php
                        $urlPresupuestosNav = "/Ruzquin/backend/Chat/ChatGeneral.php";
                        echo "<li><a href='#' class='menuLink'> Historial de Notificaciones </a></li>"; 
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Inicio del chat -->

<div class="container" id="chathub-container">

    <div class="row" id="chathub-head">

        <div class="col-md-2" id="chatroom-search">

            <input style="border-style: none;
                        width: 100%;
                        background-color:#718b96;
                        border-radius: 16px" placeholder="Buscar">
            </input>


        </div>

        <div class="col-md-1" id="chatroom-searchbtn">

            <button class="btn btn-outline-info" id="btn-buscar" type="button"> Buscar </button>

        </div>

        <div class="col-md-9" id="chat-name">

            <p style="text-align:center; 
                        align-self: end;
                        margin-top: 10px;">
                Nombre del chat
            </p>

        </div>
    </div>

    <div class="row" id="chat-body">

        <div class="col-md-3" id="chatroom-list">

<!-- Chatroom en lectura -->

            <div class="row" id="chatroom-previsualizer-on">

                <span id="namechat">

                    6045212

                </span>

                <span id="timechat">

                (28/09/2022) 12:45 pm

                </span>

            </div>

<!-- Chatroom en espera -->

            <div class="row" id="chatroom-previsualizer-off">

                <span id="namechat">

                    6045212

                </span>

                <span id="timechat">

                    (28/09/2022) 12:45 pm

                </span>

            </div>

            <div class="row" id="chatroom-previsualizer-off">

                <span id="namechat">

                    6045212

                </span>

                <span id="timechat">

                    (28/09/2022) 12:45 pm

                </span>

            </div>

        </div>

        <div class="col-md-9">

<!-- Mensajes -->

            <div class="row-fluid" id="chat" >

<!-- Mensaje entrante (de otros usuarios) -->

                <div class="row" id="chat-comingmessage">

                    <span id="senderchat-name">

                        Raul --

                    </span>

                    <span id="senderchat-time">

                        (28/09/2022) 12:45 pm

                    </span>

                </div>

<!-- Mensaje saliente (self) -->

                <div class="row" id="chat-sendingmessage">

                    <span id="recieverchat-time">

                        (28/09/2022) 12:45 pm

                    </span>

                    <span id="recieverchat-name">

                        Yo

                    </span>

                </div>

            <!-- Mensaje saliente (self) -->

            <div class="row" id="chat-sendingmessage">

                <span id="recieverchat-time">

                    (28/09/2022) 12:45 pm

                </span>

                <span id="recieverchat-name">

                    Yo

                </span>

            </div>

            
            <!-- Mensaje entrante (de otros usuarios) -->

            <div class="row" id="chat-comingmessage">

                <span id="senderchat-name">

                    Raul --

                </span>

                <span id="senderchat-time">

                    (28/09/2022) 12:45 pm

                </span>

            </div>
            <!-- Mensaje saliente (self) -->

            <div class="row" id="chat-sendingmessage">

                <span id="recieverchat-time">

                    (28/09/2022) 12:45 pm

                </span>

                <span id="recieverchat-name">

                    Yo

                </span>

            </div>

            
            <!-- Mensaje entrante (de otros usuarios) -->

            <div class="row" id="chat-comingmessage">

                <span id="senderchat-name">

                    Raul --

                </span>

                <span id="senderchat-time">

                    (28/09/2022) 12:45 pm

                </span>

            </div>
            <!-- Mensaje saliente (self) -->

            <div class="row" id="chat-sendingmessage">

                <span id="recieverchat-time">

                    (28/09/2022) 12:45 pm

                </span>

                <span id="recieverchat-name">

                    Yo

                </span>

            </div>

            
            <!-- Mensaje entrante (de otros usuarios) -->

            <div class="row" id="chat-comingmessage">

                <span id="senderchat-name">

                    Raul --

                </span>

                <span id="senderchat-time">

                    (28/09/2022) 12:45 pm

                </span>

            </div>
<!-- Mensaje saliente (self) -->

                <div class="row" id="chat-sendingmessage">

                    <span id="recieverchat-time">

                        (28/09/2022) 12:45 pm

                    </span>

                    <span id="recieverchat-name">

                        Yo

                    </span>

                </div>

            <!-- Mensaje saliente (self) -->

            <div class="row" id="chat-sendingmessage">

                <span id="recieverchat-time">

                    (28/09/2022) 12:45 pm

                </span>

                <span id="recieverchat-name">

                    Yo

                </span>

            </div>

            
            <!-- Mensaje entrante (de otros usuarios) -->

            <div class="row" id="chat-comingmessage">

                <span id="senderchat-name">

                    Raul --

                </span>

                <span id="senderchat-time">

                    (28/09/2022) 12:45 pm

                </span>

            </div>
            <!-- Mensaje saliente (self) -->

            <div class="row" id="chat-sendingmessage">

                <span id="recieverchat-time">

                    (28/09/2022) 12:45 pm

                </span>

                <span id="recieverchat-name">

                    Yo

                </span>

            </div>

            
            <!-- Mensaje entrante (de otros usuarios) -->

            <div class="row" id="chat-comingmessage">

                <span id="senderchat-name">

                    Raul --

                </span>

                <span id="senderchat-time">

                    (28/09/2022) 12:45 pm

                </span>

            </div>
            <!-- Mensaje saliente (self) -->

            <div class="row" id="chat-sendingmessage">

                <span id="recieverchat-time">

                    (28/09/2022) 12:45 pm

                </span>

                <span id="recieverchat-name">

                    Yo

                </span>

            </div>

            
            <!-- Mensaje entrante (de otros usuarios) -->

            <div class="row" id="chat-comingmessage">

                <span id="senderchat-name">

                    Raul --

                </span>

                <span id="senderchat-time">

                    (28/09/2022) 12:45 pm

                </span>

            </div>
        </div>
<!-- area de envio de mensajes -->

            <div class="row" id="chat-senderbox" style="align-self: end;
                                    height: 10%;
                                    background-color: #4a636e" >

                <div class="col-md-10" style="align-self: center;">

                    <input style="width:100%; 
                                border-style: none;
                                background-color: #718b96;
                                border-radius: 16px;" placeholder="Buscar">
                    </input>


                </div>

                <div class="col-md-2" style="align-self: center;
                            align-items: center;">

                    <button class="btn btn-outline-info" style="border-style: none;
                                                                border-radius: 16px;
                                                                background-color: #d9d9d9;
                                                                height: 25px;
                                                                width: 70%;
                                                                text-align: center;
                                                                font-size: 10px;" type="button"> 
                                                                
                        Enviar 
                    
                    </button>

                </div>
            </div>

        </div>
    </div>
</div>

<?php 
    include $_SERVER['DOCUMENT_ROOT']."/Ruzquin/shared/_footer.php";
?>