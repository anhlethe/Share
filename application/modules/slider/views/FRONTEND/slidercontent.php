<?php
/**
 * Created by PhpStorm.
 * User: LeThinh
 * Date: 7/9/2015
 * Time: 2:41 PM
 */
?>
<? if (!empty($results)): ?>
<div class="col-md-12 padding-left-right-0">
<? if ($position !== "homeheader"): ?>
    <div data-ride="carousel" class="carousel slide heigh_slider380" id="myCarousel">
        <!-- Indicators -->
      <? endif; ?>
        <ol class="carousel-indicators">
        <? $index = 0; ?>
        <? foreach ($results as $item): ?>
        <li data-target="#myCarousel" data-slide-to="<?= $index ?>"
            class="<? echo $index == 0 ? "active" : "" ?>"></li>
        <? $index++;   endforeach; ?>
         <!--   <li class="active" data-slide-to="0" data-target="#myCarousel"></li>
            <li data-slide-to="1" data-target="#myCarousel" class=""></li>
            <li data-slide-to="2" data-target="#myCarousel" class=""></li>
            -->
        </ol>
        <div role="listbox" class="carousel-inner height-ifrponsive1024-height-440">
        <? $index = 0; ?>
            <? foreach ($results as $item): ?>
            <div class="item <? echo $index == 0 ? "active" : "" ?>">
                <img alt="First slide" src="<?= img(DIR_UPLOAD_SLIDER . $item['image']) ?>" class="first-slide">

            </div>
        <?
        $index++;
         endforeach; ?>
            <!--
            <div class="item">
                <img alt="Third slide" src="<?= STATIC_PATH_URL ?>images/web-RRIV-finall1_34.jpg" class="third-slide">

            </div>
            <div class="item">
                <img alt="Third slide" src="<?= STATIC_PATH_URL ?>images/web-RRIV-finall1_34.jpg" class="third-slide">

            </div>
            -->
        </div>
        <a data-slide="prev" role="button" href="#myCarousel" class="left carousel-control">
            <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a data-slide="next" role="button" href="#myCarousel" class="right carousel-control">
            <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    <? if ($position !== "HOME"): ?>
    </div>
        <? endif; ?>
</div>
    <? endif; ?>