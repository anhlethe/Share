<?php
/**
 * Created by PhpStorm.
 * User: Quach Tinh
 * Date: 23/09/2015
 * Time: 3:42 CH
 */
?>
<div class="body_bg">

    <div class="place">■ Bạn đang ở đây：<a href="<?php base_url() ?>/">Trang chủ</a>&nbsp;>&nbsp;<a
            href="<?php base_url() ?>/chat-lieu-nang-mui.html">Chất liệu nâng mũi</a></div>
    <div class="article">
        <!-- zj_left -->
        <div class="fleft">
            <div class="viewbox">
                <? $items = $page["list_article"];//var_dump($items);
                if($items){ $i=1;
                foreach ($items as $item): ?>
                    <?= parserEditorHTML(stripslashes($item->content)) ?>
                    <? $i++; ?>
                <? endforeach;} ?>
                <? /* <div class="title">
                        <h1>鼻整形材料</h1>
                    </div>
                    <div class="remind">
                        <p><b>郑重提醒：</b>做假体隆鼻手术是一件专业性很强的美丽改造，根据个人条件具体操作不一。文章内容仅供参考，具体诊疗请一定到医院，在医生指导下进行！如有疑问，可拨打清木24小时美丽热线：400-0352-001
                            或者 <a href="javascript:void(0);" onclick="qm();">点此在线咨询</a></p>
                    </div>
                    <div class="content">
                        <p>&nbsp;鼻整形材料</p>                        <br/>

                        <p>　　还是不太明白？<a href="javascript:void(0);" onclick="qm();">点击这里</a>，vip整形在线专家为您解答．</p>
                    </div>
                    <!-- baidu share -->

                    <div class="blank15"></div>
                    <!-- zx_article -->
                    <div class="zx_article">
                        <a href="javascript:void(0);" onclick="qm();"><img src="<?=STATIC_PATH_URL ?>assets/images/zx_5.gif"/></a><a
                            href="<?php base_url() ?>/about/contact/" target="_blank"><img src="<?=STATIC_PATH_URL ?>assets/images/zx_6.gif"/></a>
                    </div>
                    <div class="blank15"></div>
                 */?>
                <!-- more_article -->
                <div class="more_article">
                    <div class="article_1">
                        <div class="title">
                            <span class="more"><a href="http://ask.dtqmzx.com/bbzx/jtlb/"
                                                  target="_blank">更多>></a></span>
                            <strong>您可能感兴趣的问题：</strong>
                        </div>
                        <ul class="d4 ask_ico">
                            <li><span class="answer"><a href="http://ask.dtqmzx.com/question/5301.html" target="_blank">查看答案>></a></span><a
                                    href="http://ask.dtqmzx.com/question/5301.html" target="_blank">你适合做玻尿酸隆鼻吗</a></li>
                            <li><span class="answer"><a href="http://ask.dtqmzx.com/question/5158.html" target="_blank">查看答案>></a></span><a
                                    href="http://ask.dtqmzx.com/question/5158.html" target="_blank">韩氏综合鼻部整形的独特特点</a>
                            </li>
                            <li><span class="answer"><a href="http://ask.dtqmzx.com/question/4933.html" target="_blank">查看答案>></a></span><a
                                    href="http://ask.dtqmzx.com/question/4933.html" target="_blank">隆鼻材料是越贵的越好吗?</a>
                            </li>
                            <li><span class="answer"><a href="http://ask.dtqmzx.com/question/4934.html" target="_blank">查看答案>></a></span><a
                                    href="http://ask.dtqmzx.com/question/4934.html" target="_blank">　韩式隆鼻需要注意哪些？</a>
                            </li>
                            <li><span class="answer"><a href="http://ask.dtqmzx.com/question/4935.html" target="_blank">查看答案>></a></span><a
                                    href="http://ask.dtqmzx.com/question/4935.html" target="_blank">隆鼻手术多久恢复</a></li>

                        </ul>
                    </div>
                    <div class="article_2">
                        <div class="title">
                            <span class="more"><a href="http://www.dtqmzx.com/bbzx/jtlb/"
                                                  target="_blank">更多>></a></span>
                            <strong>您可能感兴趣的文章：</strong>
                        </div>
                        <ul class="d4">
                            <li><span class="date">2013-06-08</span><a href="http://www.dtqmzx.com/bbzx/jtlb/1629.html">隆鼻术后鼻部发红怎么办</a>
                            </li>
                            <li><span class="date">2013-06-09</span><a href="http://www.dtqmzx.com/bbzx/jtlb/1628.html">隆鼻恢复期多久可化妆</a>
                            </li>
                            <li><span class="date">2013-10-13</span><a href="http://www.dtqmzx.com/bbzx/jtlb/1627.html">详细的了解常见的隆鼻前的注意事项是什么?</a>
                            </li>
                            <li><span class="date">2012-03-28</span><a href="http://www.dtqmzx.com/bbzx/jtlb/1626.html">对于假体隆鼻术你该了解什么</a>
                            </li>
                            <li><span class="date">2012-11-04</span><a href="http://www.dtqmzx.com/bbzx/jtlb/1625.html">自体软骨隆鼻的适宜人群有哪些</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="fright">

            <?= modules::run('slider/chuyengia') ?>

        </div>
    </div>
</div>
