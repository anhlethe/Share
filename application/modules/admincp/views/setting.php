<script type="text/javascript">
function save(){
	var options = {
		success:       showResponse  // post-submit callback 
    };
    $input = $('<input type="hidden" name="token"/>').val(csrf_value);
    $('#frmManagement').append($input);
	$('#frmManagement').ajaxSubmit(options);
}

function showResponse(responseText, statusText, xhr, $form) {
	if(responseText=='success-setting'){
		var url = $.url(document.location.href);
		if(url.fsegment(1)=='save'){
			location.reload();
		}else{
			location.href=root+"admincp/setting/#/save";
		}
	}
}
</script>
<div class="gr_perm_error" style="display:none;">
	<p><strong>FAILURE: </strong><span id="txt_error">Permission Denied.</span></p>
</div>
<div class="gr_perm_success" style="display:none;">
	<p><strong>SAVE SUCCESS.</strong></p>
</div>
<div class="table">
	<div class="head_table"><div class="head_title_edit">Setting</div></div>
	<div class="clearAll"></div>

	<form id="frmManagement" action="<?=PATH_URL.'admincp/setting/'?>" method="post" enctype="multipart/form-data">
	<? foreach($setting as $item): ?>
        <div class="row_text_field_first">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<input type="hidden" value="<?=$item->slug?>" name="hd_slugAdmincp[]" />
				<td class="left_text_field"><?=$item->name?>:</td>
				<td class="right_text_field"><input value="<?php if(isset($item->content)){ print $item->content; }else{ print''; } ?>" type="text" name="contentAdmincp[]" /></td>
			</tr>
		</table>
	    </div>
      <? endforeach;?>
	</form>
</div>