<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        * {
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
            margin-top: 30px;
            width: 100%;
            height: 10%;
            background-color: red;
        }
    </style>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <div id="tong">
        <?php include "menu.php" ?>
        <?php include "products.php" ?>
        <?php include "footer.php" ?>
    </div>


    <script>
        $(document).ready(function() {
            $(".btn_add_to_cart").click(function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "add_to_cart.php",
                    data: {
                        id
                    },
                    // dataType: "dataType",
                    success: function(data) {
                        alert("Thêm sản phẩm " + id + " thành công!");
                    }
                });
            });

        });
    </script>
</body>

</html>