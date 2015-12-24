<script type="text/javascript" src="<?= PATH_URL . 'static/js/admin/jquery.slugit.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#titleAdmincp").slugIt({
            events: 'keyup blur',
            output: '#aliasAdmincp',
            space: '-'
        });
    });

    function save() {
        var options = {
            beforeSubmit: showRequest,  // pre-submit callback
            success: showResponse  // post-submit callback
        };
        var value = CKEDITOR.instances['contentAdmincp'].getData();
        $('#contentAdmincp').val(value);
        $input = $('<input type="hidden" name="token"/>').val(csrf_value);
        $('#frmManagement').append($input);
        $('#frmManagement').ajaxSubmit(options);
    }

    function showRequest(formData, jqForm, options) {
        var form = jqForm[0];
        if (form.titleAdmincp.value == '' || form.descAdmincp.value == '' || $('#contentAdmincp').val() == '<br>' || $('#contentAdmincp').val() == '') {
            $('#txt_error').html('Please enter information!!!');
            $('#loader').fadeOut(300);
            show_perm_denied();
            return false;
        }
    }

    function showResponse(responseText, statusText, xhr, $form) {
        if (responseText == 'success') {
            location.href = root + "admincp/" + module + "/#/save";
        }

        if (responseText == 'error-title-exists') {
            $('#txt_error').html('Title already exists!!!');
            $('#loader').fadeOut(300);
            show_perm_denied();
            $('#titleAdmincp').focus();
            return false;
        }

        if (responseText == 'error-alias-exists') {
            $('#txt_error').html('Slug already exists!!!');
            $('#loader').fadeOut(300);
            show_perm_denied();
            $('#aliasAdmincp').focus();
            return false;
        }

        if (responseText == 'permission-denied') {
            show_perm_denied();
        }
    }
</script>
<div class="gr_perm_error" style="display:none;">
    <p><strong>FAILURE: </strong><span id="txt_error">Permission Denied.</span></p>
