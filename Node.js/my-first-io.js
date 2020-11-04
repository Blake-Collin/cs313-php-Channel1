//console.log(process.argv);
const fs = require('fs');
var buffer = fs.readFileSync(process.argv[2]);
const str = buffer.toString();
var strArray = str.split('\n');
console.log(strArray.length-1);