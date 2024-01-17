<?php
include_once('./config/connect.php');
// session_start();
if (isset($_POST['sbm'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $messenger = register($fullName, $email, $password);
}
if (isset($_POST['sbm_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = login($email, $password);

    if (!$error) {
        $_SESSION['isLogin'] = true;
        header('location: index.php');
        
    }
}
?>

<!-- breadcrumb Wrapper Start -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="banner-title">
            <h2>Đăng kí / Đăng nhập</h2>
            <div class="line"> <span></span></div>
        </div>
        <ul class="inner-breadcrumb">
            <li><a href="index.html">Trang chủ</a></li>
            <li>Đăng kí / Đăng nhập</li>
        </ul>
    </div>
</div>
<!-- breadcrumb Wrapper End -->
<!-- Inner page Wrapper Start -->
<div class="inner-page-wrapper registration-wrapper">
    <div class="container">
        <?php if (isset($messenger)) {
            echo $messenger;
        } ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="login-container">
                    <div class="loginbox">
                        <div class="loginbox-title">Đăng nhập bằng tài khoản xã hội</div>
                        <ul class="social-network social-circle onwhite">
                            <li><a href="javascript:void(0)" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="javascript:void(0)" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="javascript:void(0)" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="javascript:void(0)" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <div class="loginbox-or">
                            <div class="or-line"></div>
                            <div class="or">hoặc</div>
                        </div>

                        <form method="post">
                            <div class="form-group">
                                <label>Email: <span class="required">*</span></label>
                                <input placeholder="" class="form-control" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password: <span class="required">*</span></label>
                                <input placeholder="" class="form-control" type="password" name="password">
                            </div>
                            <div class="loginbox-forgot"> <a href="">Quên mật khẩu?</a> </div>
                            <div class="loginbox-submit">
                                <button class="btn btn-default btn-block" name="sbm_login">Đăng nhập</button>
                            </div>
                            <div class="loginbox-signup"> <a href="javascript:void(0)">Đăng ký với email</a> </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="login-container">
                    <div class="loginbox">
                        <form method="post">
                            <div class="form-group">
                                <label>Tên tài khoản: <span class="required">*</span></label>
                                <input placeholder="" class="form-control" type="text" name="fullName">
                            </div>
                            <div class="form-group">
                                <label>Email: <span class="required">*</span></label>
                                <input placeholder="" class="form-control" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu: <span class="required">*</span></label>
                                <input placeholder="" class="form-control" type="password" name="password">
                            </div>
                            <div class="loginbox-forgot">
                                <input type="checkbox" checked>
                                Tôi chấp nhận <a href="">Thời hạn và điều kiện?</a>
                            </div>
                            <div class="loginbox-submit">
                                <button class="btn btn-default btn-block" name="sbm" type="submit">Đăng kí</button>
                            </div>
                            <div class="loginbox-signup"> Đã có tài khoản <a href="javascript:void(0)">Đăng nhập</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner page Wrapper End -->