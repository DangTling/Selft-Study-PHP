<?php
    if (empty($_SESSION['id'])){
        include 'signup.php';
        include 'signin.php';
    }
?>

<div id = "tren">
    <ol>
        <?php 
        if(isset($_GET['loi'])) {
            echo $_GET['loi'];
        } ?>
        <li><a href="index.php">Trang Chu</a></li>
        <li class="menu_guest" style="<?php if(!empty($_SESSION['id'])) {?> display:none; <?php } ?>">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_signin">Đăng Nhập</button>
        </li>
        <li class="menu_guest" style="<?php if(!empty($_SESSION['id'])) {?> display:none; <?php } ?>">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_signup">Đăng Ký</button>
        </li>
        <li class="menu_user" style="<?php if(empty($_SESSION['id'])) {?> display:none; <?php } ?>"><a href="signout.php">Dang Xuat</a></li>
        <li class="menu_user" style="<?php if(empty($_SESSION['id'])) {?> display:none;<?php } ?>"><a href="view_cart.php">Gio Hang</a></li>
        <li class="menu_user " style="<?php if(empty($_SESSION['id'])) {?> display:none; <?php } ?>">Xin Chào <a href="user.php" class="span_hello_user"><?php echo $_SESSION['name'] ?></a></li>
    </ol>
</div>