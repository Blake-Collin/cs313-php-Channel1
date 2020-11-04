'use strict'
const http = require('http');
const bl = require('bl');

var lines = [];
var max = process.argv.length -2;

function get(index) {    
    http.get(process.argv[index + 2], function (response) {
        response.pipe(bl(function(err, data){
            if (err) return console.error;

            lines[index] = data.toString();

            if(lines.length == max)
            {
                display();
            }
        }))
    });
}

function display() {
    for(var i = 0; i < lines.length; i++)
    {
        console.log(lines[i]);
    }
}

for (var i = 0; i < max; i++)
{
    get(i);
}