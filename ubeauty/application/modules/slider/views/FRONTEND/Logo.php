<?php
/**
 * Created by PhpStorm.
 * User: LeThinh
 * Date: 7/9/2015
 * Time: 5:02 PM
 */
?>
<? if (!empty($results)): ?>
    <? $index = 0; ?>
    <? foreach ($results as $item): ?><? // var_dump($item);?>
        <a href="/" title="<?=$item['name']?>">
            <img src="<?= img(DIR_UPLOAD_SLIDER . $item['image']) ?>"
                 alt="<?=$item['name']?>" class="hed_logo"/></a>
        <?
        $index++;
    endforeach; ?>
<? endif; ?>