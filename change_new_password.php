<?php
require 'admin/connect.php';
$token = $_GET['token'];
$sql = "select customer_id from forgot_password where token = '$token'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) != 1) {
    header('location: index.php?loi=Token này đã quá hạn');
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change New Password</title>
</head>
<body>
    <form action="process_change_password.php" method="POST">
        <input type="hidden" name="token" value="<?php echo $token?>">
        Mật Khẩu Mới:
        <input type="password" name="password">
        <br>
        <button>Đổi mật khẩu</button>
    </form>
</body>
</html>