var express =   require('express'),
    http =      require('http'),
    server =    http.createServer(app);
 
var app = express();
 
const redis =   require('redis');
const io =      require('socket.io');
const client =  redis.createClient();
 
server.listen(8080, 'localhost');
 
io.listen(server).on('connection', function(client) {
    const redisClient = redis.createClient()
    redisClient.subscribe('currencyexchange.graphtrend');

    redisClient.on('message', function(channel, message) {
        client.emit(channel, message);
    });
 
    client.on('disconnect', function() {
        redisClient.quit();
    });
});