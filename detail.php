<style>
    #giua > h1 {
        color: white;
    }
    #giua > p {
        color: white;
    }
</style>
<?php
$id = $_GET['id'];
require 'admin/connect.php';
$sql = "select * from product where id = '$id'";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
?>
<div id = "giua">
    <h1><?php echo $each['name'] ?></h1>
    <img src="admin/product/<?php echo $each['photo'] ?>" alt="" height="100px">
    <p><?php echo $each['price'] ?>$</p>
    <p><?php echo $each['description'] ?></p>
    
</div>