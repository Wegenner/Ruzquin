"use strict";

var connection = new signalR.HubConnectionBuilder().withUrl("/chatHub").build();

//Desabilitamos el boton de envio hasta que se compruebe que la conección esta establecida

document.getElementById("sendButtonNotifications").disabled = true;
document.getElementById("sendButtonGeneral").disabled = true;

//Funcion que se ejecuta cuando el servidor manda una solicitud al cliente
connection.on("RecieveMessageGeneralNotification", function (user, message, id, roomName) {
    var msg = message.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
    var divpadre = document.createElement("div");
    var divhijo = document.createElement("div");
    var span = document.createElement("span");
    var achecinco = document.createElement("h5");
    var parragraph = document.createElement("p");

    // Creamos el div del mensaje para insertarlo
    if(roomName == "Chat - General"){

        span.classList.add("chat-time");

        span.textContent = Date.now.toString();

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

        document.getElementById("messagesListGeneral").appendChild(divpadre);

        document.getElementById("messagesListGeneral").scrollTop = document.getElementById("messagesListGeneral").scrollHeight;

        return;
    }

    let href = document.createElement("a");

    let url = "@Url.Action('RedirectSiniestroDetails', 'Chat', new {id = " + id + "})"

    href.href(url);

    span.classList.add("chat-time");
    span.textContent = Date.now.toString();

    achecinco.textContent = "Systema --";

    parragraph.textContent = msg;

    href.appendChild(parragraph);

    divhijo.classList.add("chat-message-content");
    divhijo.classList.add("clearfix");

    divhijo.appendChild(span);

    divhijo.appendChild(achecinco);

    divhijo.appendChild(href);

    divpadre.classList.add("chat-message");
    divpadre.classList.add("clearfix");
    divpadre.appendChild(divhijo);

    document.getElementById("messagesListNotifications").appendChild(divpadre);

    document.getElementById("messagesListNotifications").scrollTop = document.getElementById("messagesListNotifications").scrollHeight;

});


//Funcion cuando se establece la conección con el servidor
connection.start().then(function () {

    //Activamos el boton
    document.getElementById("sendButtonNotifications").disabled = false;

    document.getElementById("sendButtonGeneral").disabled = false;
}).catch(function (err) {

    return console.error(err.toString());

});

//Le damos la función tambien al boton de enviar del chat general
document.getElementById("sendButtonGeneral").addEventListener("click", function (event) {
    var sender = document.getElementById("senderInput").value;
    var roomName = "Chat - General";
    var message = document.getElementById("messageInputGeneral").value;

    connection.invoke("SendMessageToGroup", sender, roomName, message).catch(function (err) {
        return console.error(err.toString());

    event.preventDefault();
    
    });
});

document.getElementById("sendButtonNotifications").addEventListener("click", function (event) {
    var sender = document.getElementById("senderInput").value;
    var roomName = "Chat - Notificaciones";
    var message = document.getElementById("messageInputNotifications").value;

    connection.invoke("SendMessageToGroup", sender, roomName, message).catch(function (err) {
        return console.error(err.toString());

    event.preventDefault();
    
    });
});

document.getElementById("Guardar").addEventListener("click", function (event) {

    var idsiniestro = "123"; //document.getElementById("idsiniestro").value;
    var sender = document.getElementById("senderInput").value;
    var roomName = "Chat - Notificaciones";
    var message = "Se ha realizdo un cambio en : " + idsiniestro;

    connection.invoke("SendMessageToGroup", "Sistema ", roomName, message).catch(function (err) {
        return console.error(err.toString());

    event.preventDefault();

    });
    
});

document.getElementById("linksiniestro").addEventListener("click", function (event){

    var id = this.onclick.arguments.value;

    connection.invoke("RedirectSiniestroDetails", id);
});