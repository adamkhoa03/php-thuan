<?php
if ($_SESSION['isLogin'] != true) {
    header('location: index.php?page=404');
    die;
}
include_once('./config/connect.php');
include_once('./modules/upload.php');

$user = getUserById( $_SESSION['user_id']);

if (isset($_POST['sbm'])) {
    if ($user['trangthai'] == 1) {
        // apply jbo
        applyJob($_GET['cv'],  $_SESSION['user_id']);
        $messenger = '<div class="alert alert-success" >Ứng tuyển thành công!</div>';
    } else{
        $messenger = '<div class="alert alert-danger" >Ứng tuyển không thành công!. Hồ sơ của bạn đang được chờ phê duyệt</div>';
    }
    
}
?>
<!-- breadcrumb Wrapper Start -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="banner-title">
            <h2>Ứng tuyển</h2>
            <div class="line"> <span></span></div>
        </div>
        <ul class="inner-breadcrumb">
            <li><a href="index.html">Trang chủ</a></li>
            <li>Ứng tuyển</li>
            <li>Ứng tuyển vị trí <?php echo $_GET['job']?></li>
        </ul>
    </div>
</div>
<!-- breadcrumb Wrapper End -->
<!-- Inner page Wrapper Start -->
<div class="inner-page-wrapper apply-jobs-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-xs-offset-0">
                <?php if (isset($messenger)) {
                    echo $messenger;
                } ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6">
                            <input class="form-control" placeholder="Tên" required="" type="text" name="name" value="<?php echo $user['hoten'] ?>" disabled>
                            <input class="form-control" placeholder="Ngày Sinh" required="" type="date" name="dob" value="<?php echo $user['ngaysinh'] ?>" disabled>
                            <input class="form-control" placeholder="Số điện thoại" required="" type="text" name="phone" value="<?php echo $user['sodienthoai'] ?>" disabled>
                            <input class="form-control" placeholder="Địa chỉ" required="" type="text" name="address" value="<?php echo $user['diachi'] ?>" disabled>
                            <input class="form-control" placeholder="Trường Học" required="" type="text" name="school" value="<?php echo $user['chuyennganh'] ?>" disabled>
                            <input class="form-control" placeholder="Giới tính" required="" type="text" name="gender" value="<?php echo $user['gioitinh'] ?>" disabled>
                        </div>
                        <div class="col-sm-6">
                            <span class="btn btn-file form-control">Ảnh đại diện</span>
                            <?php
                            if ($user['anhdaidien'] != null) {
                                echo '<img id="imagePreview" src="./student/uploads/' . $user['anhdaidien'] . '" alt="Ảnh xem trước" style="max-width: 300px; max-height: 300px;">';
                            } else {
                                echo '<img id="imagePreview" src="./images/testimonials1.png" alt="Ảnh xem trước" style="max-width: 300px; max-height: 300px;">';
                            }
                            ?>
                            <textarea class="form-control" id="comment" placeholder="Thêm về bạn..." name="description" disabled><?php echo $user['thongtinthem'] ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn-one" name="sbm">Ứng tuyển ngay</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Inner page Wrapper End -->