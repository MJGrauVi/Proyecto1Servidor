<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página no encontrada</title>
    <style>
        body {
            background: #ecf0f1;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        #clouds {
            padding: 100px 0;
            background: #ecf0f1;
            overflow: hidden;
        }

        .cloud {
            width: 200px;
            height: 60px;
            background: #fff;
            border-radius: 200px;
            position: absolute;
            animation: moveclouds 15s linear infinite;
        }

        .cloud:before, .cloud:after {
            content: '';
            position: absolute;
            background: #fff;
            width: 100px;
            height: 80px;
            position: absolute;
            top: -15px;
            left: 10px;
            border-radius: 100px;
        }

        .cloud:after {
            width: 120px;
            height: 120px;
            top: -30px;
            left: auto;
            right: 15px;
        }

        .x1 { top: 100px; left: -200px; animation-duration: 20s; }
        .x1_5 { top: 150px; left: -250px; animation-duration: 25s; }
        .x2 { top: 200px; left: -300px; animation-duration: 30s; }
        .x3 { top: 250px; left: -350px; animation-duration: 35s; }
        .x4 { top: 300px; left: -400px; animation-duration: 40s; }
        .x5 { top: 350px; left: -450px; animation-duration: 45s; }

        @keyframes moveclouds {
            0% { margin-left: 100%; }
            100% { margin-left: -100%; }
        }

        .c {
            text-align: center;
            margin-top: -50px;
        }

        ._404 {
            font-size: 120px;
            font-weight: bold;
            color: #2c3e50;
        }

        ._1 {
            font-size: 24px;
            color: #34495e;
        }

        ._2 {
            font-size: 18px;
            color: #7f8c8d;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 10px 25px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
<div id="clouds">
    <div class="cloud x1"></div>
    <div class="cloud x1_5"></div>
    <div class="cloud x2"></div>
    <div class="cloud x3"></div>
    <div class="cloud x4"></div>
    <div class="cloud x5"></div>
</div>
<div class="c">
    <div class="_404">404</div>
    <hr>
    <div class="_1"><?= $error??"UHHHHHHHH" ?></div>
    <div class="_2">NO ENCONTRADA</div>
    <a class="btn" href="/">INICIO</a>
</div>
</body>
</html>
