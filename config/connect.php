<?php

$conn = mysqli_connect("localhost", "root", "", "ketnoi");
mysqli_query($conn, "SET NAMES 'utf8'");
$adminKey = 'admin';
/** Login
 *
 * @param $email
 * @param $password
 *
 * @return string|null
 */
function login($taikhoan, $matkhau): ?string
{
    global $conn;
    $error = null;
    $sql = "SELECT * FROM taikhoan WHERE taikhoan = '$taikhoan' && matkhau = '$matkhau'";
    $result = mysqli_fetch_array(mysqli_query($conn, $sql));

    if (mysqli_num_rows(mysqli_query($conn, $sql)) == 1) {
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['isLogin'] = true;
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


function checkAccountRigister() {
    global $conn;
    $uid = $_SESSION['user_id'];
    $sql = "SELECT * FROM thongtinrieng WHERE id = '$uid'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) < 1) {
        $addInformationAccount = "INSERT INTO thongtinrieng(
            id
        	)
        	VALUES(
        	    '$uid'
        	)";
        mysqli_query($conn, $addInformationAccount);
    }
}

/** Register new taikhoan
 *
 * @param $taikhoan
 * @param $matkhau
 * @param $trangthai
 *
 * @return string
 */
function register($taikhoan, $matkhau): string
{
    global $conn;
    $messenger = null;
    $sql = "SELECT * FROM taikhoan WHERE taikhoan = '$taikhoan'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) >= 1) {
        $messenger = '<div class="alert alert-danger" >Tài khoản đã tồn tại!</div>';
    } else {
        $sql = "INSERT INTO taikhoan(
				taikhoan,
				matkhau,
                trangthai
			)
			VALUES(
				'$taikhoan',
				'$matkhau',
			     0
			)";
        mysqli_query($conn, $sql);

        // $uid = $_SESSION['user_id'];
        // $addInformationAccount = "INSERT INTO idnguoidungtuyen(
        //     idnguoidungtuyen
		// 	)
		// 	VALUES(
		// 	    '$uid'
		// 	)";
        // mysqli_query($conn, $addInformationAccount);
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
function updateStudent($hoten, $sodienthoai, $thongtinthem, $diachi, $ngaysinh, $gioitinh, $chuyennganh, $chungchi, $anhdaidien, $hoso): string
{
    global $conn;
    $user_id = $_SESSION['user_id'];
    $sql = "UPDATE thongtinrieng SET
                    hoten = '$hoten',
                    sodienthoai = '$sodienthoai',
                    thongtinthem = '$thongtinthem',
                    diachi = '$diachi',
                    ngaysinh = '$ngaysinh',
                    gioitinh = '$gioitinh',
                    chuyennganh = '$chuyennganh',
                    chungchi='$chungchi',
                    anhdaidien='$anhdaidien',
                    hoso='$hoso'
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
    $sql = "UPDATE thongtinrieng SET
                    congviecdaungtuyen = '$jobID'
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
    $sql = "SELECT * FROM admin WHERE taikhoan = '$email' && matkhau = '$password'";
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
    $sql = "SELECT * FROM thongtinrieng Where id = $id";
    $result = mysqli_query($conn, $sql);
    $resultSql =  mysqli_fetch_array($result);
    $result2 = $resultSql['id'];

    $sql = "UPDATE thongtinrieng SET
                    trangthai = 1
                    WHERE id = '$result2'";
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
    $sql = "SELECT * FROM thongtinrieng Where id = $id";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_array($result);
}