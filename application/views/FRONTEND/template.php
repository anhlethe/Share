<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <title><?= modules::run('life/getSetting', 'home-title') ?></title>
    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="<?= modules::run('life/getSetting', 'meta-description') ?>"/>
    <meta name="author" content=""/>
    <!--    <link rel="shortcut icon" href="favicon.ico"/>-->
    <!-- Global CSS -->
    <link rel="stylesheet" href="<?= STATIC_PATH_URL ?>assets/plugins/bootstrap/css/bootstrap.min.css"/>
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?= STATIC_PATH_URL ?>assets/plugins/font-awesome/css/font-awesome.css"/>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= STATIC_PATH_URL ?>assets/css/styles.css"/>


    <script type="text/javascript" src="<?= STATIC_PATH_URL ?>assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?= STATIC_PATH_URL ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.js"></script>
    <script src="http://malsup.github.com/jquery.cycle2.carousel.js"></script>
    <script type="text/javascript">
        csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
        function setActive(Menuclass) {
            $(".navbar-nav a").removeClass('active');
            $("." + Menuclass).addClass('active');
        }

    </script>
</head>
<body>
<header id="top" class="header">
    <div class="container">
        <div class="header-top">
            <h1 class="logo pull-left">
                <a class="" href="<?php site_url(); ?>">
                    <img id="logo-image" class="logo-image" src="<?= STATIC_PATH_URL ?>assets/images/logo.png"
                         alt="Logo"/>
                </a>
            </h1><!--//logo-->
            <div class="web-address pull-right text-right">
                <div class="text-right"><?= modules::run('life/getSetting', 'address') ?><i
                        class="fa fa-map-marker"></i></div>
                <div><?= modules::run('life/getSetting', 'phone') ?><i class="fa fa-phone"></i></div>
                <div><?= modules::run('life/getSetting', 'email') ?><i class="fa fa-envelope"></i></div>
            </div>

        </div>
        <div class="header-menu">
            <div class="language pull-right">
                <a href="javascript:;">VN</a>
                <a href="javascript:;">EN</a>
            </div>
            <nav id="main-nav" class="main-nav " role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--//nav-toggle-->
                </div>
                <!--//navbar-header-->
                <div class="navbar-collapse collapse text-center" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item aboutus"><a class="" href="<?php base_url() ?>/about-us.html">About
                                us</a></li>
                        <li class="nav-item programmes"><a class="" href="<?php base_url() ?>/programmes.html">Programmes</a>
                        </li>
                        <li class="nav-item curriculum"><a class="" href="<?php base_url() ?>/curriculum.html">Curriculum</a>
                        </li>
                        <li class="nav-item enrol"><a class="" href="<?php base_url() ?>/enrollwithus.html">Enrol with Us</a></li>
                        <li class="nav-item newsevent"><a class="" href="<?php base_url() ?>/news-events.html">News &
                                Events</a>
                        </li>
                        <li class="nav-item last contactus"><a class="" href="<?php base_url() ?>/contact-us.html">Contact
                                Us </a>
                        </li>
                    </ul>
                    <!--//nav-->
                </div>
                <!--//navabr-collapse-->
            </nav>
            <!--//main-nav-->
        </div>
    </div>
</header>
<div class="main-content container">
    <?= $content ?>
</div>
<!--<div class="footer-bkg"></div>-->
<footer>
    <div class="footer-copyright text-center">Copyright &copy; 2015 - <span class="hightline">MARVELHOUSE</span>
        INTERNATIONAL PRESCHOOL - All Right Reserved | Designed by <span class="hightline">VNETWORK</span></div>
</footer>
</body>
</html>