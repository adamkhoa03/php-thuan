<?php
$conn = mysqli_connect("localhost", "root", "", "demo-php");
mysqli_query($conn, "SET NAMES 'utf8'");
/** Login
 * @param $email
 * @param $password
 * @return string|null
 */
function login($email, $password): ?string
{
    global $conn;
    $error = null;
    $sql = "SELECT * FROM students WHERE email = '$email' && password = '$password'";
    if (mysqli_num_rows(mysqli_query($conn, $sql)) == 1) {
        setcookie('email', $email);
    } else {
        $error = '<div class="alert alert-danger">Email hoặc mật khẩu không chính xác!</div>';
    }
    return $error;
}

/** Register new student
 * @param $fullName
 * @param $email
 * @param $password
 * @return string
 */
function register($fullName, $email, $password): string
{
    global $conn;
    $messenger = null;
    $_SESSION['student']['mail'] = $email;
    $sql = "SELECT * FROM students WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) >= 1) {
        $messenger = '<div class="alert alert-danger" >Email đã tồn tại!</div>';
    } else {
        $sql = "INSERT INTO students(
				full_name,
				email,
				password
			)
			VALUES(
				'$fullName',
				'$email',
				'$password'
			)";
        mysqli_query($conn, $sql);
        $messenger = '<div class="alert alert-success" >Đăng ký thành công!</div>';
    }
    return $messenger;
}

/** Update student by email
 * @param $email
 * @param $fullName
 * @param $dateOfBirth
 * @param $gender
 * @param $marriage
 * @param $school
 * @param $cert
 * @param $avatar
 * @param $cv
 * @return string
 */
function updateStudent($email, $fullName, $dateOfBirth, $gender, $marriage, $school, $cert, $avatar, $cv): string
{
    global $conn;
    $sql = "UPDATE students SET
                    full_name = '$fullName',
                    birthday = '$dateOfBirth',
                    gender = '$gender',
                    marriage = '$marriage',
                    school = '$school',
                    cert='$cert',
                    avatar='$avatar',
                    cv='$cv'
                    WHERE email = '$email'";
    mysqli_query($conn, $sql);
    return '<div class="alert alert-success" >Đăng ký thành công!</div>';
}