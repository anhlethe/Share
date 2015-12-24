<? if(!empty($results)): ?>
<? if($position == "RIGHT_MAIN"): ?>
<div class="box noborder">
<? foreach($results as $item):  ?>
    <p class="sponsors">
        <a href="<?=$item["link"]?>" target="_new" title="<?=$item["name"]?>">
		<img src="/static/uploads/ads/<?=$item['image']?>" alt="" width="<?=$item["width"]?>"/>
        </a>
    </p>
<? endforeach; ?>
</div>
<? endif; ?>

<? if($position == "TOP_BANNER"): ?>
<? foreach($results as $item):  ?>
    <p class="sponsor">
        <a href="<?=$item["link"]?>" target="_new" title="<?=$item["name"]?>">
            <img src="<?=img(DIR_UPLOAD_ADS.$item['image'], $item['width'], $item['height'])?>" alt=""/>
        </a>
    </p>
<? endforeach; ?>
<? endif; ?>
<? endif; ?>
