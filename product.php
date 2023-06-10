<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        #tong {
            width: 100%;
            height: 700px;
            background-color: black;
        }
        #tren {
            width: 100%;
            height: 20%;
            background-color: red;
        }
        #giua {
            width: 100%;
            height: 70%;
            background-color: black;
        }
        #duoi {
            width: 100%;
            height: 10%;
            background-color: red;
        }
    </style>
</head>
<body>

    <div id = "tong">
        <?php include "menu.php" ?>
        <?php include "detail.php" ?>
        <?php include "footer.php" ?>
    </div>
</body>
</html>
