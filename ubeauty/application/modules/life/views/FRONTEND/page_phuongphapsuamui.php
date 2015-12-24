<?php
/**
 * Created by PhpStorm.
 * User: Quach Tinh
 * Date: 23/09/2015
 * Time: 2:54 CH
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
                    <li><a onclick="qm();" href="javascript:void(0);"><img src="<?=STATIC_PATH_URL ?>assets/images/zx_1_1.png"></a></li>
                    <li><a onclick="qm();" href="javascript:void(0);"><img src="<?=STATIC_PATH_URL ?>assets/images/zx_2_1.png"></a></li>
                    <li><a onclick="qm();" href="javascript:void(0);"><img src="<?=STATIC_PATH_URL ?>assets/images/zx_3_1.png"></a></li>
                    <li><a onclick="qm();" href="javascript:void(0);"><img src="<?=STATIC_PATH_URL ?>assets/images/zx_4_1.png"></a></li>
                </ul>
            </div>
        </div>
        <!-- con_right -->
        <div class="con_right">
            <div class="title">
                <span></span>
                <strong>Những Phương Pháp Nâng Mũi Công Nghệ Tiên Tiến Hiện Đại Nhất Hiện Nay</strong>
            </div>
            <div class="hr_info">
                <div class="hr_i_l">
                    <!--LOAD DS BÀI VIẾT KIEN THUC NANG MUI-->
                    <style type="text/css">
                        .tb a {
                            text-decoration: none;
                            color: deepskyblue;
                        }

                        .tb a:hover {
                            text-decoration: none;
                            color: blue;
                        }
                    </style>
                    <? $items = $page["list_article"];//var_dump($items);
                    if($items){ $i=1;
                        foreach ($items as $item): ?>
                            <table class="tb">
                                <tbody>
                                <tr>
                                    <td style="width: 180px !important;"><img style="max-width: 100%;  margin: 5px; "
                                                                              src="<?= img(DIR_UPLOAD_NEWS . $item->thumbnail,180,180) ?>">
                                    </td>
                                    <td style="padding: 15px;">
                                        <a style="text-align: justify;" target="_blank"
                                           href="<?php base_url() ?>/kien-thuc-nang-mui/<?=$item->alias?>.html"><h3><?=character_limiter(stripslashes($item->title),70);?></h3></a>
                                        <br>

                                        <p style="text-align: justify;"><?=substr(stripslashes($item->summary),0,230)?></p>

                                        <p><i>Lượt xem:<?=$item->view_page?> </i></p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <? $i++; ?>
                        <? endforeach;} ?>
                </div>
                <div class="blank5"></div>
            </div>
        </div>
        <div class="blank15"></div>
    </div>



</div>
