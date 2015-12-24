<!-- Insert to your webpage where you want to display the slider -->
<div class="banner_bg" style="
    height: 645px;
    width: 100%;
">
   <? /* <div class="banner">
        <img src="<?=STATIC_PATH_URL ?>assets/images/banner.jpg" />
        <img src="<?=STATIC_PATH_URL ?>assets/images/banner-02.jpg" />
        <img src="<?=STATIC_PATH_URL ?>assets/images/banner-03.jpg" />
        <img src="<?=STATIC_PATH_URL ?>assets/images/banner-04.jpg" />
        <img src="<?=STATIC_PATH_URL ?>assets/images/banner-05.jpg" />
        <img src="<?=STATIC_PATH_URL ?>assets/images/banner-06.jpg" />
        <img src="<?=STATIC_PATH_URL ?>assets/images/banner-07.jpg" usemap="#Map" border="0" />
        <img src="<?=STATIC_PATH_URL ?>assets/images/banner-08.jpg" />
    </div>
 */ ?>
</div>
<? /* if (!empty($results)): ?>
<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:980px;margin:0px auto 56px;">
    <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">

        <? //if (!empty($results)): ?>

            <? $index = 0; ?>
            <? foreach ($results as $item): ?>

        <ul class="amazingslider-slides" style="display:none;">
            <li><img src="<?= img(DIR_UPLOAD_SLIDER . $item['image']) ?>" alt="<?=$item['name']?>" />
            </li>
          <!--  <li><img src="<?=STATIC_PATH_URL ?>assets/images/111.jpg" alt="111" />
            </li>
            <li><img src="<?=STATIC_PATH_URL ?>assets/images/222.jpg" alt="222" />
            </li>
            <li><img src="<?=STATIC_PATH_URL ?>assets/images/333.jpg" alt="333" />
            </li>
            -->
        </ul>
                <?
                $index++;
            endforeach; ?>

        <ul class="amazingslider-thumbnails" style="display:none;">
            <? $index = 0; ?>
            <? foreach ($results as $item): ?>
            <li><img src="<?= img(DIR_UPLOAD_SLIDER . $item['image']) ?>" alt="<?=$item['name']?>" /></li>
                <?
                $index++;
            endforeach; ?>

        </ul>

        <div class="amazingslider-engine"></div>
    </div>
    <style></style>
</div>

 <? endif;  */?>
<!-- End of body section HTML codes -->