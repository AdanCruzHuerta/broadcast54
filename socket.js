var app = require('http').createServer(handler);
var io = require('socket.io')(app);

var Redis = require('ioredis');
var redis = new Redis();

function handler(req, res) {
    res.writeHead(200);
    res.end('');
}

io.on('connection', function(socket) {
    console.log("conected");
    socket.on('enviarMensaje', (data, callback) => {
        console.log(data);
        socket.emit('enviarMensaje', data);
        //callback();
    });
});

redis.psubscribe('*', function(err, count) {
    //
});

//Recibe los mensajes que son emitidos por redis
redis.on('pmessage', function(subscribed, channel, message) {
    console.log("Message received!");
    message = JSON.parse(message);
    var event = message.event;
    var data = message.data;
    console.log(channel);
    io.emit(channel + ':' + event, data);
});

app.listen(3000, function() {
    console.log('Server is running!');
});