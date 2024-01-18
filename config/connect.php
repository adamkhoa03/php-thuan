<?php

$conn = mysqli_connect("localhost", "root", "", "demo-php");
mysqli_query($conn, "SET NAMES 'utf8'");
$adminKey = 'admin';
/** Login
 *
 * @param $email
 * @param $password
 *
 * @return string|null
 */
function login($email, $password): ?string
{
    global $conn;
    global $studentKey;
    $error = null;
    $sql = "SELECT * FROM students WHERE email = '$email' && password = '$password'";
    $result = mysqli_fetch_array(mysqli_query($conn, $sql));

    if (mysqli_num_rows(mysqli_query($conn, $sql)) == 1) {
        setcookie('user_id', $result['id']);
    } else {
        $error = '<div class="alert alert-danger">Email hoặc mật khẩu không chính xác!</div>';
    }
    return $error;
}

/**
 * Check login
 *
 * @param $key
 * @return bool
 */
function checkLogin($key): bool
{
    return isset($_COOKIE[$key]);
}

/** Register new student
 *
 * @param $fullName
 * @param $email
 * @param $password
 *
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
				password,
                status
			)
			VALUES(
				'$fullName',
				'$email',
				'$password',
			     0
			)";
        mysqli_query($conn, $sql);
        $messenger = '<div class="alert alert-success" >Đăng ký thành công!</div>';
    }
    return $messenger;
}

/** Update student by email
 *
 * @param $email
 * @param $fullName
 * @param $dateOfBirth
 * @param $gender
 * @param $school
 * @param $cert
 * @param $avatar
 * @param $cv
 *
 * @return string
 */
function updateStudent($email, $fullName, $phone, $description, $address, $dateOfBirth, $gender, $school, $cert, $avatar, $cv): string
{
    global $conn;
    $user_id = $_COOKIE['user_id'];
    $sql = "UPDATE students SET
                    email = '$email',
                    full_name = '$fullName',
                    phone = '$phone',
                    description = '$description',
                    address = '$address',
                    birthday = '$dateOfBirth',
                    gender = '$gender',
                    school = '$school',
                    cert='$cert',
                    avatar='$avatar',
                    cv='$cv'
                    WHERE id = '$user_id'";
    try {
        mysqli_query($conn, $sql);
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
    return '<div class="alert alert-success" >Đăng ký thành công!</div>';
}

/**
 * Get list job apply
 *
 * @return bool|array|null
 */
function getListJob()
{
    global $conn;
    $sql = "SELECT * FROM job";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

/**
 * Handle apply job
 *
 * @param $jobID
 * @param $userId
 * @return mysqli_result|bool
 */
function applyJob($jobID, $userId): mysqli_result|bool
{
    global $conn;
    $sql = "UPDATE students SET
                    job = '$jobID'
                    WHERE id = '$userId'";
    return mysqli_query($conn, $sql);
}

/**
 * Get detail student by ID
 * @param $email
 * @return bool|array|null
 */
function getDetailStudent($email): bool|array|null
{
    global $conn;
    $sql = "SELECT st.id, st.full_name, st.birthday, st.gender, st.marriage, st.school,
            st.cert, st.avatar, st.cv, st.email, st.status, job.id jobID, job.title jobTitle
            FROM students st LEFT JOIN job ON st.job = job.id
            WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_array($result);
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * admin login.
 * If success: set cookie admin
 *
 * @param $email
 * @param $password
 * @return string|null
 */
function adminLogin($email, $password): ?string
{
    global $conn;
    global $adminKey;
    $error = null;
    $sql = "SELECT * FROM admins WHERE email = '$email' && password = '$password'";
    if (mysqli_num_rows(mysqli_query($conn, $sql)) == 1) {
        setcookie($adminKey, $email);
    } else {
        $error = '<div class="alert alert-danger">Email hoặc mật khẩu không chính xác!</div>';
    }
    return $error;
}

/**
 * Function verify account by admins
 *
 * @param $id
 *
 * @return string
 */
function verifyAccount($id): string
{
    global $conn;
    $sql = "UPDATE students SET
                    status = 1
                    WHERE id = '$id'";
    mysqli_query($conn, $sql);
    return '<div class="alert alert-success" >Xác thực tài khoản thành công!</div>';
}

/**
 * Get list students in system
 * @return array|false|null
 */
function getListStudents(): bool|array|null
{
    global $conn;
    $sql = "SELECT st.id, st.full_name, st.birthday, st.gender, st.marriage, st.school,
            st.cert, st.avatar, st.cv, st.email, st.status, job.id jobID, job.title jobTitle
            FROM students st LEFT JOIN job ON st.job = job.id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_array($result);
}

/**
 * Handle logout
 *
 * @param $key
 * @return bool
 */
function logout($key): bool
{
    return setcookie($key, null);
}

function getUserById($id): bool|array|null
{
    global $conn;
    $sql = "SELECT * FROM students Where id = $id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_array($result);
}