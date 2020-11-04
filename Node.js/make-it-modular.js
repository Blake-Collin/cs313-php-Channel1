const mymodule = require('./mymodule.js');
var dir = process.argv[2];
var filter = process.argv[3];

mymodule(dir, filter, function (err, list) {
    if (err) return console.error(err);
    
        list.forEach(file => {
            console.log(file);
        });
});