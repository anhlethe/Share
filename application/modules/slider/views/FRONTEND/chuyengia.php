<?php
/**
 * Created by PhpStorm.
 * User: Quach Tinh
 * Date: 24/09/2015
 * Time: 11:22 SA
 */
?>
<? if (!empty($results)): ?>
    <? $index=0;?>
    <? foreach ($results as $item): ?>
<div class="tit4" style="font-size: 16px;"><?= $item['name'] ?></div>
<ul class="doctor_tj">
    <li><a href="<?php base_url() ?>/zj/yuanqiang.html" target="_blank">
            <img src="<?= img(DIR_UPLOAD_SLIDER . $item['image'], 268, 361) ?>"></a>
    </li>

</ul>
        <? $index++;
    endforeach; ?>
<? endif; ?>