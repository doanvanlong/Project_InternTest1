<?php   
    $d->reset();
    $sql="select ten$lang as ten,tenkhongdau,id,photo,mota$lang as mota,ngaytao from #_news where type='tin-tuc' and noibat=1 and hienthi=1 order by stt,id desc";
    $d->query($sql);
    $rs_news=$d->result_array();

    $d->reset();
    $sql="select ten$lang as ten,tenkhongdau,id,photo,mota$lang as mota,ngaytao from #_news where type='cong-trinh-kho-lanh' and noibat=1 and hienthi=1 order by stt,id desc";
    $d->query($sql);
    $rs_congtrinh=$d->result_array();
?>

<div class="w_congtrinh">
    <div class="wapper">
        <div class="tieude_giua"><span> <?=_congtrinhkholanh?></span></div>
        <div class="sl_congtrinh">
            <?php foreach ($rs_congtrinh as $k => $v) {?>
                <div>
                    <div class="box_congtrinh">
                        <div class="img_ct"><a href="cong-trinh-kho-lanh/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><img src="thumb/380x270x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"/></a></div>
                        <div class="desc_nx">
                            <div class="w_desc">
                                <h3><a href="cong-trinh-kho-lanh/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><?=$v['ten']?></a></h3>
                                <p><?=date("d/m/Y",$v['ngaytao'])?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>

<div class="w_media">
    <div class="wapper">
        <div class="col_tintuc">
            <div class="tt_media"><span><?=_tintucnoibat?></span></div>
            <div class="sl_tt">
                <?php foreach($rs_news as $k=>$v){?>
                    <div>
                        <div class="big_tt">
                            <div class="img_tin"><a href="tin-tuc/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><img src="thumb/150x100x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"/></a></div>
                            <h3><a href="tin-tuc/<?=$v['tenkhongdau']?>.html" title="<?=$v['ten']?>"><?=$v['ten']?></a></h3>
                            <div class="desc_tt"><?=catchuoi($v['mota'],80)?></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                <?php }?>
            </div>
            
        </div>
        <div class="col_video">
            <div class="tt_media"><span>Videos</span></div>
            <?php
                $d->reset();
                $d->query("select id,ten$lang as ten,link from #_video where hienthi=1 order by stt desc");
                $video= $d->result_array();
            ?>
            <div class="content-vi">
                    <iframe width="100%" id="video-frame" height="290" src="https://www.youtube.com/embed/<?=getYoutubeIdFromUrl($video[0]['link'])?>" frameborder="0" allowfullscreen></iframe></div>
                    <div class="sl-video ggg">
                            <?php for($i=0;$i<count($video);$i++){
                                $a=end(explode("=",$video[$i]['link']));
                            ?>
                            <div>
                                <div class="item-vi"><a class="aaaa" href="<?=getYoutubeIdFromUrl($video[$i]['link'])?>" data-name="<?=$video[$i]['ten'] ?>">  
                                <img border="0" src="http://i2.ytimg.com/vi/<?=$a?>/0.jpg" alt="<?=$video[$i]['ten'] ?>" width="100%" height="80"/></a></div>
                            </div>
                            <?php } ?>
                    </div>
                    <div class="clear"></div>
            </div>
        <div class="col_fanpage">
             <div class="tt_media"><span>Fanpage</span></div>
             <div class="nd_fb">
                 <div class="fb-page" data-href="<?=$company['fanpage']?>" data-tabs="timeline" data-width="375" data-height="380" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>
             </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
 <div class="clear"></div>
 <br>
 <br>