<?php
// if ($_COOKIE['admin_id'] == true) {
//     header('location: index.php');
//     die;
// }
include('../config/connect.php');
session_start();

if (isset($_POST['sbm'])) {
    $email = $_POST['taikhoan'];
    $password = $_POST['matkhau'];
    $error = adminLogin($email, $password);

    if ($error) {
        header('location: login.php');
        return;
    }
    setcookie('admin_id', true, time() + 3600, '/');
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/bootstrap-table.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Administrator</div>
                <div class="panel-body">
                    <?php if (isset($error)) {
                        echo $error;
                    } ?>

                    <form role="form" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="taikhoan" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mật khẩu" name="matkhau" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
                                </label>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Đăng nhập</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</body>

</html>