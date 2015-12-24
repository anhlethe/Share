<?php
/**
 * Created by PhpStorm.
 * User: LeThinh
 * Date: 7/3/2015
 * Time: 8:46 AM
 */
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?= modules::run('life/getSetting', 'home-title') ?></title>
    <meta name="description" content="<?= modules::run('life/getSetting', 'meta-description') ?>">
    <meta name="keywords" content="<?= modules::run('life/getSetting', 'meta-keyword') ?>">
    <meta name="robots" content="index,follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="<?= STATIC_PATH_URL ?>css/Jssor.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= STATIC_PATH_URL ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?= STATIC_PATH_URL ?>css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="<?= STATIC_PATH_URL ?>css/carousel.css"/>
    <script src="<?= STATIC_PATH_URL ?>js/jquery-latest.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="<?= STATIC_PATH_URL ?>css/style.css"/>
</head>
<body>
<div class="col-md-12 padding-top-bottom-10">
    <div class="container min-height590  boder-radius-10 padding-left-right-0 bacground-ebebeb">
        <!--header-->
        <div class="col-md-12 padding-left-right-0 pading-magin-not bacground-while">
            <div class="col-md-2 text-center">
                <?= modules::run('slider/LOGO') ?>
             <!--   <img src="<? // = STATIC_PATH_URL ?>images/logo.jpg"/>
             -->
            </div>
            <div class="col-md-7">
                <div class="text-center990">
                    <?php if($this->session->userdata('site_lang')!='en'){?>
                    <h1 style="margin-top: 9%"><b>Viện nghiên cứu cao su việt nam</b></h1>
                    <?php }
                    else{?>
                    <h1 style="margin-top: 9%"><b>INSTITUTE FOR RUBBER VIETNAM</b></h1>
                    <?php }?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="margin-top-35-35 mediamagin-top-15">
                    <!--start slider-->
                    <?= modules::run('slider/homeheader') ?>
                    <!--end start slider-->
                </div>
            </div>
        </div>
        <!--end header-->
        <!--menu-->
        <div class="col-md-12 padding-left-right-0" style="min-height: 58px;">
            <!--<img src="images/menu-001.jpg" class="img-responsive">-->
            <div class="menu">
                <nav class="navbar navbar-default magin-bottom-0" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!--<a class="navbar-brand" href="#">Menu</a>-->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <!--set active-->
                        <?php
                        // gets the current URI, remove the left / and then everything after the / on the right
                        $directory = explode('/',ltrim($_SERVER['REQUEST_URI'],'/'));

                        // loop through each directory, check against the known directories, and add class
                        if($this->session->userdata('site_lang')!='en'){
                            $directories = array("index.php", "tintuc-sukien","hoat-dong-r-d","san-pham-dich-vu","gioi-thieu","lien-he.html"); // set home as 'index', but can be changed based of the home uri
                            foreach ($directories as $folder){ //var_dump($directory);//exit();
                                $active[$folder] = ($directory[0] == $folder)? "active":"";

                            }
                        }
                        else {
                            $directories = array("index.php","tintucsukien ","article","activity-r-d","products-services","about","contact-us.html"); // set home as 'index', but can be changed based of the home uri
                            foreach ($directories as $folder){ //var_dump($directory);//exit();
                                $active[$folder] = ($directory[0] == $folder)? "active":"";

                            }
                        }
                        ?>
                        <!--end set active-->
                        <ul class="nav navbar-nav">
                            <?php if($this->session->userdata('site_lang')!='en'){?>
                                <li class="<?=($directory[0] ==null)?"active ":" " ?><?php echo $active["index.php"]?>"><a href="/index.php">Trang chủ</a></li>
                                <li class="<?=($directory[0] =="tintucsukien")?"active ":" " ?> <?php echo $active['tintuc-sukien']?>"><a href="<?php base_url() ?>/tintuc-sukien/tintucsukien">Tin tức sự kiện</a></li>
                                <li class="<?php echo $active['hoat-dong-r-d']?>"><a href="<?php base_url() ?>/hoat-dong-r-d/hoatdong-nghiencuu.html">Hoạt động R-D</a></li>
                                <li class="<?php echo $active['san-pham-dich-vu']?>"><a href="<?php base_url() ?>/san-pham-dich-vu/cac-tien-bo-ky-thuat.html">Sản phẩm dịch vụ</a></li>
                                <li class="<?php echo $active['gioi-thieu']?>"><a href="<?php base_url() ?>/gioi-thieu/ve-chung-toi.html">Giới thiệu RRIV</a></li>
                                <li class="<?php echo $active["lien-he.html"]?>"><a href="<?php base_url() ?>/lien-he.html">Liên hệ</a></li>
                            <?php }
                            else{?>
                                <li class="<?=($directory[0] ==null)?"active ":" " ?><?php echo $active["index.php"]?>""><a href="/">Home</a></li>
                                <li class="<?php echo $active['article']?>"><a href="<?php base_url() ?>/article/article">News and events</a></li>
                                <li class="<?php echo $active['activity-r-d']?>"><a href="<?php base_url() ?>/activity-r-d/activity-research.html">Activity R-D</a></li>
                                <li class="<?php echo $active['products-services']?>"><a href="<?php base_url() ?>/products-services/the-technical-progress.html">Products - services</a></li>
                                <li class="<?php echo $active['about']?>"><a href="<?php base_url() ?>/about/about-us.html">Introduction RRIV</a></li>
                                <li class="<?php echo $active['contact-us.html']?>"><a href="<?php base_url() ?>/contact-us.html">Contact</a></li>
                            <?php }?>
                            <li><a href="#"><? _T("Internal")?></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if($this->session->userdata('site_lang')!='en'){  echo "VI";
                                     }
                                    else{
                                       echo "EN";
                                     }?>
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php base_url() ?>/switchLanguage/vn">VI</a></li>
                                    <li><a href="<?php base_url() ?>/switchLanguage/en">EN</a></li>

                                </ul>
                            </li>
                        </ul>

                        <div class="col-sm-3 col-md-3 navbar-right">
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="q">
                                    <div class="input-group-btn">
                                        <button class="btn btn-green" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
        <!--end menu-->
