<?php
if (!isset($_SESSION['isLogin'])) {
    header('location: index.php?page=404');
    die;
}
include_once('./config/connect.php');
include_once('./modules/upload.php');

$userCheck = checkAccountRigister();

$user = getUserById($_SESSION['user_id']);


if (isset($_POST['sbm'])) {
    $hoten = $_POST['hoten'];
    $sodienthoai = $_POST['sodienthoai'];
    $thongtinthem = $_POST['thongtinthem'];
    $diachi = $_POST['diachi'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $chuyennganh = $_POST['chuyennganh'];

    // $certification = getFileUpload($_FILES['certification']);
    if ($_FILES['anhdaidien']['name'] != '') {
        $anhdaidien = getFileUpload($_FILES['anhdaidien']);
    } else {
        $anhdaidien = $user['anhdaidien'];
    }

    if ($_FILES['hoso']['name'] != '') {
        $hoso = getFileUpload($_FILES['hoso']);
    } else {
        $hoso = $user['hoso'];
    }

    if ($_FILES['chungchi']['name'] != '') {
        $chungchi = getFileUpload($_FILES['chungchi']);
    } else {
        $chungchi = $user['chungchi'];
    }
    // $hoso = getFileUpload($_FILES['hoso']);
    $messenger = updateStudent($hoten, $sodienthoai, $thongtinthem, $diachi, $ngaysinh, $gioitinh, $chuyennganh, $chungchi, $anhdaidien, $hoso);
    $user = getUserById( $_SESSION['user_id']);
    $messenger = '<div class="alert alert-success" >Cập nhật thông tin thành công!</div>';
}

?>
<!-- breadcrumb Wrapper Start -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="banner-title">
            <h2>Thông tin tài khoản</h2>
            <div class="line"> <span></span></div>
        </div>
        <ul class="inner-breadcrumb">
            <li><a href="index.html">Trang chủ</a></li>
            <li>Tài khoản</li>
            <li>Thông tin tài khoản</li>
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
                            <input class="form-control" placeholder="Tên" required="" type="text" name="hoten" value="<?php echo $user['hoten'] ?>">
                            <input class="form-control" placeholder="Ngày Sinh" required="" type="date" name="ngaysinh" value="<?php echo $user['ngaysinh'] ?>">
                            <input class="form-control" placeholder="Số điện thoại" required="" type="text" name="sodienthoai" value="<?php echo $user['sodienthoai'] ?>">
                            <input class="form-control" placeholder="Địa chỉ" required="" type="text" name="diachi" value="<?php echo $user['diachi'] ?>">
                            <input class="form-control" placeholder="Trường Học" required="" type="text" name="chuyennganh" value="<?php echo $user['chuyennganh'] ?>">
                            <input class="form-control" placeholder="Giới tính" required="" type="text" name="gioitinh" value="<?php echo $user['gioitinh'] ?>">
                        </div>
                        <div class="col-sm-6">
                            <span class="btn btn-file form-control">Ảnh đại diện
                                <input type="file" accept="image/*" onchange="previewImage(this)" name="anhdaidien">

                            </span>
                            <?php
                            if ($user['anhdaidien'] != null) {
                                echo '<img id="imagePreview" src="./student/uploads/' . $user['anhdaidien'] . '" alt="Ảnh xem trước" style="max-width: 300px; max-height: 300px;">';
                            } else {
                                echo '<img id="imagePreview" src="./images/testimonials1.png" alt="Ảnh xem trước" style="max-width: 300px; max-height: 300px;">';
                            }
                            ?>

                            <span class="btn btn-file form-control">Chứng Chỉ (Ảnh hoặc PDF):
                                <input type="file" accept=".pdf" name="chungchi" value="<?php echo $user['chungchi'] ?>">
                            </span>
                            <span class="btn btn-file form-control">CV (PDF)::
                                <input type="file" name="hoso" accept=".pdf">
                            </span>
                            <textarea class="form-control" id="comment" placeholder="Thêm về bạn..." name="thongtinthem"><?php echo $user['thongtinthem'] ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn-one" name="sbm">Cập nhật thông tin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Inner page Wrapper End -->
<script>
    function previewImage(input) {
        var file = input.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }
</script>