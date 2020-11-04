"use strict"
const fs = require('fs');
const path = require('path');

module.exports = function (dir, filter, callback) {
    const folder = dir;
    const ext = '.' + filter;

    fs.readdir(folder, function (err, list) {
        if(err) return callback(err);

        list = list.filter(function (file) {
            return path.extname(file) === ext;
        });        
        callback(null, list);
    });
}