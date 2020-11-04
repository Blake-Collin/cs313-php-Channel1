'use strict'
const http = require('http');
var count = 0;
var concat = "";
function get(callback) {
    http.get(process.argv[2], function (response) {
        response.setEncoding('utf8');
        response.on('data', function(data){
              count += data.length;
              concat += data;
        });
        response.on('error', console.error);
        response.on('end', callback);
      }).on('error', console.error);    
}

function display() {
    console.log(count);
    console.log(concat);
}

get(display);