<!--content-->
        <?= $content ?>
<!--end content-->
        <!-- footer-->
        <div class="col-md-12 padding-left-right-0 boder-bottom-1 margin-top-10 bacground-green">

            <div class="row magin-left-right-0">
                <div class="col-sm-6 col-md-3">
                    <h3><font size="3"><? _T("Activity R-D")?> </font></h3>
                    <div class="col-lg-12 boder-top-2 divfooter padding-top-bottom-10">
                        <?php if($this->session->userdata('site_lang')!='en'){?>
                        <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/hoat-dong-r-d/hoatdong-de-tai-nghien-cuu-32.html">Đề tài nghiêng cứu</a></p>
                        <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/hoat-dong-r-d/hoatdong-bao-cao-khoa-hoc-34.html">Báo cáo khoa học</a> </p>
                        <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/hoat-dong-r-d/hoatdong-so-huu-tri-tue-35.html">Sở hữu trí tuệ</a></p>
                        <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/hoat-dong-r-d/hoatdong-an-pham-37.html">Ấn phẩm</a> </p>
                        <?php }
                        else{?>
                            <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/activity-r-d/activity-research-project-51.html">Research subjects</a></p>
                            <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/activity-r-d/activity-scientific-reports-53.html">Scientific Reports</a> </p>
                            <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/activity-r-d/activity-intellectual-property-54.html">Intellectual Property</a></p>
                            <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/activity-r-d/activity-publications-55.html">Publications</a> </p>
                        <?php }?>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h3><? _T("Product")?></h3>
                    <div class="col-lg-12 boder-top-2 divfooter padding-top-bottom-10">
                        <?php if($this->session->userdata('site_lang')!='en'){?>
                        <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/san-pham-dich-vu/giong-cao-su-tien-bo.html">Sản phẩm thương mại</a></p>
                        <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/san-pham-dich-vu/dao-tao.html">Dịch vụ kỹ thuật</a> </p>
                        <?php }
                        else{?>
                            <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/products-services/rubber-seeds-progress.html">Commercial Products</a></p>
                            <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/products-services/educate.html">Technical Services</a> </p>
                        <?php }?>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h3><? _T("About Us")?></h3>
                    <div class="col-lg-12 boder-top-2 divfooter padding-top-bottom-10">
                        <?php if($this->session->userdata('site_lang')!='en'){?>
                        <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/about/ve-chung-toi.html">Về chúng tôi</a></p>
                        <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/about/nghien-cuu-va-phat-trien.html">Nghiêng cứu và phát triển</a> </p>
                        <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/about/san-xuat-kinh-doanh.html">Sản xuất kinh doanh</a></p>
                        <?php }
                        else{?>
                            <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/about/about-us.html">About us</a></p>
                            <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/about/research-development.html">Research and development</a> </p>
                            <p><i class="glyphicon-ico-while"></i> <a href="<?php base_url() ?>/about/manufacturing-business.html">Manufacturing business</a></p>
                        <?php }?>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <h3><? _T("Total hits")?></h3>
                    <div class="col-lg-12 boder-top-2 divfooter padding-top-bottom-10">
                        <p><i class="glyphicon-ico-while"></i> online<span class="floatright">9</span></p>
                        <p><i class="glyphicon-ico-while"></i> <? _T("Today")?> <span class="floatright">159</span></p>
                        <p><i class="glyphicon-ico-while"></i> <?_T("Total hits")?> <span class="floatright">3567</span></p>
                    </div>
                </div>
            </div>
        </div>
        <!--end footer-->
        <!--info footer-->
        <div class="col-md-12 padding-left-right-0 text-center bacground-footer" style="border-top: 10px solid;">
            <p style="line-height: 35px;">
                <span>Copyright © 2015 - RRIV - All Right Reserved | Designed by <a href="//vnetwork.vn"><b>VNETWORK</b></a> </span>
            </p>
        </div>
        <!--end info footer-->

    </div>
</div>

<script src="<?= STATIC_PATH_URL ?>js/jquery.min.js"></script>
<script src="<?= STATIC_PATH_URL ?>js/bootstrap.min.js"></script>


<script src="<?= STATIC_PATH_URL ?>js/ie10-viewport-bug-workaround.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65033549-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>