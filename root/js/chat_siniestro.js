"use strict";

var connection = new signalR.HubConnectionBuilder().withUrl("/chatHub").build();

//Desabilitamos el boton de envio hasta que se compruebe que la conección esta establecida

document.getElementById("sendButtonSiniestro").disabled = true;

//Funcion que se ejecuta cuando el servidor manda una solicitud al cliente
connection.on("RecieveMessageSiniestro", function (user, message) {
    var msg = message.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
    var divpadre = document.createElement("div");
    var divhijo = document.createElement("div");
    var span = document.createElement("span");
    var achecinco = document.createElement("h5");
    var parragraph = document.createElement("p");

    // Creamos el div del mensaje para insertarlo

    span.classList.add("chat-time");
    span.textContent = "13:12";

    achecinco.textContent = user;

    parragraph.textContent = msg;

    divhijo.classList.add("chat-message-content");
    divhijo.classList.add("clearfix");

    divhijo.appendChild(span);

    divhijo.appendChild(achecinco);

    divhijo.appendChild(parragraph);

    divpadre.classList.add("chat-message");
    divpadre.classList.add("clearfix");
    divpadre.appendChild(divhijo);

    document.getElementById("messagesListSiniestro").appendChild(divpadre);

    document.getElementById("messagesListSiniestro").scrollTop = document.getElementById("messagesListGeneral").scrollHeight;

});


//Funcion cuando se establece la conección con el servidor
connection.start().then(function () {
    var roomName = document.getElementById("roomName").value;


    //Primero entramos al Room de chat que corresponde para mandar los mensajes
    // connection.invoke("JoinRoom", roomName).catch(function (err) {
    //     return console.error(err.toString());
    // });

    //Activamos el boton
    document.getElementById("sendButtonSiniestro").disabled = false;
}).catch(function (err) {

    return console.error(err.toString());

});

//Función cuando se clica en el boton de enviar
document.getElementById("sendButtonSiniestro").addEventListener("click", function (event) {
    var sender = document.getElementById("senderInputSiniestro").value;
    var roomName = document.getElementById("roomName").value;
    var message = document.getElementById("messageInputSiniestro").value;

    connection.invoke("SendMessageToGroup", sender, roomName, message).catch(function (err) {
        return console.error(err.toString());

    event.preventDefault();
    
    });
});