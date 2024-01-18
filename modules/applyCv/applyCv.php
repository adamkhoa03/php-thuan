<?php
if (!isset($_SESSION['isLogin'])) {
    header('location: index.php?page=404');
    die;
}
include_once('./config/connect.php');
include_once('./modules/upload.php');

$user = getUserById($_COOKIE['user_id']);

if (isset($_POST['sbm'])) {
    if ($user['status'] == 1) {
        // apply jbo
        applyJob($_GET['cv'], $_COOKIE['user_id']);
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
            <h2>Ứng tuyển vị trí</h2>
            <div class="line"> <span></span></div>
        </div>
        <ul class="inner-breadcrumb">
            <li><a href="index.html">Trang chủ</a></li>
            <li>Ứng tuyển</li>
            <li>Ứng tuyển vị trí</li>
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
                            <input class="form-control" placeholder="Tên" required="" type="text" name="name" value="<?php echo $user['full_name'] ?>" disabled>
                            <input class="form-control" placeholder="Ngày Sinh" required="" type="date" name="dob" value="<?php echo $user['birthday'] ?>" disabled>
                            <input class="form-control" placeholder="Số điện thoại" required="" type="text" name="phone" value="<?php echo $user['phone'] ?>" disabled>
                            <input class="form-control" placeholder="Email" required="" type="email" name="email" value="<?php echo $user['email'] ?>" disabled>
                            <input class="form-control" placeholder="Địa chỉ" required="" type="text" name="address" value="<?php echo $user['address'] ?>" disabled>
                            <input class="form-control" placeholder="Trường Học" required="" type="text" name="school" value="<?php echo $user['school'] ?>" disabled>
                            <input class="form-control" placeholder="Giới tính" required="" type="text" name="gender" value="<?php echo $user['gender'] ?>" disabled>
                        </div>
                        <div class="col-sm-6">
                            <span class="btn btn-file form-control">Ảnh đại diện</span>
                            <?php
                            if ($user['avatar'] != null) {
                                echo '<img id="imagePreview" src="./student/uploads/' . $user['avatar'] . '" alt="Ảnh xem trước" style="max-width: 300px; max-height: 300px;">';
                            } else {
                                echo '<img id="imagePreview" src="./images/testimonials1.png" alt="Ảnh xem trước" style="max-width: 300px; max-height: 300px;">';
                            }
                            ?>
                            <textarea class="form-control" id="comment" placeholder="Thêm về bạn..." name="description" disabled><?php echo $user['description'] ?></textarea>
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