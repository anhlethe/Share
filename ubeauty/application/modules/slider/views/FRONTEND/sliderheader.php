<?php
/**
 * Created by PhpStorm.
 * User: LeThinh
 * Date: 8/1/2015
 * Time: 4:16 PM
 */
?>
<? if (!empty($results)): ?>
    <div class="slidetop">

    <div id="myCarouseltop" class="carousel">

        <!-- Carousel items -->
        <div class="carousel-inner">
            <a class="left carousel-control color-green magin-left-reponsive-179" href="#myCarouseltop"
               data-slide="prev" style="z-index: 3">‹</a>
            <? $index = 0; ?>
            <? $N = count($results) ?>
            <? if ($N > 5) { ?>
                <div class='item  active'>
                    <div class="row magin-left-right-0 width-193-margin-left38-reponsive-magin-left-0" style="">
                        <? foreach ($results as $item): ?>
                            <? if ($index < 5) { ?>
                                <div class="div33x33floadleft" style="width: 38px; height: 33px;">
                                    <a href="#x" class="thumbnail" style="padding: 0px;">
                                        <img src="<?= img(DIR_UPLOAD_SLIDER . $item['image'], 33, 33) ?>"
                                             title="<?= $item['name'] ?>" alt="<?= $item['name'] ?>"
                                             class="img-responsive">
                                    </a>
                                </div>
                            <? } ?>
                            <? $index++;
                        endforeach; ?>
                    </div>
                </div>
                <div class='item'>
                    <div class="row magin-left-right-0 width-193-margin-left38-reponsive-magin-left-0" style="">
                        <? foreach ($results as $item): ?>
                            <? if ($index >= 5 && $index < 10) { ?>
                                <div class="div33x33floadleft" style="width: 38px; height: 33px;"><a href="#x"
                                                                                                     class="thumbnail"
                                                                                                     style="padding: 0px;"><img
                                            src="<?= img(DIR_UPLOAD_SLIDER . $item['image'], 33, 33) ?>"
                                            title="<?= $item['name'] ?>" alt="<?= $item['name'] ?>"
                                            class="img-responsive"></a>
                                </div>
                            <? } ?>
                            <? $index++;
                        endforeach; ?>
                    </div>
                </div>
                <? if ($N > 10) { ?>
                    <div class='item'>
                        <div class="row magin-left-right-0 width-193-margin-left38-reponsive-magin-left-0" style="">
                            <? foreach ($results as $item): ?>
                                <? if ($index >= 10 && $index < 15) { ?>
                                    <div class="div33x33floadleft" style="width: 38px; height: 33px;"><a href="#x"
                                                                                                         class="thumbnail"
                                                                                                         style="padding: 0px;"><img
                                                src="<?= img(DIR_UPLOAD_SLIDER . $item['image'], 33, 33) ?>"
                                                title="<?= $item['name'] ?>" alt="<?= $item['name'] ?>"
                                                class="img-responsive"></a>
                                    </div>
                                <? } ?>
                                <? $index++;
                            endforeach; ?>
                        </div>
                    </div>
                <? } ?>
            <? } else {
                ?><!--neu n=5-->
                <div class='item  active'>
                    <div class="row magin-left-right-0 width-193-margin-left38-reponsive-magin-left-0" style="">
                        <? foreach ($results as $item): ?>
                            <div class="div33x33floadleft" style="width: 38px; height: 33px;"><a href="#x"
                                                                                                 class="thumbnail"
                                                                                                 style="padding: 0px;"><img
                                        src="<?= img(DIR_UPLOAD_SLIDER . $item['image'], 33, 33) ?>"
                                        title="<?= $item['name'] ?>" alt="<?= $item['name'] ?>" class="img-responsive"></a>
                            </div>
                            <? $index++;
                        endforeach; ?>
                    </div>
                </div>

            <? }
            ?>
            <!--   <div class="item">
                   <div class="row magin-left-right-0" style="width: 193px; margin-left: 38px;">
                       <div class="div33x33floadleft" style="width: 38px; height: 3px;" ><a href="#x" class="thumbnail" style="padding: 0px;"><img src="http://placehold.it/33x3" alt="Image" class="img-responsive"></a>
                       </div>
                       <div class="div33x33floadleft" style="width: 38px; height: 33px;" ><a href="#x" class="thumbnail" style="padding: 0px;"><img src="http://placehold.it/33x33" alt="Image" class="img-responsive"></a>
                       </div>
                       <div class="div33x33floadleft" style="width: 38px; height: 33px;" ><a href="#x" class="thumbnail" style="padding: 0px;"><img src="http://placehold.it/33x33" alt="Image" class="img-responsive"></a>
                       </div>
                       <div class="div33x33floadleft" style="width: 38px; height: 33px;" ><a href="#x" class="thumbnail" style="padding: 0px;"><img src="http://placehold.it/33x33" alt="Image" class="img-responsive"></a>
                       </div>
                       <div class="div33x33floadleft" style="width: 38px; height: 33px;" ><a href="#x" class="thumbnail" style="padding: 0px;"><img src="http://placehold.it/33x33" alt="Image" class="img-responsive"></a>
                       </div>
                   </div>

               </div>
               <div class="item">
                   <div class="row magin-left-right-0" style="width: 193px; margin-left: 38px;">
                       <div class="div33x33floadleft" style="width: 38px; height: 3px;" ><a href="#x" class="thumbnail" style="padding: 0px;"><img src="http://placehold.it/33x33" alt="Image" class="img-responsive"></a>
                       </div>
                       <div class="div33x33floadleft" style="width: 38px; height: 33px;" ><a href="#x" class="thumbnail" style="padding: 0px;"><img src="http://placehold.it/33x33" alt="Image" class="img-responsive"></a>
                       </div>
                       <div class="div33x33floadleft" style="width: 38px; height: 33px;" ><a href="#x" class="thumbnail" style="padding: 0px;"><img src="http://placehold.it/33x33" alt="Image" class="img-responsive"></a>
                       </div>
                       <div class="div33x33floadleft" style="width: 38px; height: 33px;" ><a href="#x" class="thumbnail" style="padding: 0px;"><img src="http://placehold.it/33x33" alt="Image" class="img-responsive"></a>
                       </div>
                       <div class="div33x33floadleft" style="width: 38px; height: 33px;" ><a href="#x" class="thumbnail" style="padding: 0px;"><img src="http://placehold.it/33x3" alt="Image" class="img-responsive"></a>
                       </div>
                   </div>

               </div>


       -->
            <a class="right carousel-control color-green magin-right-reponsive-179" href="#myCarouseltop"
               data-slide="next">›</a>
        </div>
        <!--/carousel-inner-->
        <!-- <a class="left carousel-control" href="#myCarouseltop" data-slide="prev">‹</a>
         <a class="right carousel-control" href="#myCarouseltop" data-slide="next">›</a>
         -->
        <!--/myCarousel-->
    </div>
<? endif; ?>