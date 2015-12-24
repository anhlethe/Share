<div class="row_text_field">
    <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td class="left_text_field">Parent:</td>
            <td class="right_text_field">
                <select name="Parent_Cat_Admincp" id="ParentCatAdmincp">
                    <option value="-1">Root</option>
                    <?  foreach($result as $item):?>
                    <option <?php if(isset($item->id)) if($item->id == $cur) print "selected=\"selected\"";?> value="<?=$item->id ?>"><?=$item->name ?></option>
                    <?  endforeach;?>
                </select>
            </td>
        </tr>

    </table>
</div>