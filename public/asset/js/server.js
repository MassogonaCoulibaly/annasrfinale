const express = require('express');
const http = require('http');
const socketIo = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

// Configure Express pour servir les fichiers statiques depuis le répertoire public
app.use(express.static(__dirname + '/public'));

// Route pour la page d'accueil
app.get("/", function(req, res){
    res.sendFile(__dirname + '/admin');
});

// Gestion des connexions WebSocket
io.on('connection', function(socket){
    console.log('a user is connected');
    socket.on('disconnect', function (){
        console.log('a user is disconnected');
    });
    socket.on('chat message', function (msg){
        console.log('message recu : ' + msg);
        io.emit('chat message', msg);
    });
});

server.listen(8000, () => {
    console.log('Server running on port 8000');
});
