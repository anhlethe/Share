<div class="content_table">
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<th class="th_no_cursor" width="40">No.</th>
			<th class="th_no_cursor" width="31"><input type="checkbox" class="custom_chk" id="selectAllItems" onclick="selectAllItems(<?=count($result)?>)" /></th>
			<th class="th_left" onclick="sort('title')"><div id="title" class="sort icon_no_sort">Title</div></th>
            <th class="th_left" onclick="sort('alias')"><div id="alias" class="sort icon_no_sort">Alias</div></th>
            <th class="th_left">Bài Viết</th>
            <th class="th_left">Trạng Thái</th>
            <th class="th_left">Vị Trí</th>
			<th class="th_last" width="100" onclick="sort('created_date')"><div id="created" class="sort icon_sort_asc">Created</div></th>
		</tr>
		<?php
			if($result){
				$i=0;
                $_i=0;
                $no = isset($start)?$start:0;
				foreach($result as $k=>$v){

		?>
                            <tr class="item_row<?=$i?> <?php ($k%2==0) ? print 'row1' : print 'row2' ?>">
                                <td class="td_center"><?=++$no?></td>
                                <td class="td_no_padd"><input type="checkbox" class="custom_chk" id="item<?=$i?>" onclick="selectItem(<?=$i?>)" value="<?=$v->id?>" /></td>
                                <td class="th_left"><a href="<?=PATH_URL.'admincp/'.$module.'/update/'.$v->id?>"><?=$v->name?></a></td>
                                <td class="th_left"><?=$v->alias?></td>
                                <td class="th_left"><a target="_blank" href="<?=PATH_URL.'admincp/life/?catid='.$v->id?>"> Có <strong><?=$v->numarticles?></strong> Bài viết</a></td>
                                <td class="td_center" id="loadActiveID_<?=$v->id?>"><a href="javascript:void(0)" onclick="updateActive(<?=$v->id?>,<?=$v->active?>,'<?=$module?>')"><img alt="Checked item" src="<?=PATH_URL.'static/images/admin/icons/'?><?php ($v->active==0) ? print 'uncheck_16x16.png' : print 'check_16x16.png' ?>" /></a></td>
                                <td class="td_center" id="loadOrderID_<?=$v->id?>"><?=$v->order?></td>
                                <td class="th_last td_center"><?=date('d-m-Y H:i:s',strtotime($v->created_date))?></td>
                            </tr>
                    <? $childCats = $this->model->getParentAll($v->id);?>
                    <?
                    if(!empty($childCats)):
                    foreach($childCats as $child_item):
                        $i++;
                        ?>
                        <tr class="item_row<?=$i?> <?php ($i%2==0) ? print 'row1' : print 'row2' ?>">
                            <td class="td_center"><?=++$no?></td>
                            <td class="td_no_padd"><input type="checkbox" class="custom_chk" id="item<?=$i?>" onclick="selectItem(<?=$i?>)" value="<?=$child_item->id?>" /></td>
                            <td class="th_left"><a href="<?=PATH_URL.'admincp/'.$module.'/update/'.$child_item->id?>">--  <?=$child_item->name?></a></td>
                            <td class="th_left"><?=$child_item->alias?></td>
                            <td class="th_left"><a target="_blank" href="<?=PATH_URL.'admincp/life/?catid='.$child_item->id?>"> Có <strong><?=$this->life->count_article_all($child_item->id);?></strong> Bài viết</a></td>
                            <td class="td_center" id="loadActiveID_<?=$child_item->id?>"><a href="javascript:void(0)" onclick="updateActive(<?=$child_item->id?>,<?=$child_item->active?>,'<?=$module?>')"><img alt="Checked item" src="<?=PATH_URL.'static/images/admin/icons/'?><?php ($child_item->active==0) ? print 'uncheck_16x16.png' : print 'check_16x16.png' ?>" /></a></td>
                            <td class="td_center" id="loadOrderID_<?=$child_item->id?>"><?=$child_item->order?></td>
                            <td class="th_last td_center"><?=date('d-m-Y H:i:s',strtotime($child_item->created_date))?></td>
                        </tr>
                    <? endforeach; endif;?>

		<?php $i++;}}else{ ?>
		<tr class="row1">
			<td class="th_last td_center" colspan="50" style="font-size: 20px; padding: 50px 0">No data</td>
		</tr>
		<?php } ?>
	</table>
</div>

<?php if($result){ ?>
<div class="footer_table">
	<div class="item_per_page">Items per page:</div>
	<div class="select_per_page">
		<select id="per_page" onchange="searchContent(<?=$start?>,this.value)">
			<option <?php ($per_page==10) ? print 'selected="selected"' : print '' ?> value="10">10</option>
			<option <?php ($per_page==25) ? print 'selected="selected"' : print '' ?> value="25">25</option>
			<option <?php ($per_page==50) ? print 'selected="selected"' : print '' ?> value="50">50</option>
			<option <?php ($per_page==100) ? print 'selected="selected"' : print '' ?> value="100">100</option>
		</select>
	</div>
	
	<div class="pagination"><?=$this->adminpagination->create_links();?></div>
</div>
<div class="clearAll"></div>
<?php } ?>