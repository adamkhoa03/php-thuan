<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký thành viên</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">


</head>
<?php
include('../config/connect.php');
session_start();

if (isset($_POST['sbm'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = login($email, $password);

    if (!$error) {
        header('location: ../student/profile.php');
    }
}
?>
<body>
<div class="d-flex justify-content-center mt-3">
    <div class="col-md-4">
        <div>
            <div class="mb-3 text-capitalize">Đăng nhập tài khoản</div>
            <div>
                <?php if (isset($error)) {
                    echo $error;
                } ?>
                <form id="login-form" method="post">
                    <div class="form-group">
                        <label for="email">Tên đăng nhập:</label>
                        <input class="form-control" placeholder="Tên đăng nhập" type="email" id="email"
                               name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>

                        <input class="form-control" placeholder="Mật khẩu" type="password" id="password"
                               name="password" required>
                    </div>
                    <button class="btn btn-primary" name="sbm" type="submit" id="login-btn">Đăng nhập</button>
                </form>
                <p id="error-message"></p>
                <p>Nếu chưa có tài khoản. Bấm <a href="signup.php">vào đây</a> để đăng ký!</p>
            </div>
        </div>
    </div>
</div>
</body>

</html>
