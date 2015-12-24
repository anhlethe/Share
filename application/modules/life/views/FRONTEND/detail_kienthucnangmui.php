<?php
/**
 * Created by PhpStorm.
 * User: Quach Tinh
 * Date: 23/09/2015
 * Time: 11:43 SA
 */
?>
<div class="body_bg">

    <!-- place -->

    <div class="place"> ■ 您当前的位置：<a href="<?php base_url() ?>/">Trang Chủ</a>&nbsp;&gt;&nbsp;<a href="/bizimeixue/">鼻子美学</a></div>
    <!-- con_view -->
    <div class="con_view">
        <div class="con_left">
            <div class="zx_ol">
                <ul>
                    <li><a onclick="qm();" href="javascript:void(0);"><img src="<?=STATIC_PATH_URL ?>assets/images/zx_1_1.gif"></a></li>
                    <li><a onclick="qm();" href="javascript:void(0);"><img src="<?=STATIC_PATH_URL ?>assets/images/zx_2_1.gif"></a></li>
                    <li><a onclick="qm();" href="javascript:void(0);"><img src="<?=STATIC_PATH_URL ?>assets/images/zx_3_1.gif"></a></li>
                    <li><a onclick="qm();" href="javascript:void(0);"><img src="<?=STATIC_PATH_URL ?>assets/images/zx_4_1.gif"></a></li>
                </ul>
            </div>
        </div>
        <!-- con_right -->
        <div class="con_right">
            <? $items = $result;//var_dump($result);
            if($items){?>

            <div class="title">
                <span></span>
                <style type="text/css">
                    .tieude-baiviet{
                        color: brown;
                        padding-left: 22px;
                        font-size: 14px;
                        text-transform: uppercase;
                        display: block;
                        border-bottom: 1px solid;
                    }
                </style>
                <strong class="tieude-baiviet"><?=character_limiter(stripslashes($result->title),70);?></strong>
            </div>
            <div class="hr_info">
                <div class="hr_i_l">
                    <!--LOAD DS BÀI VIẾT KIEN THUC NANG MUI-->
                    <div style="margin: 5px; padding-top: 10px;">
                        <?= parserEditorHTML(stripslashes($result->content)) ?>
                    </div>


                </div>
                <div class="blank5"></div>
            </div>
            <? } ?>
        </div>
        <div class="blank15"></div>
    </div>



</div>
