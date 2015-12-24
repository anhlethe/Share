<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>VIP</title>
    <meta name="keywords" content="Nâng mũi V.I.P" />
    <meta name="description" content="Viện phẫu thuật thẩm mỹ V.I.P" />
    <?php //require_once('include/head.php');?>
    <?= modules::run('life/head') ?>
</head>

<body>

<?= modules::run('life/top') ?>
<?php //require_once('include/top.php');?>

<div class="clearFix"></div>

<!--NOI DUNG CHINH-->
<?= modules::run('slider/slider') ?>
<?php //require_once('include/banner_slider.php');?>

<?= $content ?>

<div class="clearFix">
</div>
<map name="Map" id="Map">
    <area shape="rect" coords="699,4,857,46" href='javascript:void(0)' onclick='openZoosUrl("chatwin","");return false;'
          target="_blank" title="" />
</map>
<map name="Map2" id="Map2">
    <area shape="rect" coords="284,232,395,260" href='javascript:void(0)' onclick='openZoosUrl("chatwin","");return false;'
          target="_blank" title="" />
</map>
<map name="Map3" id="Map3">
    <area shape="rect" coords="109,190,218,218" href='javascript:void(0)' onclick='openZoosUrl("chatwin","");return false;'
          target="_blank" title="" />
</map>
<map name="Map4" id="Map4">
    <area shape="rect" coords="92,217,202,245" href='javascript:void(0)' onclick='openZoosUrl("chatwin","");return false;'
          target="_blank" title="" />
</map>
<map name="Map5" id="Map5">
    <area shape="rect" coords="301,183,412,212" href='javascript:void(0)' onclick='openZoosUrl("chatwin","");return false;'
          target="_blank" title="" />
</map>

<?= modules::run('life/footer') ?>
<?php //require_once('include/footer.php');?>
</body>
</html>