</div>
<div class="table">
    <div class="head_table">
        <div class="head_title_edit"><?= $module ?></div>
    </div>
    <div class="clearAll"></div>

    <form id="frmManagement" action="<?= PATH_URL . 'admincp/' . $module . '/save/' ?>" method="post"
          enctype="multipart/form-data">
        <input type="hidden" value="<?= $id ?>" name="hiddenIdAdmincp"/>

        <div class="row_text_field_first">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Active:</td>
                    <td class="right_text_field"><input <?php if (isset($result->active)){
                                                        if ($result->active == 1){ ?>checked="checked" <?php }
                                                        }else{ ?>checked="checked"<?php } ?> type="checkbox"
                                                        class="custom_chk" name="activeAdmincp"/></td>
                </tr>
            </table>
        </div>
        <!--        <div class="row_text_field_first">-->
        <!--            <table cellspacing="0" cellpadding="0" border="0" width="100%">-->
        <!--                <tr>-->
        <!--                    <td class="left_text_field">Hot:</td>-->
        <!--                    <td class="right_text_field"><input --><?php //if (isset($result->hot)){
        //                                                        if ($result->hot == 1){ ?><!--checked="checked" -->
        <?php //}
        //                                                        }else{ ?><!--checked="checked"-->
        <?php //} ?><!-- type="checkbox"-->
        <!--                                                        class="custom_chk" name="hotAdmincp"/></td>-->
        <!--                </tr>-->
        <!--            </table>-->
        <!--        </div>-->
        <!--        <div class="row_text_field_first">-->
        <!--            <table cellspacing="0" cellpadding="0" border="0" width="100%">-->
        <!--                <tr>-->
        <!--                    <td class="left_text_field">Home:</td>-->
        <!--                    <td class="right_text_field"><input --><?php //if (isset($result->home)){
        //                                                        if ($result->home == 1){ ?><!--checked="checked" -->
        <?php //}
        //                                                        }else{ ?><!--checked="checked"-->
        <?php //} ?><!-- type="checkbox"-->
        <!--                                                        class="custom_chk" name="homeAdmincp"/></td>-->
        <!--                </tr>-->
        <!--            </table>-->
        <!--        </div>-->

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Title:</td>
                    <td class="right_text_field"><input value="<?php if (isset($result->title)) {
                            print htmlspecialchars($result->title);
                        } else {
                            print '';
                        } ?>" type="text" name="titleAdmincp" id="titleAdmincp"/></td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Slug:</td>
                    <td class="right_text_field"><input value="<?php if (isset($result->alias)) {
                            print $result->alias;
                        } else {
                            print '';
                        } ?>" type="text" name="aliasAdmincp" id="aliasAdmincp"/></td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Thumbmail:</td>
                    <td class="right_text_field"><input type="file"
                                                        name="fileAdmincp[thumbnail]"/><?php if (isset($result->thumbnail)) {
                            if ($result->thumbnail != '') { ?> - <a class="fancyboxClick"
                                                                    href="<?= PATH_URL . DIR_UPLOAD_NEWS . $result->thumbnail ?>">
                                    Review</a><?php }
                        } ?></td>
                </tr>

                <tr style="margin-top: 10px;height: 30px">
                    <td class="left_text_field">Remove Thumnail:</td>
                    <td class="right_text_field">
                        <input type="checkbox" class="custom_chk" name="removeThumbnailAdmincp"/>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <td class="left_text_field">Document:</td>
                                    <td class="right_text_field"><input type="file"  name="fileAdmincp[document]"/></td>
                                </tr>

                                <tr style="margin-top: 10px;height: 30px">
                                        <td class="left_text_field">Remove Document:</td>
                                        <td class="right_text_field">
                                                <input type="checkbox" class="custom_chk" name="removeDocumentAdmincp"/>
                                            </td>
                                    </tr>
                            </table>
                    </div>
                <div class="row_text_field">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                    <td class="left_text_field">Publish Date:</td>
                    <td class="right_text_field" data-height="300px">
                        <input class="datetimepicker" name="publishdateAdmincp"
                               value="<?php if (isset($result->publish_date) && ($result->publish_date != '0000-00-00 00:00:00')) {
                                   echo date('Y-m-d', strtotime($result->publish_date));
                               } else {
                                   echo date('Y-m-d', time());
                               } ?>"/>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Lượt Xem:</td>
                    <td class="right_text_field"><input value="<?php if (isset($result->view_page)) {
                            print $result->view_page;
                        } else {
                            print '';
                        } ?>" disabled="disabled"/></td>
                </tr>
            </table>
        </div>
        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Loại Tin tức:</td>
                    <td class="right_text_field">
                        <select name="catidAdmincp" id="catidAdmincp">
                            <? foreach ($categories as $item): ?>
                                <option <?php if (isset($result->catid)) if ($result->catid == $item->id) print "selected=\"selected\""; ?>
                                    value="<?= $item->id ?>"><?= $item->name ?></option>
                                <? $childCats = $this->category->getParentAll($item->id, true); ?>
                                <?
                                if (!empty($childCats)):
                                    foreach ($childCats as $child_item):?>
                                        <option <?php if (isset($result->catid)) if ($result->catid == $child_item->id) print "selected=\"selected\"";?>
                                            value="<?= $child_item->id ?>"> -- <?= $child_item->name ?></option>
                                    <? endforeach; endif; ?>
                            <? endforeach; ?>
                        </select>
                    </td>
                </tr>

            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Mô tả tóm tắt:</td>
                    <td class="right_text_field"><textarea name="descAdmincp" cols=""
                                                           rows="8"><?php if (isset($result->summary)) {
                                print $result->summary;
                            } else {
                                print '';
                            } ?></textarea></td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Content:</td>
                    <td class="right_text_field" style="padding-right: 0px;">
                        <?=
                        $msg = '';
                        if (isset($result->content)) {
                            $msg = stripslashes($result->content);
                        } ?>
                        <textarea name="contentAdmincp" id="contentAdmincp" cols=""
                                  rows="8"><?php if (isset($result->content)) {
                                print stripslashes($result->content);
                            } else {
                                print '';
                            } ?></textarea>
                        <? $this->ckeditor->replace("contentAdmincp"); ?>
                    </td>
                </tr>
            </table>
        </div>

        <div class="row_text_field">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="left_text_field">Tác giả:</td>
                    <td class="right_text_field"><label id="posterAdmincp"> <?php if (isset($result->poster)) {
                                print htmlspecialchars($result->poster);
                            } else {
                                print '';
                            } ?></label></td>
                </tr>
            </table>
        </div>

    </form>
</div>
