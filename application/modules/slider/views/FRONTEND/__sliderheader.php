<?php
/**
 * Created by PhpStorm.
 * User: LeThinh
 * Date: 7/9/2015
 * Time: 2:35 PM
 */
?>
<? if (!empty($results)): ?>
    <script src="<?= STATIC_PATH_URL ?>js/Jssor.js"></script>
    <style type="text/css">#slider1_container .slides img {
            width: 30px;
            height: 30px;
        }

        #slider1_container .jssora03l {
            width: 32px;
            height: 32px;
        }
    </style>
    <div id="slider1_container" class="slider1_container"
         style="position:relative;margin:0 auto;width:250px;height:30px;overflow:hidden;">
        <div u="loading" style="position:absolute;top:0px;left:0px;">
            <div
                style="filter:alpha(opacity=70);opacity:0.7;position:absolute;display:block;background-color:#000;top:0px;left:0px;width:100%;height:100%;">
            </div>
            <div
                style="position:absolute;display:block;background:url(<?= STATIC_PATH_URL ?>img/loading.gif) no-repeat center center;top:0px;left:0px;width:100%;height:100%;">
            </div>
        </div>
        <div u="slides"
             style="margin-left: 43px ;cursor:move;position:absolute;left:0px;top:0px;width:263px;height:30px;overflow:hidden;">

            <? $index = 0; ?>
            <? foreach ($results as $item): ?>
                <div>
                    <a href="#">
                        <img u="image" src="<?= img(DIR_UPLOAD_SLIDER . $item['image']) ?>" title="<?= $item['name'] ?>"/>
                    </a>
                </div>
                <?
                $index++;
            endforeach; ?>


        </div>

        <div u="navigator" class="jssorb03" style="bottom:4px;right:6px;">
            <div u="prototype">
                <div u="numbertemplate"></div>
            </div>
        </div>
                        <span u="arrowleft" class="jssora03l" style="top:23px;left:0px;">
                        </span>
                        <span u="arrowright" class="jssora03r" style="top:23px;right:0px;">
                        </span>
        <a style="display:none" href="#">jQuery Slider</a>
        <script>
            jssor_slider1_starter('slider1_container');
        </script>
         </div>
<? endif; ?>