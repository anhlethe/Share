<script type="text/javascript" src="<?=PATH_URL.'static/js/admin/jquery.slugit.js'?>"></script>
<script type="text/javascript">
function save(){
	var options = {
		beforeSubmit:  showRequest,  // pre-submit callback 
		success:       showResponse  // post-submit callback 
    };
    $input = $('<input type="hidden" name="token"/>').val(csrf_value);
    $('#frmManagement').append($input);
	$('#frmManagement').ajaxSubmit(options);
}

function showRequest(formData, jqForm, options) {
	var form = jqForm[0];
	if(form.titleAdmincp.value == ''){
		$('#txt_error').html('Please enter information!!!');
		$('#loader').fadeOut(300);
		show_perm_denied();
		return false;
	}
}

function showResponse(responseText, statusText, xhr, $form) {
	if(responseText=='success'){
		location.href=root+"admincp/"+module+"/#/save";
	}
	
	if(responseText=='error-title-exists'){
		$('#txt_error').html('Title already exists!!!');
		$('#loader').fadeOut(300);
		show_perm_denied();
		$('#titleAdmincp').focus();
		return false;
	}
	
	if(responseText=='error-alias-exists'){
		$('#txt_error').html('Slug already exists!!!');
		$('#loader').fadeOut(300);
		show_perm_denied();
		$('#aliasAdmincp').focus();
		return false;
	}

	if(responseText=='permission-denied'){
		show_perm_denied();
	}
}
</script>
<div class="gr_perm_error" style="display:none;">
	<p><strong>FAILURE: </strong><span id="txt_error">Permission Denied.</span></p>
</div>
<div class="table">
	<div class="head_table"><div class="head_title_edit"><?=$module?></div></div>
	<div class="clearAll"></div>

	<form id="frmManagement" action="<?=PATH_URL.'admincp/'.$module.'/save/'?>" method="post" enctype="multipart/form-data">
	<input type="hidden" value="<?=$id?>" name="hiddenIdAdmincp" />
	<div class="row_text_field_first">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Active:</td>
				<td class="right_text_field"><input <?php if(isset($result->active)){ if($result->active==1){ ?>checked="checked"<?php }}else{ ?>checked="checked"<?php } ?> type="checkbox" class="custom_chk" name="activeAdmincp" /></td>
			</tr>
		</table>
	</div>

	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Title:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->name)) { print $result->name; }else{ print '';} ?>" type="text" name="titleAdmincp" id="titleAdmincp" /></td>
			</tr>
		</table>
	</div>
	
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Link:</td>
				<td class="right_text_field"><input value="<?php if(isset($result->link)) { print $result->link; }else{ print '';} ?>" type="text" name="linkAdmincp" id="linkAdmincp" /></td>
			</tr>
		</table>
	</div>
	
	<div class="row_text_field">
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td class="left_text_field">Media:</td>
				<td class="right_text_field"><input type="file" name="fileAdmincp[thumbnail]" /><?php if(isset($result->image)){ if($result->image!=''){ ?> - <a class="fancyboxClick" href="<?=PATH_URL.DIR_UPLOAD_ADS.$result->image?>">Review</a><?php }} ?></td>
			</tr>
		</table>
	</div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Vị Trí:</td>
                    <td class="right_text_field">
                        <select name="positionAdmincp" id="positionAdmincp">
                            <option <?php if(isset($result->position)) if($result->position == 1) print "selected=\"selected\"";?> value="1">Right Main</option>
                            <option <?php if(isset($result->position)) if($result->position == 2) print "selected=\"selected\"";?> value="2">Top Banner</option>
                        </select>
                    </td>
                </tr>

            </table>
        </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Loại:</td>
                    <td class="right_text_field">
                        <select name="typeAdmincp" id="typeAdmincp">
                            <option <?php if(isset($result->type)) if($result->type == 1) print "selected=\"selected\"";?> value="1">Image</option>
                            <option <?php if(isset($result->type)) if($result->type == 2) print "selected=\"selected\"";?> value="2">swf</option>
                        </select>
                    </td>
                </tr>

            </table>
        </div>
	</form>
</div>