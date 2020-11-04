const net = require('net');
const server = net.createServer(function (socket) {
    var date = new Date();
    var str = date.getFullYear() + "-" + (date.getMonth()+1).pad(2) + "-" + date.getDate().pad(2) + " " + date.getHours().pad(2) + ":" + date.getMinutes().pad(2) + "\n";
    socket.end(str);
});
server.listen(process.argv[2]);

Number.prototype.pad = function(size) {
    var s = String(this);
    while (s.length < (size || 2)) {s = "0" + s;}
    return s;
  }