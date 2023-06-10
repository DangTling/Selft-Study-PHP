<style>
    .tung_san_pham {
        width: 33%;
        border: 1px solid white;
        height: 250px;
        float: left;
    }
    .tung_san_pham > h1 {
        color: white;
    }
    .tung_san_pham > p{
        color: lightskyblue;
    }
</style>
<?php
require 'admin/connect.php'; 
$sql = "select * from product";
$result = mysqli_query($connect, $sql);
?>
<div id = "giua">
    <?php foreach($result as $each):?>
        <div class="tung_san_pham">
            <h1><?php echo $each['name'] ?></h1>
            <img src="admin/product/<?php echo $each['photo'] ?>" alt="" height="100px">
            <p><?php echo $each['price'] ?>$</p>
            <a href="product.php?id=<?php echo $each['id'] ?>">Xem Chi Tiet >></a>
            <br>
            <?php
            if (!empty($_SESSION['id'])){ ?>
                <button data-id="<?php echo $each['id']?>" class="btn_add_to_cart">Thêm vào giỏ hàng</button>
            <?php }
            ?>
        </div>
    <?php endforeach ?>
</div>