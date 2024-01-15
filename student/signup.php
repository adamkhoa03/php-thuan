<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký thành viên</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

</head>
<?php
include_once('../config/connect.php');
session_start();
if (isset($_POST['sbm'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $messenger = register($fullName, $email, $password);
}

?>
<body>
<div class="row d-flex justify-content-center">
    <div class="col-md-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Đăng ký thành viên</div>
            <div class="panel-body">
                <?php if (isset($messenger)) {
                    echo $messenger;
                } ?>
                <form role="form" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label for="fullName">Tên đăng nhập:</label>
                            <input class="form-control" placeholder="Họ tên" name="fullName" type="text" autofocus
                                   id="fullName" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Tên đăng nhập:</label>
                            <input class="form-control" placeholder="Tên đăng nhập" type="email" id="email"
                                   name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Tên đăng nhập:</label>
                            <input class="form-control" placeholder="Mật khẩu" name="password" type="password"
                                   id="password" value="" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="sbm">Đăng ký</button>
                    </fieldset>
                </form>
                <p></p>
                <p>Nếu đã có tài khoản. Bấm <a href="login.php">vào đây</a> để đăng nhập!</p>
            </div>
        </div>
    </div>
</div>
</body>

</html>
