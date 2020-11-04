const fs = require('fs');
var count = undefined;

function getLines (callback) {    
    fs.readFile(process.argv[2], function (err, buffer) {
        const str = buffer.toString();
        var strArray = str.split('\n');
        count = strArray.length - 1;
        callback();
      });
}

function display() {
    console.log(count);
}

getLines(display);