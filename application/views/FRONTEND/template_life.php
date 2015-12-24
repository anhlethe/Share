<!DOCTYPE HTML>
<html lang="vn" dir="ltr">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
          name="viewport">
    <title><?= modules::run('life/getSetting', 'home-title') ?></title>
    <meta name="description" content="<?= modules::run('life/getSetting', 'meta-description') ?>">
    <meta name="keywords" content="<?= modules::run('life/getSetting', 'meta-keyword') ?>">
    <meta name="robots" content="index,follow">
    <link href="<?= STATIC_PATH_URL ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all">
    <!--[if IE]>
    <script src="<?= STATIC_PATH_URL ?>assets/js/html5.js"></script>
    <script src="<?= STATIC_PATH_URL ?>assets/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        csrf = '<?php echo $this->security->get_csrf_hash(); ?>';
        function setActive(Menuclass) {
            $(".navbar-nav li").removeClass('active');
            $("." + Menuclass).addClass('active');
        }

    </script>
</head>

<body>
<div id="toppage" class="hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="address">
                    <li>A:  <?= modules::run('life/getSetting', 'address') ?></li>
                    <li>T:  <?= modules::run('life/getSetting', 'phone') ?></li>
                    <li>E:  <?= modules::run('life/getSetting', 'email') ?></li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="social pull-right">
                    <li><a href="<?= modules::run('life/getSetting', 'facebook') ?>"><img
                                src="<?= STATIC_PATH_URL ?>assets/images/ico_face.png" alt="ico face"/></a>
                    </li>
                    <li><a href="<?= modules::run('life/getSetting', 'twritter') ?>"><img
                                src="<?= STATIC_PATH_URL ?>assets/images/ico_twitter.png" alt="ico face"/></a>
                    </li>
                    <li><a href="<?= modules::run('life/getSetting', 'googleplus') ?>"><img
                                src="<?= STATIC_PATH_URL ?>assets/images/ico_plus.png" alt="ico face"/></a>
                    </li>
                </ul>
            </div>
            <!-- .row --></div>
        <!-- .container --></div>
    <!-- #toppage --></div>

<div id="head">
    <div class="container">
        <div id="identity" class="pull-left">
            <p class="logo"><a href="<? echo base_url(); ?>"><img class="img-responsive"
                                                                  src="<?= STATIC_PATH_URL ?>assets/images/logo_dtp.png"
                                                                  alt="logo dtp"/></a></p>
            <!-- #identity --></div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="index"><a href="<?= base_url() ?>">TRANG CHỦ</a></li>
                        <li class="aboutus"><a href="<?= base_url('gioi-thieu/ve-chung-toi.html') ?>">GIỚI THIỆU</a>
                        </li>
                        <li class="dropdown dich-vu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">DỊCH VỤ</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= base_url('dich-vu/quy-trinh-thiet-ke.html') ?>">Quy trình thiết kế</a>
                                </li>
                                <li><a href="<?= base_url('dich-vu/don-gia-thiet-ke.html') ?>">Đơn giá thiết kế</a></li>
                                <li><a href="<?= base_url('dich-vu/hop-dong-thiet-ke.html') ?>">Hợp đồng thiết kế</a>
                                </li>
                            </ul>
                        </li>
                        <li class="gallery"><a href="<?= base_url('cong-trinh.html') ?>">HÌNH ẢNH CÔNG TRÌNH</a></li>
                    </ul>

                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- .container --></div>
    <!-- #head --></div>
<?= modules::run('slider/' . $this->router->fetch_method()) ?>
<div id="main-content">
    <?= $content ?>
    <!-- .main-content --></div>

<footer id="footer">
    <div class="info-f">
        <div class="container">
            <div class="col-md-3 pic-f">
                <img class="img-responsive" src="<?= STATIC_PATH_URL ?>assets/images/logo-white.png"
                     alt="Duy Thành Phát">

                <p>Mollis semper lobortis vitae phasellus tu rpis commodo libero vamus sed dolor do nec turpis.</p>
                <!-- .col-lg-3 --></div>
            <div class="col-md-3">
                <h4 class="title-f">VỀ CHÚNG TÔI</h4>
                <ul class="list-initial">
                    <li><a href="<?= site_url('/dich-vu/quy-trinh-thiet-ke.html') ?>">Dịch vụ</a></li>
                    <li><a href="<?= site_url('/cong-trinh.html') ?>">Hình ảnh công trình</a></li>
                    <li><a href="<?= site_url('/dich-vu/quy-trinh-lam-viec.html') ?>">Quy trình làm việc</a></li>
                </ul>
                <!-- .col-lg-3 --></div>
            <div class="col-md-3">
                <h4 class="title-f">LIÊN HỆ</h4>
                <ul class="list-about">
                    <li class="content-about"><?= modules::run('life/getSetting', 'address') ?></li>
                    <li class="content-about"> <?= modules::run('life/getSetting', 'phone') ?></li>
                    <li class="content-about"><?= modules::run('life/getSetting', 'email') ?></li>
                </ul>
                <!-- .col-lg-3 --></div>
            <div class="col-md-3">
                <h4 class="title-f">THỜI GIAN LÀM VIỆC</h4>

                <p>Our support available to help you 24 hours a day, seven days a week.</p>
                <ul class="list-initial">
                    <li>Monday-Friday: 9am to 5pm</li>
                    <li>Saturday: 10am to 2pm</li>
                    <li>Sunday: Closed</li>
                </ul>
                <!-- .col-lg-3 --></div>
            <!-- .container --></div>
    </div>
    <p id="coppy-right" class="text-center">Copyright &copy; 2015 - <strong class="red">DUYTHANHPHAT</strong> - All
        Right Reserved | Designed by <strong class="red">VNETWORK</strong></p>
</footer>

</body>
<script src="<?= STATIC_PATH_URL ?>assets/js/jquery.js"></script>
<script src="<?= STATIC_PATH_URL ?>assets/js/swiper.min.js"></script>
<script src="<?= STATIC_PATH_URL ?>assets/js/bootstrap/bootstrap.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 5,
        slidesPerColumn: 2,
        spaceBetween: 15
    });
</script>
<script>
    $(document).ready(function () {
        setActive("<?=$this->router->fetch_method()?>");
    });
</script>
</html>