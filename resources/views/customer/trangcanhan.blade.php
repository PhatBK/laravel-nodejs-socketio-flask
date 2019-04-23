<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trang Cá Nhân</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h3>Your Screen:</h3>
    <div>
        {{ $user }}
    </div>
    <br>
    
    <div id="demo"></div>
    <div id="test">
    </div>

<script>
        var txt = "";
        txt += "<p>Total width/height: " + screen.width + "*" + screen.height + "</p>";
        txt += "<p>Available width/height: " + screen.availWidth + "*" + screen.availHeight + "</p>";
        txt += "<p>Color depth: " + screen.colorDepth + "</p>";
        txt += "<p>Color resolution: " + screen.pixelDepth + "</p>";
        document.getElementById("demo").innerHTML = txt;
        var str = "";
        str += '<p style="color:red;">Hello</p>'
        document.getElementById('test').innerHTML = str;
        
</script>
</body>
</html>