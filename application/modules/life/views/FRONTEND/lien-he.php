<?php
/**
 * Created by PhpStorm.
 * User: Quach Tinh
 * Date: 22/09/2015
 * Time: 3:46 CH
 */
?>
<div class="body_bg">

    <div class="place">■ Bạn đang ở đây：<a href="<?php base_url() ?>/">Trang Chủ</a>&nbsp;>&nbsp;<a
            href="<?php base_url() ?>/bizhengxingwenda/">Liên Hệ</a></div>
    <div class="article">
        <!-- zj_left -->
        <div class="fleft">
            <div class="viewbox">
                <p></p>

                <h3 style="text-align: center;padding: 10px;">LIÊN HỆ V.I.P ĐỂ ĐƯỢC TƯ VẤN</h3>

                <p></p>
                <style>
                    .input_form_lienhe {
                        background-color: #fff;
                        background-image: none;
                        border: 1px solid #ccc;
                        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
                        color: #555;
                        display: block;
                        font-size: 14px;
                        height: 23px;
                        line-height: 1.42857;
                        padding: 6px 12px;
                        transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                        width: 60%;
                    }

                    button, input, select, textarea {
                        font-family: inherit;
                    }

                    .col50 {
                        /*margin-bottom: 15px;
                        */
                        height: 50px;
                    }
                    .btn-green-full {
                        background: #b58845 none repeat scroll 0 0;

                        color: #ffffff;
                        text-shadow: 0 0 0 rgba(0, 0, 0, 0.2);
                    }
                    .btn {
                        -moz-user-select: none;
                        border: 1px solid transparent;
                        display: inline-block;
                        font-size: 14px;
                        font-weight: 400;
                        line-height: 1.42857;
                        margin-bottom: 0;
                        padding: 6px 12px;
                        text-align: center;
                        vertical-align: middle;
                        white-space: nowrap;
                    }
                    .btn-green-full:hover,.btn-green-full.focus{
                        background-color: #af7505  ;
                        border-color: #fcbf49;
                        color: #ffffff;
                    }
                </style>
                <?php
                $hidden = array('ajax' => 'true');
                echo form_open("", "class='form-lienhe' data-toggle='validator' role='form'", $hidden); ?>
                <table width="85%" cellpadding="4" border="0" style="font-weight:bold; margin-left: 15%;">
                    <tbody>
                    <tr class="col50">
                        <td width="17%" scope="col">Họ tên
                            <label class="control-label">
                                <span></span>
                            </label>
                        </td>
                        <td scope="col">
                            <?php
                            $data_name = array(
                                'name' => 'Name',
                                'class' => 'input_form_lienhe require',
                                'placeholder' => "Tên",
                                'id' => 'Name'
                            );
                            echo form_input($data_name, '', 'required');
                            ?>


                        </td>
                    </tr>
                    <tr class="col50">
                        <td>Email</td>
                        <td>
                            <?php
                            $data_name = array(
                                'name' => 'Email',
                                'class' => 'input_form_lienhe require',
                                'placeholder' => "Email",
                                'id' => 'Email',
                                'type' => 'email'
                            );
                            echo form_input($data_name, '', 'required');
                            ?>

                    </tr>


                    <tr class="col50">
                        <td>Điện thoại</td>
                        <td>
                            <?php
                            $data_name = array(
                                'name' => 'Phone',
                                'class' => 'input_form_lienhe require',
                                'placeholder' => lang("Phone"),
                                'id' => 'Phone'
                            );
                            echo form_input($data_name, '', 'required');
                            ?>


                        </td>
                    </tr>
                    <tr class="col150">
                        <td>Lời nhắn</td>
                        <td>
                            <?php
                            $data_name = array(
                                'name' => 'EmailMsg',
                                'class' => 'input_form_lienhe',
                                'placeholder' => lang("Message"),
                                'id' => 'EmailMsg',
                                'rows'=>'10',
                                'cols'=>'40',
                            );
                            echo form_textarea($data_name, '', 'required');
                            ?>
                            <!-- <textarea rows="" cols="" id="request" class="input_form_lienhe" style="height:100px;width:280px;"></textarea>
                            -->

                        </td>
                    </tr>
                    <tr class="col150">
                        <td ></td>
                        <td >
                            <div style="height:20px;"></div>
                            <style>
                                .eee {
                                    padding: 5px;
                                    border-radius: 5px;
                                }
                            </style>
                            <!--<input type="button" style="color: #fff;background-color: #265a88;"
                                   value="Gửi liên hệ" id="button" name="step1button" class="eee">-->
                            <?php echo form_submit('submit', " Gửi liên hệ ", "class='btn btn-green-full opacity1' name='submit'"); ?>
                            <input type="reset" value="Soạn lại" id="" class="btn btn-green-full opacity1">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>

                <?php
                // Form Close
                echo form_close(); ?>



                <? /* <form id="form_lien_he" method="get" action="">
                    <table width="100%" cellpadding="4" border="0" style="font-weight:bold; margin-left: 15%;">
                        <tbody>
                        <tr>
                            <td width="17%" scope="col">Họ tên (*)</td>
                            <td scope="col"><input type="text" style="width:280px;" id="name" class="input_form_lienhe"></td>
                        </tr>
                        <tr>
                            <td>Điện thoại (*)</td>
                            <td><input type="text" style="width:280px;" id="tel" class="input_form_lienhe"></td>
                        </tr>

                        <tr>
                            <td>Email (*)</td>
                            <td><input type="text" style="width:280px;" id="email" class="input_form_lienhe"></td>
                        </tr>
                        <tr>
                            <td>Lời nhắn (*)</td>
                            <td><textarea rows="" cols="" id="request" class="input_form_lienhe" style="height:100px;width:280px;"></textarea>
                                <div style="height:20px;"></div>
                                <style>
                                    .eee{
                                        padding: 5px;
                                        border-radius: 5px;
                                    }
                                </style>
                                <input type="button" style="color: #fff;background-color: #265a88;" value="Gửi liên hệ" id="button" name="step1button" class="eee"> <input type="reset" value="Soạn lại" id="" class="eee">        </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>	<div style="padding:10px; font-weight:bold; " id="thongbao"></div></td>
                        </tr>
                        </tbody></table>
                </form>
*/ ?>
                <?= stripslashes($info->content) ?>
             <?/*  <div style="border: 1px solid #ccc;">
                    <div
                        style="padding: 10px;border: 1px solid;background-color: red;color: #fff;text-transform: uppercase;font-weight: bold;">
                        Một số thông tin cần lưu ý
                    </div>
                    <div style="padding: 10px;">
                        <p style="overflow: hidden;display: block;">
                            <span
                                style="font-weight: bolder;font-size: 34pt;font-family: 'Time new roman';display: block;float: left;margin: -9px 0px 0px 0px;padding: 0px;">V.I.P</span>
                            là thầm mỹ viện Quốc tế uy tín nhất.
                            Thẩm mỹ viện dẫn đầu về chất lượng chuyên môn, trang thiết bị, cơ sở hạ tầng, nhằm đem lại
                            giá trị tối đa và sự tăng trưởng bền vững cho các dịch vụ thẩm mỹ
                            <br><i class="fa fa-clock-o ffa"></i>
                            <u style="  font-size: 15px;font-weight: bold;">Thời gian làm việc: 8h00 - 20h00</u>
                        </p>
                    </div>
                </div>
*/?>

            </div>
        </div>
        <div class="fright">

            <?= modules::run('slider/chuyengia') ?>

        </div>
    </div>
</div>
