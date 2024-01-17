    <header class="wow fadeInDown affix-top" data-offset-top="197" data-spy="affix" style="visibility: visible;">
        <div class="logo-wrapper">
            <!-- Logo -->
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-sm-12 col-md-3 hidden-xs"> <a href="index.html"><img src="images/logo.png" alt="Recruite Pro"></a> </div>
                    <!-- Navigation -->
                    <div class="col-sm-12 col-md-9">
                        <nav class="navbar navbar-default pull-right">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="Recruite Pro"></a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="index.html">Home</a></li>
                                    <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                            <li><a href="coming-soon.html">Coming Soon</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="services.html">Services</a></li>
                                    <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Current Jobs </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="current-jobs.html">Current Jobs</a></li>
                                            <li><a href="apply-job.html">Apply Job</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                            <div class="user"><a href="/php-thuan/index.php?page=users"><img src="images/user-icon.png" alt=""></a></div>
                            <?php
                            if (isset($_COOKIE['user_id'])) {
                                echo '<div class="login pull-right hidden-xs"> <a href="/php-thuan/index.php?page=logout">Đăng xuất</a></div>';
                            } else {
                                echo '<div class="login pull-right hidden-xs"> <a href="/php-thuan/index.php?page=login">Đăng nhập</a></div>';
                            }
                            ?>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>