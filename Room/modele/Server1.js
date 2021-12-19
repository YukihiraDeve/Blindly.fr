const WebSocket = require("ws")

const Server = new WebSocket.Server({ port : 8000 });
var counter = 0;
var playing = 1;
var join = 1;
var start = 0;
var AnnonceClient = "A rejoins sa party"
var readyfait = 1;



/* ServerC.broadcast = function broadcast(event){       a voir plus tard
    ServerC.clients.forEach(function each (client){
        console.log('Counter client' + counter)
        client.send(JSON.stringify({
            type:"counter",
            value: counter
        }))
    })

}

*/ 

Server.on('connection', function(ws) {
    console.log('[Server 1] Connextion établie avec l\'utilisateur');
    counter = counter + 1
    console.log("[Server 1] Joueur connecter : " + counter)

        ws.on('message' , function(message) {
                   
            message = JSON.parse(message);
            if(message.type == "name"){

                ws.personName = message.data;
                return;
            }
             if(message.type == "Game"){
                console.log('[Server 1] un joueur a demarer')
                 ws.ready = message.ready
                return
            }
        

            console.log('[Server 1]'+ ws.personName + 'un joueur a demarer sa party');

            Server.clients.forEach(function e(client) {


                if(ws.ready){
                    message.data = AnnonceClient
                    client.send(JSON.stringify({
                        name: ws.personName,
                        data: message.data,
                        counter: counter

                    }))
    
                } else if(client != ws) {
                    client.send(JSON.stringify({
                        name: ws.personName,
                        data: message.data,
                        counter: counter
                    }));

                } 

                         
            });



    });


    ws.on("close" , () => {
        console.log("[Server 1] Utilisateur déconnecter");
        counter = counter - 1;
        console.log("[Server 1] Joueur connecter : " + counter)

    });
});

