<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="<?=STATIC_PATH_URL ?>favicon.ico"/>
    <meta http-equiv="Cache-Control" content="no-transform " />
    <title><?= modules::run('life/getSetting', 'home-title') ?></title>
    <meta name="keywords" content="<?= modules::run('life/getSetting', 'meta-keyword') ?>" />
    <meta name="description" content="<?= modules::run('life/getSetting', 'meta-description') ?>" />
    <?= modules::run('life/head') ?>

</head>

<body>
<!--HEADER LOGO SDT-->


<div id="header">
    <div class="hed">
        <?= modules::run('slider/Logo') ?>
        <div class="hed1"></div>
        <?= modules::run('life/header') ?>
    </div>
</div>

<!--MENU-->
<?= modules::run('life/menu') ?>

<!--SLIDER-->
<?= modules::run('slider/slider') ?>


<?= $content ?>

<!--[if IE 6]><script src="<?=STATIC_PATH_URL ?>assets/js/DD_belatedPNG.js"></script><![endif]-->

<!--FOOTER-->

<?= modules::run('life/footer') ?>
<?php // require_once('include/footer.php');?>
</body>
</html>
