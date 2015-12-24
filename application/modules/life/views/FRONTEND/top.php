<?php
/**
 * Created by PhpStorm.
 * User: Quach Tinh
 * Date: 27/09/2015
 * Time: 10:21 SA
 */
?>
<!--TOP-->
<div class="xnHeader020">
    <!--ICON SEARCH TOP-->
    <div class="Top_Subnav">
        <div class="Main">
            <div class="Left">
                <div class="gzwm">Follow us：</div>
                <a href="#" target="_blank" class="sina"></a> <a target="_blank" onclick="openZoosUrl('chatwin','');return false;" href="javascript:void(0)" class="weichat"><span class="wicon"></span></a> <a target="_blank" onclick="openZoosUrl('chatwin','');return false;" href="javascript:void(0)" class="qq"></a> <a target="_blank" onclick="openZoosUrl('chatwin','');return false;" href="javascript:void(0)" class="lx"></a></div>
            <div class="Right">
                <div class="by" style="font-size: 18px;">Thời gian làm việc từ 8h00 đến 20h hàng ngày. Kể cả T7, CN, Ngày lễ</div>
                <form class="search" target="_blank" action="/search.aspx" method="get">
                    <input name="tags" type="text" class="Search_Frame" />
                    <input type="submit" class="Search_Buttom" value="" />
                </form>
                <!--<div class="Btn_Search_Hot" onmouseover="onexpand(1)"><a id="header_hot" class="Search_Hot" href="javascript:void(0);" ></a><div id="child1" onmouseout="outexpand(1)" style="font-size: 14px;"> <a title="" href="">Hướng dẫn đường đi</a> <a target="_blank" href="">Liên hệ qua số điện thoại</a></div></div>-->

            </div>
        </div>
    </div>
    <!--ICON SEARCH TOP END-->

    <!--LOGO SDT-->
    <div class="xnCen clearFix">
        <div class="xnLogo"><a href="" title=""></a></div>
        <div class="xnTtel"><img src="<?=STATIC_PATH_URL ?>assets/images/top_tel.jpg" /></div>
    </div>
    <!--LOGO SDT END-->

    <!--MENU-->
    <?= modules::run('life/menu') ?>
    <!--MENU END-->
    </div>
    <script type="text/javascript" src="<?=STATIC_PATH_URL ?>assets/js/nav_zt.js"></script>
    <script type="text/javascript">
        $('#xl-menu-r1-d ul li').soChange({
            thumbObj: '#xl-menu-r1-d .Roll_butt a',
            // 导航为数字形式，选择器指向包含数字的span对象
            thumbNowClass: 'a1',
            //自定义导航对象当前class为on
            changeTime: 3000, //自定义切换时间为4000ms
            slideTime: 0,
            clickFalse: false
        });


        $('#xl-menu-r1-d2 ul li').soChange({
            thumbObj: '#xl-menu-r1-d2 .Roll_butt a',
            // 导航为数字形式，选择器指向包含数字的span对象
            thumbNowClass: 'a1',
            //自定义导航对象当前class为on
            changeTime: 3000, //自定义切换时间为4000ms
            slideTime: 0,
            clickFalse: false
        });


        $('#xl-menu-r1-d3 ul li').soChange({
            thumbObj: '#xl-menu-r1-d3 .Roll_butt a',
            // 导航为数字形式，选择器指向包含数字的span对象
            thumbNowClass: 'a1',
            //自定义导航对象当前class为on
            changeTime: 3000, //自定义切换时间为4000ms
            slideTime: 0,
            clickFalse: false
        });

        $('#xl-menu-r1-d4 ul li').soChange({
            thumbObj: '#xl-menu-r1-d4 .Roll_butt a',
            // 导航为数字形式，选择器指向包含数字的span对象
            thumbNowClass: 'a1',
            //自定义导航对象当前class为on
            changeTime: 3000, //自定义切换时间为4000ms
            slideTime: 0,
            clickFalse: false
        });
    </script>
    <!--TOP END-->