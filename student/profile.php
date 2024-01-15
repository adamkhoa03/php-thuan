<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form nhập thông tin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div>
    <h3>Sinh viên điền thông tin cá nhân</h3>
    <?php if (isset($messenger)) {
        echo $messenger;
    } ?>
</div>
<div>
    <form method="post" enctype="multipart/form-data">
        <label for="name">Tên:</label>
        <input class="form-control" type="text" id="name" name="name" required>

        <label for="address">Địa chỉ:</label>
        <input class="form-control" type="text" id="address" name="address" required>
        <label for="dob">Ngày Sinh:</label>
        <input class="form-control" type="date" id="dob" name="dob" required><br>

        <label>Giới Tính:</label>
        <div class="d-flex">
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Nam</label>

            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Nữ</label>
        </div>

        <label>Tình Trạng Hôn Nhân:</label>
        <select class="form-control" id="marital-status" name="marital" required>
            <option value="1">Độc thân</option>
            <option value="2">Đã kết hôn</option>
            <option value="3">Ly thân</option>
        </select><br>

        <label for="school">Trường Học:</label>
        <input class="form-control" type="text" id="school" name="school" required><br>

        <label for="certification">Chứng Chỉ (Ảnh hoặc PDF):</label>
        <input class="form-control" type="file" id="certification" name="certification" accept=".jpg, .jpeg, .png, .pdf" ><br>

        <label for="avatar">Ảnh Đại Diện:</label>
        <input class="form-control" type="file" id="avatar" name="avatar" accept=".jpg, .jpeg, .png" ><br>

        <label for="cv">CV (PDF):</label>
        <input class="form-control" type="file" id="cv" name="cv" accept=".pdf" ><br>

        <button type="submit" name="sbm">Gửi</button>
    </form>
</div>
</body>
</html>

<?php
include_once('../config/connect.php');

if (isset($_POST['sbm'])) {
    $email = $_COOKIE['email'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $birthDay = $_POST['dob'];
    $gender = $_POST['gender'];
    $marital = $_POST['marital'];
    $school = $_POST['school'];
    $certification = null;
    $avatar = null;
    $cv = null;
    $messenger = updateStudent($email, $name, $birthDay, $gender, $marital, $school, $certification, $avatar, $cv);
}
