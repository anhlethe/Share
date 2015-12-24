<? if(!empty($results)): ?>
<div class="box noborder">
<? foreach($results as $item):  ?>
    <p class="sponsors">
        <a href="<?=$item["link"]?>" target="_new" title="<?=$item["name"]?>">
            <img src="<?=img(DIR_UPLOAD_ADS.$item['image'], $item["width"], 0)?>" alt=""/>
        </a>
    </p>
<? endforeach; ?>
</div>
<? endif; ?>