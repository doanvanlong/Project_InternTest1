<div class="item_news_detail">
    <h2 class="tieude_detail"><?=$tintuc_detail['ten']?></h2>
    <div class="content">
        <?=$tintuc_detail['noidung']?>
    </div>
    <div class="addthis_native_toolbox"></div>
    <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-numposts="5" data-width="100%"></div>
</div>
<br />
<?php if(count($tintuc)){ ?>
<div class="">
    <div class="tieude_detail mb-4"><span><?=_cacduankhac?></span></div>
    <div class="row">
        <?php foreach($tintuc as $v){ ?>
        <div class="col-lg-4 col-sm-6 col-12 mb-30">
            <div class="item item_news">

                <a href="<?=$com?>/<?=$v['tenkhongdau']?>.html""></a>
                <div class="item_img phong_to hover_sang vien_trong">
                    <img src="thumb/480x320x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  onError="this.src='http://placehold.it/480x320';"  />
                </div>
                <h3 class="item_name text-center"><?=$v['ten']?></h3>
                
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php } ?>
<div class="mb-30"></div>

