<?php



/* $d->reset();
    $sql = "select photo from #_background where type='bg-footer'";
    $d->query($sql);
    $bg_footer = $d->fetch_array();*/

$d->reset();
$sql = "select ten$lang as ten, noidung$lang as noidung from #_about where type='text-footer' limit 0,1";
$d->query($sql);
$text_footer = $d->fetch_array();

$d->reset();
$sql = "select ten$lang as ten,mota$lang as mota from #_slider where type='text-lien-he' and hienthi=1 order by stt,id desc";
$d->query($sql);
$ar_lienhe = $d->result_array();

$d->reset();
$sql = "select ten$lang as ten,mota$lang as mota,link$lang as link from #_slider where type='text-chinh-sach' and hienthi=1 order by stt,id desc";
$d->query($sql);
$ar_chinhsach = $d->result_array();

$d->reset();
$sql = "select ten$lang as ten,mota$lang as mota from #_slider where type='xuong-sx' and hienthi=1 order by stt,id desc";
$d->query($sql);
$ar_xuongsx = $d->result_array();

$d->reset();
$sql = "select ten$lang as ten,link,id,photo from #_slider where hienthi=1 and type='social' order by stt,id desc";
$d->query($sql);
$social = $d->result_array();

$d->reset();
$sql = "select ten$lang as ten,tenkhongdau,id from #_news where type='ho-tro-khach-hang' and hienthi=1 and noibat=1 order by stt,id desc";
$d->query($sql);
$hotrokh = $d->result_array();
// text-vechungtoi

$d->reset();
$sql = "select noidung,photo  from #_about where type='text-ve-chung-toi' and hienthi=1 ";
$d->query($sql);
$text_vechungtoi = $d->result_array();
?>
<div id="w_footer">
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-12">
                    <div class="tt_footer wow fadeIn" data-duration="1s">
                        Thông tin liên hệ
                        <span class="chan_footer"></span>
                    </div>
                    <div class="nd_footer text-footer">
                        <?php foreach ($ar_lienhe as $val) { ?>
                            <div class="f-item wow fadeIn" data-duration="1s">&nbsp;&nbsp;<span><?= $val['ten'] ?> <?= $val['mota'] ?></span></div>
                        <?php } ?>
                    </div>
                </div>
                <?php /* ?><div id="social_footer2" class="wow fadeIn" data-duration="1s">
                        <?php foreach($social as $k=>$v){?>
                          <a href="<?=$v['link']?>" title="<?=$v['ten']?>"><img src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>"></a>
                      <?php }?>
                    </div> <?php */ ?>
                     <div class="col-lg-3 col-md-3 col-12">
                <div class="tt_footer wow fadeIn" data-duration="1s">
                    Về chúng tôi
                    <span class="chan_footer"></span>
                </div>
                <div class="nd_footer text-footer">
                    <?php
                    echo strip_tags($text_vechungtoi[0]['noidung']);
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="tt_footer wow fadeIn" data-duration="1s">
                    Chính sách
                    <span class="chan_footer"></span>
                </div>
                <div class="nd_footer text-footer">
                    <?php foreach ($ar_chinhsach as $val) { ?>
                        <div class="f-item wow fadeIn border-gach-textfooter" data-duration="1s">&nbsp;&nbsp;<span><a style="color:#999;" href="<?=$val['link']?>"><?= $val['ten'] ?> <?= $val['mota'] ?></a></span></div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-12">
                <div class="tt_footer wow fadeIn" data-duration="1s">
                    Hướng dẫn
                    <span class="chan_footer "></span>
                </div>
                <div class="nd_footer text-footer">
                    <?php foreach ($ar_chinhsach as $val) { ?>
                        <div  class="f-item wow fadeIn border-gach-textfooter" data-duration="1s">&nbsp;&nbsp;<span><a style="color:#999;" href="<?=$val['link']?>"><?= $val['ten'] ?> <?= $val['mota'] ?></a></span></div>
                    <?php } ?>
                </div>
            </div>
            </div>
           
        </div>

      
    </div>
</div>
<div class="footer_strip"></div>

<!---END #footer-->
<div class="div_footer_bottom">
    <div class="container">
        <div class="footer_bottom text-center justify-content-center">
            <div class="text-copy" style="color:#999;">Copyright 2022 by <span><?= $company['copyright'] ?></span>.All rights reserved.</div>
           
        </div>
    </div>
</div>
</div>