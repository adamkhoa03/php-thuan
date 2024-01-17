<?php
if (!isset($_COOKIE['user_id'])) {
    echo 'Bạn chưa đăng nhập';
    die;
}
include_once('./config/connect.php');
include_once('./modules/upload.php');

$user = getUserById($_COOKIE['user_id']);

if (isset($_POST['sbm'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $birthDay = $_POST['dob'];
    $gender = $_POST['gender'];
    $school = $_POST['school'];
    
    // $certification = getFileUpload($_FILES['certification']);
    if ($_FILES['avatar']['name'] != '') {
        $avatar = getFileUpload($_FILES['avatar']);
    } else {
        $avatar = $user['avatar'];
    }

    if ($_FILES['cv']['name'] != '') {
        $cv = getFileUpload($_FILES['cv']);
    } else {
        $cv = $user['cv'];
    }

    if ($_FILES['certification']['name'] != '') {
        $certification = getFileUpload($_FILES['certification']);
    } else {
        $certification = $user['cert'];
    }
    // $cv = getFileUpload($_FILES['cv']);
    $messenger = updateStudent($email, $name, $phone, $description, $address, $birthDay, $gender, $school, $certification, $avatar, $cv);
    $user = getUserById($_COOKIE['user_id']);
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
                            <input class="form-control" placeholder="Tên" required="" type="text" name="name" value="<?php echo $user['full_name'] ?>">
                            <input class="form-control" placeholder="Ngày Sinh" required="" type="date" name="dob" value="<?php echo $user['birthday'] ?>">
                            <input class="form-control" placeholder="Số điện thoại" required="" type="text" name="phone" value="<?php echo $user['phone'] ?>">
                            <input class="form-control" placeholder="Email" required="" type="email" name="email" value="<?php echo $user['email'] ?>">
                            <input class="form-control" placeholder="Địa chỉ" required="" type="text" name="address" value="<?php echo $user['address'] ?>">
                            <input class="form-control" placeholder="Trường Học" required="" type="text" name="school" value="<?php echo $user['school'] ?>">
                            <input class="form-control" placeholder="Giới tính" required="" type="text" name="gender" value="<?php echo $user['gender'] ?>">
                        </div>
                        <div class="col-sm-6">
                            <span class="btn btn-file form-control">Ảnh đại diện
                                <input type="file" accept="image/*" onchange="previewImage(this)" name="avatar">

                            </span>
                            <?php
                            if ($user['avatar'] != null) {
                                echo '<img id="imagePreview" src="./student/uploads/' . $user['avatar'] . '" alt="Ảnh xem trước" style="max-width: 300px; max-height: 300px;">';
                            } else {
                                echo '<img id="imagePreview" src="./images/testimonials1.png" alt="Ảnh xem trước" style="max-width: 300px; max-height: 300px;">';
                            }
                            ?>

                            <span class="btn btn-file form-control">Chứng Chỉ (Ảnh hoặc PDF):
                                <input type="file" accept=".jpg, .jpeg, .png, .pdf" name="certification" value="<?php echo $user['cert'] ?>">
                            </span>
                            <span class="btn btn-file form-control">CV (PDF)::
                                <input type="file" name="cv" accept=".pdf">
                            </span>
                            <textarea class="form-control" id="comment" placeholder="Thêm về bạn..." name="description"><?php echo $user['description'] ?></textarea>
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