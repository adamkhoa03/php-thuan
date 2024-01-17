<?php
ob_start();
session_start();
include_once('./config/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Recruite Pro</title>
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="assets/animate/animate.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="assets/owl-carousel/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/owl-carousel/css/owl.theme.css" rel="stylesheet">
    <!-- magnific Css -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Loader -->
    <div id="dvLoading" style="display: none;"></div>
    <!-- Header Start -->
    <?php
    include_once('modules/header/header.php')
    ?>
    <!-- Header End -->
    <?php
    //master page
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'login':
                include_once('modules/login/login.php');
                break;
            case 'logout':
                include_once('modules/login/logout.php');
                break;
            case 'users':
                include_once('modules/users/users.php');
                break;
        }
    } else {
        include_once('modules/home/bannerWrapper/bannerWrapper.php');
        include_once('modules/home/professionalSearch/professionalSearch.php');
        include_once('modules/home/calloutWrapper/calloutWrapper.php');
        include_once('modules/home/ourCounters/ourCounters.php');
        include_once('modules/home/latestjobsWrapper/latestjobsWrapper.php');
        include_once('modules/home/videoWrapper/videoWrapper.php');
        include_once('modules/home/popularSearchWrapper/popularSearchWrapper.php');
        include_once('modules/home/testimonialsWrapper/testimonialsWrapper.php');
        include_once('modules/home/appWrapper/appWrapper.php');
        include_once('modules/home/subscribeWrapper/subscribeWrapper.php');
        include_once('modules/home/blogWrapper/blogWrapper.php');
    }
    ?>
    <!-- Footer styles Start -->
    <?php
    include_once('modules/footer/footer.php')
    ?>
    <!-- Footer styles End -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/jquery/jquery-3.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/jquery/plugins.js"></script>
    <script src="assets/jquery/jquery.animateNumber.min.js"></script>
    <script src="assets/jquery/jquery.magnific-popup.min.js"></script>
    <script src="assets/owl-carousel/js/owl.carousel.js"></script>
    <script src="assets/wow/wow.min.js"></script>
    <script src="js/custom.js"></script><a id="scrollUp" href="#top"
        style="position: fixed; z-index: 2147483647; display: none;"><i class="fa fa-angle-up"></i></a>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-83282272-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments)
    };
    gtag('js', new Date());

    gtag('config', 'UA-83282272-3');
    </script>

</body>

</html>