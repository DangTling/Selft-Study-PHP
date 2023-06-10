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
    <title>Giỏ Hàng</title>
</head>

<body>
    <?php
    $cart = $_SESSION['cart'];
    require 'menu.php';
    $total = 0;
    ?>
    <table border="1" width="100%">
        <tr>
            <th>Ảnh Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền thanh toán</th>
            <th>Xóa</th>
        </tr>
        <?php
        foreach ($cart as $id => $each) :
        ?>
            <tr>
                <td>
                    <img src="admin/product/<?php echo $each['photo'] ?>" alt="" height="100px">
                </td>
                <td>
                    <?php echo $each['name'] ?>
                </td>
                <td>
                    <span class="span_price">
                        <?php echo $each['price'] ?>
                    </span>
                </td>
                <td>
                    <button data-id="<?php echo $id ?>" data-type="decre" class="btn_update_quantity">-</button>
                    <span class="span_quantity">
                        <?php echo $each['quantity'] ?>
                    </span>
                    <button data-id="<?php echo $id ?>" data-type="incre" class="btn_update_quantity">+</button>
                </td>
                <td>
                    <span class="span_sum">
                        <?php
                        echo $each['quantity'] * $each['price'];
                        $total += ($each['quantity'] * $each['price']);
                        ?>
                    </span>
                </td>
                <td>
                    <button data-id="<?php echo $id ?>" class="btn_delete">Xóa</button>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <h1>
        Tong Tien Hoa Don: $<span id="span_total"><?php echo $total ?></span>
    </h1>
    <?php
    require 'admin/connect.php';
    $id = $_SESSION['id'];
    $sql = "select * from customer where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    ?>
    <form action="process_checkout.php" method="POST">
        Ten Nguoi Nhan
        <input type="text" name="name_receiver" value='<?php echo $each['name'] ?>'><br>
        So Dien Thoai Nguoi Nhan
        <input type="number" name="phone_receiver" value='<?php echo $each['phone_number'] ?>'><br>
        Dia Chi Nguoi Nhan
        <input type="text" name="address_receiver" value='<?php echo $each['address'] ?>'><br>
        <button>Dat Hang</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn_update_quantity").click(function() {
                let btn = $(this);
                let id = btn.data('id');
                let type = btn.data('type');
                let parent_tr = btn.parents('tr');
                let price = parent_tr.find('.span_price').text();
                let quantity = parent_tr.find('.span_quantity').text();
                $.ajax({
                        type: "GET",
                        url: "update_quantity_of_cart.php",
                        data: {
                            id,
                            type
                        },
                        // dataType: "dataType",
                    })
                    .done(function(data) {
                        if (type == "incre") {
                            quantity++;
                        } else {
                            quantity--;
                        }
                        if (quantity == 0) {
                            parent_tr.remove();
                        } else {
                            parent_tr.find(".span_quantity").text(quantity);
                            let sum = quantity * price;
                            parent_tr.find(".span_sum").text(sum);
                        }
                        totalBill();
                    });
            });
            $(".btn_delete").click(function() {
                let btn = $(this);
                let id = btn.data('id');
                $.ajax({
                    type: "GET",
                    url: "delete_from_cart.php",
                    data: {
                        id
                    },
                    // dataType: "dataType",
                    success: function() {
                        btn.parents('tr').remove();
                        totalBill();
                    }
                });
            });

            function totalBill() {
                let total = 0;
                $(".span_sum").each(function() {
                    total += parseFloat($(this).text());
                });
                $("#span_total").text(total);
            };
        });
    </script>
</body>

</html>