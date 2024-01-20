<?php
include_once('./config/connect.php');
$sql = "SELECT * FROM job";
$query = mysqli_query($conn, $sql);
?>
<!-- breadcrumb Wrapper Start -->
<div class="breadcrumb-wrapper">
    <div class="container">
        <div class="banner-title">
            <h2>Danh sách công việc</h2>
            <div class="line"> <span></span></div>
        </div>
        <ul class="inner-breadcrumb">
            <li><a href="index.html">Trang chủ</a></li>
            <li>Công việc</li>
            <li>Danh sách công việc hiện tại</li>
        </ul>
    </div>
</div>
<!-- breadcrumb Wrapper End -->
<!-- Inner page Wrapper Start -->
<div class="inner-page-wrapper latest-jobs-wrapper">
    <div class="container">
        <?php
        while ($job = mysqli_fetch_array($query)) { ?>
            <div class="single-jobs"> <i class="fa fa-users"></i>
                <div class="job-heading">
                    <h3><?php echo $job['title']; ?></h3>
                    <p><?php echo $job['subtitle']; ?></p>
                </div>
                <div class="our-location color1"> <span class="fa fa-calendar" aria-hidden="true"></span>
                    <div class="location-content">
                        <h3><?php echo $job['date']; ?></h3>
                        <a href="/php-thuan/index.php?page=apply&cv=<?php echo $job['id']; ?>&job=<?php echo $job['title']; ?>">Ứng tuyển ngay</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>