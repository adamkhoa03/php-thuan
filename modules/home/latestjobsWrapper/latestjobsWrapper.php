<?php
include_once('./config/connect.php');
$sql = "SELECT * FROM job";
$query = mysqli_query($conn, $sql);
?>
<!-- Latest jobs Wrapper Start -->
<div class="latest-jobs-wrapper">
    <div class="container">
        <div class="title">
            <h2>Việc làm<span> mới nhất</span></h2>
            <h3>Ở đây bạn có thể thấy</h3>
        </div>
    </div>
    <div class="container" style="text-align: center;">
        <?php
        while ($job = mysqli_fetch_array($query)) { ?>
            <div class="single-jobs"> <i class="fa fa-twitter"></i>
                <div class="job-heading">
                    <a href="<?php if (isset($_SESSION['user_id'])) {
                                    echo '/php-thuan/index.php?page=apply&cv=' . $job['id'];
                                } else {
                                    echo '/php-thuan/index.php?page=login';
                                } ?>">
                        <h3 style="
    text-align: justify;
"><?php echo $job['title']; ?></h3>
                    </a>

                    <p style="
    text-align: justify;
"><?php echo $job['subtitle']; ?></p>
                </div>
                <div class="our-location color1"> <span class="fa fa-map-marker" aria-hidden="true"></span>
                    <div class="location-content">
                        <h3><?php echo $job['address']; ?></h3>
                        <span><?php echo $job['location']; ?></span>
                        <span style="background: yellowgreen;"><?php echo $job['level']; ?></span>
                    </div>
                </div>
            </div>
        <?php } ?>
        <a href="/php-thuan/index.php?page=listjob" class="btn-one">Xem thêm</a>
    </div>
</div>
<!-- Latest jobs Wrapper End -->