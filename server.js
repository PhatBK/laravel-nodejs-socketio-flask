var app = require('express')();
var server = require('http').Server(app);
var request = require('request');
var io = require('socket.io')(server);
var fs = require("fs");

// var data_config = fs.readFileSync('config.txt','utf-8');
// var arr_config = data_config.split("=");
// Address = arr_config[1].trim();

var data_config = fs.readFileSync('config.txt', 'utf-8');
var arr_config = data_config.split(";");
var host = arr_config[0].split("=");
Address = host[1].trim();
var dir = arr_config[1].split("=");
Dir_root = dir[1].trim();

var PORT = 1108;
console.log(Address);
var user_count = 0;


io.on('connection', function(socket) {
    user_count++;
    console.log("có :" + user_count + " đang kết nối..");
    console.log("socket id : " + socket.id);

    // socket.on('phatnh channel demo', function(data) {
    //     console.log(data);
    // });

    socket.on('user posts post', function(data) {
        console.log("socket id : " + socket.id);
        var list_name_image = [];
        var list_image_src = data['list_image_src'];
        for (i = 0; i < list_image_src.length; i++) {
            var guess = list_image_src[i].match(/^data:image\/(png|jpeg);base64,/)[1];
            var ext = "";
            switch (guess) {
                case "png":
                    ext = ".png";
                    break;
                case "jpeg":
                    ext = ".jpg";
                    break;
                case "jpg":
                    ext = ".jpg";
                    break;
                case "gif":
                    ext = ".gif";
                    break;
                case "svg":
                    ext = ".svg";
                    break;
                default:
                    ext = ".bin";
                    break;
            }
            var savedFilename = "uploads/customer/userpost/" + randomString(10) + ext;
            list_name_image.push(savedFilename);
            fs.writeFile(__dirname + "/public/" + savedFilename, getBase64Image(list_image_src[i]), 'base64', function(err) {
                if (err !== null)
                    console.log(err);
                else {
                    console.log("Save photo success!");
                }
            });
        }

        console.log(data['tieude']);
        var data2 = {
            'tieude': data['tieude'],
            'noi_dung': data['noi_dung'],
            'id_loaimon': data['id_loaimon'],
            'id_user': data['id_user'],
            'list_name_image': list_name_image
        };

        // send data
        // io.emit("user posts post",data);
        // var uri = Address + '/bkcook.vn/public/api/savedatauserpost';
        var uri = Address + Dir_root + '/public/api/savedatauserpost';
        request({
            uri: uri,
            method: 'GET',
            json: true,
            headers: {
                "content-type": "application/json",
            },
            body: JSON.stringify(data2),
            timeout: 10000
        }, function(error, response, body) {
            if (error)
                throw error;
            //in ra header
            console.log(body);
            // in ra body nhận được
            // console.log(body);
            io.emit("user posts post", body);

        });
        // console.log(data2);
    });

    socket.on('comment user post', function(data) {

        // var uri = Address + '/bkcook.vn/public/api/savedatacommentpost';
        var uri = Address + Dir_root + '/public/api/savedatacommentpost';
        request({
            uri: uri,
            method: 'GET',
            json: true,
            headers: {
                "content-type": "application/json",
            },
            body: JSON.stringify(data),
            timeout: 10000
        }, function(error, response, body) {
            if (error)
                throw error;
            //in ra header
            console.log(body);
            // in ra body nhận được
            // console.log(body);
            io.emit("comment user post", body);

        });

        // console.log(data);
    });

    socket.on('reply comment user post', function(data) {
        // var uri = Address + '/bkcook.vn/public/api/savedatareplycommentpost';
        var uri = Address + Dir_root + '/public/api/savedatareplycommentpost';
        request({
            uri: uri,
            method: 'GET',
            json: true,
            headers: {
                "content-type": "application/json",
            },
            body: JSON.stringify(data),
            timeout: 10000
        }, function(error, response, body) {
            if (error)
                throw error;
            //in ra header
            console.log(body);
            // in ra body nhận được
            // console.log(body);
            io.emit("reply comment user post", body);

        });
    });

    socket.on('like unlike user post', function(data) {
        // var uri = Address + '/bkcook.vn/public/api/savedatalikepost';
        var uri = Address + Dir_root + '/public/api/savedatalikepost';
        request({
            uri: uri,
            method: 'GET',
            json: true,
            headers: {
                "content-type": "application/json",
            },
            body: JSON.stringify(data),
            timeout: 10000
        }, function(error, response, body) {
            if (error)
                throw error;
            //in ra header
            console.log(body);
            // in ra body nhận được
            // console.log(body);
            io.emit("like unlike user post", body);

        });
    });

    socket.on('comment monan', function(data) {
        // var uri = Address + '/bkcook.vn/public/api/savedatacommentmonan';
        var uri = Address + Dir_root + '/public/api/savedatacommentmonan';
        request({
            uri: uri,
            method: 'GET',
            json: true,
            headers: {
                "content-type": "application/json",
            },
            body: JSON.stringify(data),
            timeout: 10000
        }, function(error, response, body) {
            if (error)
                throw error;
            console.log(body);
            io.emit("comment monan", body);
        });
    });
});

server.listen(PORT, function() {
    console.log("server running port 1108");
});

function randomString(length) {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789-_";

    for (var i = 0; i < length; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

function getBase64Image(imgData) {
    return imgData.replace(/^data:image\/(png|jpeg|jpg);base64,/, "");
}